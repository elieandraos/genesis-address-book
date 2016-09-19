<table class="table table-hover">
	<tr>
		<th colspan="2" style="border-top: 0;">Info</th>
	</tr>
	<tr>
		<td>Name</td>
		<td>{!! $contact->name !!}</td>
	</tr>
	<tr>
		<td>Phone</td>
		<td>{!! $contact->phone !!}</td>
	</tr>
	<tr>
		<td>Email</td>
		<td>{!! $contact->email !!}</td>
	</tr>		
</table>


@if($contact->fields->count())
	<h5 class='modal-subtitle'>Custom Fields</h5>
	<ol>
	@foreach($contact->fields as $field)
		<li>{!! $field->value !!}</li>
	@endforeach
	</ol>
@endif

<button type="button" class="btn btn-primary btn-form" data-toggle="remote-modal" data-url="{!! route('contacts.edit', $contact->id) !!}" data-title="Edit Contact" data-callback="checkNbFields" >
 	Edit
</button>
