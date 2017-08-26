<?php

namespace App\Services;


use App\Repositories\UserRepository;

class UserService
{
    protected $userRepo;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepo = $userRepo;

    }

    public function findUserById($user_id)
    {
        return $this->userRepo->getUser($user_id);
    }
}