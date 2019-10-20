<?php

namespace App\Http\Controllers\Professor;

use App\Http\Requests\CourseRequest;
use App\Http\Requests\UpdateCourseRequest;
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
use Illuminate\Support\Facades\Lang;
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
        $courses = Course::where('user_id', '=', Auth::user()->id)
            ->orderBy('id', 'desc')
            ->paginate(6);
        $controller = 'courses';
        return view('professor.courses.index', compact('courses', 'controller'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function newTutorial() {
        $categories = Category::orderBy('name', 'ASC')->pluck('name', 'id');
        $types = CourseType::orderBy('name', 'ASC')->pluck('name', 'id');
        $languages = Language::orderBy('name', 'ASC')->pluck('name', 'id');

        $controller = 'tutorials';
        $course = new Course();
        return view('professor.courses.new', compact('categories', 'controller',
            'course', 'types', 'languages'));
    }

    /**
     * @param CourseRequest $request
     * @param TutorialService $tutorialService
     * @param FileUploadService $fileUploadService
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function create(
        CourseRequest $request,
        FileUploadService $fileUploadService,
        TutorialService $tutorialService
    )
    {
        $validated = $request->validated();
        $videoId = null;

        $thumbnail = $fileUploadService->upload($request, 'course_image', 258, 150, 'courses/thumbnails');
        $main_picture = $fileUploadService->upload($request, 'course_image', 740, 440, 'courses/main-picture');

        $arrayToCreate = [
            'title' => $validated['title'],
            'category_id' => $validated['category_id'],
            'type_id' => $validated['type_id'],
            'introduction' => $validated['introduction'],
            'thumbnail_picture' => $thumbnail,
            'main_picture' => $main_picture,
            'difficulty' => $validated['difficulty'],
            'language_id' => $validated['language_id'],
            'user_id' => Auth::id(),
            'slug' => Str::slug($validated['title']),
        ];

        $tutorial = Course::create($arrayToCreate);

        if ($request->hasfile('documents'))
        {
            $tutorialService->uploadDocuments($request->get('documents'), $tutorial);
        }

        return redirect(route('professor_course_list'))->with('success', Lang::get("Le cours a été créé avec succès !"));
    }

    /**
     * @param Request $request
     * @param Course $course
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function edit(Request $request, Course $course) {
        $categories = Category::orderBy('name', 'ASC')->pluck('name', 'id');
        $types = CourseType::orderBy('name', 'ASC')->pluck('name', 'id');
        $languages = Language::orderBy('name', 'ASC')->pluck('name', 'id');

        $currentUrl = $request->url();
        $controller = 'tutorials';

        return view('professor.courses.edit', compact(
            'course',
            'categories',
            'types',
            'currentUrl',
            'languages',
            'controller',
            'url_video'
        ));
    }

    /**
     * @param UpdateCourseRequest $request
     * @param FileUploadService $fileUploadService
     * @param Course $tutorial
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(UpdateCourseRequest $request, FileUploadService $fileUploadService, Course $tutorial, SessionService $sessionService)
    {
        $validated = $request->validated();

        $arrayToUpdate = [
            'title' => $validated['title'],
            'category_id' => $validated['category_id'],
            'introduction' => $validated['introduction'],
            'price' => $request->request->get('price'),
            'language_id' => $validated['language_id'],
            'user_id' => Auth::id(),
            'slug' => Str::slug($validated['title']),
            'type_id' => $validated['type_id'],
            'difficulty' => $validated['difficulty']
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

        $request->session()->flash('success', Lang::get("Le cours a bien été mis à jour, merci !"));
        return redirect(route('professor_course_list'));
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
