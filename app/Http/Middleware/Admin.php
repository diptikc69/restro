<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->user() && $request->user()->user_type === "1") {
            // User is an admin, allow access to the route
            return $next($request);
        }

        // User is not an admin, redirect or handle the unauthorized access
        return redirect()->route('home');
    }
}
