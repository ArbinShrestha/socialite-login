<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

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

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectToGithub()
    {

        return Socialite::driver('github')->redirect();

    }

    public function handleGithubCallback()
    {
        $githubUser = Socialite::driver('github')->user();

        //add user to db
        $user = User::where('provider_id', $githubUser->getId())->first();
        if (!$user) {
            $user = User::create([
                'name' => $githubUser->getNickName(),
                'email' => $githubUser->getEmail(),
                'provider_id' => $githubUser->getId(),
                'provider' => 'github',
            ]);
        }

        Auth::login($user, true);

        return redirect($this->redirectTo);
    }

    public function redirectToGoogle()
    {

        return Socialite::driver('google')->redirect();

    }

    public function handleGoogleCallback()
    {
        $googleUser = Socialite::driver('google')->user();

        //add user to db
        $user = User::where('provider_id', $googleUser->getId())->first();
        if (!$user) {
            $user = User::create([
                'name' => $googleUser->getName(),
                'email' => $googleUser->getEmail(),
                'provider_id' => $googleUser->getId(),
                'provider' => 'google',
            ]);
        }

        Auth::login($user, true);

        return redirect($this->redirectTo);
    }

    public function redirectToFacebook()
    {

        return Socialite::driver('facebook')->redirect();

    }

    public function handleFacebookCallback()
    {
        $facebookUser = Socialite::driver('facebook')->user();

        //add user to db
        $user = User::where('provider_id', $facebookUser->getId())->first();
        if (!$user) {
            $user = User::create([
                'name' => $facebookUser->getName(),
                'email' => $facebookUser->getEmail(),
                'provider_id' => $facebookUser->getId(),
                'provider' => 'facebook',
            ]);
        }

        Auth::login($user, true);

        return redirect($this->redirectTo);
    }
}
