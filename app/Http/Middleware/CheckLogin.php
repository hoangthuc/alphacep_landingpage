<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckLogin
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            // Người dùng đã đăng nhập
            return $next($request);
        }

        // Người dùng chưa đăng nhập, bạn có thể chuyển hướng hoặc thực hiện hành động khác
        return redirect('/login');
    }
}