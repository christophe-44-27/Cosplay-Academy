<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Requests\AccountRequest;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\TutorialCategory;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller {

	public function __construct() {
		$this->middleware('auth');
	}

	public function index() {
		$user = Auth::user();
		$categories = TutorialCategory::pluck('name', 'id');
		return view('dashboard/my_account', compact('user', 'categories'));
	}

	public function update(AccountRequest $request) {
		$validated = $request->validated();

		$dataArray = [
			'profile_picture' => $validated['profile_picture'],
			'cover_picture' => $validated['cover_picture'],
			'public_pseudonym' => $validated['public_pseudonym'],
			'firstname' => $validated['firstname'],
			'lastname' => $validated['lastname'],
			'email' => $validated['email']
		];

		if ($request->request->get('description')) {
			$dataArray['description'] = $request->request->get('description');
		}

		$user = User::where('id', '=', Auth::id())->first();

		$user->categories()->sync($request->request->get('categories'));

		$user->update($dataArray);

		$request->session()->flash('success', "Votre profil a bien été mis à jour !");
		return redirect(route('my_account'));
	}

	/**
	 * @param int $id
	 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
	 */
	public function delete(Request $request, int $id) {
		#TODO
		return redirect(route('my_address'));
	}
}
