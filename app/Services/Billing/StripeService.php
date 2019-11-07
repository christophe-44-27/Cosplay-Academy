<?php

namespace App\Services\Billing;

use App\Models\User;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Illuminate\Http\Request;

class StripeService
{

    private $_stripe_api;

    public function __construct()
    {
        $this->_stripe_api = Stripe::make(config('services.stripe.secret'));
    }

    /**
     * @param string $invoiceId
     * @return mixed
     */
    public function payInvoice(string $invoiceId)
    {
        return $this->_stripe_api->invoices()->pay($invoiceId);
    }

    /**
     * @param Request $request
     * @param User $user
     * @param string|null $customerId
     * @return mixed
     */
    public function createOrRetrieveCustomer(Request $request, User $user, string $customerId = null)
    {
        if(is_null($customerId))
        {
            $customer = $this->_stripe_api->customers()->create([
                'email' => $request->get('email'),
                'name' => $request->get('name_on_card'),
                'address' => [
                    'line1' => $request->get('address'),
                    'country' => $request->get('country'),
                    'state' => $request->get('province'),
                    'postal_code' => $request->get('postalcode'),
                ],
            ]);

            $card = $this->_stripe_api->cards()->create($customer['id'], $request->get('stripeToken'));
            $this->addStripeCustomerId($user, $customer['id']);
            $this->addSomeBillingInformations($user, $card);
        } else {
            $customer = $this->_stripe_api->customers()->find($customerId);
        }

        return $customer;
    }

    /**
     * @param string $customerId
     * @return mixed
     */
    public function createInvoice(string $customerId)
    {
        $invoice = $this->_stripe_api->invoices()->create($customerId, [
            'tax_percent' => getenv('TAX_PERCENT_CA_RATE'),
        ]);

        return $invoice;
    }

    /**
     * @param array $items
     * @param string $customerId
     * @return array
     */
    public function createInvoiceItem(array $items, string $customerId)
    {
        $invoiceItems = [];

        foreach ($items as $item)
        {
            $invoiceItem = $this->_stripe_api->invoiceItems()->create($customerId, [
                'amount'   => ($item->price
                    + ($item->price * getenv('FEE_STRIPE') / 100)
                    + getenv('FEE_STRIPE_CENT')) * $item->qty,
                'description' => $item->name,
                'currency' => getenv('CURRENCY'),
            ]);
            array_push($invoiceItems, $invoiceItem);
        }

        return $invoiceItems;
    }

    /**
     * @param User $user
     * @param string $stripeCustomerId
     */
    public function addStripeCustomerId(User $user, string $stripeCustomerId)
    {
        $data = [
            'stripe_customer_id' => $stripeCustomerId,
        ];

        $user->update($data);
    }

    /**
     * @param User $user
     * @param array $card
     */
    public function addSomeBillingInformations(User $user, array $card)
    {
        $datas = [
            'brand' => $card['brand'],
            'last4' => $card['last4'],
            'expiration' => $card['exp_month'] . '/' . $card['exp_year'],
        ];

        $user->update($datas);
    }
}
