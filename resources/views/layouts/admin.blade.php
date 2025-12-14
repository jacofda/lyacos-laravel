<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') - ADMIN </title>
    <link href="{{ asset('css/admin.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/override.css') }}" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">

        <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>

            <a class="navbar-brand" href="{{ url('/') }}">LYACOS</a>

            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="{{url('admin/books')}}">Books</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{url('admin/translations')}}">Translations</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{url('admin/publications')}}">Other Publications</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{url('admin/reviews')}}">Reviews</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{url('admin/excerpts')}}">Excerpts</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{url('admin/readings')}}">Readings</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{url('admin/media-appearances')}}">Media Appearances</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{url('admin/trilogy-media')}}">Trilogy Media</a></li>

                </ul>
                <ul class="navbar-nav float-right ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">{{ csrf_field() }}</form>
                    </li>
                </ul>

            </div>
        </div>
    </nav>

    <div class="jumbotron">
        <div class="container">
          <h1 class="display-5">@yield('title')</h1>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            @yield('content')
        </div>
    </div>


    <footer class="p-4 mt-5 text-center" style="background: #e9ecef"><small>admin dashboard</small></footer>

    <script src="{{ asset('js/admin.min.js') }}"></script>
    @yield('scripts')
    @include('elements.session')
</body>
</html>
