<?php

namespace App\Repositories;

use App\DataAccess\Eloquent\User;
use Session;

class UserRepository
{
    protected $user;
    protected $session;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function save(array $attributes, array $values)
    {
        return $this->user->firstOrCreate($attributes, $values);
    }

    public function setUser($user)
    {
        Session::forget('User');
        Session::regenerate();
        Session::put('User', $user);
    }

    public function getUser($user_id)
    {
        return $this->user->find($user_id);
    }

    public function getLoginedUser()
    {
        return Session::get('User');
    }
}
