<?php

namespace App\Http\Controllers;

use App\Forum\Models\Channel;
use App\Forum\Models\Forum;
use App\Http\Requests\AddAnswerToForumTopicRequest;
use App\Http\Requests\CreateTopicRequest;
use App\Forum\Models\Thread;
use App\Forum\Models\Reply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ForumController extends Controller {

    public function index() {
        $forums = Forum::orderBy('id')
            ->get();

        $allChannels = Channel::orderBy('name', 'ASC')
            ->get();


        $forumMaterials = Forum::where('position', '=', '2')->get();
        $forumCategories = Forum::where('position', '=', '1')->get();

        return view('forums.index', compact('allChannels', 'forums', 'forumCategories', 'forumMaterials'));
    }

    public function showThreads(string $slug) {
        $forum = Forum::where('slug', '=', $slug)->firstOrFail();

        $threads = Thread::where('forum_id', '=', $forum->id)
            ->orderBy('id', 'DESC')
            ->paginate(15);

        return view('forums.show_threads', compact('forum', 'threads', 'forum'));
    }

    public function showThread($slug) {
        $thread = Thread::where('slug', '=', $slug)->firstOrFail();

        $answers = Reply::where('thread_id', '=', $thread->id)
            ->orderBy('id', 'DESC')
            ->get();

        return view('forums.show_thread', compact('thread', 'answers'));
    }

    public function addAnswerToForumTopic(AddAnswerToForumTopicRequest $request, string $slug) {
        $validated = $request->validated();

        $thread = Thread::where('slug', '=', $slug)->firstOrFail();

        $datas = [
            'body' => $validated['content'],
            'user_id' => Auth::id(),
            'thread_id' => $thread->id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];

        Reply::create($datas);

        $request->session()->flash('success', "Votre réponse a bien été ajoutée !");
        return redirect(route('show_forum_thread', $thread->slug));

    }

    public function createTopic(CreateTopicRequest $request, int $forumId) {
        $validated = $request->validated();

        $forum = Forum::where('id', '=', $forumId)->firstOrFail();

        $datas = [
            'title' => $validated['title'],
            'body' => $validated['content'],
            'user_id' => Auth::id(),
            'forum_id' => $forum->id,
            'slug' => str_slug($validated['title']),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];

        $forumTopic = Thread::create($datas);

        $request->session()->flash('success', "Votre nouveau sujet " . $forumTopic->title . " a bien été envoyé !");
        return redirect(route('show_forum', $forum->slug));
    }

    public function deleteMyThread(Request $request, string $slug){

        $thread = Thread::where('slug', '=', $slug)->first();

        $thread->delete();

        $request->session()->flash('success', "Votre sujet a bien été supprimé !");
        return redirect(route('forums'));

    }

    public function deleteMyAnswer(Request $request, int $id) {
        $reply = Reply::where('id', '=',$id)->first();

        $reply->delete();

        $request->session()->flash('success', "Votre réponse a bien été supprimée !");
        return redirect(route('forums'));
    }
}