<?php

namespace App\Http\Controllers;

use App\DataAccess\Eloquent\User;
use App\Services\PostService;
use App\Services\ShopService;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use App\Http\Requests\PostStoreRequest;

class DonsController extends Controller
{
    protected $userRepo;
    protected $auth;
    protected $postService;
    protected $shopService;

    public function __construct(
        UserRepository $userRepo,
        Guard $auth,
        PostService $postService,
        ShopService $shopService
    ) {
        $this->userRepo = $userRepo;
        $this->auth = $auth;
        $this->postService = $postService;
        $this->shopService = $shopService;
    }

    /**
     * Display a listing of the resource.
     * @param User $user
     * @param int $shop_id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(User $user, int $shop_id)
    {
        $all_don = $this->postService->getDonRecordByUser($user->id, $shop_id);

        return view('dons.index', compact('all_don'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // TODO: 今は店舗が一つしかないからハードコードしてる
        $dons = $this->postService->getDonsByShop(1);
        $shops = $this->shopService->getAllForSelect();

        return view('dons.create', compact('dons', 'shops'));
    }

    /**
     * Store a newly created resource in storage.
     * @param PostStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostStoreRequest $request)
    {
        $credentials = $request->only('don_id', 'single_word', 'shop_id');
        $credentials['user_id'] = $this->userRepo->getLoginedUser()->id;
        $this->postService->save($credentials);

        return redirect('user/'.$credentials['user_id'].'/shop/'.$credentials['shop_id'].'/don');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     git * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
