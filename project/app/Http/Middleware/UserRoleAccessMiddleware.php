<?php

namespace App\Http\Middleware;

use App\Enums\UserRole;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserRoleAccessMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        $role = UserRole::tryFrom($role);
        $user = $request->user();

        if (!$role) {
            abort(400, 'Invalid role.');
        } else if (!$user->hasRole($role)) {
            abort(403, 'Access denied.');
        }

        return $next($request);
    }
}
