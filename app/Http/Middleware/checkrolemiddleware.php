<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class checkrolemiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next,...$roles)
    {

        if(in_array($request->user()->role,$roles)){
        return $next($request);
        }else{
            return redirect('login');
        }

        return abort(403,'Unauthorized');
    }
}
