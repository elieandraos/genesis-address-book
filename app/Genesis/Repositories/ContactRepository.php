<?php 
namespace App\Genesis\Repositories;

use App\Models\User;
use App\Models\Contact;

class ContactRepository extends DbRepository implements ContactRepositoryInterface
{
	/**
	 * Create the contact.
	 * 
	 * @param type $input 
	 * @return type
	 */
	public function create($input, User $user)
	{
		if(!$user)
			abort(500);
		
		$input['user_id'] = $user->id;		
		return Contact::create($input);
	}

	/**
	 * Update the contact.
	 * 
	 * @param type $input 
	 * @param Contact $contact 
	 * @return type
	 */
	public function update($input, Contact $contact)
	{
		return $contact->update($input);
	}
}

?>