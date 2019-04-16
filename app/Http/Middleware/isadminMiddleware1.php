<?php

namespace App\Http\Middleware;

use Session;
use Closure;

class isadminMiddleware1
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
        
        if (!Session::has('plainficode') ) {
            return redirect('inicio');
        }
        return $next($request);
    }
}
