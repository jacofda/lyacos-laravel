<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{asset('favicon.ico')}}" type="image/x-icon">
    <link rel="icon" href="{{asset('favicon.ico')}}" type="image/x-icon">
    @yield('meta')
    <link rel="dns-prefetch" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,800,700,600|Montserrat:400,500,600,700|Raleway:100,300,600,700,800" rel="stylesheet" type="text/css" />
    <link href="{{asset('css/min.css')}}" rel="stylesheet">
</head>
<body data-animation-icon="15">
    <div id="wrapper">
        <header id="header" class="header-fullwidth dark">
            <div id="header-wrap">
                <div class="container">
                    @include('elements.menu')
                </div>
            </div>
        </header>
        @yield('content')
        @include('elements.footer')
    </div>
    <a id="goToTop"><i class="fa fa-angle-up top-icon"></i><i class="fa fa-angle-up"></i></a>
    <script src="{{asset('js/min.js')}}"></script>
    @yield('scripts')
</body>
</html>
