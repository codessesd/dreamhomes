<?php

namespace App\Http\Middleware;

use Closure;

class member
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
      if (auth()->user()->admin_level == 1)
        return $next($request);
      else
        return redirect('/members');//redirect to a landing page in the dashboard
    }
}
