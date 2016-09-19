<div class="frm-row">
	{!! Form::label('name', 'Full Name') !!}
	{!! Form::text('name', old('name'), [ 'class' => $errors->has('name')?'invalid':''] ) !!}
</div>
<div class="frm-row">
	{!! Form::label('phone', 'Phone') !!}
	{!! Form::text('phone', old('phone'), [ 'class' => $errors->has('phone')?'invalid':''] ) !!}
</div>	
<div class="frm-row">
	{!! Form::label('email', 'Email Address') !!}
	{!! Form::text('email', old('email'), [ 'class' => $errors->has('email')?'invalid':''] ) !!}
</div>


<h5 class='modal-subtitle'>Custom Fields</h5>
<div id="custom-fields">
	@if(isset($contact) && $contact->fields->count())
		@foreach($contact->fields as $field)
			<div>
				{!! Form::text('fields[]', $field->value, [ 'placeholder' => 'Enter field value.'] ) !!}
				<i class="fa fa-minus-circle remove-field" aria-hidden="true"></i>
			</div>
		@endforeach
	@endif	
</div>


<a href="javascript:void(0)" id='add-fields'><i class="fa fa-plus-circle" aria-hidden="true"></i> add custom field</a>

<div class="frm-row">
	<button class="btn btn-primary btn-form" type="submit">Save</button>
</div>