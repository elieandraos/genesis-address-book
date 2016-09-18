<?php 
namespace App\Genesis\Repositories;

use App\Models\User;
use App\Models\Contact;

Interface ContactRepositoryInterface
{
	//define the class contracts.
	public function create($input, User $user);
	public function update($input, Contact $contact);
}

?>