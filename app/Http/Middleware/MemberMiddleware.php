<?php

namespace App\Http\Middleware;

use Closure;

class MemberMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard=null)
    {
        if ($guard==null||$guard!='member'){
            return redirect()->guest('member/login');
        }
        //dd(Auth::user());
//        if ($guard != 'member' && Auth::guard($guard)) {
//            if ($request->ajax() || $request->wantsJson()) {
//                return response('Unauthorized.', 401);
//            } else {
//                return redirect()->guest('manage/login');
//            }
//        }
        return $next($request);
    }
}
