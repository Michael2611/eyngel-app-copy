<?php
$route = request()
    ->route()
    ->getName();
?>
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Eyngel') }}</title>
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    @if ($route == 'para-ti')
        @laravelPWA
    @endif
    @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/css/app.css'])

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-8FSMLC302L"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-8FSMLC302L');
    </script>

</head>

<body>
    @include('sweetalert::alert')
    <div id="app">
        @if (!Auth::check() && $route != 'login' && $route != 'home')
            <div class="header shadow-sm">
                <div class="form-buscador">
                    <a class="boton-registro btn btn-sm btn-primary" data-bs-toggle="modal"
                        data-bs-target="#registerUser"><strong>¡Regístrarse!</strong></a>
                </div>
                <div class="saludo">
                    <a href="{{ URL::to('/login') }}" style="text-decoration: none; display: flex; align-items: center; margin-left: -20px;">
                        <span style="background-color: #0D6EFD; color: #fff; padding: 6px; border-radius: 5px; font-weight: bold; margin-right: 10px;">Ingresar</span>
                        <img class="img-nav" src="{{ asset('images/icons/logo-eyngel.png') }}" alt="img-saludo" style="max-width: 40px; height: auto;">
                    </a>
                </div>
            </div>
            <br>
        @endif
        @if (Auth::check())
            <div class="header shadow-sm">
                <div class="form-buscador">
                    <form action="{{ URL::to('/buscar') }}" method="get">
                        <input class="buscador form-control" type="search" name="q" id="q"
                            placeholder="¿A quien estas buscando?">
                    </form>
                </div>
                <?php $route = request()
                    ->route()
                    ->getName(); ?>
                @if ($route != 'post.view' && Auth::check())
                    @include('components.filter-profile')
                @endif
                <div class="saludo">
                    <a href="{{ URL::to('/login') }}"><img class="img-nav"
                            src="{{ asset('images/icons/logo-eyngel.png') }}" alt="img-saludo" style="max-width: 40px; height: auto;"></a>
                </div>
            </div>
        @endif
        <div>
            @include('components.menu-movil')
        </div>
        @if (Auth::check())
            <div style="width: 90%; margin:auto" id="menu-movil">
                <div class="container-fluid">
                    <div class="row">
                        @if ($route == 'post.view' || $route == 'promocionar.index')
                            <div class="col-md-12 contenido-nueve">
                                @yield('content')
                            </div>
                        @else
                            <div class="col-md-3 contenido-tres">
                                @include('components.menu-lateral-min')
                            </div>
                            <div class="col-md-9 contenido-nueve">
                                @yield('content')
                            </div>
                        @endif
                    </div>
                </div>
                @if ($route == 'para-ti')
                    @include('components.menu-movil-bottom')
                @endif
            </div>
        @else
            <div class="col-md-12">
                @yield('content')
            </div>
        @endif
    </div>
    <br>
    @if (Auth::check())
        @include('components.modal-redes-sociales')
        @include('components.modal-d-cuenta')
    @endif

    @if ($route == 'login' || !Auth::check())
        @include('components.register')
    @endif


    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

    @if (!Auth::check())
        <script src="{{ asset('js/login.js') }}"></script>
    @endif

    <script src="{{ asset('js/_playVideo.js') }}"></script>

    @if (Auth::check())
        <script src="{{ asset('js/_general.js') }}"></script>
    @endif

    @if ($route == 'para-ti')
        <script src="{{ asset('js/_sugerencias.js') }}"></script>
    @endif

    @if ($route == 'post.view')
        <script src="{{ asset('/js/_post.js') }}"></script>
    @endif

    @if ($route == 'perfil')
        <script src="{{ asset('js/_perfil.js') }}"></script>
    @endif

    @if ($route == 'post.cargar')
        <script src="{{ asset('js/_cargar.js') }}"></script>
    @endif
    
    <script src="{{ asset('js/pwa-install.js') }}"></script>

    @if ($route == 'para-ti')
        <div class="popup"
            style="display: flex; position: absolute; top: 90px; right: 20px; flex-direction: column; justify-content: flex-start; align-items: center; padding: 20px; text-align: center;">
            <button id="close-button"
                style="position: absolute; top: 5px; right: 5px; background-color: transparent; color: #555; border: none; padding: 5px; cursor: pointer;">X</button>
            <p style="margin-bottom: 1px;">¡Instala nuestra APP para disfrutar de una mejor experiencia!</p>
            <button id="install-button"
                style="background-color: #007bff; color: #fff; border: none; border-radius: 4px; padding: 15px 25px; cursor: pointer;">Instalar</button>
        </div>

        <div id="ios-popup" class="popup"
            style="display: position: absolute; top: 190px; right: 20px; flex-direction: column; justify-content: flex-start; align-items: center; padding: 20px; text-align: center;">
            <p style="margin-bottom: 10px;">¡Instala nuestra APP para disfrutar de una mejor experiencia en iOS!</p>
            <p>1. Pulsa el botón "Compartir" en la parte inferior de la pantalla.</p>
            <p>2. Selecciona "Agregar a la pantalla de inicio".</p>
            <p>3. Sigue las instrucciones para añadir la app a tu pantalla de inicio.</p>
            <button id="ios-close-button"
                style="position: absolute; top: 5px; right: 5px; background-color: transparent; color: #555; border: none; padding: 5px; cursor: pointer;">X</button>
        </div>
    @endif

    @yield('scripts')

</body>

</html>