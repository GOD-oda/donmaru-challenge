<?php

namespace App\Services;

use App\Repositories\DonRepository;
use App\Repositories\PostRepository;
use App\Repositories\ShopRepository;
use Illuminate\Contracts\Auth\Access\Gate;

class PostService
{
    protected $donRepo;
    protected $postRepo;
    protected $gate;
    protected $shopRepo;

    public function __construct(
        DonRepository $donRepo,
        PostRepository $postRepo,
        Gate $gate,
        ShopRepository $shopRepo
    ) {
        $this->donRepo = $donRepo;
        $this->postRepo = $postRepo;
        $this->gate = $gate;
        $this->shopRepo = $shopRepo;
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

    public function getDonRecordByUser(int $user_id, int $shop_id)
    {
        $select = <<<EOF
        select D.id, D.name as don_name, M.created_at, M.name as user_name, M.single_word as word, M.updated_at from dons D
        left join (
            select P.don_id, U.id, U.name, P.created_at, P.single_word, P.updated_at from posts P
            left join users U
            on P.user_id = U.id
            where user_id = ?
            and shop_id = ?
        ) M
        on M.don_id = D.id
        order by D.id
EOF;
        $all_don = \DB::select($select, [$user_id, $shop_id]);

        return $all_don;
    }
    
    public function findById($id)
    {
        return $this->postRepo->findById($id);
    }

    public function getUpdateDonAbility($id)
    {
        return $this->gate->check('update', $this->don($id));
    }

    public function getDonsByShop(int $shop_id)
    {
        $dons = [];
        foreach ($this->shopRepo->findById($shop_id)->dons as $don) {
            $dons[$don->id] = $don->name;
        }

        return $dons;
    }
}
