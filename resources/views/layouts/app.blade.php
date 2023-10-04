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
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

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
                    <a href="{{ URL::to('/login') }}"
                        style="text-decoration: none; display: flex; align-items: center; margin-left: -20px;">
                        <span
                            style="background-color: #0D6EFD; color: #fff; padding: 6px; border-radius: 5px; font-weight: bold; margin-right: 10px;">Ingresar</span>
                        <img class="img-nav" src="{{ asset('images/icons/logo-eyngel.png') }}" alt="img-saludo"
                            style="max-width: 40px; height: auto;">
                    </a>
                </div>
            </div>
            <br>
        @endif
        <script src="{{ asset('js/buscador.js') }}"></script>
        @if (Auth::check())
            <div class="header shadow-sm">
                <div class="form-buscador">
                    <form action="{{ URL::to('/buscar') }}" method="get">
                        <div class="buscador-container">
                            <img id="icono" class="lupa" style="cursor: pointer; width: 25px; margin-left: 0px;"
                                src="{{ asset('images/icons/lupa.png') }}" onclick="alternarBuscador()">
                            <input class="buscador form-control" type="search" name="q" id="q"
                                placeholder="¿A quien estas buscando?"
                                style="width: 0; padding: 0; border: none; transition: width 0.3s ease; display: none;">
                        </div>
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
                            src="{{ asset('images/icons/logo-eyngel.png') }}" alt="img-saludo"
                            style="max-width: 40px; height: auto;"></a>
                </div>
            </div>
        @endif
        <div>
            @include('components.menu-movil')
        </div>
        @if (Auth::check())
            <div style="width: 100%; margin:auto" id="menu-movil">
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
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    @if (Auth::check())
        <script>
            $('.mention-input').on('input', function() {
                let searchText = $(this).val();
                //console.log(searchText);
                let postId = $(this).data('post-id');
                let dropdown = $(`.mention-dropdown[data-post-id="${postId}"] ul`);
                let dropmenu = document.querySelector(`.dropdown-menu[data-post-id="${postId}"]`);
                let content = document.getElementById("content-text-mentions" + postId);
                dropmenu.style.display = "none";
                dropmenu.style.width = "250px";

                if (searchText.startsWith('@')) {
                    $.ajax({
                        url: '/get-following', // Debes ajustar la URL de tu endpoint de búsqueda de usuarios en Laravel
                        method: 'GET',
                        data: {
                            searchText: searchText,
                            postId: postId
                        },
                        success: function(data) {
                            dropdown.empty();
                            data.forEach(function(user) {
                                let username = user.u_nombre_usuario;
                                let img = user.u_img_profile || "../../images/3135768.png";

                                let listItem = `
                        <li class="mb-2" style="padding: 10px; background: #efefef;">
                            <img style="width: 30px; height: 30px; object-fit: cover; border-radius: 50%;" src="${img}" alt="">
                            <a href="#" class="mention-link" style="margin: 0 10px; font-weight: 600">@${username}</a>
                            <br>
                            <small style="padding-left: 40px; font-size: 13px;">Visitante</small>
                        </li>`;

                                dropdown.append(listItem);
                            });

                            // Agregar un manejador de eventos al hacer clic en un enlace de mención
                            dropdown.find('.mention-link').click(function(e) {
                                e.preventDefault();
                                let selectedMention = $(this)
                                    .text(); // Obtener el nombre de la mención
                                $(`.mention-input[data-post-id="${postId}"]`).val(
                                    selectedMention); // Colocar la mención en el input
                                dropmenu.style.display =
                                    "none"; // Ocultar el dropdown después de seleccionar
                            });

                            dropmenu.style.display = "block"; // Mostrar el dropdown
                            dropmenu.style.padding = "10px";
                        },
                        error: function(error) {
                            console.error("Error al buscar usuarios:", error);
                        }
                    });
                } else {
                    console.log("none");
                    dropdown.empty();
                }
            });
            $(document).ready(function() {
                $('.js-example-basic-single').select2();
                $('.js-example-basic-multiple').select2();
            });
        </script>
    @endif

    @if (!Auth::check())
        <script src="{{ asset('js/login.js') }}"></script>
    @endif

    <script src="{{ asset('js/_playVideo.js') }}"></script>

    @if (Auth::check())
        <script src="{{ asset('js/push.min.js') }}"></script>
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

    <!--<script>
        Push.create("Hola", {
            body: "Por qué me olvidas tanto?",
            icon: '/images/icons/logo-eyngel.png',
            timeout: 4000,
            onClick: function() {
                window.location="https://eyngel.com/";
                this.close();
            }
        });
    </script>-->

    @yield('scripts')

</body>

</html>
