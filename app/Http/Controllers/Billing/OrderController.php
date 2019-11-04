<?php

namespace App\Http\Controllers\Billing;

use App\Http\Controllers\Controller;
use App\Services\Billing\StripeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;
use LukePOLO\LaraCart\Facades\LaraCart;
use Cartalyst\Stripe\Laravel\Facades\Stripe;

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


    public function charge(Request $request, StripeService $stripeService)
    {
        $user = Auth::user();
        $stripe = Stripe::make(config('services.stripe.secret'));

        //First step create or retrieve a customer
        if(empty($user->stripe_customer_id)) {
            $customer = $stripe->customers()->create([
                'email' => $request->get('email'),
                'name' => $request->get('name_on_card'),
                'address' => [
                    'line1' => $request->get('address')
                ],
            ]);
            $card = $stripe->cards()->create($customer['id'], $request->get('stripeToken'));

            $stripeService->addStripeCustomerId($user, $customer['id']);
            $stripeService->addSomeBillingInformations($user, $card);
        } elseif($stripe->customers()->find($user->stripe_customer_id)['deleted'] == true) {
            $customer = $stripe->customers()->create([
                'email' => $request->get('email'),
                'name' => $request->get('name_on_card'),
                'address' => [
                    'line1' => $request->get('address')
                ],
            ]);
            $card = $stripe->cards()->create($customer['id'], $request->get('stripeToken'));

            $stripeService->addStripeCustomerId($user, $customer['id']);
            $stripeService->addSomeBillingInformations($user, $card);
        }else{
            $customer = $stripe->customers()->find($user->stripe_customer_id);
        }

        $charge = Stripe::charges()->create([
            'amount'   => 10.99,
            'customer' => $customer['id'],
//            'source' => $request->stripeToken,
            'description' => "Achat d'un cours",
            'receipt_email' => $request->get('email'),
            'currency' => getenv('CURRENCY'),
        ]);

        //La charge ayant été faite, on détruit le panier.
//        LaraCart::destroyCart();

        notify()->success(Lang::get("Votre paiement a bien été effectué !"));

        return redirect(route('homepage'));
    }
}
