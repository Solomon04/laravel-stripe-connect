<?php
/**
 * Created by PhpStorm.
 * User: Dell
 * Date: 8/24/2019
 * Time: 10:11 PM
 */

namespace App\Services\Stripe;

use GuzzleHttp\Client;

class Seller
{
    /**
     * Create express account via Stripe OAuth
     *
     * @param $code
     * @return object
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function create($code)
    {
        $client = new Client(['base_uri' => 'https://connect.stripe.com/oauth/']);
        $request = $client->request("POST", "token", [
            'form_params' => [
                'client_secret' => getenv('STRIPE_SECRET'),
                'code' => $code,
                'grant_type' => 'authorization_code'
            ]
        ]);
        return json_decode($request->getBody()->getContents());
    }
}