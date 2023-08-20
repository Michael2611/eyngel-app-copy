@extends('layouts.app')
@section('template_title')
    Anuncio
@endsection

@section('content')
    <div class="container-pelicula">
        <div class="row">
            @foreach ($movies as $movie)
                <div class="col-sm-3 card-pelicula">
                    <a href="{{ URL::to('sala-de-entretenimiento', $movie->nombre) }}" style="text-decoration:none">
                        <i class="bi bi-play-circle" id="icon-media"></i>
                        <img src="{{ $movie->imagen }}" class="card border-0" alt=""
                            style="width: 100%;object-fit: cover;object-position: center;height: 100%;">
                        <div class="card-body mt-2">
                            <h6 class="titulo-h6 text-center mt-2 mb-2">{{ __($movie->nombre) }}</h6>
                        </div>
                    </a>
                </div>
            @endforeach
            {!! $movies->links() !!}
        </div>
    </div>
@endsection
@section('js')
    <script src="{{asset('js/_popus_movie.js')}}"></script>
@endsection
