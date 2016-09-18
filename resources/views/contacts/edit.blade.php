{!! Form::model($contact, ['route' => ['contacts.update', $contact->id], 'data-remote' => true, 'data-callback' => 'displaySuccessMessage']) !!}
	@include('contacts._form')
{!! Form::Close() !!}