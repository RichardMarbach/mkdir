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
     * @param   $role
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        if (!$request->user()) {
            return response('Unauthorized', 401);
        }

        if (!$request->user()->hasRole($role)) {
            return response('Unauthorized', 401);
        }

        return $next($request);
    }
}
