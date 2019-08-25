<?php
/**
 * Created by PhpStorm.
 * User: Dell
 * Date: 8/25/2019
 * Time: 2:19 AM
 */

namespace App\Services\Stripe;


use App\Product;
use App\User;
use Stripe\Charge;
use Stripe\Stripe;
use Stripe\Transfer;
use App\Payment;

class Transaction
{
    public static function create(User $user, Product $product)
    {
        // Initial data.
        $amount = $product->price;
        $payout = $amount * 0.90;
        Stripe::setApiKey(config('services.stripe.secret'));

        // Create a Stripe charge from the customer purchase.
        $charge = Charge::create([
            'amount' => self::toStripeFormat($amount),
            'currency' => 'usd',
            'customer' => $user->stripe_customer_id,
            'description' => $product->name
        ]);

        // Pay funds to seller, with platform fees extracted.
        Transfer::create([
            'amount' => self::toStripeFormat($payout),
            "currency" => "usd",
            "source_transaction" => $charge->id,
            'destination' => $product->seller->stripe_connect_id
        ]);

        // Save transaction to database.
        $payment = new Payment();
        $payment->customer_id = $user->id;
        $payment->product_id = $product->id;
        $payment->stripe_charge_id = $charge->id;
        $payment->paid_out = $payout;
        $payment->fees_collected = $amount - $payout;
        $payment->save();
    }

    public static function toStripeFormat(float $amount)
    {
        return $amount * 100;
    }
}