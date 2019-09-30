<?php

namespace App\Http\Controllers\Billing;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Lang;
use LukePOLO\LaraCart\Facades\LaraCart;

class CartController extends Controller
{

    public function index()
    {
        $items = LaraCart::getItems();

        return view('customer.cart.cart', compact('items'));
    }

    /**
     * @param $itemHash
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function removeItem($itemHash)
    {
        if($itemHash)
        {
            LaraCart::removeItem($itemHash);
            return redirect('cart')->with('success', Lang::get("Ce produit a bien été supprimé de votre panier."));
        }
        else
        {
            return redirect('cart')->with('error', Lang::get("Ce produit n'existe pas dans votre panier."));
        }
    }

}
