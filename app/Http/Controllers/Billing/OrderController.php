<?php

namespace App\Http\Controllers\Billing;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Services\Billing\PaymentService;
use App\Services\Billing\StripeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;
use LukePOLO\LaraCart\Facades\LaraCart;

class OrderController extends Controller
{
    public function checkout()
    {
        $items = LaraCart::get()->cart->items;
        $total = 0;

        foreach ($items as $item)
        {
            $total = $total + $item->qty * (($item->price / 100) + ((($item->price / 100) * getenv('FEE_STRIPE') / 100) + getenv('FEE_STRIPE_CENT')));
        }

        return view('customer.cart.checkout', compact('items', 'total'));
    }


    public function charge(Request $request, StripeService $stripeService, PaymentService $paymentService)
    {
        $user = Auth::user();
//        $stripe = Stripe::make(config('services.stripe.secret'));
        $customer = $stripeService->createOrRetrieveCustomer($request, $user, $user->stripe_customer_id);

        $items = LaraCart::get()->cart->items;

        $total = 0;
        $itemIds = [];

        foreach ($items as $item)
        {
            array_push($itemIds, $item->id);
            $total = $total + ($item->qty * ($item->price / 100));
        }


        $stripeService->createInvoiceItem($items, $customer['id']);
        $invoice = $stripeService->createInvoice($customer['id']);
        $payedInvoice = $stripeService->payInvoice($invoice['id']);

        //On ajoute des lignes dans earning pour les auteurs. 1 ligne = 1 cours de vendu.
        $paymentService->createEarning($itemIds, $payedInvoice);

        $datas = [
            'invoice_id' => $payedInvoice['id'],
            'amount' => $payedInvoice['amount_due'] / 100,
            'receipt_url' => $payedInvoice['invoice_pdf'],
            'paid' => $payedInvoice['paid'],
            'user_id' => $user->id
        ];

        Invoice::create($datas);

        //La charge ayant été faite, on détruit le panier.
//        LaraCart::destroyCart();

        notify()->success(Lang::get("Votre paiement a bien été effectué !"));

        return redirect(route('homepage'));
    }
}
