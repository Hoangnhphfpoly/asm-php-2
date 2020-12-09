<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
use Illuminate\Support\Facades\Auth;

class CheckEdit
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
        $rqUser = User::findOrFail(Auth::id());
        if ($rqUser->role_id > 2){
            return redirect()->route('err');
        }
        return $next($request);
    }
}
