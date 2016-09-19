<?php 
namespace App\Genesis\Repositories;

use App\Models\User;
use App\Models\Contact;
use App\Models\ContactField;

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
		$contact = Contact::create($input);
		$this->addFields($input, $contact);
		
		return $contact;
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
		$contact->update($input);
		$this->addFields($input, $contact, true);
		return $contact;
	}

	/**
	 * Associate/sync fields with contact object.
	 * 
	 * @param type $input 
	 * @param Contact $contact 
	 * @return type
	 */
	protected function addFields($input, Contact $contact, $removeExisting = false)
	{
		if($removeExisting)
			$contact->fields()->delete();

		if(isset($input['fields']) && count($input['fields']))
		{
			$fields = $input['fields'];
			$bulk = [];
			//contsruct one array of objects to do one save.
	        array_walk($fields, function($val, $key) use (&$bulk) {
	            array_push($bulk, new ContactField(["value" => $val]));
	        });
	        $contact->fields()->saveMany($bulk);
		}
	}
}

?>