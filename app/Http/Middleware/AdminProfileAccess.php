<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminProfileAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $adminId = $request->route('admin'); // Get the admin ID from the route
        if (Auth::guard('admin')->check() && Auth::guard('admin')->user()->id == $adminId) {
            return $next($request);
        }
        abort(403, 'Unauthorized action.');
    }
}