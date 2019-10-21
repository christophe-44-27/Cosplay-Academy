<?php

namespace App\Http\Controllers\Inbox;

use App\Http\Controllers\Controller;
use App\Models\Thread;
use Illuminate\Support\Facades\Auth;

class InboxController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();

        $controller = 'inbox';
        $threads = Thread::where('receiver_id', '=', $user->id)->orderBy('created_at', 'DESC')->get();

        return view('inbox.message_list', compact('threads', 'controller'));
    }

    public function messageSended()
    {
        $user = Auth::user();

        $controller = 'inbox';
        $threads = Thread::where('sender_id', '=', $user->id)->orderBy('created_at', 'DESC')->get();

        return view('inbox.message_list', compact('threads', 'controller'));
    }

    public function createMessage()
    {

    }
}
