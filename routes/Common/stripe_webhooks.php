<?php

use Illuminate\Support\Facades\Route;

Route::prefix('stripe')->group(function(){
    Route::get('/payments/invoices/succeed', 'Billing\StripeWebhooksController@createInvoiceAfterPayment');
});
