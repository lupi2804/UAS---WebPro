<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        // Check if the user is an admin (assuming 'role' is the column in your users table that stores the user role)
        if (auth()->check() && auth()->user()->roleid == 1) {
            return $next($request);
        }
            return redirect('/')->with('error', 'Unauthorized access');


        // Redirect or return an error response if the user is not an admin
        
    }

    
}


