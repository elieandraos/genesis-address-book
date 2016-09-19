{!! Form::Open(['route' => 'contacts.store', 'data-remote' => true, 'data-callback' => 'displaySuccessMessage']) !!}
	@include('contacts._form')
{!! Form::Close() !!}

@include('contacts._field_skeleton')