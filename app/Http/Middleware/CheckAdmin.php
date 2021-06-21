<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckAdmin
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
        //Check user if admin go to admin panel if not retuen him
        $isadmin = Auth::user()->admin;
        if($isadmin == 1 || $isadmin == 2)
        {
            return $next($request);
        }
        else
        {
            return redirect()->route('home');
        }
    }
}
