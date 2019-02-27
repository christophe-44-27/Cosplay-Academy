<?php

namespace App\Http\Controllers\Dashboard;

use App\Exceptions\YoutubeVideoIdNotFoundException;
use App\Http\Requests\TutorialRequest;
use App\Http\Requests\UpdateTutorialRequest;
use App\Mail\TutorialCreatedAdminMail;
use App\Mail\TutorialCreatedMail;
use App\Mail\TutorialPublishedMail;
use App\Models\Document;
use App\Models\Tutorial;
use App\Models\TutorialCategory;
use App\Http\Controllers\Controller;
use App\Services\ExtractYoutubeVideoIdService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class TutorialController extends Controller {
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
        $tutorials = Tutorial::where('user_id', '=', Auth::user()->id)
            ->orderBy('id', 'desc')
            ->get();
        $controller = 'tutorials';
        return view('dashboard/list_tutorials', compact('tutorials', 'controller'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function newTutorial() {
        $tutorialCategories = TutorialCategory::pluck('name', 'id');
        $controller = 'tutorials';
        return view('dashboard/new_tutorial', compact('tutorialCategories', 'controller'));
    }

    /**
     * @param TutorialRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function create(TutorialRequest $request, ExtractYoutubeVideoIdService $videoIdService) {
        $validated = $request->validated();
        $arrayToCreate = [];

        /**
         * If there is a video url, just check if we can retrieve the video ID.
         */
        if($request->request->get('url_video')) {
            try{
                $videoId = $videoIdService->retrieveYoutubeVideoId($request->request->get('url_video'));
                $arrayToCreate['video_id'] = $videoId;
            } catch(YoutubeVideoIdNotFoundException $idNotFoundException) {
                return back()->withErrors($idNotFoundException->getMessage())->withInput();
            }
        }

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

        $arrayToCreate = [
            'title' => $validated['title'],
            'tutorial_category_id' => $validated['tutorial_category_id'],
            'content' => $validated['content'],
            'thumbnail_picture' => $publicThumbnailsPath,
            'main_picture' => $publicCoversPath,
            'url_video' => $request->request->get('url_video'),
            'nb_views' => 0,
            'nb_likes' => 0,
            'user_id' => Auth::id(),
            'slug' => str_slug($validated['title']),
        ];

        $tutorial = Tutorial::create($arrayToCreate);

        if ($request->hasfile('filename')) {
            foreach ($request->file('filename') as $file) {
                $name = $file->getClientOriginalName();

                if (!is_dir(storage_path("app/public/documents/tutorials"))) {
                    Storage::makeDirectory("public/documents/tutorials");
                }

                $file->move(storage_path('app/public/documents') . '/tutorials/', $name);

                $document = new Document();
                $document->filename = $name;
                $document->type = $file->getClientOriginalExtension();
                $document->documentable_id = $tutorial->id;
                $document->documentable_type = 'App\Models\Tutorial';
                $document->path = 'documents/tutorials/' . $name;

                $document->save();
            }
        }

        Mail::to($tutorial->user->email)->send(new TutorialCreatedMail($tutorial));
        Mail::to(getenv('MAIL_ADMIN'))->send(new TutorialCreatedAdminMail($tutorial));

        $request->session()->flash('success', 'Le tutoriel a été créé avec succès !');
        return redirect(route('dashboard_tutorials_list'));
    }

    /**
     * @param UpdateTutorialRequest $request
     * @param string $slug
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(UpdateTutorialRequest $request, string $slug) {
        $validated = $request->validated();

        $arrayToUpdate = [
            'title' => $validated['title'],
            'tutorial_category_id' => $validated['tutorial_category_id'],
            'content' => $validated['content'],
            'url_video' => $request->request->get('url_video'),
            'user_id' => Auth::id(),
            'slug' => str_slug($validated['title']),
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

        $tutorial = Tutorial::where('slug', '=', $slug)->firstOrFail();

        if ($request->hasfile('filename')) {
            foreach ($request->file('filename') as $file) {
                $name = $file->getClientOriginalName();

                if (!is_dir(storage_path("app/public/documents/tutorials"))) {
                    Storage::makeDirectory("public/documents/tutorials");
                }

                $file->move(storage_path('app/public/documents') . '/tutorials/', $name);

                $document = new Document();
                $document->filename = $name;
                $document->type = $file->getClientOriginalExtension();
                $document->documentable_id = $tutorial->id;
                $document->documentable_type = 'App\Models\Tutorial';
                $document->path = 'documents/tutorials/' . $name;

                $document->save();
            }
        }

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

        if($tutorial->is_published) {
            $request->session()->flash('error', 'Veuillez dépublier le tutoriel avant de le modifier.');
            return redirect(route('dashboard_tutorials_list'));
        }
        $currentUrl = $request->url();
        $controller = 'tutorials';
        return view('dashboard/edit_tutorial', compact(
            'tutorial',
            'tutorialCategories',
            'currentUrl',
            'controller'
        ));
    }

    /**
     * @param string $slug
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function delete(string $slug) {
        $tutorial = Tutorial::where('slug', '=', $slug)->firstOrFail();
        $tutorial->delete();
        return redirect(route('dashboard_tutorials_list'));
    }

    public function publish(Request $request, $id) {
        $tutorial = Tutorial::findOrFail($id);
        $tutorial->is_published = true;
        $tutorial->save();

        Mail::to($tutorial->user->email)->send(new TutorialPublishedMail($tutorial));

        $request->session()->flash('success', 'Le tutoriel a été publié !');
        return redirect(route('dashboard_tutorials_list'));
    }

    public function unpublish(Request $request, $id) {
        $tutorial = Tutorial::findOrFail($id);
        $tutorial->is_published = false;
        $tutorial->save();

        $request->session()->flash('success', 'Le tutoriel a été dépublié !');
        return redirect(route('dashboard_tutorials_list'));
    }

    public function deleteDocument(Request $request, int $id, int $tutorialId) {
        $tutorial = Tutorial::where('id', '=', $tutorialId)->firstOrFail();

        $document = Document::findOrFail($id);
        $document->delete();

        $request->session()->flash('success', 'Le document a bien été supprimé !');
        return redirect(route('tutorial_edit', $tutorial->slug));
    }
}
