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
                <div class="col-md-2">
                    <h5 class="titulo-h5 fw-bold mb-3">{{ $empresa->t_nombre }}</h5>
                    <img class="mb-1" src="{{ asset($empresa->t_img_logo) }}" alt="logo-empresa"
                        style="width: 150px; border-radius: 10px">
                    <p><?php echo $empresa->t_eslogan; ?></p>

                </div>
                <div class="col-md-2">
                    <p><strong>Información</strong></p>
                    <p><strong>Telefono:</strong> {{ $empresa->t_telefono }}</p>
                    <p><strong>Correo electronico:</strong> {{ $empresa->t_correo }}</p>
                    <a href="{{ $empresa->t_enlace }}" target="_blank">Sitio web <span
                            class="badge text-bg-primary">{{ $productos->count() }} resultados</span></a> <br>
                </div>
                <div class="col-md-8">
                    <p><strong>Descripción</strong></p>
                    <p><?php echo $empresa->t_descripcion; ?></p>
                </div>
            </div>
            <div class="row">
                @foreach ($productos as $producto)
                    <a class="col-md-4 card p-3 border-0 mb-1 mt-2 " id="card-producto"
                        href="{{ URL::to('tienda/' . $empresa->t_nombre . '/producto/' . $producto->tp_nombre) }}">
                        <img class="img-fluid" src="{{ asset($producto->tp_imagen) }}" alt="">
                        <h4 class="text-primary mt-3">$ {{ number_format($producto->tp_precio, 0) }}</h4>
                        <p class="text-capitalize">{{ $producto->tp_nombre }}</p>

                    </a>
                @endforeach
            </div>
            <br>
        @else
            <div class="alert alert-warning" role="alert">
                Por el momento esta tienda no cuenta con productos registrados, @if (Auth::user()->email == $empresa->t_correo)
                    <a href="{{ URL::to('admin/tienda/crear-producto/' . $empresa->t_nombre) }}">Registar</a>
                @endif
            </div>
        @endif

    </div>
@endsection
