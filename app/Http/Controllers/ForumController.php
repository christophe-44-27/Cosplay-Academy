<?php

namespace App\Http\Controllers;

use App\Forum\Models\Channel;
use App\Http\Requests\AddAnswerToForumTopicRequest;
use App\Http\Requests\CreateTopicRequest;
use App\Forum\Models\Thread;
use App\Forum\Models\ForumTopic;
use App\Forum\Models\Reply;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ForumController extends Controller {

    public function index() {
        $forums = Thread::orderBy('id')->get();

        $allChannels = Channel::orderBy('name', 'ASC')
            ->where('position', '=', null)
            ->get();

        $channelMaterials = Channel::where('position', '=', '2')->get();
        $channelCategories = Channel::where('position', '=', '1')->get();

        return view('forums.index', compact('allChannels', 'forums', 'channelCategories', 'channelMaterials'));
    }

    public function show(int $forumId) {
        $forum = Thread::where('id', '=', $forumId)->firstOrFail();

        $topics = ForumTopic::where('forum_id', '=', $forum->id)
            ->orderBy('id', 'DESC')
            ->paginate(15);

        return view('forums.show', compact('forum', 'topics'));
    }

    public function showThread($slug) {
        $forumTopic = ForumTopic::where('slug', '=', $slug)->firstOrFail();

        $answers = Reply::where('forum_topic_id', '=', $forumTopic->id)
            ->orderBy('id', 'DESC')
            ->get();

        return view('forums.show_thread', compact('forumTopic', 'answers'));
    }

    public function addAnswerToForumTopic(AddAnswerToForumTopicRequest $request, int $forumId, int $forumTopicId) {
        $validated = $request->validated();

        $datas = [
            'content' => $validated['content'],
            'user_id' => Auth::id(),
            'forum_topic_id' => $forumTopicId,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];

        Reply::create($datas);

        $request->session()->flash('success', "Votre réponse a bien été ajoutée !");
        return redirect(route('show_forum', $forumId));

    }

    public function createTopic(CreateTopicRequest $request, int $forumId) {
        $validated = $request->validated();

        $datas = [
            'title' => $validated['title'],
            'content' => $validated['content'],
            'user_id' => Auth::id(),
            'forum_id' => $forumId,
            'slug' => str_slug($validated['title']),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];

        $forumTopic = ForumTopic::create($datas);

        $request->session()->flash('success', "Votre nouveau sujet " . $forumTopic->title . " a bien été envoyé !");
        return redirect(route('show_forum', $forumId));
    }
}
