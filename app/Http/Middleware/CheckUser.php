<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckUser
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
        //Check user if logged in redirect him or her to index page
        $isuser = Auth::user()->admin;
        if($isuser == 0)
        {
            return $next($request);
        }
        else
        {
            return redirect()->route('home');
        }
    }
}
