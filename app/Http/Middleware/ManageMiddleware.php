<?php

namespace App\Http\Middleware;

use Closure;

class ManageMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if ($guard==null||$guard!='manage'){
            return redirect()->guest('manage/login');
        }
        
//        if (Auth::guard($guard)->guest()) {
//            if ($request->ajax() || $request->wantsJson()) {
//                return response('Unauthorized.', 401);
//            } else {
//                return redirect()->guest('manage/login');
//            }
//        }
        return $next($request);
    }

    // 获取当前路由需要的权限
    private function getPermission($request)
    {
        $actions = $request->route()->getAction();
        if (empty($actions['permissions'])) {
            echo "路由没有设置权限";
            exit;
        }
        return $actions['permissions'];
    }
}
