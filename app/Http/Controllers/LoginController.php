<?php

namespace App\Http\Controllers;

use Auth;
use Event;
use Socialite;
use App\Models\User;
use App\Http\Requests;
use App\Events\UserLoggedIn;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use App\Genesis\Services\SocialAccountService;

class LoginController extends Controller
{
	protected $allowedPoviders;

	public function __construct()
	{
		$this->allowedPoviders = ['facebook', 'github'];
	}

    /**
     * Displays the login page.
     * 
     * @return type
     */
    public function index()
    {
        return view('guest.login');
    }

    /**
     * Authenticate the user with email/password.
     * 
     * @param LoginRequest $request 
     * @return type
     */
    public function authenticate(LoginRequest $request)
    {
        $input = $request->only(['email', 'password']);

        if (Auth::attempt(['email' => $input['email'], 'password' => $input['password']]))
        {   
            Event::fire(new UserLoggedIn(Auth::user()));
            return redirect('/home');
        }
        else
        {
            return redirect( route('auth.login'));
        }
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

        Auth::login($user);
        Event::fire(new UserLoggedIn(Auth::user()));
        return redirect('/home');
    }

    /**
     * Logout the user.
     * 
     * @return type
     */
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
