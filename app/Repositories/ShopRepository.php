<?php
/**
 * Created by PhpStorm.
 * User: takahiro
 * Date: 2017/08/27
 * Time: 0:19
 */

namespace App\Repositories;

use App\DataAccess\Eloquent\Shop;

class ShopRepository
{
    protected $shop;

    public function __construct(Shop $shop)
    {
        $this->shop = $shop;
    }

    public function getAll()
    {
        return $this->shop->all();
    }

    public function findById(int $shop_id)
    {
        return $this->shop->find($shop_id);
    }
}