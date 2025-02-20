<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\Auth;

class AuthMiddleware
{
    public function handle(HttpRequest $request, Closure $next, ...$guards): JsonResponse
    {
        $guards = $guards ?: ['api'];

        if (!Auth::guard($guards[0])->check()) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $next($request);
    }
}