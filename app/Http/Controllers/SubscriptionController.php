<?php

namespace App\Http\Controllers;

use App\Models\Tutorial;
use App\User;
use Illuminate\Http\Request;

class SubscriptionController extends Controller {

	public function index() {
		return view('subscriptions.index');
	}
}
