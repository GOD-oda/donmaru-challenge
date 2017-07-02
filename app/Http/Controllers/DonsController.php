<?php

namespace App\Http\Controllers;

use App\Services\PostService;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use App\Repositories\DonRepository;
use App\HTTP\Requests\PostStoreRequest;

class DonsController extends Controller
{
    protected $userRepo;
    protected $donRepo;
    protected $auth;

    public function __construct(UserRepository $userRepo, DonRepository $donRepo, Guard $auth, PostService $postService)
    {
        $this->userRepo = $userRepo;
        $this->donRepo = $donRepo;
        $this->auth = $auth;
        $this->postService = $postService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($user_id)
    {
        $select = <<<EOF
        select D.id, D.name as don_name, M.created_at, M.name as user_name, M.single_word as word, M.updated_at from dons D
        left join (
            select P.don_id, U.id, U.name, P.created_at, P.single_word, P.updated_at from posts P
            left join users U
            on P.user_id = U.id
            where user_id = ?
        ) M
        on M.don_id = D.id
        order by D.id
EOF;
        $all_don = \DB::select($select, [$user_id]);

        $user = $this->userRepo->getUser($user_id);
        $logined_user = $this->userRepo->getLoginedUser();

        return view('dons.index', compact('all_don', 'user', 'logined_user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $all = $this->donRepo->getAll();
        $dons = $all->map(function ($item) {
            return [
                $item->name,
            ];
        })->flatten();

        return view('dons.create', compact('dons'));
    }

    /**
     * Store a newly created resource in storage.
     * @param PostStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostStoreRequest $request)
    {
        $credentials = $request->only('don_id', 'single_word');
        $credentials['don_id']++;
        $credentials['user_id'] = $this->userRepo->getLoginedUser()->id;
        $this->postService->save($credentials);

        return redirect('user/'.$credentials['user_id'].'/don');
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