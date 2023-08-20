@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} Anuncio
@endsection

@section('content')
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    @includeif('partials.errors')
                    <div class="card shadow border-0">
                        <div class="card-header">
                            <span class="card-title">{{ __('Actualizar') }} Anuncio</span>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ URL::to('admin/anuncios-actualizar', $anuncio->id) }}"  role="form" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                @include('anuncio.form')
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
