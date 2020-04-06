<?php

namespace App\Http\Middleware;

use App\Member;
use Closure;

class applicationStatus
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
      $member = Member::find(auth()->user()->id);
      if($member->misc->status == 'review')
      {
        return redirect('/profile/')->withErrors(['warning','You have already submitted an application.','You application is being reviewed.']);
      }
      return $next($request);
    }
}
