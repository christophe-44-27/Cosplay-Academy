<?php

namespace App\Http\Controllers\Api;

use App\Events\SearchEvent;
use App\Http\Filters\Courses\CourseFilter;
use App\Http\Resources\CourseCollection;
use App\Models\Course;
use App\Services\CourseService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CourseController extends Controller {

    /**
     * @param CourseFilter $courseFilter
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function search(CourseFilter $courseFilter)
    {
        $courses = Course::filter($courseFilter)->where('is_published', '=', true)->paginate(10);

        return CourseCollection::collection($courses);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function get(Request $request)
    {
        $courses = Course::where('is_published', '=', true)->paginate(10);
        return response()->json($courses);
    }
}
