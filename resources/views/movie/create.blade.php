@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} Movie
@endsection

@section('content')
    <section class="container">
        <div class="row">
            <div class="col-md-12">
                @includeif('partials.errors')
                <div class="card border-0 shadow-sm p-3">
                    <div class="card-body">
                        <h4 class="titulo-h4">{{ __('Crear') }} peliculas</h4>
                        <form method="POST" action="{{ URL::to('admin/pelicula-store') }}" role="form"
                            enctype="multipart/form-data">
                            @csrf
                            @include('movie.form')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
