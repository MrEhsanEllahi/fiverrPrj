<?php

namespace App\Http\Middleware;
use Auth;   
use Closure;

class AuthUser
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
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        if (auth()->user()->role == 2) {
            return $next($request);
        }

        else {
            return redirect()->route('login');
         }

    }
}
