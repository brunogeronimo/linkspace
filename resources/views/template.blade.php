<!DOCTYPE html>
<html>
<head>
	<title>ShareYourLink! @yield('title')</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="/css/app.css">
	<link rel="stylesheet" type="text/css" href="/css/website.css">
</head>
<body>
	<div class="container-fluid top centralized">
		<h1>LinkSpace</h1>
		<h3>Your link shared with the world!</h3>
	</div>
	<div class="container-fluid">
		@yield('content')
	</div>
	<footer class="centralized">
		<div><h4>Source-code available on <a href="https://github.com/brunogeronimo/linkspace" target="_blank">GitHub</a></h4></div>
		<div><h4><a href="mailto:hi@bruno.works">hi@bruno.works</a></h4></div>
	</footer>
</body>
</html>