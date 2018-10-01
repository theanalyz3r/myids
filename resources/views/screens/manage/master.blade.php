<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" style="height: 100%;">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="csrf-token" content="{{ csrf_token() }}">
<title>IDS - @yield('title')</title>
	<title>IDS - @yield('title')</title>

		@yield('scripts1')

	<link rel="stylesheet" href="/css/app.css">
	<link rel="stylesheet" href="/css/datetime/datetimepicker.css">
</head>
	<body class="manage" style="position: relative; min-height: 100%; top: 0px;">

	@if(Auth::check())
	{{-- TOP NAVIGATION --}}
		@include('screens.manage.partials.topnav')
	{{-- CONTENT SECTION --}}
	@endif

	<div id="app">
			<div class="container">

					@yield('content')

				<flash message="{{ session('flash') }}"></flash>

			</div>
	</div>
	
	@if(Auth::check())
	{{-- FOOTER SECTION --}}
		@include('screens.manage.partials.footer')

	@endif

	<script src="/js/app.js"></script>
	<script src="/js/screens/manage/settings/jquery.js"></script>
	<script type="text/javascript" charset="UTF-8" src="/js/screens/manage/main.js"></script>
	<script type="text/javascript" charset="UTF-8" src="/js/screens/manage/element_main.js"></script>

	<script type="text/javascript" src="/js/datetime/datetimejquery.min.js"></script>
	<script src="/js/datetime/datetimemoment.js"></script>
	<script src="/js/datetime/bootstrap-datetimepicker.js"></script>

	<script src="{{ asset('js/socket.io.min.js') }}"></script>
	</body>
</html>