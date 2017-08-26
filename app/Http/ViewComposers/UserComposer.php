<?php

namespace App\Http\ViewComposers;

use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class UserComposer
{
    protected $user;

    public function __construct(UserRepository $user)
    {
        $this->user = $user;
    }

    public function compose(View $view)
    {
        $view->with('user', $this->user->getLoginedUser());
    }
}