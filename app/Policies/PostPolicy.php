<?php

namespace App\Policies;

use App\DataAccess\Eloquent\Post;
use App\DataAccess\Eloquent\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
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

    public function update(User $user, Post $post)
    {
        return $user->id === (int) $post->user_id;
    }
}
