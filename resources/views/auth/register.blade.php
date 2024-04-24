<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

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
                    <a href="#"><img src="{{ asset('img/logo.png') }}" alt="" width="190"></a>
                </div>
            </div>
            <ul class="sidebar-nav">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <li class="sidebar-item">
                        <label for="name" class="col-md-6 col-form-label ms-3">{{ __('Name') }}</label>

                        <div class="col-md-10 m-auto">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </li>
                    <li class="sidebar-item">
                        <label for="email" class="col-md-6 col-form-label ms-3">{{ __('Email Address') }}</label>

                        <div class="col-md-10 m-auto">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </li>
                    <li class="sidebar-item">
                        <label for="password" class="col-md-6 col-form-label ms-3">{{ __('Password') }}</label>

                        <div class="col-md-10 m-auto">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </li>
                    <li class="sidebar-item">
                        <label for="password-confirm" class="col-md-10 col-form-label ms-3">{{ __('Confirm Password') }}</label>

                        <div class="col-md-10 m-auto">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </li>
                    <li class="sidebar-item my-4">
                        <div class="row mb-0">
                            <div class="col text-center">
                                <a
                                    href="{{ route('login') }}"
                                    class="btn btn-secondary"
                                >
                                    Log in
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
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
