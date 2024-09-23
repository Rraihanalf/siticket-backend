<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $level): Response
    {
        if($request->user()->level !== $level){
            return response()->json([
                'message' => 'Akses ditolak! Anda tidak memiliki hak akses pada fitur ini'
            ]);
        }
        return $next($request);
    }
}
