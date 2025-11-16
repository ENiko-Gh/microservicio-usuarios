<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, string $role)
    {
        $user = $request->user();
        if (!$user || $user->perfil !== $role) {  // o el campo que uses para rol
            return response()->json(['message'=>'Unauthorized role'], 403);
        }
        return $next($request);
    }
}