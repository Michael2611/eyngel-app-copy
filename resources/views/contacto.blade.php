@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2 class="titulo-h2">Contacto</h2>
                <p style="font-size: 17px">Este espacio es creado con el proposito de darle a conocer a todos nuestros usuarios, los medios por los
                    cuales pueden contactar con nosotros. <br><br> Nuestros horarios de atención son los siguientes:
                    <ul>
                        <li> Jornada mañana: 9:00 AM - 11:30 AM</li>
                        <li> Jornada tarde: 2:30 PM - 5:00 PM</li>
                    </ul>
                </p>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <a class="col-md-6 mt-2 mb-2" href="https://t.me/+IMzioq6L66sxYjEx" target="_blank" style="text-decoration: none">
                        <div class="card shadow-sm  border-0 p-4 text-center">
                            <i class="bi bi-telegram" style="color: rgb(40, 168, 234); font-size: 55px"></i>
                            <h4 class="titulo-h4 mt-2">Canal informativo</h4>
                        </div>
                    </a>
                    <a class="col-md-6 mt-2 mb-2" href="http://t.me/Servi_usu" target="_blank" style="text-decoration: none">
                        <div class="card shadow-sm border-0 p-4 text-center">
                            <i class="bi bi-telegram" style="color: rgb(40, 168, 234); font-size: 55px"></i>
                            <h4 class="titulo-h4 mt-2">Servicio de usuario</h4>
                        </div>
                    </a>
                    <a class="col-md-6 mt-2 mb-2" href="http://t.me/Soporte_tecn" target="_blank" style="text-decoration: none">
                        <div class="card shadow-sm border-0 p-4 text-center">
                            <i class="bi bi-telegram" style="color: rgb(40, 168, 234); font-size: 55px"></i>
                            <h4 class="titulo-h4 mt-2">Servicio de soporte técnico </h4>
                        </div>
                    </a>
                    <a class="col-md-6 mt-2 mb-2" href="http://t.me/Financiera_min" target="_blank" style="text-decoration: none">
                        <div class="card shadow-sm border-0 p-4 text-center">
                            <i class="bi bi-telegram" style="color: rgb(40, 168, 234); font-size: 55px"></i>
                            <h4 class="titulo-h4 mt-2">Área de financiera</h4>
                        </div>
                    </a>
                    <a class="col-md-6 mt-2 mb-2" href="https://www.google.com/intl/es-419/gmail/about/" target="_blank" style="text-decoration: none">
                        <div class="card shadow-sm border-0 p-4 text-center">
                            <i class="bi bi-envelope-at" style="color: rgb(227, 75, 64); font-size: 55px"></i>
                            <h4 class="titulo-h4 mt-2">Email soporte</h4>
                        </div>
                    </a>
                    <a class="col-md-6 mt-2 mb-2" href="https://minccy.com/" target="_blank" style="text-decoration: none">
                        <div class="card shadow-sm border-0 p-4 text-center">
                            <i class="bi bi-browser-chrome" style="color: #A4CE3A; font-size: 55px"></i>
                            <h4 class="titulo-h4 mt-2">Minccy</h4>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <br><br>
    </div>
    @include('components.menu-bottom')
@endsection
