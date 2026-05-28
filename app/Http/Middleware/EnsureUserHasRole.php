<?php

namespace App\Http\Middleware;

use App\Enums\UserRole;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserHasRole
{
    public function handle(Request $request, Closure $next, string ...$roles): Response
    {
        $user = $request->user();

        if (! $user) {
            abort(403);
        }

        $allowedRoles = collect($roles)
            ->map(static fn (string $role): string => UserRole::from($role)->value)
            ->all();

        if (! in_array($user->role->value, $allowedRoles, true)) {
            abort(403);
        }

        return $next($request);
    }
}
