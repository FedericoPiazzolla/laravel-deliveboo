<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fontawesome 6 cdn -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css'
        integrity='sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=='
        crossorigin='anonymous' referrerpolicy='no-referrer' />

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Usando Vite -->
    @vite(['resources/js/app.js'])
</head>

<body>
    <div id="app">

        <header class="navbar navbar-dark sticky-top flex-md-nowrap p-2 mb-0 shadow">
            <div class="container">

            
                <div class="logo_laravel">
                    <a href="{{ url('/') }}">
                        <img src="{{ Vite::asset('/resources/images/deliveboo-logo.png')}}" alt="">
                    </a>
                </div>
                <div class="navbar-nav">
                    <div class="nav-item text-nowrap ms-2">
                        <a class="nav-link" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </header>

        <div class="container-fluid ms_main-content">
            <div class="row h-100 py-5">
                <!-- Definire solo parte del menu di navigazione inizialmente per poi
        aggiungere i link necessari giorno per giorno
        -->
                <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block navbar-dark sidebar collapse p-0">
                    <div class="position-sticky pt-3">
                        <ul class="nav flex-column mt-2">
                            <li class="nav-item">
                                <a class="nav-link {{ Route::currentRouteName() == 'admin.dashboard' ? 'link_selected' : '' }}"
                                    href="{{ route('admin.dashboard') }}">
                                    <i class="fa-solid fa-tachometer-alt fa-lg fa-fw"></i> Dashboard
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ Route::currentRouteName() == '' ? 'admin.dishes.index' : '' }}"
                                    href="{{ route('admin.dishes.index') }}">
                                    <i class="fa-solid fa-tachometer-alt fa-lg fa-fw"></i> I Miei Piatti
                                </a>
                            </li>
                        </ul>


                    </div>
                </nav>

                <main class="col-md-9 ms-sm-auto col-lg-10 p-5">
                    @yield('content')
                </main>
            </div>
        </div>

    </div>
</body>

</html>
