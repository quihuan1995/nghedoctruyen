<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;


class CheckLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::check()){
            // if($request->user()->hasRole('genre')){
            //     return redirect()->route('admin.genre');
            // }elseif($request->user()->hasRole('book')){
            //     return redirect()->route('admin.book');
            // }elseif($request->user()->hasRole('chap')){
            //     return redirect()->route('admin.chap');
            // }elseif($request->user()->hasRole('user')){
            //     return redirect()->route('admin.user');
            // }elseif($request->user()->hasRole('role')){
            //     return redirect()->route('admin.role');
            // }
            return $next($request);
        }else{
            return redirect('adminlogin');
        }
    }
}
