<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Stripe;

class StripeController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripe()
    {
        return view('admin.payment_list');
    }

    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        try {
            Stripe\Charge::create([
                "amount" => 100 * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "This payment is tested purpose phpcodingstuff.com"
            ]);

            Session::flash('success', 'Payment successful!');
        } catch (\Exception $exception) {
            Session::flash('error', $exception->getMessage());

        }


        return back();
    }
}
