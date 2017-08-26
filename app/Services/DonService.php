<?php
/**
 * Created by PhpStorm.
 * User: takahiro
 * Date: 2017/08/27
 * Time: 0:10
 */

namespace App\Services;

use App\Repositories\DonRepository;

class DonService
{
    protected $donRepo;

    public function __construct(DonRepository $donRepo)
    {
        $this->donRepo = $donRepo;
    }

    public function getByShop(int $shop_id)
    {

    }
}