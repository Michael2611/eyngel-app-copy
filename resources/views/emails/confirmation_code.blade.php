@extends('layouts.app') 
@section('content')
    <div class="container">
        <div class="row">
            <!-- header img -->
            <div class="col-12">
                <div class="card-img">
                    <img  src="{{ asset('images/mns-bienvenido.jpg') }}" width="500px" height="500px">
                </div>
                <p>Por favor confirma tu correo electrónico.</p>
                <p>Para ello simplemente debes hacer click en el siguiente enlace:</p>
                <a href="{{ url('/register/verify/') }}">
                    Clic para confirmar tu email
                </a>
            </div>
        </div>
    </div>
@endsection
