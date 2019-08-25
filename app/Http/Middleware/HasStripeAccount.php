<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
use Illuminate\Support\Facades\Auth;

class HasStripeAccount
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
        /** @var User $user */
        $user = Auth::user();
        if($user->type == User::SELLER){
            if(is_null($user->stripe_connect_id)){
                return redirect()->route('create.express');
            }
        }else {
            if(is_null($user->stripe_customer_id)){
                return redirect()->route('stripe.form');
            }
        }
        return $next($request);
    }
}
