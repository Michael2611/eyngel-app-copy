@extends('layouts.app')
@section('content')
    <br>
    <div class="container">
        @if ($productos->count() > 0)
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ URL::to('/tienda') }}">Tiendas</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $empresa->t_nombre }}</li>
                </ol>
            </nav>
            <div class="row">
                <div class="col-md-4">
                    <h5 class="titulo-h5 fw-bold mb-3">{{ $empresa->t_nombre }}</h5>
                    <img class="mb-1" src="{{ asset($empresa->t_img_logo) }}" alt="logo-empresa"
                        style="width: 250px; height: 150px; border-radius: 10px; object-fit: cover">
                    @if (Auth::user()->id == $empresa->t_id_user_create)
                        <a class="btn btn-primary btn-sm mt-2 mb-2"
                            href="{{ route('empresa.crear-producto', $empresa->t_id) }}">Nuevos productos</a>
                    @endif
                    <p class="text-default"><?php echo $empresa->t_eslogan; ?></p>
                    <p><strong>Información</strong></p>
                    <p class="text-default">Telefono:{{ $empresa->t_telefono }}</p>
                    <p class="text-default mb-4">Correo electronico:{{ $empresa->t_correo }}</p>
                    <a href="{{ $empresa->t_enlace }}" target="_blank">Sitio web <span
                            class="badge text-bg-primary">{{ $productos->count() }} resultados</span></a> <br>
                    <p class="mt-2"><strong>Descripción</strong></p>
                    <p class="text-default"><?php echo $empresa->t_descripcion; ?></p>
                </div>
                <div class="col-md-8">
                    <div class="row">
                        @foreach ($productos as $producto)
                            <a class="col-md-4 card mb-1" id="card-producto" 
                                href="{{ URL::to('tienda/' . $empresa->t_nombre . '/producto/' . $producto->tp_nombre) }}">
                                <img style="width: 100%; object-fit: contain" src="{{ asset($producto->tp_imagen) }}" alt="">
                                <div class="p-2">
                                    <h4 class="text-primary mt-2">$ {{ number_format($producto->tp_precio, 0) }}</h4>
                                    <p class="text-capitalize">{{ $producto->tp_nombre }}</p>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        @else
            <div class="alert alert-warning" role="alert">
                Por el momento esta tienda no cuenta con productos registrados, @if (Auth::user()->email == $empresa->t_correo)
                    <a href="{{ route('empresa.crear-producto', $empresa->t_id) }}">Registar</a>
                @endif
            </div>
        @endif

    </div>
@endsection
