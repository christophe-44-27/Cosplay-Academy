<?php

namespace App\Http\Controllers\Customer;

use App\Models\Content;
use App\Models\Course;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
    /**
     * CourseController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function myCourses()
    {
        $user = Auth::user();
        $courses = $user->courseParticipations;
        $action = 'my_courses';

        return view('courses.course_liste', compact('courses', 'action'));
    }

    /**
     * @param Course $course
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function participateToFreeCourse(Course $course)
    {
        $user = Auth::user();
        $user->courseParticipations()->attach([$course->id]);

        notify()->success(Lang::get("Félicitations, vous êtes inscrit(e) au cours " . $course->title . " ! Bon apprentissage !"));

        return redirect(route('course_details', $course));
    }

    /**
     * @param Course $course
     * @param Content $content
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showContent(Course $course, Content $content)
    {
        $url_video = null;
        $video = null;
        
        if($content->video_name)
        {
            $video = Storage::disk('s3')->getAdapter()->getClient()->getObject([
                'Bucket' => env('AWS_BUCKET'),
                'Key' => $content->video_name,
            ]);
        }

        $url_video = $video['@metadata']['effectiveUri'];

        return view('frontend.courses.show_content', compact('course', 'content', 'url_video'));
    }

    /**
     * @param Course $course
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function cancelParticipationCourse(Course $course)
    {
        $user = Auth::user();
        $user->courseParticipations()->detach($course->id);

        notify()->success(Lang::get("Vous vous êtes bien désinscrit(e) du cours " . $course->title . " ."));

        return redirect(route('course_details', $course));
    }
}
