<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Genesis\Repositories\UserRepositoryInterface;

class RegisterController extends Controller
{
    protected $userRepos;

    /**
     * Inject the user repos in the controller to make the controller independant from the model.
     * 
     * @param UserRepositoryInterface $userRepos 
     * @return type
     */
    public function __construct(UserRepositoryInterface $userRepos)
    {
        $this->userRepos = $userRepos;
    }

	/**
	 * Display the registration form.
	 * 
	 * @return type
	 */
    public function index()
    {
    	return view('guest.register');
    }

 
    /**
     * Save the user in the database
     * 
     * @param RegisterRequest $request 
     * @return type
     */
    public function store(RegisterRequest $request)
    {
        $input = $request->only(['email', 'password', 'name']);
        $user = $this->userRepos->create($input);
        
        auth()->login($user);
        return redirect('/');
    }
}
