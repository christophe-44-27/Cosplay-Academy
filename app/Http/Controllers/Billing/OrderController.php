<?php

namespace App\Http\Controllers\Billing;

use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function checkout()
    {
        $items = [];

        return view('customer.cart.checkout', compact('items'));
    }

    public function charge()
    {

    }
}
