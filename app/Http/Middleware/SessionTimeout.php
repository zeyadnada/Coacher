<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;


class SessionTimeout
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $sessionStart = Session::get('session_start_time');
        if ($sessionStart && now()->diffInMinutes($sessionStart) > 12) {
            Session::forget(['paymentSuccess', 'subscriptionId', 'session_start_time']);
        }
        return $next($request);
    }
}