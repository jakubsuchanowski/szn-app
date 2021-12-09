<?php

namespace App\Http\Middleware;
use Closure;
class RedirectIfNotKid
{
/**
_ Handle an incoming request.
_
_ @param  \Illuminate\Http\Request  $request
_ @param  \Closure  $next
_ @return mixed
*/
    public function handle($request, Closure $next, $guard="kid")
    {
        if(!auth()->guard($guard)->check()) {
            return redirect(route('kid.login'));
        }
        return $next($request);
    }

}
