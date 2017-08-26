<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use App\Repositories\UserRepository;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    protected $userRepo;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(UserRepository $userRepo)
    {
        $this->middleware('guest')->except('logout');
        $this->userRepo = $userRepo;
    }

    public function redirectToProvider($provider_name)
    {
        return Socialite::driver($provider_name)->redirect();
    }

    public function handleProviderCallback($provider_name)
    {
        try {
            $provider_user = Socialite::driver($provider_name)->user();
            $attributes = [
                'provider_id' => $provider_user->getId(), 'provider_name' => $provider_name,
            ];
            $additional_values = [
                'name' => $provider_user->getName(),
            ];
            $user = $this->userRepo->save($attributes, $additional_values);
            $this->userRepo->setUser($user);

            return redirect("/user/{$user->id}/don");
        } catch (\Exception $e) {
            return redirect('/');
        }
    }
}
