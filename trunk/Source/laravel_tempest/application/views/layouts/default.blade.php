<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
	@yield('title')
	{{ HTML::style('css/style.css') }}

	
	<script src="{{ URL::to_asset("js/jquery-2.1.1.min.js") }}"></script>
	<script src="{{ URL::to_asset("js/highstock.js") }}"></script>

	<script src="{{ URL::to_asset("js/themes/gray.js") }}"></script>
	<script src="{{ URL::to_asset("js/mygraph.js") }}"></script>

	<script src="{{ URL::to_asset("js/GraphRoom.js") }}"></script>
	<script src="{{ URL::to_asset("js/GraphDeltas.js") }}"></script>

	<!-- Bootstrap core CSS -->
	<link href="{{ URL::to_asset("js/bootstrap-3.2.0-dist/css/bootstrap.min.css") }}" rel="stylesheet">

	
	<!-- Custom styles for this template -->
	<link href="{{ URL::to_asset("js/bootstrap-3.2.0-dist/css/grid.css") }}" rel="stylesheet">

	
	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	
	<!-- Google Charts JS -->
	<script type="text/javascript" src="https://www.google.com/jsapi?autoload={'modules':[{'name':'visualization','version':'1','packages':['corechart']}]}"></script>
	<script src="{{ URL::to_asset("js/header.js") }}"></script>	
	@yield('include')
	
</head>

<body>
	<div class="container">		
			<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
				<div class="container-fluid">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
						<ul class="nav nav-pills">
							<li class="" id="btnHome">{{HTML::link('home', 'Home', array('id' => 'linkHome'))}}</li>
							<li class="" id="btnRooms"><a href="#" id="linkRooms">Rooms</a></li>
							<li class="" id="btnDevices"><a href="#" id="linkDevices">Devices</a></li>
							<li class="" id="btnAdmin">{{HTML::link('details', 'Admin', array('id' => 'linkAdmin'))}}</li>
							<li class="" id="btnLogin">
								@if(Auth::user())
									{{HTML::link('logout', 'Logout', array('id' => 'linkLoginLogout'))}}
								@else
									{{HTML::link('login', 'Login', array('id' => 'linkLoginLogout'))}}
								@endif							
							</li>
						</ul>
					</div>


				</div><!-- /.container-fluid -->
			</nav>		
	</div> <!-- /container -->
	@if(Auth::user())
		@yield('content')
	@else
		<div id="loginImg">
			<span class="Centerer"></span>
			<img class="Centered" src="../img/login.jpg" />
		</div>
	@endif
	<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
	<script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>


	
</body>
</html>