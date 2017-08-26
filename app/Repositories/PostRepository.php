<?php

namespace App\Repositories;

use App\DataAccess\Eloquent\Post;

class PostRepository
{
    protected $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    public function save(array $params)
    {
        $attributes = [];
        $attributes['id'] = (isset($params['id'])) ? $params['id'] : null;

        return $this->post->updateOrCreate($attributes, $params);
    }

    public function findById($id)
    {
        return $this->post->find($id);
    }
}