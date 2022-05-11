<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRelationShip
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $user = auth('api')->user();
        if ($user->hasRole('student') && $user->id != $request->user_id) {
            return response('', 401);
        }

        $children = $user->children->pluck('child_id');
        if ($user->hasRole('parent') && !in_array($request->user_id, $children->toArray())) {
            return response('', 401);
        }

        return $next($request);
    }
}
