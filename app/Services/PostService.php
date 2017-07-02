<?php

namespace App\Services;

use App\Repositories\DonRepository;
use App\Repositories\PostRepository;
use Illuminate\Contracts\Auth\Access\Gate;

class PostService
{
    protected $donRepo;
    protected $postRepo;
    protected $gate;

    public function __construct(DonRepository $donRepo, PostRepository $postRepo, Gate $gate)
    {
        $this->donRepo = $donRepo;
        $this->postRepo = $postRepo;
        $this->gate = $gate;
    }

    public function save(array $params)
    {
        if (isset($params['id'])) {
            if (!$this->getUpdateDonAbility($params['id'])) {
                return false;
            }
        }

        return $this->postRepo->save($params);
    }

    public function getPost($id)
    {
        return $this->postRepo->find($id);
    }

    public function getUpdateDonAbility($id)
    {
        return $this->gate->check('update', $this->don($id));
    }
}
