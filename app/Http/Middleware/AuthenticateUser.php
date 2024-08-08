<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AuthenticateUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = 'web')
    {
        if (!Auth::guard($guard)->check()) {
            return redirect()->route('user.login'); // Use named route for better maintainability
        }

        return $next($request);
    }
}
