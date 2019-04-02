<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class TeacherMiddleware
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
        //dd( $request->user());
       // dd(Auth::guard('web')->user());
        //if (Auth::check() && Auth::user()->role == 'teacher') {
            return $next($request);
       // }

    }
}
