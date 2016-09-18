<?php

namespace App\Http\Controllers;

use Response;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;

class ContactsController extends Controller
{

    public function index()
    {
    	return view('contacts.index');
    }

    public function create()
    {
    	return view('contacts.create');
    }

    public function store(ContactRequest $request)
    {
    	//store the contact
    	return Response::json(['status' => 200, 'message' => 'Contact saved.']);
    }
}
