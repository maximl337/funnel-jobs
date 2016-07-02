<?php

namespace App\Http\Middleware;

use Closure;
use Log;

class IsJobOwnerMiddleware
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

        if($request->user()->jobs()->where("id", $request->route('jobs'))->exists()) {
            return $next($request);    
        }

        return response('Unauthorized.', 401);
    }
}
