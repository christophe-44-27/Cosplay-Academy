<?php

namespace App\Http\Controllers\Billing;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Services\Billing\PaymentService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StripeWebhooksController extends Controller
{
    public function createInvoiceAfterPayment(Request $request)
    {
        $user = Auth::user();

        $response = json_decode($request->getContent(), true);

        $datas = [
            'invoice_id' => $response['data']['object']['invoice'],
            'amount_due' => $response['data']['object']['amount_due'],
            'receipt_url' => $response['data']['object']['receipt_url'],
            'paid' => $response['data']['object']['paid'],
            'user_id' => $user->id
        ];

        Invoice::create($datas);
    }
}
