<?php

namespace App\Http\Middleware;

use Closure;

class IsBidderMiddleware
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


        $bidExists = $request->user()->jobBids()->where("job_id", $request->route('id'))->exists();

        if($bidExists) {
            return $next($request);    
        }
        
        return response('Unauthorized.', 401);
    }
}
