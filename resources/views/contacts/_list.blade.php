<table class="table table-hover">
	<tr class="thead">
		<th>Name</th>
		<th>Phone</th>
		<th>Email</th>
		<th>Actions</th>
	</tr>
	@foreach($contacts as $contact)
		<tr>
			<td>{!! $contact->name !!}</td>
			<td>{!! $contact->phone !!}</td>
			<td>{!! $contact->email !!}</td>
			<td>
				<button type="button" class="btn btn-primary btn-xs" data-toggle="remote-modal" data-url="{!! route('contacts.edit', $contact->id) !!}" data-title="Edit Contact" data-callback="checkNbFields" >
				 	Edit
				</button>

				<button type="button" class="btn btn-primary btn-xs" data-toggle="remote-modal" data-url="{!! route('contacts.show', $contact->id) !!}" data-title="Contact Details" >
				 	Details
				</button>

				{!! Form::open(['route' => ['contacts.delete', $contact->id] , 'data-remote' => 'true', 'data-callback' => 'removeRow']) !!}
			        <button class="btn btn-danger btn-xs" type="submit">
			        	Remove
			        </button>
		        {!! Form::close() !!}

			</td>
		</tr>
	@endforeach
</table>