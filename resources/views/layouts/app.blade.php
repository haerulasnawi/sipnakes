<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Styles -->
    <link href="assets/modules/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
    {{-- <img src="img/top-banner.png" alt="bottom-banner" class="top-img"> --}}
    <section id="nav-bar">
        <div id="fluid-nav" class=".container-fluid">
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="navbar-brand" href="#">SIPNAKES</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
                        aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-bars"></i>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavDropdown">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="#">Ruang Lingkup <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Petunjuk Penggunaan</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Bantuan</a>
                            </li>                                
                            @if (Route::has('login'))
                                @auth
                                <li class="nav-item">
                                    <a class="btn btn-primary" href="{{ url('/home') }}"> HOME </a>
                                </li>
                                <li class="nav-item">
                                    <a class="btn btn-warning" href="{{ url('/home') }}"" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();"> KELUAR </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                                @else
                                <li class="nav-item">
                                    <a class="btn btn-primary" href="{{ route('login') }}"> MASUK </a>
                                </li>                                                                                                        
                                @endauth                                
                            @endif                                                 
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </section>
    @yield('content')
</body>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
</script>
</html>
