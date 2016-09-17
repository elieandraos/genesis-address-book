<?php

namespace App\Http\Controllers;

use Socialite;
use App\Models\User;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Genesis\Services\SocialAccountService;

class LoginController extends Controller
{
	protected $allowedPoviders;

	public function __construct()
	{
		$this->allowedPoviders = ['facebook', 'gihub'];
	}

	/**
	 * Redirect the user to the social provider.
	 * 
	 * @return type
	 */
    public function redirectToProvider($provider)
    {
    	if(!in_array($provider, $this->allowedPoviders))
    		abort(404);
    	
    	return Socialite::driver($provider)->redirect();
    }

    /**
     * Provider redirect callback to create or return existing user.
     * SocialAccountService Class injected to handle all the db stuff.
     * 
     * @param SocialAccountService $service 
     * @param type $provider 
     * @return type
     */
    public function handleProviderCallback(SocialAccountService $service, $provider)
    {
    	$socialUser =  Socialite::driver($provider)->user();
    	$user = $service->findOrCreateSocialUser($socialUser, $provider);

        auth()->login($user);
        return redirect('/');
        //return redirect()->to('/home');
    }
}
