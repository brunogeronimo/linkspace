<!DOCTYPE html>
<html>
<head>
	<title>ShareYourLink! @yield('title')</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="/css/app.css">
	<link rel="stylesheet" type="text/css" href="/css/website.css">
</head>
<body>
	<div class="container-fluid top">
		<h1>Share Your Link with the World!</h1>
	</div>
	<div class="container-fluid">
		@yield('content')
	</div>
	<footer class="centralized">
		<h4>Take a look at <a href="https://github.com/brunogeronimo/linkspace" target="_blank">GitHub</a></h4>
	</footer>
</body>
</html>