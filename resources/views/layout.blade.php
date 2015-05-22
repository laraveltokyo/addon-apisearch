<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8">
	<title>Laravel API Search</title>

	<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
	<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/grids-responsive-min.css">
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="{!! asset('assets/sidemenu.css') !!}">

<style>
	li.pure-menu-item {
		height: 2.5em;
	}

	.custom-restricted-width {
	    display: inline-block;
	}
</style>
</head>
<body>
<div id="layout">
	<!-- Menu toggle -->
	<a id="menu-link" class="menu-link" href="#menu">
		<!-- Hamburger icon -->
		<span></span>
	</a>

	<div id="menu">
@include('api-search::menu')
	</div>

	<div id="main">
        <div class="header">
@include('api-search::header')
        </div>
        <div class="content">
@yield('content')
        </div>
	</div>

</div>

	<script src="{!! asset('assets/sidemenu.js') !!}"></script>
</body>
</html>
