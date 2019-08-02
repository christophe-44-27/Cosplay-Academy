<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Category;
use App\Models\GalleryCategory;
use App\Models\Photo;
use App\Models\Tutorial;
use App\User;
use Illuminate\Http\Request;

class CommunityController extends Controller
{
    public function index() {
        $members = User::orderBy('id', 'DESC')->paginate(25);
        $categories = Category::all();

        return view('community.index', compact('members', 'categories'));
    }

    public function showMember(Request $request, int $id) {
        $member = User::where('id', '=', $id)->firstOrFail();
        $userTutorials  = Tutorial::where('user_id', '=', $member->id)
            ->orderBy('id', 'DESC')
            ->limit(4)
            ->get();

        $currentUrl = $request->url();
        return view('community.show', compact('member', 'userTutorials', 'currentUrl'));
    }
}
