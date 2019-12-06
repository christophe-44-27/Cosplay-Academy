<?php

namespace App\Http\Controllers\Inbox;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\Thread;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Validator;

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

    public function showThread(Thread $thread)
    {
        $messages = Message::where('thread_id', '=', $thread->id)
            ->where('sender_id', Auth::id())
            ->orWhere('receiver_id', '=', Auth::id())
            ->get();

        if($thread->receiver_id == Auth::id())
        {
            $receiver = $thread->sender_id;
        } else {
            $receiver = $thread->receiver_id;
        }

        return view('inbox.messages_thread', compact('messages', 'thread', 'receiver', 'controller'));
    }

    /**
     * @param Thread $thread
     * @param User $user
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request, int $threadId, int $receiverId)
    {
        $validator = Validator::make($request->all(), ['body' => 'required',], ['body' => "Vous ne pouvez pas envoyer un message vide."]);

        $validated = $validator->validated();

        $message = new Message();
        $message->body = $validated['body'];
        $message->thread_id = $threadId;
        $message->sender_id = Auth::id();
        $message->receiver_id = $receiverId;
        $message->created_at = Carbon::now();
        $message->updated_at = Carbon::now();

        $message->save();

        $thread = Thread::where('id', $threadId)->firstOrFail();

        notify()->success(Lang::get("Votre message a bien été envoyé !"));
        return redirect(route('show_thread_messages', $thread));
    }

    /**
     * @param Request $request
     * @param int $receiverId
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function createThread(Request $request, int $receiverId)
    {
        $validator = Validator::make($request->all(), ['title' => 'required','body' => 'required',], ['title' => "Le titre du message est obligatoire", 'body' => "Vous ne pouvez pas envoyer un message vide."]);

        $validated = $validator->validated();

        $senderThread = new Thread();
        $senderThread->title = $validated['title'];
        $senderThread->body = $validated['body'];
        $senderThread->sender_id = Auth::id();
        $senderThread->receiver_id = $receiverId;
        $senderThread->created_at = Carbon::now();
        $senderThread->updated_at = Carbon::now();

        $senderThread->save();

        $copyThread = new Thread();
        $copyThread->title = $validated['title'];
        $copyThread->body = $validated['body'];
        $copyThread->sender_id = Auth::id();
        $copyThread->receiver_id = Auth::id();
        $copyThread->created_at = Carbon::now();
        $copyThread->updated_at = Carbon::now();
        $copyThread->is_read = true;

        $copyThread->save();

        notify()->success(Lang::get("Votre message a bien été envoyé !"));
        return redirect(route('inbox'));
    }

    public function deleteConversation(Thread $thread)
    {
        foreach ($thread->messages as $message)
        {
            $message->delete();
        }

        $thread->delete();

        notify()->success(Lang::get("La conversation a bien été supprimée ! (Pour tout le monde)"));
        return redirect(route('inbox'));
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
