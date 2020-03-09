<?php

namespace App\Http\Middleware;

use Closure;

class checkAdminPriviledges
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
      switch (auth()->user()->admin_level)
      {
        case 1 :
          dd('1');
          break;
        case 2 :
          dd('2');
          break;
        case 3 :
          dd('3');
          break;
        case 4 :
          $allowedFields = "allow";
          //dd('heeeee');
          //return $allowedFields;
          break;
        default:
          dd('default');
          break;
      }
      return $next($request);
    }
}
