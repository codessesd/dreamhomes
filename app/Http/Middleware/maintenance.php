<?php

namespace App\Http\Middleware;

use Closure;

class maintenance
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
      if(($request->ip() != '41.113.242.90')&&($request->ip() != '127.0.0.1'))
        if ($request->path() != 'maintenance')
          return redirect('/maintenance');

        return $next($request);
    }
}
