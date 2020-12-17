<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>
        @yield('title') | AI.JOBS
    </title>

    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&amp;display=swap"
    rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="{{ asset('assets/css/mdb.min.css') }}" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="{{asset('assets/css/style.css') }}" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="{{asset('assets/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="{{asset('assets/css/elegant-icons.css') }}" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="{{asset('assets/css/nice-select.css') }}" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="{{asset('assets/css/jquery-ui.min.css') }}" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="{{asset('assets/css/owl.carousel.min.css') }}" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="{{asset('assets/css/slicknav.min.css') }}" rel="stylesheet">

</head>

<body>

    @include('layouts.inc.front-navbar')

    <main>
        @yield('content')
    </main>

    @include('layouts.inc.front-footer')


    <!-- SCRIPTS -->
    <!-- JQuery -->
    <script type="text/javascript" src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="{{ asset('assets/js/popper.min.js') }}"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="{{ asset('assets/js/jquery-3.3.1.min.js') }}"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="{{ asset('assets/js/jquery.nice-select.min.js') }}"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="{{ asset('assets/js/jquery-ui.min.js') }}"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="{{ asset('assets/js/jquery.slicknav.js') }}"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="{{ asset('assets/js/mixitup.min.js') }}"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="{{ asset('assets/js/main.js') }}"></script>

    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-23581568-13');

    </script>
</body>

</html>
