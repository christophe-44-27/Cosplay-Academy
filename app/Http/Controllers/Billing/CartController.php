<?php

namespace App\Http\Controllers\Billing;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Support\Facades\Lang;
use LukePOLO\LaraCart\Facades\LaraCart;

class CartController extends Controller
{

    public function index()
    {
        $items = LaraCart::get()->cart->items;

        $total = 0;

        foreach ($items as $item)
        {
            $total = $total + ($item->qty * $item->price);
        }

        return view('customer.cart.cart', compact('items', 'total'));
    }

    public function cartFallbackStripe()
    {
        $items = LaraCart::get()->cart->items;

        $total = 0;

        foreach ($items as $item)
        {
            $total = $total + ($item->qty * $item->price);
        }

        notify()->success(Lang::get("Votre paiement n'a pas été effectué."));

        return view('customer.cart.cart', compact('items', 'total'));
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

    /**
     * @param Course $course
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function addItem(Course $course)
    {
        LaraCart::add($course->id, $course->title, 1, $course->price);

        return redirect('cart')->with('success', Lang::get("Votre cours a bien été ajouté à votre panier."));
    }

}
