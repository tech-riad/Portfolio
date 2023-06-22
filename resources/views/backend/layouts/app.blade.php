<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Carrier Goal</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Fonts -->
    {{-- <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet"> --}}

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{asset('backend/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset('backend/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('backend/dist/css/adminlte.min.css')}}">
    @stack('css')
</head>

<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">




        {{-- navbar section --}}


        @include('backend.layouts.nav')
        {{-- Slider --}}
        @include('backend.layouts.sidebar')
        {{-- main content --}}

        <div class="wrapper">

            @yield('content')

        </div>
        {{-- footer include --}}
        @include('backend.layouts.footer')



        <!-- REQUIRED SCRIPTS -->
        <!-- jQuery -->
        <script src="{{asset('backend/plugins/jquery/jquery.min.js')}}"></script>
        <!-- Bootstrap -->
        <script src="{{asset('backend/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <!-- overlayScrollbars -->
        <script src="{{asset('backend/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
        <!-- AdminLTE App -->
        <script src="{{asset('backend/dist/js/adminlte.js')}}"></script>

        <!-- PAGE PLUGINS -->
        <!-- jQuery Mapael -->
        <script src="{{asset('backend/plugins/jquery-mousewheel/jquery.mousewheel.js')}}"></script>
        <script src="{{asset('backend/plugins/raphael/raphael.min.js')}}"></script>
        <script src="{{asset('backend/plugins/jquery-mapael/jquery.mapael.min.js')}}"></script>
        <script src="{{asset('backend/plugins/jquery-mapael/maps/usa_states.min.js')}}"></script>
        <!-- ChartJS -->
        <script src="{{asset('backend/plugins/chart.js/Chart.min.js')}}"></script>

        <!-- AdminLTE for demo purposes -->
        <script src="{{asset('backend/dist/js/demo.js')}}"></script>
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="{{asset('backend/dist/js/pages/dashboard2.js')}}"></script>



        @stack('js')





    {{-- JS --}}

</body>

</html>
