@extends('layout')

@section('content')
<div class="container page">
	<div class="row">
		<div class="col-md-12">
			<div class="contact-list">
				@if(!$contacts->count())
					<p>No contacts yet.</p>
				@else
					@include('contacts._list')
				@endif
			</div>
			
			<!-- Button trigger modal -->
			<button type="button" class="btn btn-primary btn-form" data-toggle="remote-modal" data-url="{!! route('contacts.create') !!}" data-title="Add Contact" >
			 	Add Contact
			</button>
		</div>
	</div>
</div>
@stop