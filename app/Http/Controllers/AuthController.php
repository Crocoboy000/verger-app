<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Verger;
use Illuminate\Support\Facades\Hash;
use Statut;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

public function login(Request $request)
{
    $request->validate([
        'login' => 'required|string',
        'pwd' => 'required|string',
    ]);

    $user = DB::table('user')->where('login', $request->login)->first();

    if ($user) {
        $valid = false;

        if ($user->role == 1) {
            // Admin: password is hashed
            $valid = Hash::check($request->pwd, $user->pwd);
        } else {
            // Normal user: plain text password
            $valid = Hash::check($request->pwd, $user->pwd);

        }

        if ($valid) {
            session([
                'user_login' => $user->login,
                'user_role' => $user->role,
            ]);

            return redirect('/dashboard');
        }
    }

    return back()->with('error', 'Invalid credentials.');
}



    public function showRegister()
    {
        return view('auth.register');
    }

public function register(Request $request)
{
    $request->validate([
        'login' => 'required|unique:user,login',
        'pwd' => 'required|confirmed',
    ]);

    DB::table('user')->insert([
        'login' => $request->login,
        'pwd' => bcrypt($request->pwd),
        'role' => 0, // Force regular user
    ]);

    return redirect('/dashboard')->with('success', 'User registered successfully.');
}


public function dashboard(Request $request)
{
    $login = session('user_login');
    $userRole = session('user_role');

    // If the user is an admin, fetch all users from the database
    if ($userRole === 1) {
        // Fetch all users' data
        $users = User::all(); // You can also use User::all() if you prefer Eloquent
        return view('dashboard', compact('users'));
    } else {
        // For non-admin users, show their specific data
        $user = DB::table('user')->where('login', $login)->first();

        // Get vergers for this user
        $vergers = DB::table('user_verger')
            ->where('iduser', $user->login)
            ->pluck('refver');

        // Initialize the query
        $query = DB::table('statut')->where('login', $login);

        // Apply filters if provided
        if ($request->has('refver') && $request->refver != '') {
            $query->where('refver', $request->refver);
        }

        if ($request->has('date_from') && $request->date_from != '') {
            $query->where('dtver', '>=', $request->date_from);
        }

        if ($request->has('date_to') && $request->date_to != '') {
            $query->where('dtver', '<=', $request->date_to);
        }

        // Paginate the results (e.g., 10 results per page)
        $statuts = $query->paginate(10);

        // Get vergers for the filter dropdown
        $vergersFilter = DB::table('user_verger')
            ->join('verger', 'verger.refver', '=', 'user_verger.refver')
            ->where('iduser', $user->login)
            ->select('verger.refver', 'verger.nomver')
            ->get();

        // Return the view with paginated results and filters
        return view('dashboard', compact('statuts', 'vergersFilter'))
            ->with([
                'refver' => $request->refver,
                'date_from' => $request->date_from,
                'date_to' => $request->date_to
            ]);
    }
}



public function logout()
{
    session()->forget('user_login');
    return redirect('/login');
}

public function showAddVerger()
{
    return view('add_verger');
}


public function addVerger(Request $request)
{
$request->validate([
    'refver' => 'required|unique:verger,refver',
    'nomver' => 'required',
], [
    'refver.unique' => 'This reference already exists. Please choose another one.',
]);


    DB::table('verger')->insert([
        'refver' => $request->refver,
        'nomver' => $request->nomver,
    ]);


    return back()->with('success', 'Verger added successfully.');

}


public function showAddStatut(Request $request)
{
    // Check if the user is logged in
    if (!session('user_login')) {
        return redirect('/login');
    }

    // Get the login parameter from the URL
    $login = $request->login;

    // Get the user information based on session login
    $user = DB::table('user')->where('login', session('user_login'))->first();

    // Get all vergers
    $vergers = Verger::all();

    return view('add_statut', compact('vergers', 'login'));
}


public function addStatut(Request $request)
{
        $request->validate([
        'refver' => 'required',
        'numver' => 'required',
        'dtver' => 'required|date',
        'codvar' => 'required',
        'nomvar' => 'required',
        'pdrec' => 'nullable|numeric',
        'pdexp' => 'nullable|numeric',
        'pdeca' => 'nullable|numeric',
        'pdfre' => 'nullable|numeric',
        'login' => 'required|exists:user,login', // Ensure the login exists
    ]);

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
        'login' => $request->login,
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
