<?php

namespace App\Http\Controllers\Dashboard;

use App\Exceptions\YoutubeVideoIdNotFoundException;
use App\Http\Requests\TutorialRequest;
use App\Http\Requests\UpdateTutorialRequest;
use App\Mail\TutorialPublishedMail;
use App\Models\Document;
use App\Models\Tutorial;
use App\Models\Category;
use App\Models\TutorialType;
use App\Http\Controllers\Controller;
use App\Services\ExtractYoutubeVideoIdService;
use App\Services\FileUploadService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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
            ->where('is_published', '=', true)
            ->orderBy('id', 'desc')
            ->paginate(6);
        $controller = 'tutorials';
        return view('dashboard.tutorials.index', compact('tutorials', 'controller'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function newTutorial() {
        $tutorialCategories = Category::orderBy('name', 'ASC')->pluck('name', 'id');
        $types = TutorialType::orderBy('name', 'ASC')->pluck('name', 'id');
        $controller = 'tutorials';
        $tutorial = new Tutorial();
        return view('dashboard.tutorials.new', compact('tutorialCategories', 'controller', 'tutorial', 'types'));
    }

    /**
     * @param TutorialRequest $request
     * @param ExtractYoutubeVideoIdService $videoIdService
     * @param FileUploadService $fileUploadService
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function create(TutorialRequest $request, ExtractYoutubeVideoIdService $videoIdService, FileUploadService $fileUploadService) {
        $validated = $request->validated();
        $videoId = null;

        /**
         * If there is a video url, just check if we can retrieve the video ID.
         */
        if($request->request->get('url_video')) {
            try{
                $videoId = $videoIdService->retrieveYoutubeVideoId($request->request->get('url_video'));
            } catch(YoutubeVideoIdNotFoundException $idNotFoundException) {
                return back()->withErrors($idNotFoundException->getMessage())->withInput();
            }
        }

        $thumbnail = $fileUploadService->upload($request, 'thumbnail_picture', 258, 150, 'tutorials/thumbnails');

        if ($request->hasFile('video_tutorial')) {
            $file = $request->file('video_tutorial');
            $filename = time() . $file->getClientOriginalName();
            $filePath = 'tutorials/videos/' . $filename;
            Storage::disk('s3')->put($filePath, file_get_contents($file), ['ACL' => 'public-read']);
        }

        $arrayToCreate = [
            'title' => $validated['title'],
            'category_id' => $validated['category_id'],
            'type_id' => $validated['type_id'],
            'content' => $validated['content'],
            'thumbnail_picture' => $thumbnail,
            'url_video' => $request->request->get('url_video'),
            'video_id' => ($filename != null) ? $filename : null,
            'nb_views' => 0,
            'nb_likes' => 0,
            'user_id' => Auth::id(),
            'slug' => Str::slug($validated['title']),
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

//        Mail::to($tutorial->user->email)->send(new TutorialCreatedMail($tutorial));
//        Mail::to(getenv('MAIL_ADMIN'))->send(new TutorialCreatedAdminMail($tutorial));

        $request->session()->flash('success', 'Le tutoriel a été créé avec succès !');
        return redirect(route('dashboard_tutorials_list'));
    }

    /**
     * @param Request $request
     * @param Tutorial $tutorial
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function edit(Request $request, Tutorial $tutorial) {
        $tutorialCategories = Category::orderBy('name', 'ASC')->pluck('name', 'id');
        $types = TutorialType::orderBy('name', 'ASC')->pluck('name', 'id');

//        if($tutorial->is_published) {
//            $request->session()->flash('error', 'Veuillez dépublier le tutoriel avant de le modifier.');
//            return redirect(route('dashboard_tutorials_list'));
//        }
        $object = Storage::disk('s3')->getAdapter()->getClient()->getObject([
            'Bucket' => env('AWS_BUCKET'),
            'Key' => 'tutorials/videos/' . $tutorial->video_id,
            'SaveAs' => $tutorial->video_id
        ]);

        $url_video = $object['@metadata']['effectiveUri'];

        $currentUrl = $request->url();
        $controller = 'tutorials';

        return view('dashboard.tutorials.edit', compact(
            'tutorial',
            'tutorialCategories',
            'types',
            'currentUrl',
            'controller',
            'url_video'
        ));
    }

    /**
     * @param UpdateTutorialRequest $request
     * @param FileUploadService $fileUploadService
     * @param string $slug
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(UpdateTutorialRequest $request, FileUploadService $fileUploadService, string $slug) {
        $validated = $request->validated();

        $arrayToUpdate = [
            'title' => $validated['title'],
            'category_id' => $validated['category_id'],
            'content' => $validated['content'],
            'video_id' => $request->request->get('video_tutorial'),
            'price' => $request->request->get('price'),
            'user_id' => Auth::id(),
            'slug' => Str::slug($validated['title']),
        ];

        if ($request->file('thumbnail_picture')) {
            $thumbnail = $fileUploadService->upload($request, 'thumbnail_picture', 258, 150, 'tutorials/thumbnails');
            $arrayToUpdate['thumbnail_picture'] = $thumbnail;
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
