<?php

namespace App\Http\Middleware;

use Closure;

class admin
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
    abort_unless(auth()->user()->admin_level >= 2, 403);
      return $next($request);
  }
}

