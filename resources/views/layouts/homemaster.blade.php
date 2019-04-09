<!DOCTYPE html>
<!--[if lt IE 7 ]> <html class="ie6"> <![endif]-->
<!--[if IE 7 ]>    <html class="ie7"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie8"> <![endif]-->
<!--[if IE 9 ]>    <html class="ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html class=""><!--<![endif]-->
<head>
	<meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{csrf_token()}}" />
	<title>Teif Foundation - @yield('title')</title>
	{{--  <title>Home -Knowledge</title>  --}}
	<!-- Standard Favicon -->
	<link rel="icon" type="image/x-icon" href="{{asset('assets/organisation/img/logo')}}/{{$organisation->logo}}"/>

	<!-- For iPhone 4 Retina display: -->
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{asset('main_theme/images/apple-touch-icon-114x114-precomposed.png')}}">
	<!-- For iPad: -->
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{asset('main_theme/images/apple-touch-icon-72x72-precomposed.png')}}">
	<!-- For iPhone: -->
	<link rel="apple-touch-icon-precomposed" href="{{asset('main_theme/images/apple-touch-icon-57x57-precomposed.png')}}">

	<!-- Library - Bootstrap v3.3.5 -->
    <link rel="stylesheet" type="text/css" href="{{asset('main_theme/libraries/lib.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('main_theme/libraries/Stroke-Gap-Icon/stroke-gap-icon.css')}}">

	<!-- Fonts -->
	<link href='https://fonts.googleapis.com/css?family=Roboto:400,900,300,300italic,500,700' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,700' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Niconne' rel='stylesheet' type='text/css'>


	<!-- Custom - Common CSS -->
	<link rel="stylesheet" type="text/css" href="{{asset('main_theme/css/plugins.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('main_theme/css/navigation-menu.css')}}">

	<!-- Custom - Theme CSS -->
	<link rel="stylesheet" type="text/css" href="{{asset('main_theme/style.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('main_theme/css/shortcode.css')}}">
	{{--  <link rel="stylesheet" type="text/css" href="{{asset("css/app.css")}}">  --}}

	<!--[if lt IE 9]>
		<script src="{{asset('main_theme/js/html5/respond.min.js')}}"></script>
    <![endif]-->

</head>

<body data-offset="200" data-spy="scroll" data-target=".ow-navigation">
  <div id="app">
      {{-- {{ Auth::user()->getReferrals()}} --}}
				{{-- {{ Auth::check() }} --}}
				{{--  {{$organisation}}
				llllll  --}}
    <home-main ></home-main>
    emamba
  </div>
</body>

@if(Auth::check())
   <script>
           window.logged_user = {!! json_encode($logged_user); !!}
  </script>
@endif

  <script type="text/javascript">
    var APP_URL = {!! json_encode(url('')) !!}
    </script>

    <script>
        @auth
            window.Roles = {!! json_encode(Auth::user()->allRoles, true) !!};
            window.Permissions = {!! json_encode(Auth::user()->allPermissions, true) !!};
        @else
            window.Roles = [];
            window.Permissions = [];
        @endauth
    </script>

<script src="{{asset("js/app.js")}}"></script>
<!-- JQuery v1.11.3 -->
<script src="{{asset('main_theme/js/jquery.min.js')}}"></script>
<!--script src="{{asset('main_theme/js/jquery.knob.js')}}"></script-->

<!-- Library - Js -->
<script src="{{asset('main_theme/libraries/lib.js')}}"></script><!-- Bootstrap JS File v3.3.5 -->
<!-- Library - Google Map API -->
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>

<!-- Library - Theme JS -->
<script src="{{asset('main_theme/js/functions.js')}}"></script>
</html>
