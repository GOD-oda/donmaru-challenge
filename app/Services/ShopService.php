<?php
/**
 * Created by PhpStorm.
 * User: takahiro
 * Date: 2017/08/27
 * Time: 0:12
 */

namespace App\Services;

use App\Repositories\ShopRepository;

class ShopService
{
    protected $shop;

    public function __construct(ShopRepository $shop)
    {
        $this->shop = $shop;
    }

    /**
     * セレクトタグ用の店舗の配列を生成する
     * @return array
     */
    public function getAllForSelect()
    {
        $shops = [];
        foreach ($this->shop->getAll() as $shop) {
            $shops[$shop->id] = $shop->name;
        }

        return $shops;
    }
}
