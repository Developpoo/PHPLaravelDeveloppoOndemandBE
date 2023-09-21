<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserRoleMiddleware
{
    /**
     * Handle an incoming request.
     * 
     * @param \Illuminate\Http\Request $request
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$requiredRole): Response //...servono per rendere $requireRole come un array
    {
        // return $next($request);
        // print_r($requiredRole);
        // print_r($request->userRole);

        abort_if(0 === count(array_intersect($requiredRole, $request->userRole)), 403, 'MD_0001');
        return $next($request);
    }
}
