<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    public function handle($request, Closure $next, ...$roles)
    {
        if (! Auth::check()) {
            return redirect('/login');
        }
 
        if (! $request->user()->hasAnyRole($roles)) {
            return abort(404);
        }
 
        return $next($request);
    }
}
