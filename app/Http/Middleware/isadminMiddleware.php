<?php

namespace App\Http\Middleware;

use Session;
use Closure;

class isadminMiddleware
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
        $bag = Session::all();
        dd($bag);
           dd( $this->getTimeOut())  ;
        if (Session::has('plainficode') ) {
            return redirect('/');
        }
        return $next($request);
    }
   
}
