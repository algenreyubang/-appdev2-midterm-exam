<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PRoductAccessMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
    $validToken = env('API_TOKEN');
        
     if ($request->input('token') !== $validToken) {
            return response()->json(['message' => 'Invalid token 401'], Response::HTTP_UNAUTHORIZED, );
        }
    if ($request->input('token') !== $validToken) {
            return response()->json(['error' => 'Token is invalid.'], 401);
        }
        return $next($request);
    }


}
