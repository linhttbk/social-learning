<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminAuthenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = 'admin')
    {
        $data = [];
        if (!Auth::guard($guard)->check()) {
            $data['isLogin'] = 1;
            $data['admin'] = Auth::guard('admin')->user();
        } else {
            $data['isLogin'] = 0;

        }
        return new JsonResponse($data, 200);
    }
}
