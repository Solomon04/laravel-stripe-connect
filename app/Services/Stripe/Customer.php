<?php
/**
 * Created by PhpStorm.
 * User: Dell
 * Date: 8/24/2019
 * Time: 7:33 PM
 */

namespace App\Services\Stripe;


use App\User;
use Stripe\Stripe;
use Stripe\Token;

class Customer
{
    public static function save(User $user, array $card)
    {
        Stripe::setApiKey(config('services.stripe.secret'));

        $token = Token::create($card);
        $customer = \Stripe\Customer::create([
            'source' => $token->id,
            'email' => $user->email
        ]);
        $user->update(['stripe_customer_id' => $customer->id]);
    }
}