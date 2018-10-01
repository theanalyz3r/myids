<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" style="height: 100%;">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="csrf-token" content="{{ csrf_token() }}">
		
		<title>IDS Client - @yield('title')</title>

		<link rel="stylesheet" href="/css/app.css">
	</head>
	
	<body class="node bg-black">
		<div id="app">
			<div id="app-node">

				@yield('content')

			</div>
		</div>

		<script src="/js/app.js"></script>
		<script src="{{ asset('js/socket.io.min.js') }}"></script>
	</body>
</html>