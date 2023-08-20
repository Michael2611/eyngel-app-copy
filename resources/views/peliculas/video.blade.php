@extends('layouts.app')

@section('template_title')
    Peliculas
@endsection

@section('content')
    <div class="container-pelicula">
        <div class="row" >
            <div class="col-sm-2">
                <a href="#" style="text-decoration:none" >
                    <img src="{{ $movie->imagen }}" class="card border-0" alt="" 
                    style="width: 100%;object-fit: cover;object-position: center;height: 100%;">
                </a>
            </div>
            <div class="col-sm-9 ">
                <h1 class="titulo-h1 fw-bold text-left">{{ __($movie->nombre) }}</h1>
                <p>{{ $movie->duracion }}</p>
                <p>{!! nl2br($movie->descripcion) !!}</p>
            </div>
        </div>
        <div class="row mt-4 mb-4">
            <div class="col-sm-12 "><iframe src="{{ $movie->url }}" width="100%" height="600" allowfullscreen allowtransparency allow="autoplay" scrolling="no" frameborder="0"></iframe>
            </div>
        </div>
        <br>
    </div>
@endsection