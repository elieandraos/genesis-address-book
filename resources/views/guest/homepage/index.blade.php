@extends('layout')

@section('content')
	<div id="banner">
		<div id="caption">Easily manage your contacts.</div>
		<img src="/banner.jpg" />
	</div>

	<div class="container">
		<div class="row">
			<div class="col-md-4 features">
				<i class="fa fa-sign-in" aria-hidden="true"></i>
				<p>
					Fast signup.<br/>
				 	Connect with you facebook/github account or sign up via email. 
				</p>
			</div>	
			<div class="col-md-4 features">
				<i class="fa fa-user-plus" aria-hidden="true"></i>
				<p>
					Manage and your contacts in one place. 
				</p>
			</div>	
			<div class="col-md-4 features">
				<i class="fa fa-code-fork" aria-hidden="true"></i>
				<p>
					The source code is open source.<br/>
				 	fork our project on github @genesis. 
				</p>
			</div>	

			<div class="col-md-12 svg-holder">
				<div class="macbook">
					@include('guest.homepage.svg')
					<div class="mac-title">Easy User experience.<br/>All in one page - no need to refresh.</div>
				</div>
			</div>	
		</div>
	</div>
@stop