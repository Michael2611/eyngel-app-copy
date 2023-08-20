@extends('layouts.app')

@section('content')
    <section class="content container">
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow-sm border-0">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Ver') }} Anuncio</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ URL::to('anuncio') }}"> {{ __('Regresar') }}</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Descripcion:</strong>
                            {{ $anuncio->a_descripcion }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
