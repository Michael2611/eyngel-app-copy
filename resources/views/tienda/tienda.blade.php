@extends('layouts.app')
@section('content')
    <div class="tienda-container">
        <div class="content">
            <div class="mt-4 mb-2">
                <h3 class="titulo-h3 text-dark">Descubre más tiendas</h3>
                <h5 class="titulo-h5 text-dark">Te puede interesar</h5>
            </div>
            @if ($tiendas->count() > 0)
                <div class="row-tiendas">
                    @foreach ($tiendas as $tienda)
                        <div class="card border-0">
                            <img src="{{ asset($tienda->t_img_logo) }}" style="height: 200px;object-fit: cover"
                                class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{ $tienda->t_nombre }}</h5>
                                <p class="text-default"><small>{{ substr($tienda->t_descripcion, 0, 40) . '...' }}</small>
                                </p>
                                <div class="d-flex gap-2">
                                    <a href="{{ URL::to('tienda/' . $tienda->t_nombre) }}"
                                        class="btn btn-primary w-100">Visitar</a>
                                    @if (Auth::user()->id == $tienda->t_id_user_create)
                                        <div class="dropdown">
                                            <button class="btn btn-light" type="button" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                <i class="bi bi-list"></i>
                                            </button>
                                            <ul class="dropdown-menu border-0 p-2 shadow">
                                                <li><a class="dropdown-item"
                                                        href="{{ route('empresa.crear-producto', $tienda->t_id) }}">Registra
                                                        productos</a></li>
                                                <li>
                                                    <form action="{{ route('empresa.eliminar', $tienda->t_id) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <input type="hidden" name="id_tienda" value="{{ $tienda->t_id }}"
                                                            readonly>
                                                        <button class="dropdown-item" type="submit">Eliminar
                                                            tienda</button>
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
            @endif
        </div>
    </div>
@endsection
