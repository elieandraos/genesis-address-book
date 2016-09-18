<!DOCTYPE html>
<html>
<head>
	<title>Genesis Address Book</title>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Miriam+Libre:100,200,300,400,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,200,300,400,700">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css" />
    <link rel="stylesheet" tyype="text/css" href="/styles.css" />

    <!-- Stylesheets -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-social/5.0.0/bootstrap-social.min.css" />
</head>
<body>
	<header class="top-nav navbar navbar-static-top">
		<div class="container">
			<nav class="collapse navbar-collapse">
				<ul class="nav navbar-nav">
					<li><a href="/" class="logo">Genesis Address Book</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					@if(!Auth::check())
						<li><a href="{!! route('auth.login') !!}" class="animated">Login</a></li>
						<li><a href="{!! route('auth.register') !!}" class="animated">Register</a></li>
					@else
						<li><a href="javascript:void(0)">{!! Auth::user()->name !!}</a></li>
						<li><a href="{!! route('auth.logout') !!}" class="animated">Logout</a></li>
					@endif
				</ul>
			</nav>
		</div>
	</header>

	@yield('content')
	
	<!-- Emmpty modal initialized -->
	<div id="bootstrap-modal" class="modal fade" aria-hidden="true">
		<div class="modal-dialog" role="document">
		    <div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h4 class="modal-title" id="modal-title"></h4>
				</div>
				<div class="modal-body">
					
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default btn-form" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>

	<div class="footer">
		<div class="container">
			<div class="col-md-12">
				<h6>Contributors</h6> 
				<a href="http://github.com/elieandraos/" target="_blank">@elieandraos</a> - 
				<a href="https://github.com/GenesisDigital/" target="_blank">@GenesisDigital</a>
			</div>
		</div>
	</div>

	<!-- scripts -->
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js" ></script>
	<script type="text/javascript" src="/app.remoteModals.js" ></script>
	<script type="text/javascript" src="/app.main.js" ></script>
</body>
</html>