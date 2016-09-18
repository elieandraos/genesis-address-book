<?php 
namespace App\Genesis\Repositories;

use App\Models\User;

class UserRepository extends DbRepository implements UserRepositoryInterface
{
	/**
	 * Create the user.
	 * 
	 * @param type $input 
	 * @return type
	 */
	public function create($input)
	{
		if(isset($input['password']))
			$input['password'] = bcrypt($input['password']);
		
		return User::create($input);
	}
}

?>