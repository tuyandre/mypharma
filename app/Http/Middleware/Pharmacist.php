<?php

namespace App\Http\Middleware;

use Closure;

class Pharmacist
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
        if (Auth()->check()) {
            if (Auth()->user()->role == "Pharmacist") {
                return $next($request);
            }
            return back();
        } else {
            return back();
        }
    }
}
