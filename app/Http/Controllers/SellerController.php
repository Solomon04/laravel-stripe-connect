<?php

namespace App\Http\Controllers;

use App\Services\Stripe\Seller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Stripe\Account;
use Stripe\BitcoinTransaction;
use Stripe\Stripe;

class SellerController extends Controller
{
    /**
     * Redirect to Stripe To Create Account
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function create()
    {
        $user = Auth::user();
        if(!is_null($user->stripe_connect_id)){
            return redirect()->route('stripe.login');
        }
        $session = request()->session()->getId();
        $url = config('services.stripe.connect') . $session;
        return redirect($url);
    }

    /**
     * Redirect To Stripe Connect Account.
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function login()
    {
        $user = Auth::user();
        Stripe::setApiKey(config('services.stripe.secret'));
        $account_link = Account::createLoginLink($user->stripe_connect_id);
        return redirect($account_link->url);
    }

    /**
     * Save a Stripe Connect Account.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Illuminate\Validation\ValidationException
     */
    public function save(Request $request)
    {
        $this->validate($request, [
            'code' => 'required',
            'state' => 'required'
        ]);
        $session = DB::table('sessions')->where('id', '=', $request->state)->first();
        $data = Seller::create($request->code);
        User::find($session->user_id)->update(['stripe_connect_id' => $data->stripe_user_id]);
        return redirect()->route('products')->with('success', 'Account information has been saved.');
    }
}
