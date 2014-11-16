<!doctype html>
<html>
<head>
	@yield('title')

	{{ HTML::style('css/style.css') }}
	@yield('include')
	
		<script src="{{ URL::to_asset("js/jquery-2.1.1.min.js") }}"></script>
	<!-- Bootstrap core CSS -->
	<link href="{{ URL::to_asset("js/bootstrap-3.2.0-dist/css/bootstrap.min.css") }}" rel="stylesheet">
</head>

<body>
	<div id="main_content">	

		<div class="error">
			<h2>
				<?php  echo Session::get('error');  ?>
			</h2>
		</div>

		<div class="message">
			<h3>
				<?php  echo Session::get('message');  ?>
			</h3>
		</div>


		@yield('content')
	</div>

	<div id="footer">
	</div>
</body>
</html>
