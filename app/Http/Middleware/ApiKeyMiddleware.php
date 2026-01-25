<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ApiKeyMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $apiKey = $request->bearerToken();

        if (!$apiKey) {
            return response()->json(['error' => 'API key missing'], 401);
        }

        $hashedKey = hash('sha256', $apiKey);

        $user = User::where('api_key', $hashedKey)->first();

        if (!$user) {
            return response()->json(['error' => 'Invalid API key'], 403);
        }

        auth()->setUser($user);

        return $next($request);
    }
}
