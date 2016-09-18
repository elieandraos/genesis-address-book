@extends('layout')

@section('content')
<div class="container page">
	<div class="row">
		<div class="col-md-12">
			<!-- Button trigger modal -->
			<button type="button" class="btn btn-primary btn-form" data-toggle="remote-modal" data-url="{!! route('contacts.create') !!}" data-title="Add Contact" >
			 	Add Contact
			</button>
		</div>
	</div>
</div>
@stop