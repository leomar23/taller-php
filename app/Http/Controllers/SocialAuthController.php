<?php

namespace Taller\Http\Controllers;

use Illuminate\Http\Request;
use Taller\Http\Controllers\Controller;
use Taller\SocialAccountService;
use Socialite; // socialite namespace
use Taller\Role;

class SocialAuthController extends Controller
{
    // redirect function
    public function redirect($provider){
        return Socialite::driver($provider)->redirect();
    }
    // callback function
    public function callback(SocialAccountService $service, $provider){
        $user = $service->createOrGetUser(Socialite::driver($provider));
        $role = Role::query()->where('name', 'user')->first();
        $user->attachRole($role);
        auth()->login($user);
        return redirect()->to('/home');
}
