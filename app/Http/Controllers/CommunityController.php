<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\GalleryCategory;
use App\Models\Photo;
use App\Models\Tutorial;
use App\User;
use Illuminate\Http\Request;

class CommunityController extends Controller
{
    public function index() {
        $galleries = Album::orderBy('id', 'DESC')->get();
        $categories = GalleryCategory::all();

        return view('community.index', compact('galleries', 'categories'));
    }

    public function showMember(Request $request, int $id) {
        $user = User::where('id', '=', $id)->firstOrFail();
        $userTutorials  = Tutorial::where('user_id', '=', $user->id)
            ->orderBy('id', 'DESC')
            ->limit(4)
            ->get();

        $currentUrl = $request->url();
        return view('community.show', compact('user', 'userTutorials', 'currentUrl'));
    }

    public function showGallery(string $slug) {
        $gallery = Album::where('slug', '=', $slug)->firstOrFail();
        $photos = Photo::where('album_id', '=', $gallery->id)->orderBy('id', 'DESC')->get();

        return view('community.gallery_show', compact('photos', 'gallery'));
    }
}
