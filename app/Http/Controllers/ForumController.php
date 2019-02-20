<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\GalleryCategory;
use App\Models\Photo;
use App\User;
use Illuminate\Http\Request;

class ForumController extends Controller {

    public function index() {
        return view('forums.index');
    }
}
