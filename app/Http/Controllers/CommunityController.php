<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Photo;
use App\User;
use Illuminate\Http\Request;

class CommunityController extends Controller
{
    public function index() {
        $galleries = Album::orderBy('id', 'DESC')->get();

        return view('community.index', compact('galleries'));
    }

    public function showGallery(string $slug) {
        $gallery = Album::where('slug', '=', $slug)->firstOrFail();
        $photos = Photo::where('album_id', '=', $gallery->id)->orderBy('id', 'DESC')->get();

        return view('community.gallery_show', compact('photos', 'gallery'));
    }
}
