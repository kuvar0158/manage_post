<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--
Design by TEMPLATED
http://templated.co
Released for free under the Creative Commons Attribution License

Name       : SimpleWork 
Description: A two-column, fixed-width design with dark color scheme.
Version    : 1.0
Released   : 20140225

-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<!-- <meta  content="text/html; charset=utf-8" /> -->
<meta name="csrf-token" http-equiv="Content-Type" content="{{ csrf_token() }}">
<title></title>
<style type="text/css">
	.setwidth{
		margin: 0px 25px;
	}
	.help{
		color: red;
        font-size: 17px;
	}
	ul.show_list_icon {
        list-style-type: square;
	}
</style>
<meta name="keywords" content="" />
<meta name="description" content="" />
<!-- bootsrape link of css -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet" />
<link href="{{ url('css/default.css')}}" rel="stylesheet" type="text/css" media="all" />
<link href="{{ url('css/fonts.css')}}" rel="stylesheet" type="text/css" media="all" />
<!-- jquery librery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!--[if IE 6]><link href="default_ie6.css" rel="stylesheet" type="text/css" /><![endif]-->
<style type="text/css">
</style>
</head>
<body>
	
<div id="header-wrapper">
	<div id="header" class="container">
		<div id="logo">
			<h1><a href="#">Manage Post</a></h1>
		</div>
		<div id="menu">
			<ul>
				<li class="current_page_item home"><a href="{{ url('/')}}" accesskey="1" title="">Homepage</a></li>

				@if (Route::has('login'))
                    @auth
                      <li id="home"><a href="{{ url('/home') }}">Dashboard</a></li>
                      <a href="{{ url('logout') }}">Logout</a>
                      <li id="logout">
                      <a class="dropdown-item" href="{{ route('logout') }}"
                      onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                     </a>
  
                     <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    </li>
                    @else
                       <li id="login"><a href="{{ route('login') }}">Login</a></li>

                        @if (Route::has('register'))
                            <li id="register"><a href="{{ route('register') }}">Register</a></li>
                        @endif
                    @endauth
               @endif
				<!-- <li id="clients"><a href="{{ url('add-post')}}" accesskey="2" title="">Add Post</a></li>
				<li id="about"><a href="{{ url('add-tags')}}" accesskey="3" title="">Add Tags</a></li> -->
				<!-- <li id="careers"><a href="{{ url('careers')}}" accesskey="4" title="">Careers</a></li> -->
			</ul>
		</div>
	</div>
</div>
@yield('content')

<div id="copyright" class="container">
	<p>&copy; Untitled. All rights reserved. | Photos by <a href="http://fotogrph.com/">Fotogrph</a> | Design by <a href="http://templated.co" rel="nofollow">TEMPLATED</a>.</p>
</div>
</body>
</html>
<script src="{{ url('js/script.js')}}"></script>
<!-- bootstrape link of js Latest compiled JavaScript-->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
