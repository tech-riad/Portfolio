<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Portfolio</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap CSS -->
    <!-- <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700&display=swap" rel="stylesheet"> -->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&family=Roboto:wght@300;400;500;700&family=Tiro+Bangla:ital@0;1&display=swap" rel="stylesheet">

    <!-- CSS Libraries -->

    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('frontend/css/bootstrap.min.css')}}">
    <!-- Site CSS -->
    <link rel="stylesheet" href="{{asset('frontend/style.css')}}">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{asset('frontend/css/responsive.css')}}">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{asset('frontend/css/custom.css')}}">
	<script src="{{asset('frontend/js/modernizr.js')}}"></script> <!-- Modernizr -->




    @stack('css')
</head>

<body id="page-top" class="politics_version">
    {{-- Page Loader --}}
    <!-- LOADER -->
    {{-- <div id="preloader">
        <div id="main-ld">
			<div id="loader"></div>
		</div>
    </div><!-- end loader --> --}}
    <!-- END LOADER -->

    {{-- navbar section --}}



    {{-- Slider --}}

    {{-- main content --}}
    @include('frontend.layouts.nav')

    <div class="">

        @yield('content')

    </div>
    {{-- footer include --}}
    @include('frontend.layouts.footer')



    @stack('js')

    <script src="{{('frontend/js/all.js')}}"></script>
	<!-- Camera Slider -->
    <script src="{{('frontend/js/jquery.mobile.customized.min.js')}}"></script>
    <script src="{{('frontend/js/jquery.easing.1.3.js')}}"></script>
    <script src="{{('frontend/js/parallaxie.js')}}"></script>
    <script src="{{('frontend/js/headline.js')}}"></script>
	<!-- Contact form JavaScript -->
    <script src="{{('frontend/js/jqBootstrapValidation.js')}}"></script>
    <script src="{{('frontend/js/contact_me.js')}}"></script>
    <!-- ALL PLUGINS -->
    <script src="{{('frontend/js/custom.js')}}"></script>
    <script src="{{('frontend/js/jquery.vide.js')}}"></script>
    {{-- JS --}}

</body>

</html>
