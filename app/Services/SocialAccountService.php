<?php

namespace App\Services;

use Laravel\Socialite\Contracts\User as ProviderUser;
use App\Models\User;

class SocialAccountService
{
    public static function createOrGetUser(ProviderUser $providerUser, $social)
    {
        $account = User::whereProvider($social)->whereProviderUserId($providerUser->getId())->first();

        if ($account) {

            return $account->user;
        } else {
            $email = $providerUser->getEmail() ?? $providerUser->getNickname();
            $user = User::whereEmail($email)->first();

            if(!$user) {
                $user = User::create([
                    'email' => $email,
                    'full_name' => $providerUser->getName(),
                    'password' => bcrypt(str_random(8)),
                    'avatar' => $providerUser->getAvatar(),
                    'provider_user_id' => $providerUser->getId(),
                    'provider' => $social,
                    'role_id' => config('setting.role_user'),
                ]);
            }

            return $user;
        }
    }
}
