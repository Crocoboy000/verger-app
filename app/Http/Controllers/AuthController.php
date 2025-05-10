<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $user = DB::table('user')
            ->where('login', $request->login)
            ->where('pwd', $request->pwd)
            ->first();

        if ($user) {
            session(['user_login' => $user->login]);
            return redirect('/dashboard');
        }

        return back()->with('error', 'Invalid credentials.');
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $exists = DB::table('user')->where('login', $request->login)->exists();

        if ($exists) {
            return back()->with('error', 'Login already taken.');
        }

        DB::table('user')->insert([
            'login' => $request->login,
            'pwd' => $request->pwd,
        ]);

        session(['user_login' => $request->login]);
        return redirect('/dashboard');
    }

public function dashboard()
{
    $login = session('user_login');

    // Get user ID
    $user = DB::table('user')->where('login', $login)->first();

    // Get vergers for this user
    $vergers = DB::table('user_verger')
        ->where('iduser', $user->login) // Assuming login = iduser
        ->pluck('refver');

    // Get all statut entries for those vergers
    $statuts = DB::table('statut')
        ->whereIn('refver', $vergers)
        ->get();

            $vergersFilter = DB::table('user_verger')
        ->join('verger', 'verger.refver', '=', 'user_verger.refver')
        ->where('iduser', $user->login)
        ->select('verger.refver', 'verger.nomver')
        ->get();


    return view('dashboard', compact('statuts', 'vergersFilter'));
}
public function showAddVerger()
{
    return view('add_verger');
}

public function addVerger(Request $request)
{
    $login = session('user_login');

    // Find current user
    $user = DB::table('user')->where('login', $login)->first();

    // Get last refver to generate next one
    $lastRef = DB::table('verger')->orderBy('refver', 'desc')->first();
    $lastNum = $lastRef ? intval(substr($lastRef->refver, 3)) : 0;
    $newRefver = 'VRG' . str_pad($lastNum + 1, 3, '0', STR_PAD_LEFT);

    // Insert new verger
    DB::table('verger')->insert([
        'refver' => $newRefver,
        'nomver' => $request->nomver
    ]);

    // Link verger to user
    DB::table('user_verger')->insert([
        'iduser' => $user->login,
        'refver' => $newRefver
    ]);

    return redirect('/dashboard')->with('success', "Verger $newRefver added.");
}

public function showAddStatut()
{
    $user = DB::table('user')->where('login', session('user_login'))->first();

    $vergers = DB::table('user_verger')
        ->join('verger', 'verger.refver', '=', 'user_verger.refver')
        ->where('iduser', $user->login)
        ->select('verger.refver', 'verger.nomver')
        ->get();

    return view('add_statut', compact('vergers'));
}

public function addStatut(Request $request)
{
    DB::table('statut')->insert([
        'refver' => $request->refver,
        'numver' => $request->numver,
        'dtver' => $request->dtver,
        'codvar' => $request->codvar,
        'nomvar' => $request->nomvar,
        'pdrec' => $request->pdrec,
        'pdexp' => $request->pdexp,
        'pdeca' => $request->pdeca,
        'pdfre' => $request->pdfre,
    ]);

    return redirect('/dashboard')->with('success', 'Statut added.');
}

public function filter(Request $request)
{
    $login = session('user_login');

    // Get user ID
    $user = DB::table('user')->where('login', $login)->first();

    // Get vergers for this user
    $vergers = DB::table('user_verger')
        ->where('iduser', $user->login)
        ->pluck('refver');

    // Get all vergers for the filter dropdown
    $vergersFilter = DB::table('verger')->whereIn('refver', $vergers)->get();

    // Start building the query
    $query = DB::table('statut')->whereIn('refver', $vergers);

    // Check if filters are submitted and apply them
    if ($request->has('refver') && $request->refver != '') {
        $query->where('refver', $request->refver);
    }

    if ($request->has('date_from') && $request->date_from != '') {
        $query->where('dtver', '>=', $request->date_from);
    }

    if ($request->has('date_to') && $request->date_to != '') {
        $query->where('dtver', '<=', $request->date_to);
    }

    // Get the filtered statuts
    $statuts = $query->get();

    // Pass the filtered results and vergers to the view
    return view('dashboard', compact('statuts', 'vergersFilter'));
}


}
