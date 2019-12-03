<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Requests\CourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Http\Services\SessionService;
use App\Mail\CourseCreatedMail;
use App\Models\ContentPrice;
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
use Illuminate\Support\Facades\Mail;

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

        return view('instructor.courses.index', compact('courses', 'controller'));
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
        $languages = Language::orderBy('name', 'ASC')->pluck('name', 'id');
        $prices = ContentPrice::orderBy('id', 'ASC')->where('country_id', '1')->pluck('name', 'id');

        $controller = 'tutorials';
        $course = new Course();
        return view('instructor.courses.new', compact('categories', 'controller',
            'course', 'languages', 'prices'));
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

        $thumbnail = $fileUploadService->upload($request, 'course_image', 258, 150, 'courses/thumbnails');
        $main_picture = $fileUploadService->upload($request, 'course_image', 740, 440, 'courses/main-picture');

        $arrayToCreate = [
            'title' => $validated['title'],
            'category_id' => $validated['category_id'],
            'introduction' => $validated['introduction'],
            'thumbnail_picture' => $thumbnail,
            'main_picture' => $main_picture,
            'difficulty' => $validated['difficulty'],
            'content_price_id' => $validated['content_price_id'],
            'language_id' => $validated['language_id'],
            'user_id' => Auth::id(),
            'slug' => Str::slug($validated['title']),
            'is_published' => false,
        ];

        $course = Course::create($arrayToCreate);

        if ($request->hasfile('documents'))
        {
            $tutorialService->uploadDocuments($request->get('documents'), $course);
        }

        //Send admin email to notify the course creation.
        Mail::to(getenv('MAIL_ADMIN'))->send(new CourseCreatedMail($course));

        notify()->success(Lang::get("Le cours a été créé avec succès !"));
        return redirect(route('professor_course_list'));
    }

    /**
     * @param Request $request
     * @param Course $course
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function edit(Request $request, Course $course) {
        $categories = Category::orderBy('name', 'ASC')->pluck('name', 'id');
        $languages = Language::orderBy('name', 'ASC')->pluck('name', 'id');
        $prices = ContentPrice::orderBy('id', 'ASC')->where('country_id', '1')->pluck('name', 'id');

        $currentUrl = $request->url();
        $controller = 'tutorials';

        return view('instructor.courses.edit', compact(
            'course',
            'categories',
            'currentUrl',
            'languages',
            'controller',
            'url_video',
            'prices'
        ));
    }

    /**
     * @param UpdateCourseRequest $request
     * @param FileUploadService $fileUploadService
     * @param Course $course
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(UpdateCourseRequest $request, FileUploadService $fileUploadService, Course $course, SessionService $sessionService)
    {
        $validated = $request->validated();

        $arrayToUpdate = [
            'title' => $validated['title'],
            'category_id' => $validated['category_id'],
            'introduction' => $validated['introduction'],
            'language_id' => $validated['language_id'],
            'content_price_id' => $validated['content_price_id'],
            'user_id' => Auth::id(),
            'slug' => Str::slug($validated['title']),
            'difficulty' => $validated['difficulty']
        ];

        if ($request->file('thumbnail_picture')) {
            $thumbnail = $fileUploadService->upload($request, 'thumbnail_picture', 258, 150, 'tutorials/thumbnails');
            $arrayToUpdate['thumbnail_picture'] = $thumbnail;
        }

        $course->update($arrayToUpdate);

        if($request->has('sessions'))
        {
            $sessionService->saveSessions($request->get('sessions'), $course);
        }

        notify()->success(Lang::get("Le cours a bien été mis à jour, merci !"));
        return redirect(route('professor_course_edit', $course));
    }

    /**
     * @param Course $course
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function delete(Course $course) {

        if($course->sessions()) {
            foreach ($course->sessions as $session)
            {
                if($session->contents)
                {
                    foreach ($session->contents as $content)
                    {
                        $content->delete();
                    }
                }
                $session->delete();
            }
        }

        $course->delete();

        return redirect(route('professor_course_list'))->with('success', Lang::get("Le cours a bien été supprimé !"));
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
