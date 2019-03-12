<?php
/**
 * Created by PhpStorm.
 * User: clablancherie
 * Date: 12/03/2019
 * Time: 13:56
 */

namespace App\Http\Controllers\Forum;

use App\Forum\Models\Thread;
use App\Http\Controllers\Controller;

class ThreadSubscriptionsController extends Controller
{
    /**
     * Store a new thread subscription.
     *
     * @param int    $channelId
     * @param Thread $thread
     */
    public function store($channelId, Thread $thread)
    {
        $thread->subscribe();
    }
    /**
     * Delete an existing thread subscription.
     *
     * @param int    $channelId
     * @param Thread $thread
     */
    public function destroy($channelId, Thread $thread)
    {
        $thread->unsubscribe();
    }
}
