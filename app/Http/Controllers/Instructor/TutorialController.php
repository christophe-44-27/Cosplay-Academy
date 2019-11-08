<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Requests\CourseRequest;
use App\Http\Requests\TutorialRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Http\Requests\UpdateTutorialRequest;
use App\Http\Services\SessionService;
use App\Mail\AdminTutorialCreatedMail;
use App\Models\Language;
use App\Models\Course;
use App\Models\Category;
use App\Models\CourseType;
use App\Http\Controllers\Controller;
use App\Models\Tutorial;
use App\Services\FileUploadService;
use App\Services\TutorialService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Mail;
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
            ->orderBy('id', 'desc')
            ->paginate(6);
        $controller = 'tutorials';

        return view('instructor.tutorials.index', compact('tutorials', 'controller'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function waitingForModeration() {
        $courses = Course::where('user_id', '=', Auth::user()->id)
            ->where('is_published', '=', false)
            ->where('is_reported', '=', false)
            ->orderBy('id', 'desc')
            ->paginate(6);
        $controller = 'courses';

        return view('instructor.courses.index', compact('courses', 'controller'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function newTutorial() {
        $categories = Category::orderBy('name', 'ASC')->pluck('name', 'id');
        $types = CourseType::orderBy('name', 'ASC')->pluck('name', 'id');
        $languages = Language::orderBy('name', 'ASC')->pluck('name', 'id');

        $controller = 'tutorials';
        $tutorial = new Tutorial();
        return view('instructor.tutorials.new', compact('categories', 'controller',
            'tutorial', 'types', 'languages'));
    }

    /**
     * @param TutorialRequest $request
     * @param FileUploadService $fileUploadService
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function create(
        TutorialRequest $request,
        FileUploadService $fileUploadService
    )
    {
        $validated = $request->validated();
        $videoId = null;

        $thumbnail = $fileUploadService->upload($request, 'thumbnail_picture', 258, 150, 'tutorials/thumbnails');

        $arrayToCreate = [
            'title' => $validated['title'],
            'category_id' => $validated['category_id'],
            'content' => $validated['content'],
            'thumbnail_picture' => $thumbnail,
            'difficulty' => $validated['difficulty'],
            'language_id' => $validated['language_id'],
            'user_id' => Auth::id(),
            'slug' => Str::slug($validated['title']),
            'is_published' => false,
        ];

        $tutorial = Tutorial::create($arrayToCreate);

        Mail::to(getenv('MAIL_ADMIN'))->send(new AdminTutorialCreatedMail($tutorial));

        return redirect(route('instructor_tutorials_list'))->with('success', Lang::get("Le tutoriel a été créé avec succès !"));
    }

    /**
     * @param Request $request
     * @param Tutorial $tutorial
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function edit(Request $request, Tutorial $tutorial) {
        $categories = Category::orderBy('name', 'ASC')->pluck('name', 'id');
        $types = CourseType::orderBy('name', 'ASC')->pluck('name', 'id');
        $languages = Language::orderBy('name', 'ASC')->pluck('name', 'id');

        $currentUrl = $request->url();
        $controller = 'tutorials';

        return view('instructor.tutorials.edit', compact(
            'tutorial',
            'categories',
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
            'language_id' => $validated['language_id'],
            'slug' => Str::slug($request->get('title')),
            'difficulty' => $validated['difficulty'],
        ];

        if ($request->file('thumbnail_picture')) {
            $thumbnail = $fileUploadService->upload($request, 'thumbnail_picture', 258, 150, 'tutorials/thumbnails');
            $arrayToUpdate['thumbnail_picture'] = $thumbnail;
        }

        $tutorial->update($arrayToUpdate);


        $request->session()->flash('success', Lang::get("Le tutoriel a bien été mis à jour, merci !"));
        return redirect(route('instructor_tutorials_list'));
    }

    /**
     * @param Tutorial $tutorial
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function delete(Tutorial $tutorial) {

        $tutorial->delete();

        return redirect(route('instructor_tutorials_list'))->with('success', Lang::get("Le tutoriel a bien été supprimé !"));
    }
}
