<?php

namespace App\Http\Middleware;

use App\Models\Course;
use App\Models\Tutorial;
use Closure;
use Illuminate\Support\Facades\Auth;

class LoadContentCount {
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = Auth::user();

        if($user)
        {
            view()->share('user', $user);

            view()->share('published_tutorials', Tutorial::where('user_id', '=', $user->id)
                ->where('is_published', '=', false)
                ->count());

            view()->share('published_courses', Course::where('user_id', '=', $user->id)
                ->count());

            view()->share('published_tutorials', Tutorial::where('user_id', '=', $user->id)->count());

            view()->share('to_moderate_tutorials', Tutorial::where('user_id', '=', $user->id)
                ->where('is_published', '=', false)
                ->where('is_reported', '=', false)
                ->count());

            view()->share('to_moderate_courses', Course::where('user_id', '=', $user->id)
                ->where('is_published', '=', false)
                ->where('is_reported', '=', false)
                ->count());
        }


        return $next($request);
    }
}
