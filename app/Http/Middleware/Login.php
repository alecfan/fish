<?php

namespace App\Http\Middleware;

use Closure;

class Login
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
        // 判断用户是否登录
        // dd($request);
        if ($request->session()->has('adminuser')) {
            return $next($request);
        } else {
            return redirect('admin/login');
        }
    }
}
