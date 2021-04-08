<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function role($request, Closure $next)
    {
        if($request->user()->account_type === 1){
            return $next($request);
        }
        return redirect('/');
    }
}