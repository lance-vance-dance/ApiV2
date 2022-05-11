<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckMinUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, string $min_role_level)
    {
        $user = auth('api')->user();
        if ($user->level() < $min_role_level) {
            return response('', 401);
        }

        return $next($request);
    }
}
