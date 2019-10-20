<?php

namespace App\Http\Controllers\Professor;

use App\Models\Content;
use App\Models\Course;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Lang;

class CourseContentController extends Controller {
    /**
     * TutorialController constructor.
     */
    public function __construct() {
        $this->middleware('auth');
    }


    public function deleteContent(Course $course, Content $content)
    {
        $content->delete();

        return redirect(route('professor_course_edit', $course))->with('success', Lang::get("Votre contenu a bien été supprimé !"));
    }
}
