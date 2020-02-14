<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Services\SocialAccountService;
use Illuminate\Support\Facades\Log;
use Laravel\Socialite\Facades\Socialite;

class SocialAuthController extends Controller
{
    public function redirect($social)
    {
        return Socialite::driver($social)->redirect();
    }

    public function callback($social)
    {
        $user = SocialAccountService::createOrGetUser(Socialite::driver($social)->stateless()->user(), $social);
        auth()->login($user);
        return redirect()->to('/404shop/');
    }
}
