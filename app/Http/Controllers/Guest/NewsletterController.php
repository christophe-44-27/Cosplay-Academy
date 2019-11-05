<?php

namespace App\Http\Controllers\Guest;

use App\Models\NewsletterSubscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use App\Http\Controllers\Controller;

class NewsletterController extends Controller {

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function subscribe(Request $request) {

        $alreadySubscribed = NewsletterSubscription::where('email', '=', $request->get('email'))->count();

        if($alreadySubscribed == 0)
        {
            $datas = ['email' => $request->get('email')];

            NewsletterSubscription::create($datas);

            notify()->success(Lang::get("Merci pour votre inscription à notre newsletter ! Vous recevrez prochainement les nouveaux tutoriels et cours mis en ligne sur la Cosplay Academy !"));

        } else {
            notify()->warning(Lang::get("Vous êtes déjà inscrit(e) à notre newsletter. :)"));
        }
        return redirect(route('homepage'));
    }
}
