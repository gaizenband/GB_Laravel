<?php


namespace App\Adaptors;

use App\Models\User;
use SocialiteProviders\Manager\OAuth2\User as UserOAuth;
use Laravel\Socialite\Two\User as TUser;

class UserAdaptor
{
    public function getUserBySocIdGB(TUser $user, $soc){
        return $this->makeUser($user,$soc);
    }

    public function getUserBySocId(UserOAuth $user, $soc) {
        return $this->makeUser($user,$soc);

    }

    private function makeUser($user,$soc){
        $userInSystem = User::query()
            ->where('id_in_soc', $user->id)
            ->where('type_auth', $soc)
            ->first();
        if (is_null($userInSystem)) {

            $userInSystem = new User();


            $userInSystem->fill([
                'name' => !empty($user->getNickname())? $user->getNickname(): '',
                'email' => !empty($user->getEmail())? $user->getEmail(): $user->getNickname(),
                'password' => '',
                'id_in_soc' => !empty($user->getId())? $user->getId(): '',
                'type_auth' => $soc,
                'email_verified_at' => now(),
                'avatar' => !empty($user->getAvatar())? $user->getAvatar(): ''
            ]);

            $userInSystem->save();
        }



        return $userInSystem;
    }

}
