<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Alertify -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('public/css/app.css') }}" rel="stylesheet">
    <!-- Scripts -->
    <script src="{{ asset('public/js/app.js') }}" defer></script>
</head>
<body>
    <div id="app">
        <header class="d-flex justify-content-end mx-4">
            <nav class="navbar navbar-expand-sm text-dark sticky-top p-0 ">
                <ul class="navbar-nav me-auto">
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('password.change') }}">Change Password</a>
                                <a class="dropdown-item" href="{{ route('deposite.money') }}">Deposite Money</a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </nav>
        </header>
        <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="mynavbar">
                    <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <div class="dropdown">
                            <a type="button" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Category</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{route('category.index')}}">All Category</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <div class="dropdown">
                            <a type="button" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Product</a>
                            <ul class="dropdown-menu">
                                {{-- <li><a class="dropdown-item" href="{{route('create.product')}}">Create Product</a></li> --}}
                                {{-- <li><a class="dropdown-item" href="{{route('index.product')}}">View Product</a></li> --}}
                            </ul>
                        </div>
                    </li>
                    
                    </ul>
                    <form class="d-flex mx-2">
                        <input class="form-control me-2" type="text" placeholder="Search">
                        <button class="btn btn-sm btn-info" type="button">Search</button>
                    </form>
                </div>
            </div>
        </nav>
        
        <main class="py-4">
            @yield('content')
        </main>
    </div> 

<!-- JavaScript -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

</body>
</html>
