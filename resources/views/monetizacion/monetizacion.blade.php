@extends('layouts.app')
@section('content')
    @if (Auth::user()->email_verified_at == '')
        <br>
        <div class="card border-0 bg-danger shadow-sm mt-0">
            <div class="card-body">
                <h3 class="titulo-h3 text-white">¿Quieres ganar Tokens EYNGEL?</h3>
                <p class="text-default text-white">Los tokens EYNGEL son puntos que acumulas con las visualizaciones de tus
                    visitantes y extraños</p>
                <a href="#" class="btn btn-success">Reenviar correo de verificación</a>
            </div>
        </div>
    @else
        <div class="container-fluid mb-2 mt-4">
            <h3 class="titulo-h3 mt-0">Gana dinero con Eyngel</h3>
            <div class="content-monetizacion">
                <h4 class="titulo-h4 mt-4">Conviertete en creador:</h4>
                <p class="text-default">Únete al Programa de socios de EYNGEL a fin de ganar dinero, debes cumplir con los
                    siguiente requisito:</p>
                <div class="card card-body border-0">
                    <h4 class="titulo-h4 mt-2">¿Como puedo postularme?</h4>
                    <p class="text-default">Para postularse como creador de contenido en <strong>eyngel</strong> y ser
                        elegible para la monetización,
                        debes cumplir
                        con los siguientes requisitos</p>
                    <ul>
                        <li>
                            Contar con un mínimo de 3,000 visitantes en tu perfil de Eyngel. Estas visitas son un reflejo de
                            la audiencia que están interesados en tu perfil.
                        </li>
                        <li class="mt-3" style="list-style: none">
                            <div class="progress" role="progressbar" aria-label="Basic example"
                                aria-valuenow="{{ $tocando_count->count() . '%' }}" aria-valuemin="0" aria-valuemax="3000">
                                <div class="progress-bar" style="width: {{ $tocando_count->count() . '%' }}"></div>

                            </div>
                            <div class="d-flex justify-content-between">
                                <p>{{ $tocando_count->count() }} visitas</p>
                                <p>Meta: 3.000</p>
                            </div>
                        </li>
                        <li>Asegúrate de alcanzar un mínimo de 50,000 EY. Los "EY" operan como unidades de medida
                            desarrolladas por Eyngel, y cuantifican las interacciones auténticas que tu contenido genera
                            cada vez que es visto, escuchado o utilizado por tu audiencia.</li>
                        <li class="mt-3" style="list-style: none">
                            <div class="progress" role="progressbar" aria-label="Basic example"
                                aria-valuenow="{{ $tokensCount->count() / 2 . '%' }}" aria-valuemin="0"
                                aria-valuemax="50000">
                                <div class="progress-bar" style="width: {{ $tokensCount->count() / 2 . '%' }}"></div>

                            </div>
                            <div class="d-flex justify-content-between">
                                <p>{{ $tokensCount->count() / 2 }} EY</p>
                                <p>Meta: 50.000</p>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="card card-body mt-2 border-0">
                    <h4 class="titulo-h4 mt-2">Solicitar rol de creador</h4>
                    <p class="text-default">Una vez que cumpla con los requisitos minimos podra realizar la postulación a
                        creador y esta sera revisada por EYNGEL.</p>
                </div>
            </div>
        </div>
    @endif
@endsection
