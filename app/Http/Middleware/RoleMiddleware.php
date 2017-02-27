<?php

namespace App\Http\Middleware;

use Closure;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role, $permission = null)
    {
        if (!$request->user()->hasRole($role)) {
            abort(404);
        }

        if ($permission !== null && !$request->user()->can($permission)) {
            abort(404);
        }

        return $next($request);
    }
}

/* Or do it like this for multiple roles
$allow = false;

foreach (explode("|", $roles) as $role) {
    if ($request->user()->hasRole($role)) {
        $allow = true;
    }
}

if (!$allow) {
    abort(404);
}

if ($permission !== null && !$request->user()->can($permission)) {
    abort(404);
}

return $next($request);
*/
