@extends('layouts.app')
@section('content')
<br><br>
    <div class="container">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{URL::to('/tienda/'.$empresa->t_nombre)}}">{{$empresa->t_nombre}}</a></li>
                <li class="breadcrumb-item active" aria-current="page">Producto</li>
                <li class="breadcrumb-item active" aria-current="page">{{$producto->tp_nombre}}</li>
            </ol>
        </nav>
        <div class="p-1 border-0 mt-1 mb-4">
            <div class="row">
                <div class="col-md-5">
                    <img class="img-producto" src="{{ asset($producto->tp_imagen) }}" alt="">
                </div>
                <div class="col-md-7">
                    <h4 class="lead-4 text-capitalize mt-2">{{ $producto->tp_nombre }}</h4>
                    <h1 class="lead-1">$ {{ number_format($producto->tp_precio, 0) }}</h1>
                    <a class="btn btn-primary btn-sm" href="{{ $producto->tp_enlace_producto }}" target="_blank"><i
                            class="bi bi-bag-check"></i> Página oficial</a>
                    <p class="text-default mt-2">Descripción: <?php echo $producto->tp_descripcion; ?></p>
                    @if ($productos->count() > 0)
                        <div class="slider-custom">
                            <h4 class="titulo-h4 mt-3">Más productos de la tienda</h4>
                            <div class="slider-container">
                                @foreach ($productos as $item)
                                    <a class="card mt-4"
                                        href="{{ URL::to('/tienda/' . $empresa->t_nombre . '/producto/' . $item->tp_nombre) }}">
                                        <img class="img-fluid" src="{{ asset($item->tp_imagen) }}" alt="imagen-producto">
                                        <h5 class="titulo-h5 mt-2">$ {{ number_format($item->tp_precio, 0) }}</h5>
                                        <p>{{ $item->tp_nombre }}</p>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
