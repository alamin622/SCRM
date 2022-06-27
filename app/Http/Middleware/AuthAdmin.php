<?php

namespace App\Http\Middleware;

use Closure;

class AuthAdmin
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
        if (session('type') === 'ADM') {
            return $next($request);
        } else {
            session()->flush();
            return redirect()->route('login');
        }
        return $next($request);
    }
}
