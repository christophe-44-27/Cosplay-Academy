<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Category;
use App\Services\TutorialService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller {

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index() {
        $courses = Course::where('is_published', '=', true)
            ->orderBy('id', 'desc')
            ->paginate(6);

        $categories = Category::orderBy('name', 'ASC')->get();

        return view('frontend.courses.index', compact('courses', 'categories'));
    }

    /**
     * @param string $filterValue
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function coursesByCategorie(string $filterValue) {
        $category = Category::where('filter_value', '=', $filterValue)
            ->firstOrFail();

        $categories = Category::all();

        $courses = Course::where('category_id', '=', $category->id)
            ->where('is_published', '=', true)
            ->orderBy('id', 'desc')
            ->paginate(15);

        $selectedCategory = $category->filter_value;

        return view('frontend.courses.index', compact('courses', 'category', 'categories', 'selectedCategory'));
    }

    public function show(Request $request, Course $course) {

//        $object = Storage::disk('s3')->getAdapter()->getClient()->getObject([
//            'Bucket' => getenv('AWS_BUCKET'),
//            'Key' => 'tutorials/videos/' . $course->video_path,
//        ]);
//
//        $url_video = $object['@metadata']['effectiveUri'];

        $course->nb_views = $course->nb_views + 1;
        $course->save();

        $currentUrl = $request->url();

        $relatedTutorials = Course::where('category_id', '=', $course->category->id)
                                ->where('is_published', '=', true)
                                ->orderBy('id', 'DESC')
                                ->limit(4)
                                ->get();

        return view('frontend.courses.show', compact('course', 'currentUrl', 'relatedTutorials'));
    }

    /**
     * This method is used to report some tutorial that are not in some good quality or
     * no allowed by the CGU.
     * @param Request $request
     * @param Course $tutorial
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function reportTutorial(Request $request, Course $tutorial){
        $tutorial->is_reported = true;
        $tutorial->save();

        $tutorial->report($tutorial);

        $request->session()->flash('success', 'Le tutoriel a bien été signalé !');
        return redirect(route('tutorials'));
    }
}
