<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class Guest
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
        if (session()->has('user')) {
            if ($request->ajax()) {
                return response('Already login', 401);
            } else {
                return back();
            }
        }
        return $next($request);
    }
}
