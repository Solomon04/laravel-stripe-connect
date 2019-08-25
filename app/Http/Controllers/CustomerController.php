<?php

namespace App\Http\Controllers;

use App\Services\Stripe\Customer;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe\Token;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function form()
    {
        return view('stripe.form');
    }

    public function save(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'cc_number' => 'required',
            'month' => 'required',
            'year' => 'required',
            'cvv' => 'required'
        ]);
        $card = [
            'card' => [
            'number' => $request->cc_number,
            'exp_month' => $request->month,
            'exp_year' => $request->year,
            'cvc' => $request->cvv
            ]
        ];
        /** @var User $user */
        $user = Auth::user();
        Customer::save($user, $card);
        return redirect()->route('products')->with('success', 'Card has been saved.');
    }
}
