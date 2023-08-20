@extends('layouts.app')

@section('template_title')
{{$movie->name ?? __('Show') Movie}}
    $movie->name ?? "{{ __('Show') Movie" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Movie</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('movies.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $movie->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Imagen:</strong>
                            {{ $movie->imagen }}
                        </div>
                        <div class="form-group">
                            <strong>Duracion:</strong>
                            {{ $movie->duracion }}
                        </div>
                        <div class="form-group">
                            <strong>Descripcion:</strong>
                            {{ $movie->descripcion }}
                        </div>
                        <div class="form-group">
                            <strong>Url:</strong>
                            {{ $movie->url }}
                        </div>
                        <div class="form-group">
                            <strong>Creat At:</strong>
                            {{ $movie->creat_at }}
                        </div>
                        <div class="form-group">
                            <strong>Update At:</strong>
                            {{ $movie->update_at }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
