<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Rantai Pasok</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.bunny.net/css?family=Montserrat" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="wrapper">
        <aside id="sidebar" class="expand">
            <div class="d-flex">
                {{-- <button class="toggle-btn" type="button">
                    <i class="fa-solid fa-bars"></i>
                </button> --}}
                <div class="sidebar-logo m-auto">
                    {{-- <a href="#"><img src="{{ asset('img/logo.png') }}" alt="" width="190"></a> --}}
                    <a href="{{ route('home') }}"><h2 class="m-0 mt-3 text-dark fw-bolder" style="font-family: Montserrat;">LMU-DSS</h2></a>
                </div>
            </div>
            <ul class="sidebar-nav">
                <form class="sidebar-item" method="POST" action="{{ route('login') }}">
                    @csrf
                    <li class="sidebar-item">
                        <label for="email" class="col-md-6 col-form-label ms-3">{{ __('Email Address') }}</label>
                        <div class="col-md-10 m-auto">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </li>
                    <li class="sidebar-item">
                        <label for="password" class="col-md-4 col-form-label ms-3">{{ __('Password') }}</label>
                        <div class="col-md-10 m-auto">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </li>
                    <li class="sidebar-item">
                        <div class="row my-3">
                            <div class="col-md-10 offset-md-5">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col text-center">
                                {{-- @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif --}}
                                @if (Route::has('register'))
                                    <a
                                        href="{{ route('register') }}"
                                        class="btn btn-secondary"
                                    >
                                        Register
                                    </a>
                                @endif
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                            </div>
                        </div>
                    </li>
                </form>   
            </ul>
            {{-- <div class="sidebar-footer">
                <a href="#" class="sidebar-link">
                    <i class="lni lni-exit"></i>
                    <span>Logout</span>
                </a>
            </div> --}}
        </aside>
        <div class="main">
            <img src="{{ asset('img/login-img.png') }}" alt="" width="100%" height="100%">
        </div>
    </div>

    <script src="https://kit.fontawesome.com/c621075835.js" crossorigin="anonymous"></script>
    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
