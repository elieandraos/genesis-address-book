<?php

namespace App\Http\Controllers;

use Auth;
use Response;
use App\Http\Requests;
use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Genesis\Repositories\ContactRepositoryInterface;

class ContactsController extends Controller
{
	protected $user, $contactRepos;

	/**
	 * Constructor.
	 * 
	 * @return type
	 */
	public function __construct(ContactRepositoryInterface $contactRepos)
	{
		$this->user = Auth::user();
		$this->contactRepos = $contactRepos;
	}

	/**
	 * List the contacts.
	 * 
	 * @return type
	 */
    public function index()
    {
    	$contacts = $this->user->contacts()->orderBy('created_at', 'DESC')->get();
    	return view('contacts.index', ['contacts' => $contacts]);
    }

    /**
     * Create a contact.
     * 
     * @return type
     */
    public function create()
    {
    	return view('contacts.create');
    }

    /**
     * Store the contact in the database.
     * 
     * @param ContactRequest $request 
     * @return type
     */
    public function store(ContactRequest $request)
    {
    	$this->contactRepos->create($request->all(), $this->user);
    	return Response::json(['status' => 200, 'message' => 'Contact saved.']);
    }

    /**
     * Edit the contact.
     * 
     * @param Contact $contact 
     * @return type
     */
    public function edit(Contact $contact)
    {
    	return view('contacts.edit', ['contact' => $contact]);
    }

    /**
     * Update the contact in the database.
     * 
     * @param ContactRequest $request 
     * @param Contact $contact 
     * @return type
     */
    public function update(ContactRequest $request, Contact $contact)
    {
    	$this->contactRepos->update($request->all(), $contact);
    	return Response::json(['status' => 200, 'message' => 'Contact updated.']);
    }

    /**
     * Reload the table of contacts
     * 
     * @return type
     */
    public function reload()
    {
    	$contacts = $this->user->contacts()->orderBy('created_at', 'DESC')->get();
    	return view('contacts._list', ['contacts' => $contacts]);
    }

    /**
     * Delete the contact.
     * 
     * @param Contact $contact 
     * @return type
     */
    public function destroy(Contact $contact)
    {
    	$contact->delete();
		return Response::json(['status' => 200, 'message' => 'Contact deleted.']);    
	}

    /**
     * Search (my) contacts by name, email and phone.
     * 
     * @param Request $request 
     * @return type
     */
    public function search(Request $request)
    {
        $input = $request->only('q');
        $q = $input['q'];

        $data = $this->user->load(['contacts' => function ($query) use ($q) {
            $query->where('name', 'like', '%'.$q.'%')                       
                ->orWhere('email', 'like', '%'.$q.'%')
                ->orWhere('phone', 'like', '%'.$q.'%');
        }]);

        return Response::json($data->contacts);
    }
}
