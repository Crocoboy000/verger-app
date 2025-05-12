<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\DB;

class IsAdmin
{
    public function handle($request, Closure $next)
    {
        $login = session('user_login'); // Already authenticated

        $user = DB::table('user')->where('login', $login)->first();

        if (!$user || !$user->role) {
            // 🚫 Block access if not admin
            return redirect('/dashboard')->with('error', 'Admins only.');
        }

        return $next($request);
    }
}

