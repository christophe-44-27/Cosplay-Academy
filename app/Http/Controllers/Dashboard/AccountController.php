<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Requests\AccountRequest;
use App\Http\Controllers\Controller;
use App\Models\TutorialCategory;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class AccountController extends Controller {

	public function __construct() {
		$this->middleware('auth');
	}

	public function index() {
		$user = Auth::user();

		$categories = TutorialCategory::pluck('name', 'id');
        $controller = 'account';
		return view('dashboard/my_account', compact('user', 'categories', 'controller'));
	}

	public function update(AccountRequest $request) {
		$validated = $request->validated();

		$dataArray = [
			'public_pseudonym' => $validated['public_pseudonym'],
			'firstname' => $validated['firstname'],
			'lastname' => $validated['lastname'],
			'email' => $validated['email'],
			'description' => $validated['description'],
			'youtube_page' => $validated['youtube_page'],
			'twitter_page' => $validated['twitter_page'],
			'facebook_page' => $validated['facebook_page'],
			'website' => $validated['website'],
			'instagram_page' => $validated['instagram_page'],
		];

		//Mise à jour de la photo de profil
		if ($request->file('profile_picture')) {
			$avatar = Image::make($request->file('profile_picture'))->fit(360, 360)->encode('jpg');
			// calculate md5 hash of encoded image
			$hash = md5($avatar->__toString());
			$path = "app/public/users/avatars/{$hash}.jpg";
			$publicAvatarPath = "users/avatars/{$hash}.jpg";
			if (!is_dir(storage_path("app/public/users/avatars"))) {
				Storage::makeDirectory("public/users/avatars");
			}
			$avatar->save(storage_path($path));
			$dataArray['profile_picture'] = $publicAvatarPath;
		}

		//Mise à jour de la photo de couverture
		if ($request->file('cover_picture')) {
			$cover = Image::make($request->file('cover_picture'))->fit(263, 232)->encode('jpg');
			// calculate md5 hash of encoded image
			$hashCover = md5($cover->__toString());
			$pathCover = "app/public/users/covers/{$hashCover}.jpg";
			$publicCoverPath = "users/covers/{$hashCover}.jpg";
			if (!is_dir(storage_path("app/public/users/covers"))) {
				Storage::makeDirectory("public/users/covers");
			}
			$cover->save(storage_path($pathCover));
			$dataArray['cover_picture'] = $publicCoverPath;
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
