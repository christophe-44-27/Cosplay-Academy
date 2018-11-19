<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Requests\AddressRequest;
use App\Models\Address;
use App\Models\Country;
use App\Models\Province;
use App\Http\Controllers\Controller;
use App\Models\TutorialCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller {

	public function __construct() {
		$this->middleware('auth');
	}

	public function index() {

		$user = Auth::user();
		$skills = TutorialCategory::all();

		return view('dashboard/my_account', compact('user', 'skills'));
	}

	public function create(AddressRequest $request) {
		$validated = $request->validated();

		$dataArray = [
			'street_name' => $validated['street_name'],
			'zip_code' => $validated['zip_code'],
			'city' => $validated['city'],
			'province_id' => $validated['province_id'],
			'country_id' => $validated['country_id'],
			'user_address_id' => Auth::id()
		];

		if (isset($validated['appartment'])) {
			$dataArray['appartment'] = $validated['appartment'];
		}

		$address = Address::create($dataArray);

		$request->session()->flash('success', 'Votre adresse a bien été mise à jour, merci !');
		return redirect(route('my_address_edit', $address->id));
	}

	/**
	 * @param int $id
	 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
	 */
	public function delete(Request $request, int $id) {
		$address = Address::findOrFail($id);
		$address->delete();

		$request->session()->flash('success', 'Votre adresse a bien été supprimée !');
		return redirect(route('my_address'));
	}
}
