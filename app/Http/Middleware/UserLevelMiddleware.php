<?php

namespace App\Http\Middleware;

use Closure;
use App\UserLevel;
use App\UserAccess;
use auth;

class UserLevelMiddleware
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
       if(!Auth::guest())
        {
            $route = UserAccess::join('users','users.id','tblUserAccess.users_id')
            ->join('tbluserlevel','tbluserLevel.id','tblUserAccess.userlevel_id')
            ->where('users.id',Auth::user()->id)
            ->where('strUserLRoute','=',$request->path())
            ->select('tblUserAccess.is_active')
            ->first();
            if($route != null)
            {
                if($route->is_active) 
                    return $next($request);
            }
            return redirect('noPermission');
        }
        dd('login ka muna');
}
}
