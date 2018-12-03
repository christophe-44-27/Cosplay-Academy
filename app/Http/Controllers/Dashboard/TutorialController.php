<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Requests\TutorialRequest;
use App\Http\Requests\UpdateTutorialRequest;
use App\Models\Tutorial;
use App\Models\TutorialCategory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class TutorialController extends Controller {
	public function __construct() {
		$this->middleware('auth');
	}

	public function index() {
		$tutorials = Tutorial::where('user_id', '=', Auth::user()->id)
            ->orderBy('id', 'desc')
            ->get();
		return view('dashboard/list_tutorials', compact('tutorials'));
	}

	public function newTutorial() {
		$tutorialCategories = TutorialCategory::pluck('name', 'id');
		return view('dashboard/new_tutorial', compact('tutorialCategories'));
	}

	public function create(TutorialRequest $request) {
		$validated = $request->validated();

		$resizedThumbnailImage = Image::make($request->file('thumbnail_picture'))->fit(258, 150)->encode('jpg');
		// calculate md5 hash of encoded image
		$hash = md5($resizedThumbnailImage->__toString());
		$path = "app/public/tutorials/thumbnails/{$hash}.jpg";
		$publicThumbnailsPath = "tutorials/thumbnails/{$hash}.jpg";
		if (!is_dir(storage_path("app/public/tutorials/thumbnails"))) {
			Storage::makeDirectory("public/tutorials/thumbnails");
		}
		$resizedThumbnailImage->save(storage_path($path));

		$resizedCoverImage = Image::make($request->file('main_picture'))->fit(700, 500)->encode('jpg');
		// calculate md5 hash of encoded image
		$hashCover = md5($resizedCoverImage->__toString());
		if (!is_dir(storage_path("app/public/tutorials/covers"))) {
			Storage::makeDirectory("public/tutorials/covers");
		}
		$pathCover = "app/public/tutorials/covers/{$hashCover}.jpg";
		$publicCoversPath = "tutorials/covers/{$hashCover}.jpg";
        $resizedCoverImage->save(storage_path($pathCover));

		Tutorial::create([
			'title' => $validated['title'],
			'tutorial_category_id' => $validated['tutorial_category_id'],
			'content' => $validated['content'],
			'thumbnail_picture' => $publicThumbnailsPath,
			'main_picture' => $publicCoversPath,
			'url_video' => $request->request->get('url_video'),
			'nb_views' => 0,
			'nb_likes' => 0,
			'user_id' => Auth::id(),
			'slug' => str_slug($validated['title'])
		]);
		$request->session()->flash('success', 'Le tutoriel a été créé avec succès !');
		return redirect(route('dashboard_tutorials_list'));
	}

	public function update(UpdateTutorialRequest $request, string $slug) {
		$validated = $request->validated();
		$arrayToUpdate = [
			'title' => $validated['title'],
			'tutorial_category_id' => $validated['tutorial_category_id'],
			'content' => $validated['content'],
			'url_video' => $request->request->get('url_video'),
			'nb_views' => 0,
			'nb_likes' => 0,
			'user_id' => Auth::id(),
			'slug' => str_slug($validated['title'])
		];
		if ($request->file('thumbnail_picture')) {
			$resizedThumbnailImage = Image::make($request->file('thumbnail_picture'))->fit(258, 150)->encode('jpg');
			// calculate md5 hash of encoded image
			$hash = md5($resizedThumbnailImage->__toString());
			$path = "app/public/tutorials/thumbnails/{$hash}.jpg";
			$publicThumbnailsPath = "tutorials/thumbnails/{$hash}.jpg";

			if (!is_dir(storage_path("app/public/tutorials/thumbnails"))) {
				Storage::makeDirectory("public/tutorials/thumbnails");
			}

			$resizedThumbnailImage->save(storage_path($path));
			$arrayToUpdate['thumbnail_picture'] = $publicThumbnailsPath;
		}
		if ($request->file('main_picture')) {
			$resizedCoverImage = Image::make($request->file('main_picture'))->fit(750, 500)->encode('jpg');
			// calculate md5 hash of encoded image
			$hashCover = md5($resizedCoverImage->__toString());

			if (!is_dir(storage_path("app/public/tutorials/covers"))) {
				Storage::makeDirectory("public/tutorials/covers");
			}

			$pathCover = "app/public/tutorials/covers/{$hashCover}.jpg";
			$publicCoversPath = "tutorials/covers/{$hashCover}.jpg";
			$resizedCoverImage->save(storage_path($pathCover));
			$arrayToUpdate['main_picture'] = $publicCoversPath;
		}
		Tutorial::where('slug', '=', $slug)
			->update($arrayToUpdate);
		$request->session()->flash('success', 'Le tutoriel a été mis à jour avec succès !');
		return redirect(route('dashboard_tutorials_list'));
	}

	/**
	 * @param string $slug
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function edit(Request $request, string $slug) {
		$tutorialCategories = TutorialCategory::pluck('name', 'id');
		$tutorial = Tutorial::where('slug', '=', $slug)->firstOrFail();
		$currentUrl = $request->url();
		return view('dashboard/edit_tutorial', compact(
			'tutorial',
			'tutorialCategories',
			'currentUrl'
		));
	}

	/**
	 * @param string $slug
	 */
	public function delete(string $slug) {
		$tutorial = Tutorial::where('slug', '=', $slug)->firstOrFail();
		$tutorial->delete();
		return redirect(route('dashboard_tutorials_list'));
	}
}
