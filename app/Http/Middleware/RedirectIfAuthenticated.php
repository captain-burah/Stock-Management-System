<?php

namespace App\Http\Middleware;

use Closure;
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
    public function handle($request, Closure $next, $guard = null)
    {
        if ($guard == "manager" && Auth::guard($guard)->check()) {
            return redirect('/manager_panel');
        }
        if ($guard == "stockKeeper" && Auth::guard($guard)->check()) {
            return redirect('/stockKeeper_panel');
        }
        if ($guard == "cashier" && Auth::guard($guard)->check()) {
            return redirect('/cashier_panel');
        }
        if (Auth::guard($guard)->check()) {
            return redirect('/home');
        }

        return $next($request);
    }
}
