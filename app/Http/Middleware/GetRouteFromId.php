<?php

namespace App\Http\Middleware;

use Closure;
use App\Http\Controllers\RouteController;

class GetRouteFromId
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $request->routeFromId = RouteController::get($request->id);

        if (!$request->routeFromId) {
            abort(404);
        }
        return $next($request);
    }
}
