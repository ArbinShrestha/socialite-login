<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class SocialAuthController extends Controller
{
    public function redirectToGithub()
    {

        return Socialite::driver('github')->redirect();

    }
    public function handleGithubCallback()
    {

    }
}
