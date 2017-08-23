<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class hasPermissions
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect('admin/login');
        }
        // Get the required roles from the route
        $permissions = $this->getRequiredPermissionsForRoute($request->route());
        // Check if a role is required for the route, and
        // if so, ensure that the user has that role.
        if ($request->user()-> hasPermissionTo($permissions) || !$permissions) {
            return $next($request);
        }

        if ($request->ajax() || $request->wantsJson()) {
            return response(trans('backpack::base.unauthorized'), 401);
        } else {
            return redirect('/admin');
        }
    }

    private function getRequiredPermissionsForRoute($route)
    {
        $actions = $route->getAction();

        return isset($actions['permissions']) ? $actions['permissions'] : null;
    }
}
