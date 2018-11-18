<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Requests\AddressRequest;
use App\Models\Address;
use App\Models\Country;
use App\Models\Province;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller {

	public function __construct() {
		$this->middleware('auth');
	}

	public function newAddress() {
		$address = Address::where('user_address_id', '=', Auth::id())->first();

		if ($address) {
			return redirect(route('my_address_edit', $address->id));
		}

		$countries = Country::pluck('name', 'id');
		$provinces = Province::pluck('name', 'id');

		return view('dashboard/address', compact('countries', 'provinces'));
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
	 * @param string $slug
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function edit(string $id) {
		$address = Address::findOrFail($id);
		$countries = Country::pluck('name', 'id');
		$provinces = Province::pluck('name', 'id');

		return view('dashboard/address_edit', compact('address', 'countries', 'provinces'));
	}

	public function update(AddressRequest $request, int $id) {
		$validated = $request->validated();

		$dataArray = [
			'street_name' => $validated['street_name'],
			'zip_code' => $validated['zip_code'],
			'city' => $validated['city'],
			'province_id' => $validated['province_id'],
			'country_id' => $validated['country_id'],
			'user_address_id' => Auth::id()
		];

		if (isset($validated['apartment'])) {
			$dataArray['apartment'] = $validated['apartment'];
		}


		Address::where('id', '=', $id)
			->update($dataArray);

		$request->session()->flash('success', 'Vote adresse a bien été mise à jour, merci !');
		return redirect(route('my_address_edit', $id));
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
