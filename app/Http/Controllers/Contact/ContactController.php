<?php

namespace App\Http\Controllers\Contact;

use App\Http\Requests\ContactRequest;
use App\Mail\ConfirmContactEmail;
use App\Mail\ContactEmail;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;

class ContactController extends Controller {

	/**
	 * Send contact form to admin
	 */
	public function contact(ContactRequest $request) {
		$validated = $request->validated();

		Mail::to('contact@cosplayschool.ca')
			->send(new ContactEmail($validated));

		Mail::to($validated['email'])->send(new ConfirmContactEmail());

		$request->session()->flash('success', 'Votre message a bien été envoyé !');
		return redirect(route('homepage'));
	}
}
