@extends('layout')

@section('content')
<div class="container page">
	<div class="row">
		<div class="col-md-6 col-md-push-3">
			<div class="login-panel">
				<h5 class="title">Login with your credentials</h5>
				{!! Form::Open(['route' => 'auth.login.attempt']) !!}
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
                	<button class="btn btn-primary btn-form" type="submit">Login</button>
	                <p class="social-login">Or signup with one of the following providers:</p>
	                <div class="social-buttons">	
	                	<a class="btn btn-block btn-social btn-facebook" href="{!! route('auth.provider', 'facebook') !!}">
						    <span class="fa fa-facebook"></span> Login with Facebook
						</a>
						<a class="btn btn-block btn-social btn-github" href="{!! route('auth.provider', 'github') !!}>
						    <span class="fa fa-github"></span> Login with Github
						</a>
					</div>
                </div>
                {!! Form::close() !!}
			</div>
		</div>
	</div>
</div>
@stop