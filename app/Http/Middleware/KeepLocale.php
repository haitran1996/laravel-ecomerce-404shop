<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Lang;

class KeepLocale
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!session()->has('lang')) {
            session()->put('lang', "vi");
        }
        Lang::setLocale(session()->get('lang'));
        return $next($request);
    }
}
