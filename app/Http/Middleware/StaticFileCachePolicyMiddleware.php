<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class StaticFileCachePolicyMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
    {
        // Set headers for cache control
        $response = $next($request);
        $response->header('Cache-Control', 'public, max-age=31536000'); // Cache for 1 year

        return $response;
    }
}
