<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;

use Closure;

class IsAdmin
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
        if (Auth::user()->id_loainhanvien == "LNV00000000000000") {
            dd("nó là admin đó");
            return $next($request);
        } else {
            dd("không phải admin đâu");
        }
    }
}
