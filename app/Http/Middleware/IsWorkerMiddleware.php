<?php

namespace App\Http\Middleware;

use Closure;

class IsWorkerMiddleware
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
        $user_roles = $request->user()->roles()->get();

        foreach($user_roles as $role) {
            if($role->name == "Worker") {
                return $next($request);        
            }
        }

        return response('Unauthorized.', 401);
    }
}
