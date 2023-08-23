<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Eyngel') }}</title>
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <!-- Fonts -->

    @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/css/app.css'])
</head>

<body>
    @include('sweetalert::alert')
    <div id="app">
        <?php $route = request()
            ->route()
            ->getName(); ?>
        @if (!Auth::check() && $route != 'login' && $route != 'home')
            <div class="header shadow-sm">
                <div class="form-buscador">
                    <a class="btn btn-light btn-sm" href="{{ URL::to('/login') }}"><strong>Crea tu cuenta</strong></a>
                </div>
                <div class="saludo">
                    <a href="{{ URL::to('/login') }}"><img class="img-nav"
                            src="{{ asset('images/icons/logo-eyngel.png') }}" alt="img-saludo"></a>
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
                            src="{{ asset('images/icons/logo-eyngel.png') }}" alt="img-saludo"></a>
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
    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

    @if (!Auth::check())
        <script src="{{ asset('js/login.js') }}"></script>
    @endif

    @if (Auth::check())
        <script src="{{ asset('js/_general.js') }}"></script>
        <script src="{{ asset('js/_playVideo.js') }}"></script>
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

    @yield('scripts')

</body>

</html>
