<?php

namespace Tests\Feature;

use Tests\TestCase;

class ForumTopicTest extends TestCase
{
    /**
     * @test
     */
    public function a_user_can_view_all_topics()
    {
        $topic = factory('App\Models\ForumTopic')->create();

        $response = $this->get('/forums/topics/' . $topic->forum->id);
        $response->assertSee($topic->title);
    }
}
