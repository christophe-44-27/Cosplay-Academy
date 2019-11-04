<?php

namespace App\Services\Billing;

use App\Models\User;

class StripeService
{

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
