@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="text-center">
                <img class="img-fluid" src="{{ asset('/public/images/icons/offline.png') }}" alt="Offline Image">
            </div>
            <div class="alert alert-light shadow-sm mt-4">
                <h1 class="text-center mb-4">@lang('page.offline')</h1>
                <div class="card-header bg-transparent border-0">
                    <h4 class="text-muted">Modo Fuera de Línea</h4>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection