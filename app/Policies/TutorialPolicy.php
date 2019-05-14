<?php

namespace App\Policies;

use App\Models\Tutorial;
use App\User;
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
     * @param  \App\User  $user
     * @param  \App\Models\Tutorial  $tutorial
     * @return mixed
     */
    public function create()
    {
        return true;
    }

    /**
     * Determine whether the user can update the post.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Tutorial  $tutorial
     * @return mixed
     */
    public function view(User $user, Tutorial $tutorial)
    {
        return $user->id == $tutorial->user->id;
    }

    /**
     * Determine whether the user can update the post.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Tutorial  $tutorial
     * @return mixed
     */
    public function update(User $user, Tutorial $tutorial)
    {
        return $user->id == $tutorial->user->id;
    }

    /**
     * Determine whether the user can update the post.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Tutorial  $tutorial
     * @return mixed
     */
    public function delete(User $user, Tutorial $tutorial)
    {
        return $user->id == $tutorial->user->id;
    }
}
