<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Requests\TutorialRequest;
use App\Http\Requests\UpdateTutorialRequest;
use App\Http\Services\SessionService;
use App\Models\Language;
use App\Models\Course;
use App\Models\Category;
use App\Models\CourseType;
use App\Http\Controllers\Controller;
use App\Services\FileUploadService;
use App\Services\TutorialService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CourseController extends Controller {
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
        $tutorials = Course::where('user_id', '=', Auth::user()->id)
            ->where('is_published', '=', true)
            ->orderBy('id', 'desc')
            ->paginate(6);
        $controller = 'tutorials';
        return view('dashboard.tutorials.index', compact('tutorials', 'controller'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function unpublishedTutorials()
    {
        $tutorials = Course::where('user_id', '=', Auth::user()->id)
            ->where('is_published', '=', false)
            ->orderBy('id', 'desc')
            ->paginate(6);
        $controller = 'tutorials';
        return view('dashboard.tutorials.unpublished_tutorials', compact('tutorials', 'controller'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function newTutorial() {
        $tutorialCategories = Category::orderBy('name', 'ASC')->pluck('name', 'id');
        $types = CourseType::orderBy('name', 'ASC')->pluck('name', 'id');
        $languages = Language::orderBy('name', 'ASC')->pluck('name', 'id');

        $controller = 'tutorials';
        $tutorial = new Course();
        return view('dashboard.tutorials.new', compact('tutorialCategories', 'controller',
            'tutorial', 'types', 'languages'));
    }

    /**
     * @param TutorialRequest $request
     * @param TutorialService $tutorialService
     * @param FileUploadService $fileUploadService
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function create(
        TutorialRequest $request,
        FileUploadService $fileUploadService,
        TutorialService $tutorialService
    )
    {
        $validated = $request->validated();
        $videoId = null;

        $thumbnail = $fileUploadService->upload($request, 'thumbnail_picture', 258, 150, 'tutorials/thumbnails');

        $arrayToCreate = [
            'title' => $validated['title'],
            'category_id' => $validated['category_id'],
            'type_id' => $validated['type_id'],
            'content' => $validated['content'],
            'thumbnail_picture' => $thumbnail,
            'difficulty' => $validated['difficulty'],
            'video_id' => 'prout.jpb',
            'nb_views' => 0,
            'nb_likes' => 0,
            'language_id' => $validated['language_id'],
            'user_id' => Auth::id(),
            'slug' => Str::slug($validated['title']),
        ];

        $tutorial = Course::create($arrayToCreate);

        if ($request->hasfile('documents'))
        {
            $tutorialService->uploadDocuments($request->get('documents'), $tutorial);
        }

        $request->session()->flash('success', 'Le tutoriel a été créé avec succès !');
        return redirect(route('dashboard_tutorials_list'));
    }

    /**
     * @param Request $request
     * @param Course $tutorial
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function edit(Request $request, Course $tutorial) {
        $tutorialCategories = Category::orderBy('name', 'ASC')->pluck('name', 'id');
        $types = CourseType::orderBy('name', 'ASC')->pluck('name', 'id');
        $languages = Language::orderBy('name', 'ASC')->pluck('name', 'id');

        $currentUrl = $request->url();
        $controller = 'tutorials';

        return view('dashboard.tutorials.edit', compact(
            'tutorial',
            'tutorialCategories',
            'types',
            'currentUrl',
            'languages',
            'controller',
            'url_video'
        ));
    }

    /**
     * @param UpdateTutorialRequest $request
     * @param FileUploadService $fileUploadService
     * @param Course $tutorial
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(UpdateTutorialRequest $request, FileUploadService $fileUploadService, Course $tutorial, SessionService $sessionService)
    {
        $validated = $request->validated();

        $arrayToUpdate = [
            'title' => $validated['title'],
            'category_id' => $validated['category_id'],
            'content' => $validated['content'],
            'price' => $request->request->get('price'),
            'language_id' => $validated['language_id'],
            'user_id' => Auth::id(),
            'slug' => Str::slug($validated['title']),
        ];

        if ($request->file('thumbnail_picture')) {
            $thumbnail = $fileUploadService->upload($request, 'thumbnail_picture', 258, 150, 'tutorials/thumbnails');
            $arrayToUpdate['thumbnail_picture'] = $thumbnail;
        }

        $tutorial->update($arrayToUpdate);

        if($request->has('sessions'))
        {
            $sessionService->saveSessions($request->get('sessions'), $tutorial);
        }

        $request->session()->flash('success', 'Le tutoriel a été mis à jour avec succès !');
        return redirect(route('dashboard_tutorials_list'));
    }

    /**
     * @param string $slug
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function delete(string $slug) {
        $tutorial = Course::where('slug', '=', $slug)->firstOrFail();
        $tutorial->delete();
        return redirect(route('dashboard_tutorials_list'));
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function unpublish(Request $request, $id) {
        $tutorial = Course::findOrFail($id);
        $tutorial->is_published = false;
        $tutorial->save();

        $request->session()->flash('success', 'Le tutoriel a été dépublié !');
        return redirect(route('dashboard_tutorials_list'));
    }
}
