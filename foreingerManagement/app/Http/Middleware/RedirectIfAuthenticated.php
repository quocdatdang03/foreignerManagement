<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            $user = Auth::user();

            // Kiểm tra vai trò và chuyển hướng
            if ($user->idVaiTro === 1) { // User
                return redirect('/userhome');
            } elseif ($user->idVaiTro === 2) { // Admin
                return redirect('/adminhome');
            }
        }

        return $next($request);
    }
}

