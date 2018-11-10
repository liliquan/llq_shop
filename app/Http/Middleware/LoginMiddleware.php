<?php

namespace App\Http\Middleware;

use Closure;

class LoginMiddleware
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
        if(!session('id'))
        {
            return redirect()->route('login_view');
        }
        // 这里写代码会在请求之前执行

        return $next($request);
        // 这里的代码会在程序执行完毕，数据返回给客户端之前执行
    }
}
