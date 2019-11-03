<?php

namespace App\Http\Controllers\Billing;

use App\Http\Controllers\Controller;
use LukePOLO\LaraCart\Facades\LaraCart;

class OrderController extends Controller
{
    public function checkout()
    {
        $items = LaraCart::get()->cart->items;
        $total = 0;

        foreach ($items as $item)
        {
            $total = $total + ($item->qty * $item->price);
        }

        return view('customer.cart.checkout', compact('items', 'total'));
    }

    /**
     * @throws \Stripe\Exception\ApiErrorException
     */
    public function charge()
    {
        // Set your secret key: remember to change this to your live secret key in production
        // See your keys here: https://dashboard.stripe.com/account/apikeys
        \Stripe\Stripe::setApiKey(getenv('STRIPE_SECRET'));

        $session = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'name' => 'T-shirt',
                'description' => 'Comfortable cotton t-shirt',
                'images' => ['https://example.com/t-shirt.png'],
                'amount' => 500,
                'currency' => 'cad',
                'quantity' => 1,
            ]],
            'success_url' => 'http://cosplayschool.test/order/success?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => 'http://cosplayschool.test/cart/payment-cancel',
        ]);

        dd($session);
    }

    public function orderSuccess(string $sessionId)
    {
        dd($sessionId);
    }
}
