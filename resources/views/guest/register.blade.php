@extends('layout')

@section('content')
<div class="container page">
	<div class="row">
		<div class="col-md-6 col-md-push-3">
			<div class="login-panel">
				<h5 class="title">Sign up</h5>
				{!! Form::Open(['route' => 'auth.register.store']) !!}
				<div class="frm-row">
					{!! Form::label('name', 'Full Name') !!}
					{!! Form::text('name', old('name'), [ 'class' => $errors->has('name')?'invalid':''] ) !!}
                    @if ($errors->has('name')) <span class='invalid-text'>{!! $errors->first('name') !!}</strong>@endif
				</div>				
				<div class="frm-row">
					{!! Form::label('email', 'Email Address') !!}
					{!! Form::text('email', old('email'), [ 'class' => $errors->has('email')?'invalid':''] ) !!}
                    @if ($errors->has('email')) <span class='invalid-text'>{!! $errors->first('email') !!}</strong>@endif
				</div>
				<div class="frm-row">
					{!! Form::label('password', 'Password') !!}
					{!! Form::password('password', null, [ 'class' => $errors->has('password')?'invalid':'', 'placeholder' => 'Password'] ) !!}
	                @if ($errors->has('password')) <span class='invalid-text'>{!! $errors->first('password') !!}</strong>@endif
                </div>
                <div class="frm-row">
		            {!! Form::label('password_confirmation', 'Confirm Password') !!}                
		            {!! Form::password('password_confirmation', null, [ 'class' => $errors->has('password_confirmation')?'invalid':''] ) !!}
		            @if ($errors->has('password_confirmation')) <span class='invalid-text'>{!! $errors->first('password_confirmation') !!}</strong>@endif
		        </div>
                <div class="frm-row">
                	<button class="btn btn-primary btn-form" type="submit">Sign up</button>
                </div>
                {!! Form::close() !!}
			</div>
		</div>
	</div>
</div>
@stop