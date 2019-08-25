<?php

namespace App\Http\Middleware;

use Closure;

class HasPaymentMethod
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
        if(is_null(auth()->user()->stripe_customer_id)){
            return redirect()->route('save.customer')->with('error', 'You need a payment method!');
        }
        return $next($request);
    }
}
