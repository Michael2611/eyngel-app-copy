@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row mx-auto" id="content-settings">
            <div class="col-md-4 mt-4">
                <div class="card p-3 border-0 shadow-sm">
                    <ul>
                        @include('components.menu-settings')
                    </ul>
                </div>
            </div>
            <div class="col-md-8 mt-4">
                @if ($verificacion != null && $verificacion->uv_pay_status == 1 && $verificacion->uvc_status == 1)
                    <div class="alert alert-success">
                        <p class="fw-bold"><i class="bi bi-info-square"></i> Su cuenta ahora es verificada y todo el
                            mundo lo sabrá, accede a conexiones reales, experiencia segura con confianza y credibilidad para
                            ti
                            y
                            tus usuarios. </p>
                    </div>
                @else
                    <div class="card border-0 shadow-sm mb-2">
                        <div class="card-header">Verificación de cuenta</div>
                        <div class="card-body">
                            <p class="text-default">En Eyngel, creemos en la importancia de construir relaciones auténticas
                                y proteger la seguridad de nuestros usuarios. Por eso, te ofrecemos la opción de verificar
                                tu
                                cuenta para que disfrutes de una experiencia inigualable.</p>
                            <h5 class="h5 titulo-h5 text-center mt-2 mb-2">¿Por qué veriﬁcar tu cuenta en Eyngel?</h5>
                            <p class="text-default"><strong>Crea conexiones reales:</strong> La veriﬁcación garantiza que
                                interactúes con personas genuinas y que
                                formes relaciones signiﬁcativas en nuestra plataforma. <br><br>
                                <strong>Experiencia segura:</strong> Tu seguridad es nuestra prioridad. Al veriﬁcar tu
                                cuenta, nos ayudarás a
                                mantener un ambiente más seguro y libre de perﬁles falsos. <br><br>
                                <strong>Conﬁanza y credibilidad:</strong> Al mostrar tu cuenta veriﬁcada, inspirarás
                                conﬁanza en otros
                                usuarios, lo que te permitirá destacarte en nuestra comunidad.
                                El proceso de veriﬁcación es rápido y sencillo. No te tomará mucho tiempo, ¡pero los
                                beneﬁcios serán duraderos! <br> <br>
                                El proceso de veriﬁcación es rápido y sencillo. No te tomará mucho tiempo, ¡pero los
                                beneﬁcios serán duraderos!
                            </p>
                            <p class="text-center">Únete a Eyngel y descubre un mundo de posibilidades, donde la conﬁanza y
                                la autenticidad son fundamentales.</p>
                            <p class="text-default">Por favor, remite los siguientes requisitos al correo
                                <strong><h4>contacto@eyngel.com:</h4></strong> <br>
                                REQUISITOS: <br><br>
                                - Carta o mensaje de solicitud de veriﬁcación de cuenta en Eyngel. <br> - Nombre completo. <br>
                                - Dirección de contacto. <br> - Dirección de correo electrónico. <br> - Número de teléfono celular. <br>
                                Opcional: Para agilizar y optimizar la autenticación de tu cuenta, te recomendamos enviar
                                una foto de tu documento de identiﬁcación (como pasaporte, cédula u otro documento válido). <br> <br>
                                Recuerda que para asegurar una veriﬁcación exitosa de tu cuenta, es esencial haber conﬁrmado
                                tu dirección de correo electrónico y haber completado tu perﬁl. <br> <br>
                                Costo mensual por el servicio de veriﬁcación de cuenta: <strong>7 USD.</strong>

                                ¡Eyngel te da la bienvenida a bordo!
                            </p>
                        </div>
                    </div>
                    
                    @if ($verificacion != null)
                        @if ($verificacion->uv_pay_status == 1)
                            <div class="card border-0 shadow-sm mb-2">
                                <div class="card-header">Cargar video de presentación</div>
                                <div class="card-body">
                                    <form action="{{ URL::to('/settings-post-verify-acount') }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="row mt-2">
                                            <div class="col-md-4">
                                                <label class="col-form-label-sm" for="video_presentacion">Video de
                                                    presentación
                                                    (Máx
                                                    1
                                                    minuto de duracción)</label>
                                            </div>
                                            <div class="col-md-8">
                                                <input type="hidden" name="id-user" id="id-user"
                                                    value="{{ Auth::user()->id }}" readonly>
                                                <input class="form-custom" type="file" onchange="cargarVideo(event)"
                                                    name="video_presentacion" id="video_presentacion" accept="video/*"
                                                    required>
                                            </div>
                                            <div class="col-md-12 mt-2" id="preview">
                                                <div id="contentPreviewVideo"></div>
                                            </div>
                                        </div>
                                        <div class="button-action d-flex justify-content-startP">
                                            <button class="btn btn-primary mt-3" type="submit">Finalizar proceso</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        @endif
                    @endif
                @endif
            </div>
        </div>
    </div>
    @include('components.profile-img')
@endsection
@section('scripts')
    <script src="{{ asset('js/_settings.min.js') }}"></script>
@endsection
