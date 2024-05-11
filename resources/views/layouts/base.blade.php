<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @yield('styles')
</head>
<body>
    <div class="wrapper">
        <aside id="sidebar" class="expand">
            <div class="d-flex">
                <button class="toggle-btn" type="button">
                    <i class="fa-solid fa-bars"></i>
                </button>
                <div class="sidebar-logo m-auto">
                    <a href="{{ route('home') }}"><img src="{{ asset('img/logo.png') }}" alt="" width="190"></a>
                </div>
            </div>
            <ul class="sidebar-nav">
                <li class="sidebar-item">
                    <a href="{{ route('home') }}" class="sidebar-link">
                        <i class="fa-solid fa-house"></i>
                        <span>Home</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                        data-bs-target="#persediaan" aria-expanded="false" aria-controls="persediaan">
                        <i class="fa-solid fa-warehouse"></i>
                        <span>Persediaan</span>
                    </a>
                    <ul id="persediaan" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="{{ route('persediaan') }}" class="sidebar-link">Form Persediaan</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('historyPersediaan') }}" class="sidebar-link">Riwayat Persediaan</a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a href="{{ route('mutu') }}" class="sidebar-link">
                        <i class="fa-solid fa-vial"></i>
                        <span>Penurunan Mutu</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                        data-bs-target="#kinerja" aria-expanded="false" aria-controls="kinerja">
                        <i class="fa-solid fa-chart-line"></i>
                        <span>Kinerja Rantai Pasok</span>
                    </a>
                    <ul id="kinerja" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="{{ route('rantai') }}" class="sidebar-link">Form Kinerja Rantai Pasok</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('historyRantai') }}" class="sidebar-link">Riwayat Kinerja Rantai Pasok</a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a href="{{ route('hor1Mitigasi') }}" class="sidebar-link">
                        <i class="fa-solid fa-triangle-exclamation"></i>
                        <span>Mitigasi Risiko</span>
                    </a>
                </li>
            </ul>
            <div class="sidebar-footer">
                <a class="sidebar-link" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    <span>Logout</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </aside>
        <div class="main">
            <nav class="navbar navbar-expand-md">
                <div class="container">
            
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav me-auto">
                            <li class="nav-item">
                                <h2 style="font-weight: bold">
                                    @yield('pageName')
                                </h2>
                            </li>
                        </ul>
            
                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item">
                                <h4>
                                    Hi, {{ Auth::user()->name }}
                                </h4>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @yield('content')
        </div>
    </div>
    <script src="{{ asset('js/vendor/jquery-3.6.3.min.js') }}"></script>
    <script src="https://kit.fontawesome.com/c621075835.js" crossorigin="anonymous"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    @yield('scripts')
</body>
</html>
