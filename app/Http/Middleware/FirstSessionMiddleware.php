<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FirstSessionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!$request->session()->has('first_visit')) {
            // Set a session variable to indicate that the first visit has occurred
            $request->session()->put('first_visit', true);

            // Execute your custom code for the first visit here
            \Log::info('Première session de l\'utilisateur.');
        }
        return $next($request);
    }
}
