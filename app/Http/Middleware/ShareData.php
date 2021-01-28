<?php

namespace App\Http\Middleware;

use App\Models\ProductCart;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class ShareData
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::check()){
            $cart_count=ProductCart::where('user_id',Auth::user()->id)->count();
        }
        else{
            $cart_count="login";
        }
        View::share('cart_count',$cart_count);
        return $next($request);
    }
}
