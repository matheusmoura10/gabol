<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Debugbar;

class DebugBarMiddleware
{
    public function handle($request, Closure $next)
    {
         if(!Auth::check() || Auth::user()->id !== 1) {
            Debugbar::disable();
        }else{
            Debugbar::enable();
        }
        return $next($request);
    }
}
