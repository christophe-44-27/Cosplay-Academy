<?php

namespace App\Http\Controllers\Contact;

use App\Http\Requests\ContactRequest;
use App\Mail\ContactEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{

    public function index()
    {
        return view('pages.contact');
    }

    /**
     * Send contact form to admin
     */
    public function contact(ContactRequest $request)
    {
        $validated = $request->validated();

        Mail::to(getenv('CONTACT_EMAIL'))
            ->send(new ContactEmail($validated));

        notify()->success(Lang::get("Votre message a bien été envoyé, nous vous contacterons sous peu, merci de votre confiance !"));

        return redirect(route('homepage'));
    }
}
