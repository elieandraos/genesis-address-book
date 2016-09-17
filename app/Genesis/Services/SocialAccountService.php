<?php
namespace App\Genesis\Services;

use App\Models\User;
use App\Models\SocialAccount;
use Laravel\Socialite\Contracts\User as ProviderUser;

class SocialAccountService
{
	/**
	 * Create and retrieve the user from the social provider fetched info.
	 * 
	 * @param ProviderUser $providerUser 
	 * @param type $provider_name 
	 * @return type
	 */
	public function findOrCreateSocialUser(ProviderUser $providerUser, $provider_name)
	{
		$account = SocialAccount::where('provider_name', '=', $provider_name)
            					->where('provider_id', '=', $providerUser->getId())
            					->first();

        //if the account is found, return the user.
        if($account)
			return $account->user;

		//if not found, create the social account.
		$account = new SocialAccount([
            'provider_id' => $providerUser->getId(),
            'provider_name' => $provider_name
		]);

		//maybe the user already exists from another provider.
		$user = User::where('email', '=', $providerUser->getEmail())->first();

		//if the user not found, create the user.
		if (!$user) 
		{
            $user = User::create([
                'email' => $providerUser->getEmail(),
                'name' => $providerUser->getName(),
            ]);
        }

        //add the account to the user
        $account->user()->associate($user);
        $account->save();

        //return the user object
        return $user;
	}
}

?>