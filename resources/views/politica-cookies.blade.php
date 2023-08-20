@extends('layouts.app')
@section('content')
    <div class="container p-4">
        <div class="d-flex">
            <img style="width: 40px; object-fit: contain" src="{{ asset('images/icono-logo-40x40.png') }}" alt="">
            <h3 class="titulo-h3 mt-4" style="margin-left: 20px">Política de cookies</h3>
        </div>
        <div class="row">
            <div class="col-md-4">
                <ul class="ul-pol mt-4">
                    <li><a href="#introduccion">Introducción</a></li>
                    <li><a href="#tipos-cookies">Tipo de cookies</a></li>
                    <li><a href="#gestion-cookies">Gestión de cookies</a></li>
                    <li><a href="#cookies-terceros">Cookies de terceros</a></li>
                    <li><a href="#consentimiento">Consentimiento de cookies</a></li>
                    <li><a href="#cambios-politica">Cambios en la politica de cookies</a></li>
                    <li><a href="#contacto">Contacto</a></li>
                </ul>
            </div>
            <div class="col-md-8">
                <div id="introduccion">
                    <h5 class="titulo-h5 mt-4">POLITICA DE COOKIES</h5>
                    <p>Fecha de vigencia: 23 de mayo del 2023 <br>
                        Agradecemos su interés en MINCCY, una plataforma digital y red social proporcionada por
                        Compañía BuildCom SAS. Esta política de cookies establece cómo utilizamos las cookies y
                        tecnologías similares en MINCCY. Al acceder y utilizar MINCCY, usted acepta los términos y
                        condiciones establecidos en esta política de cookies. <br><br>
                        1. ¿Qué son las cookies? Las cookies son pequeños archivos de texto que se almacenan en
                        su dispositivo cuando visita un sitio web. Estas cookies pueden contener información
                        sobre su visita al sitio web y se utilizan para mejorar su experiencia de usuario. Además de
                        las cookies, también utilizamos tecnologías similares, como píxeles de seguimiento y
                        almacenamiento local, para recopilar y almacenar información</p>
                </div>
                <div id="tipos-cookies">
                    <h5 class="titulo-h5 mt-4">TIPOS DE COOKIES</h5>
                    <p>Tipos de cookies utilizadas Utilizamos diferentes tipos de cookies en MINCCY con diversos
                        propósitos. A continuación, se describen los tipos de cookies que utilizamos: <br><br>
                        2.1 Cookies esenciales: Estas cookies son necesarias para el funcionamiento básico de MINCCY y le
                        permiten navegar por el sitio web y utilizar sus funciones. Sin estas cookies, es posible que no
                        pueda acceder a ciertas áreas de MINCCY o utilizar algunas de sus características. <br><br>
                        2.2 Cookies de rendimiento: Estas cookies recopilan información sobre cómo los usuarios
                        interactúan con MINCCY, como las páginas visitadas, la duración de la visita, los errores
                        encontrados, etc. Utilizamos esta información para mejorar el rendimiento y la usabilidad de
                        MINCCY. <br><br>
                        2.3 Cookies de funcionalidad: Estas cookies permiten recordar las opciones que ha elegido en
                        MINCCY, como su idioma preferido, preferencias de configuración y otras opciones personalizadas.
                        También se utilizan para proporcionar características mejoradas y personalizadas. <br><br>
                        2.4 Cookies de publicidad: Utilizamos cookies de publicidad para mostrar anuncios relevantes en
                        MINCCY. Estas cookies recopilan información sobre sus visitas anteriores al sitio web y la
                        comparten con terceros anunciantes y redes de publicidad. Esto nos ayuda a ofrecer anuncios más
                        relevantes y a medir la efectividad de nuestras campañas publicitarias. <br><br>
                        2.5 Cookies de redes sociales: MINCCY utiliza cookies de redes sociales para permitirle compartir
                        contenido en plataformas de redes sociales y para rastrear su actividad en MINCCY con fines
                        publicitarios. Estas cookies están controladas por terceros y están sujetas a sus propias políticas
                        de privacidad y cookies. <br><br>
                        2.6 Cookies de grabador de pantalla y captura: Además de las cookies mencionadas
                        anteriormente, también utilizamos cookies de grabador de pantalla y captura en MINCCY. Estas
                        cookies nos permiten registrar y capturar su actividad en el sitio web con fines de análisis, mejora
                        y seguridad. La información recopilada a través de estas cookies se utiliza de forma anónima y
                        agregada.</p>
                </div>
                <div id="gestion-cookies">
                    <h5 class="titulo-h5 mt-4">GESTIÓN DE COOKIES</h5>
                    <p>Gestión de cookies Puede administrar las cookies en MINCCY según sus preferencias.
                        Puede modificar la configuración de su navegador para bloquear o eliminar cookies, o
                        puede configurarlo para que le avise cuando se envíen cookies. Tenga en cuenta que al
                        desactivar o rechazar las cookies, es posible que algunas características de MINCCY no
                        funcionen correctamente y su experiencia de usuario pueda verse afectada.</p>
                </div>
                <div id="cookies-terceros">
                    <h5 class="titulo-h5 mt-4">COOKIES DE TERCEROS</h5>
                    <p>Además de las cookies mencionadas anteriormente, también
                        podemos utilizar cookies de terceros en MINCCY. Estas cookies son proporcionadas por
                        terceros, como socios publicitarios y proveedores de servicios, y se utilizan para diversos
                        fines, como publicidad personalizada, análisis de datos y mejora de la funcionalidad del
                        sitio web. Estas cookies están sujetas a las políticas de privacidad y cookies de los terceros
                        correspondientes.
                    </p>
                </div>
                <div id="consentimiento">
                    <h5 class="titulo-h5 mt-4">CONSENTIMIENTO DE COOKIES</h5>
                    <p>Al acceder y utilizar MINCCY, usted acepta el uso de cookies
                        de acuerdo con esta política de cookies. Al visitar el sitio web por primera vez, se le
                        mostrará un aviso de cookies que le informará sobre el uso de cookies y solicitará su
                        consentimiento. Puede aceptar o rechazar el uso de cookies a través de las opciones
                        proporcionadas en el aviso de cookies.</p>
                </div>
                <div id="cambios-politica">
                    <h5 class="titulo-h5 mt-4">CAMBIOS EN LA POLITICA DE COOKIES</h5>
                    <p>Nos reservamos el derecho de modificar esta política
                        de cookies en cualquier momento. Cualquier cambio entrará en vigor a partir de su
                        publicación en MINCCY. Le notificaremos sobre cambios significativos en esta política a
                        través de un aviso en el sitio web o por otros medios razonables. Le recomendamos que
                        revise periódicamente esta política de cookies para estar al tanto de las actualizaciones.
                    </p>
                </div>
                <div id="contacto">
                    <h5 class="titulo-h5 mt-4">CONTACTO</h5>
                    <p>Si tiene alguna pregunta, inquietud o solicitud relacionada con esta política de
                        cookies o el uso de cookies en MINCCY, puede ponerse en contacto con nosotros a través
                        de los siguientes datos de contacto: <br><br>
                        Compañía BuildCom SAS <br>
                        Dirección: San Luis de Palenque, Colombia <br>
                        Correo electrónico: cbs.buildcom22@gmail.com <br>
                        Le agradecemos por leer nuestra política de cookies y confiar en MINCCY. Estamos comprometidos
                        con la protección de su privacidad y el uso seguro de las cookies para mejorar su experiencia en
                        nuestro sitio web.</p>
                </div>
            </div>
        </div>
    </div>
@endsection
