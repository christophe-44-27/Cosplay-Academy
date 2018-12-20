<?php

namespace App\Http\Controllers\Dashboard;

use App\Exceptions\YoutubeVideoIdNotFoundException;
use App\Http\Requests\AddPhotoToGalleryRequest;
use App\Http\Requests\CreateGalleryRequest;
use App\Http\Requests\TutorialRequest;
use App\Http\Requests\UpdateGalleryRequest;
use App\Http\Requests\UpdateTutorialRequest;
use App\Mail\TutorialCreatedAdminMail;
use App\Mail\TutorialCreatedMail;
use App\Mail\TutorialPublishedMail;
use App\Models\Album;
use App\Models\Category;
use App\Models\Photo;
use App\Models\Tutorial;
use App\Models\TutorialCategory;
use App\Http\Controllers\Controller;
use App\Services\ExtractYoutubeVideoIdService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class GalleryController extends Controller {
    /**
     * TutorialController constructor.
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index() {
        $user = Auth::user();

        $galleries = Album::where('user_id', '=', $user->id)->get();
        return view('dashboard.gallery.gallery_index', compact('galleries'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function newGallery() {
        $categories = Category::orderBy('name', 'ASC')->pluck('name', 'id');
        return view('dashboard.gallery.gallery_new', compact('categories'));
    }

    public function create(CreateGalleryRequest $request) {
        $user = Auth::user();

        if(!$user){
            return redirect(route('login'));
        }

        $validated = $request->validated();
        $coverImageResized = Image::make($request->file('cover_image'))->fit(258, 150)->encode('jpg');
        // calculate md5 hash of encoded image
        $hashCover = md5($coverImageResized->__toString());

        if (!is_dir(storage_path("app/public/users/" . $user->id . "/albums/covers"))) {
            Storage::makeDirectory("users/". $user->id . "/albums/covers");
        }

        $pathCover = "app/public/users/". $user->id ."/albums/covers/{$hashCover}.jpg";
        $publicCoversPath = "/users/". $user->id ."/albums/covers/{$hashCover}.jpg";
        $coverImageResized->save(storage_path($pathCover));

        ///////////////////////////////////////////////////

        $coverFrontend = Image::make($request->file('cover_image'))->encode('jpg');
        // calculate md5 hash of encoded image
        $hashCoverFrontend = md5($coverFrontend->__toString());

        $pathCoverFrontend = "app/public/users/". $user->id ."/albums/covers/{$hashCoverFrontend}.jpg";
        $publicCoversFrontendPath = "/users/". $user->id ."/albums/covers/{$hashCoverFrontend}.jpg";
        $coverFrontend->save(storage_path($pathCoverFrontend));

        $arrayToCreate = [
            'title' => $validated['title'],
            'category_id' => $validated['category_id'],
            'description' => $validated['description'],
            'user_id' => $user->id,
            'is_published' => true,
            'cover_image' => $publicCoversPath,
            'cover_frontend' => $publicCoversFrontendPath,
            'slug' => str_slug($validated['title'])
        ];

        Album::create($arrayToCreate);

        return redirect(route('gallery'));
    }

    public function edit(string $slug) {
        $gallery = Album::where('slug', '=', $slug)->firstOrFail();
        $categories = Category::pluck('name', 'id');

        return view('dashboard.gallery.gallery_edit', compact('gallery', 'categories'));
    }

    public function update(UpdateGalleryRequest $request, $slug) {
        $user = Auth::user();

        if(!$user){
            return redirect(route('login'));
        }

        $validated = $request->validated();
        if($request->file('cover_image')) {
            $coverImageResized = Image::make($request->file('cover_image'))->fit(258, 150)->encode('jpg');
            // calculate md5 hash of encoded image
            $hashCover = md5($coverImageResized->__toString());

            if (!is_dir(storage_path("app/public/users/" . $user->id . "/albums/covers"))) {
                Storage::makeDirectory("users/". $user->id . "/albums/covers");
            }

            $pathCover = "app/public/users/". $user->id ."/albums/covers/{$hashCover}.jpg";
            $publicCoversPath = "/users/". $user->id ."/albums/covers/{$hashCover}.jpg";
            $coverImageResized->save(storage_path($pathCover));

            $arrayToUpdate['cover_image'] = $publicCoversPath;
        }

        $arrayToUpdate = [
            'title' => $validated['title'],
            'category_id' => $validated['category_id'],
            'description' => $validated['description'],
            'user_id' => $user->id,
            'is_published' => true,
            'slug' => str_slug($validated['title'])
        ];

        Album::where('slug', '=', $slug)
            ->update($arrayToUpdate);

        $request->session()->flash('success', "Les informations de la galerie ont bien été mises à jour !");
        return redirect(route('gallery'));
    }

    /**
     * @param $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function displayGalleryContent($slug) {
        $gallery = Album::where('slug', '=', $slug)->firstOrFail();
        $photos = Photo::where('album_id', '=', $gallery->id)->orderBy('id', 'DESC')->get();

        return view('dashboard.gallery.gallery_display_content', compact('gallery', 'photos'));
    }

    /**
     * @param AddPhotoToGalleryRequest $request
     * @param                          $slug
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function addPhotoToGallery(AddPhotoToGalleryRequest $request, $slug){
        $user = Auth::user();
        $gallery = Album::where('slug', '=', $slug)->firstOrFail();

        if(!$user){
            return redirect(route('login'));
        }

        $validated = $request->validated();
        $imagePath = Image::make($request->file('image_path'))->encode('jpg');
        // calculate md5 hash of encoded image
        $hashCover = md5($imagePath->__toString());

        if (!is_dir(storage_path("app/public/users/" . $user->id . "/albums/" . $gallery->id))) {
            Storage::makeDirectory("users/". $user->id . "/albums/" . $gallery->id );
        }
        $path = "app/public/users/" . $user->id . "/albums/" . $gallery->id . "/{$hashCover}.jpg";
        $publicPath = "users/". $user->id ."/albums/" . $gallery->id . "/{$hashCover}.jpg";
        $imagePath->save(storage_path($path));

        $arrayToCreate = [
            'title' => $validated['title'],
            'album_id' => $gallery->id,
            'image_path' => $publicPath,
            'slug' => str_slug($validated['title'])
        ];

        Photo::create($arrayToCreate);

        $request->session()->flash('success', "La photo a bien été ajoutée !");
        return redirect(route('gallery_display_photos', $gallery->slug));
    }

    /**
     * @param Request $request
     * @param $slug
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function delete(Request $request, $slug) {
        $gallery = Album::where('slug', '=', $slug)->firstOrFail();
        $gallery->delete();

        $request->session()->flash('success', "Ton album a bien été supprimé ! :)");
        return redirect(route('gallery'));
    }
}
