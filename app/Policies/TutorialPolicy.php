<?php

namespace App\Policies;

use App\Models\Course;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TutorialPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine whether the user can update the post.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Course  $tutorial
     * @return mixed
     */
    public function create()
    {
        return true;
    }

    /**
     * Determine whether the user can view the post.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Course  $tutorial
     * @return mixed
     */
    public function view(User $user, Course $tutorial)
    {
        return $user->id == $tutorial->user->id;
    }

    /**
     * Determine whether the user can update the post.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Course  $tutorial
     * @return mixed
     */
    public function update(User $user, Course $tutorial)
    {
        return $user->id == $tutorial->user->id;
    }

    /**
     * Determine whether the user can delete the post.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Course  $tutorial
     * @return mixed
     */
    public function delete(User $user, Course $tutorial)
    {
        return $user->id == $tutorial->user->id;
    }
}
