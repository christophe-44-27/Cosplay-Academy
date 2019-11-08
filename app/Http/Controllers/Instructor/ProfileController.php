<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Requests\ProfessorProfileRequest;
use App\Models\Country;
use App\Http\Controllers\Controller;
use App\Models\ProfessorProfile;
use App\Models\User;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;

class ProfileController extends Controller
{
    /**
     * TutorialController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $controller = 'profile';

        $professor = ProfessorProfile::where('user_id', '=', Auth::user()->id)->get()->first();
        $countries = Country::orderBy('name', 'DESC')->pluck('name', 'id');

        if(!isset($professor)) {
            $professor = new ProfessorProfile();
        }

        return view('instructor.profile.edit', compact('controller', 'professor', 'countries'));
    }

    /**
     * @param ProfessorProfileRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ProfessorProfileRequest $request)
    {
        $validated = $request->validated();

        $user = Auth::user();

        $arrayToCreate = [
            'firstname' => $validated['firstname'],
            'lastname' => $validated['lastname'],
            'adress' => $validated['adress'],
            'zip_code' => $validated['zip_code'],
            'city' => $validated['city'],
            'state' => $validated['state'],
            'country_id' => $validated['country_id'],
            'user_id' => $user->id,
        ];

        $professor = ProfessorProfile::create($arrayToCreate);

        return redirect()->away("https://connect.stripe.com/express/oauth/authorize?redirect_uri=https://connect.stripe.com/connect/default/oauth/test&client_id=ca_Fs2rLCdMXCNqOB31eSlPZtqLD6lAM005&stripe_user[business_type]=individual&stripe_user[email]=" . $user->email . "&stripe_user[country]=" . $professor->country->iso_code . "&stripe_user[first_name]=" . $professor->firstname . "&stripe_user[last_name]=" . $professor->lastname . "&redirect_uri=http://cosplayschool.test/dashboard/stripe/profile/registration/success");
    }

    /**
     * @param ProfessorProfileRequest $request
     * @param ProfessorProfile $professor
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(ProfessorProfileRequest $request, ProfessorProfile $professor)
    {
        $validated = $request->validated();
        $professor->update($validated);

        return redirect(route('profile_professor'))->with('success', Lang::get("Votre profil a bien été mis à jour."));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function registrationStripeSuccess(Request $request)
    {
        $client = new Client();
        $request = $client->post('https://connect.stripe.com/oauth/token', [
            'form_params' => [
                'client_secret' => getenv('STRIPE_SECRET'),
                'code' => $request->get('code'),
                'grant_type' => 'authorization_code'
            ]
        ]);

        $datas = json_decode($request->getBody()->getContents(), true);

        $user = User::where('id', '=', Auth::user()->id)->get()->first();
        $user->update(['stripe_connect_account_id' => $datas['stripe_user_id']]);

        return redirect(route('profile_professor'))->with('success', Lang::get("Votre compte de paiement a bien été configuré !"));
    }

    /**
     * @param ProfessorProfile $professor
     * @return \Illuminate\Http\RedirectResponse
     */
    public function createStripePaymentAccount(ProfessorProfile $professor)
    {
        $user = Auth::user();
        return redirect()->away("https://connect.stripe.com/express/oauth/authorize?redirect_uri=https://connect.stripe.com/connect/default/oauth/test&client_id=ca_Fs2rLCdMXCNqOB31eSlPZtqLD6lAM005&stripe_user[business_type]=individual&stripe_user[email]=" . $user->email . "&stripe_user[country]=" . $professor->country->iso_code . "&stripe_user[first_name]=" . $professor->firstname . "&stripe_user[last_name]=" . $professor->lastname . "&redirect_uri=http://cosplayschool.test/instructors/stripe/profile/registration/success");
    }
}
