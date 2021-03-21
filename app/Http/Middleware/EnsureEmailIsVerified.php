<?php

namespace App\Http\Middleware;

use Closure;

class EnsureEmailIsVerified
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
        // 如果用户已经登录
        // 并且还未认证 email
        // 访问的不是 email 验证相关的 url 或者退出的 url

        if($request->user() &&
            ! $request->user()->hasVerifiedEmail() &&
            ! $request->is('email/*', 'logout')
        ) {
            return $request->expectsJson() ? abort(403, 'Your email address is not verified') : redirect()->route('verification.notice');
        }
        return $next($request);
    }
}
