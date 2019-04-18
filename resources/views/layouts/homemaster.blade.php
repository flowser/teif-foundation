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
    <!-- COMMON TAGS -->
    <meta charset="utf-8">
    <title>{{$organisation->name}}</title>
    <meta name="csrf-token" content="{{csrf_token()}}" />


    <!-- Search Engine -->
    {{-- <meta name="description" content="{{$organisation->about->who_we_are}}">
    <meta name="image" content="{{asset('assets/organisation/img/website/frontimage')}}/{{$organisation->about->front_image}}"> --}}

    <!-- Schema.org for Google -->


    <!-- Twitter -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="{{$organisation->name}}">
    <meta name="twitter:description" content="{{$organisation->about->who_we_are}}">
    <meta name="twitter:site" content="@TeifFoundation">
    <meta name="twitter:creator" content="@TeifFoundation">
    <meta name="twitter:image:src" content="{{asset('assets/organisation/img/website/frontimage')}}/{{$organisation->about->front_image}}">
    <!-- Open Graph general (Facebook, Pinterest & Google+) -->

    <meta property="og:url"         content="{{url('')}}" />
    <meta property="og:type"        content="website" />
    <meta property="og:title"       content="{{$organisation->name}}" />
    <meta property="og:description" content="{{$organisation->about->who_we_are}}" />
    <meta property="og:image" content="{{asset('assets/organisation/img/logo')}}/{{$organisation->logo}}" />
    <meta property="og:image:type"  content="image/jpeg" />
    <meta property="og:image:width" content="50" />
    <meta property="og:image:height"content="20" />
    <meta property="fb:app_id"      content="828111440888989" />
    {{-- <meta property="fb:pages" content="{PAGE_ID}">
    <meta property="ia:markup_url" content="{URL}"> --}}

    {{-- teif pixel tracking facebook --}}

    <!-- Facebook Pixel Code -->
        <script>
            !function(f,b,e,v,n,t,s)
            {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
            n.callMethod.apply(n,arguments):n.queue.push(arguments)};
            if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
            n.queue=[];t=b.createElement(e);t.async=!0;
            t.src=v;s=b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t,s)}(window, document,'script',
            'https://connect.facebook.net/en_US/fbevents.js');
            fbq('init', '306290463376372');
            fbq('track', 'PageView');
        </script>
        <noscript>
            <img height="1" width="1" style="display:none"
            src="https://www.facebook.com/tr?id=306290463376372&ev=PageView&noscript=1"/>
        </noscript>
    <!-- End Facebook Pixel Code -->


  </head>



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
        <div id="fb-root"></div>


        {{-- <div class="fb-share-button"
          data-href="{{url('')}}"
          data-layout="button_count">
        </div> --}}



        {{--  {{$organisation}},  --}}
      {{--  {{$organisation->about}}  --}}
      {{-- {{ Auth::user()->getReferrals()}} --}}
				{{-- {{ Auth::check() }} --}}
				{{--  {{$organisation}}
                llllll  --}}

    <frontend></frontend>

  </div>
</body>
<script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));
</script>

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
