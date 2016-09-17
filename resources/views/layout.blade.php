<!DOCTYPE html>
<html>
<head>
	<title>Gensis Address Book</title>
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
</head>
<body>
	<header class="top-nav navbar navbar-static-top">
		<div class="container">
			<nav class="collapse navbar-collapse">
				<ul class="nav navbar-nav">
					<li><a href="javascript:void(0)" class="logo">Genesis Address Book</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="#" class="animated">Login</a></li>
				</ul>
			</nav>
		</div>
	</header>

	@yield('content')

	<div class="footer">
		<div class="container">
			<div class="col-md-12">
				<h6>Contributors</h6> 
				<a href="http://github.com/elieandraos/" target="_blank">@Elie</a> - 
				<a href="https://github.com/GenesisDigital/" target="_blank">@GenesisDigital</a>
			</div>
		</div>
	</div>

	<!-- scripts -->
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js" />
</body>
</html>