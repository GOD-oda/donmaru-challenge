<?php

namespace App\Repositories;

use App\DataAccess\Eloquent\Don;

class DonRepository
{
    protected $don;

    public function __construct(Don $don)
    {
        $this->don = $don;
    }

    public function getAll()
    {
        return $this->don->all();
    }
}