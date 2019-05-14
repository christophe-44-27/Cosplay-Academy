<?php

namespace Tests\Feature;

use App\Models\Category;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;
use App\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TutorialsTest extends TestCase {

    use WithFaker, RefreshDatabase;

    /**
     * @test
     */
    public function a_user_can_create_tutorial() {

        $this->withoutExceptionHandling();

        $user = factory(User::class)->create([
            'password' => bcrypt($password = 'i-love-laravel'),
        ]);

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => $password,
        ]);
        $response->assertRedirect('/');
        $this->assertAuthenticatedAs($user);

        $tutorialCategory = factory(Category::class)->create();

        $attributes = [
            'title' => $this->faker->sentence,
            'content' => $this->faker->paragraph,
            'thumbnail_picture' => UploadedFile::fake()->image('thumbnail.jpg', 500, 450),
            'main_picture' => UploadedFile::fake()->image('cover.jpg', 750, 550),
            'nb_views' => $this->faker->numberBetween(0,10000),
            'nb_likes' => $this->faker->numberBetween(0,10000),
            'tutorial_category_id' => $tutorialCategory->id,
            'user_id' => $user->id,
            'slug' => $this->faker->slug,
            'is_reported' => 0,
            'video_id' => null,
            'url_video' => null,
            'created_at' => now(),
            'updated_at' => now(),
            'is_published' => 0,
        ];

        $this->post('/dashboard/tutorials/create', $attributes)->assertRedirect('/dashboard/tutorials');
        $this->get('/dashboard/tutorials')->assertSee($attributes['title']);
    }
}
