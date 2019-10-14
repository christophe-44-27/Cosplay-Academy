<?php

namespace App\Http\Controllers\Member;

use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller {

    public function show(Request $request, User $user) {
        $courses = Course::where('user_id', '=', $user->id)
            ->orderBy('id', 'DESC')
            ->limit(4)
            ->get();

        $currentUrl = $request->url();

        return view('frontend.users.show', compact('user', 'courses', 'currentUrl'));
    }
}
