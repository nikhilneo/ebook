<!doctype html>
<html class="no-js" lang="zxx">
<head>
	@include('partials._head')
</head>
<body>
	<div class="wrapper" id="wrapper">
		@include('partials._nav')

		@yield('content')
		
		@include('partials._foot')
		
		@yield('scripts')
</body>
</html>