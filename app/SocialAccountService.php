<?php
namespace Taller;
//use Laravel\Socialite\Contracts\User as ProviderUser;
use Laravel\Socialite\Contracts\Provider;
use Carbon\Carbon;

class SocialAccountService
{
    public function createOrGetUser(Provider $provider)
    {
        $providerUser = $provider->user();
        $providerName = class_basename($provider);

        $account = SocialAccount::whereProvider($providerName)
            ->whereProviderUserId($providerUser->getId())
            ->first();
        if ($account) {
            return $account->user;
        } else {
            $account = new SocialAccount([
                'provider_user_id' => $providerUser->getId(),
                'provider' => $providerName
            ]);
            $user = User::whereEmail($providerUser->getEmail())->first();
            if (!$user) {
                $user = User::create([
                    'email' => $providerUser->getEmail(),
                    'name' => $providerUser->getName(),
                    'last_name' => $providerUser->getLastName(),
                    'gender' => $providerUser->getGender(),
                    'birth_date' => Carbon::createFromFormat('MM/DD/YYYY', $providerUser->getLastName()),
                    'status_id' => 1,
                ]);
            }
            $account->user()->associate($user);
            $account->save();
            return $user;
        }
    }
}