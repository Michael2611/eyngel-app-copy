@extends('layouts.app')
@section('content')
    <br>
    <br>
    <div class="row">
        <div class="col-12">
            <div class="btn-group" role="group" aria-label="Basic example">
                <a id="cargarComponente" class="btn btn-light"
                    href="{{ URL::to('/tienda/dashboard-tienda/crear-productos/' . $empresa->t_id) }}">Registrar Productos</a>
                <a class="btn btn-light" href="{{ URL::to('/productos') }}">Editar Productos</a>
            </div>
        </div>
        <div class="col-12">
            <div class="container">
                @if ($productos->count() > 0)
                    <div class="row">
                        @foreach ($productos as $producto)
                            <a class="col-md-4 card p-3 mb-1 mt-2 " id="card-producto"
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

        </div>
        <div class="col-4">

        </div>
    </div>
@endsection
