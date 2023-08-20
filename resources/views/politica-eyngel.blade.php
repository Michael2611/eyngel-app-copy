@extends('layouts.app')
@section('content')
    <div class="container p-4">
        <div class="d-flex mt-4">
            <img class="mt-3" style="width: 40px; object-fit: contain" src="{{ asset('images/icons/icon-logo-40x40px.png') }}" alt="">
            <h3 class="titulo-h3 mt-4" style="margin-left: 20px">Al usar Eyngel está aceptando:</h3>
        </div>
        <div class="row">
            <div class="col-md-4">
                <ul class="ul-pol mt-4">
                    <li><a href="#terminos-y-condiciones">Terminos y condiciones</a></li>
                    <li><a href="#politica-privacidad">Politica de privacidad</a></li>
                    <li><a href="#politica-cookies">Politica de cookies</a></li>
                    <li><a href="#politica-verificacion-cuenta">Politica verificación de cuenta</a></li>
                </ul>
            </div>
            <div class="col-md-8">
                <div id="terminos-y-condiciones">
                    <h5 class="titulo-h5 mt-4">TERMINOS Y CONDICIONES</h5>
                    @include('politicas.terminos_condiciones')
                </div>
                <div id="politica-privacidad">
                    <h5 class="titulo-h5 mt-4">POLITICA DE PRIVACIDAD</h5>
                    Fecha de última actualización: 06/08/2023 <br><br>
                    La presente Política de Privacidad establece los términos y condiciones en los cuales
                    EYNGEL, una plataforma digital y red social, operada por Compañía BuildCom SAS, con
                    domicilio en San Luis de Palenque, Colombia, correo electrónico: soporte@eyngel.com,
                    recopila, utiliza, protege y divulga la información personal y no personal recabada de los
                    usuarios de nuestra plataforma y servicios. En adelante, "EYNGEL" se referirá a la
                    plataforma digital y red social, y "Nosotros" o "la Compañía" se referirá a Compañía
                    BuildCom SAS.
                    <br><br>
                    LA INFORMACIÓN QUE RECOPILA EYNGEL <br><br>
                    En Eyngel, recopilamos una variedad de datos para brindar nuestros servicios de manera
                    efectiva. A continuación, se detalla la información que recopilamos: <br><br>
                    a) Información de Registro: Al crear una cuenta en nuestra red social, recopilamos cierta
                    información personal, como su nombre, dirección de correo electrónico, fecha de
                    nacimiento, género y, opcionalmente, una fotografía de perfil. Estos datos se utilizan para
                    crear y gestionar su cuenta de manera segura. <br> <br>
                    b) Información de Contacto: Si decide proporcionar información de contacto adicional,
                    como número de teléfono o dirección postal, recopilaremos estos datos para facilitar la
                    comunicación entre usuarios y mejorar su experiencia en Eyngel. Estos datos son
                    opcionales y solo se recopilan si el usuario decide compartirlos. <br><br>
                    c) Información Demográfica: Podemos recopilar información demográfica, como su
                    ubicación geográfica, idioma preferido, nacionalidad y afiliaciones culturales. Estos datos
                    se utilizan para personalizar su experiencia y adaptar el contenido a sus preferencias
                    regionales. <br><br>
                    d) Historial de Actividad: Recopilamos información sobre sus acciones y actividad en
                    nuestra red social, incluyendo publicaciones, comentarios, mensajes, interacciones con
                    otros usuarios, grupos y eventos, y su participación en encuestas o concursos. Estos datos
                    se utilizan para mejorar nuestros servicios, personalizar su experiencia y ofrecer contenido
                    relevante. <br><br>
                    e) Datos de Acceso y Uso: Recopilamos información sobre su acceso y uso de Eyngel,
                    incluyendo la fecha y hora de inicio y cierre de sesión, la duración de la sesión, las páginas
                    visitadas y las funcionalidades utilizadas. Estos datos nos permiten analizar y optimizar el
                    rendimiento de nuestra plataforma, detectar y prevenir actividades sospechosas o
                    maliciosas, y mejorar la experiencia del usuario. <br><br>
                    f) Información de Dispositivos y Navegadores: Podemos recopilar información sobre los
                    dispositivos y navegadores que utiliza para acceder a Eyngel, como el tipo de dispositivo, la
                    versión del sistema operativo, la dirección IP, el proveedor de servicios de Internet (ISP), el
                    tipo de navegador y las configuraciones de idioma. Estos datos se utilizan para fines de
                    seguridad, solución de problemas técnicos y análisis estadísticos. <br><br>
                    g) Uso de Cámaras y Micrófonos: Si decide utilizar las funciones de cámara o micrófono
                    en Eyngel, podemos recopilar y procesar imágenes y grabaciones de audio generadas por
                    usted para permitir la funcionalidad deseada, como compartir fotos o realizar
                    videollamadas. Estos datos se utilizan exclusivamente para brindar y mejorar estas
                    características específicas. <br><br>
                    h) Datos de Redes Sociales Externas: Si decide vincular su cuenta de Eyngel con otras
                    redes sociales externas, como Facebook o Twitter, podemos recopilar datos limitados de su
                    perfil en esas redes, de acuerdo con las políticas y configuraciones de privacidad de dichas
                    plataformas. Esto nos permite mejorar su experiencia al permitirle compartir contenido y
                    conectarse con otros usuarios de manera más sencilla. <br><br>
                    i) Información Adicional: También podemos recopilar información adicional sobre usted,
                    como su ciudad de residencia, nombres asociados con su cuenta, intereses y preferencias,
                    información de conexión con otros usuarios y cualquier otro dato que decida compartir
                    voluntariamente en Eyngel. Estos datos se utilizan para personalizar aún más su experiencia
                    y brindarle contenido relevante y sugerencias. <br><br>
                    En Eyngel, nos tomamos en serio la privacidad y seguridad de sus datos. Utilizamos esta
                    información recopilada para mejorar nuestros servicios, personalizar su experiencia y
                    garantizar el cumplimiento de nuestras políticas y términos de uso. Siempre respetamos su
                    privacidad y brindamos opciones para que usted controle los datos que comparte con
                    nosotros.
                    <br><br>
                    ESTA PARTE ES OPCIONAL Y ES PARA AQUELLA PERSONA QUE
                    ADQUIERA EL SERVICIO DE VERIFICACIÓN DE CUENTA: <br><br>
                    Además, para aquellos usuarios que adquieran nuestro servicio de verificación de cuenta,
                    ofrecemos funciones adicionales de seguridad basadas en tecnología biométrica. Estas
                    funciones están diseñadas para fortalecer aún más la protección de sus cuentas y garantizar
                    la autenticidad de su identidad. <br><br>
                    Entre las características opcionales que ofrecemos se encuentran: <br><br>
                    1. Verificación Biométrica de Cuenta: Utilizamos tecnología biométrica, como el
                    reconocimiento facial o la huella digital, para verificar la identidad de los usuarios al crear una
                    cuenta en Eyngel. Esta verificación adicional ayuda a prevenir el uso de
                    identidades falsas y garantiza que cada cuenta esté asociada con una persona real. <br><br>
                    2. Autenticación Biométrica: Proporcionamos a nuestros usuarios la opción de utilizar
                    tecnología biométrica, como el escaneo de huellas dactilares o el reconocimiento
                    facial, como un método adicional de autenticación para acceder a sus cuentas. Esta
                    característica añade una capa adicional de seguridad, ya que se requiere una
                    característica única y personal para verificar la identidad del usuario. <br><br>
                    3. Seguridad Reforzada: La biometría también se utiliza para proteger la seguridad de
                    las cuentas en Eyngel. Por ejemplo, si se detecta un intento de inicio de sesión
                    sospechoso o no autorizado, podemos requerir una verificación biométrica adicional
                    para asegurarnos de que solo el propietario legítimo de la cuenta pueda acceder a
                    ella. <br><br>
                    NOTA: Al adquirir nuestro servicio de verificación de cuenta, no solo estarás protegiendo
                    tu cuenta en términos de seguridad, sino que también generarás mayor confianza en las
                    personas que visiten tu perfil. Nuestro sistema de verificación biométrica, desarrollado por
                    Eyngel, demuestra de manera rigurosa que eres una persona confiable y real. Una cuenta
                    verificada transmite una imagen de autenticidad y transparencia, lo cual resulta
                    especialmente importante en situaciones donde la confianza es fundamental, como en
                    transacciones comerciales, colaboraciones profesionales o interacciones sociales en línea.
                    Nuestro exhaustivo análisis realizado por Eyngel garantiza tu fiabilidad y proporciona una
                    capa adicional de credibilidad a tu perfil. De esta manera, demostrarás a otros usuarios que
                    has pasado por un proceso riguroso de verificación y que cumples con los estándares de
                    seguridad establecidos por nuestra plataforma. <br>
                    Queremos enfatizar que la información biométrica recopilada se trata con el máximo
                    cuidado y se almacena de forma segura utilizando técnicas avanzadas de encriptación.
                    Además, cumplimos con todas las leyes y regulaciones de privacidad aplicables para
                    garantizar la protección de los datos biométricos de nuestros usuarios. <br>
                    Al integrar la tecnología biométrica en Eyngel, nos esforzamos por proporcionar una
                    experiencia segura y confiable, al tiempo que protegemos la privacidad y la identidad de
                    nuestros usuarios. Si decide aprovechar nuestro servicio de verificación de cuenta, podrá
                    disfrutar de estas características adicionales de seguridad. <br><br>
                    USO DE LA INFORMACIÓN <br><br>
                    En Eyngel, valoramos tu privacidad y nos comprometemos a utilizar tus datos personales
                    de manera responsable y de acuerdo con las leyes y regulaciones aplicables. Recopilamos
                    información sobre ti a través de varios medios cuando utilizas nuestros servicios, y nos
                    gustaría explicarte cómo utilizamos esa información para brindarte una experiencia
                    personalizada y mejorar nuestros servicios. <br>
                    Operación, mantenimiento, desarrollo y promoción de los Servicios de Eyngel:
                    Utilizamos los datos recopilados para operar, mantener, mejorar y desarrollar todas las
                    funciones, funcionalidades y servicios existentes y nuevos en la plataforma de Eyngel.
                    Además, utilizamos la información para promocionar y publicitar nuestros servicios,
                    incluyendo la personalización de contenido y la creación de campañas de marketing.
                    Garantía de seguridad: Nos preocupamos por la seguridad de nuestros sitios web,
                    productos, software, aplicaciones y eventos en vivo. Utilizamos los datos para garantizar la
                    seguridad de nuestra plataforma, prevenir actividades fraudulentas y abusivas, y proteger la
                    integridad de nuestros servicios. <br>
                    Gestión de relaciones con los usuarios: Utilizamos la información que recopilamos para
                    gestionar las relaciones con los usuarios de Eyngel. Esto incluye la realización y recepción
                    de pagos, así como la comunicación y atención al cliente. <br><br>
                    Personalización de la experiencia del usuario: Utilizamos los datos para mejorar la
                    experiencia de los usuarios en Eyngel. Esto implica recomendar contenido relevante e
                    interesante, incluyendo mensajes publicitarios y de marketing, y personalizar la plataforma
                    para adaptarse a tus preferencias y necesidades. <br><br>
                    Participación en eventos en vivo: Eyngel organiza eventos en vivo que pueden contar con
                    la participación de creadores, oradores y expositores. Durante estos eventos, tanto Eyngel
                    como otras personas pueden tomar fotografías, grabar y transmitir contenido con fines
                    promocionales. Además, en algunos casos, se puede solicitar el escaneo de los emblemas de
                    los asistentes. Al escanear tu emblema o permitir que se realice el escaneo, los datos
                    obtenidos se utilizan para análisis, creación de productos promocionales y gestión de
                    premios. Los expositores también pueden ofrecerte escanear tu emblema, y al permitirlo,
                    comprendes que Eyngel puede transferir tu información personal al expositor, quien puede
                    ponerse en contacto contigo directamente. <br><br>
                    Información de otras fuentes: Además de los datos proporcionados por los usuarios y los
                    recopilados automáticamente, también podemos obtener información adicional de terceros
                    y otras fuentes. Esto incluye anunciantes, socios comerciales, proveedores de servicios de
                    pago y redes sociales como Discord, Steam o YouTube. Si nos has otorgado la autorización
                    correspondiente, podemos acceder a ciertos datos de estas fuentes para complementar la
                    información que recopilamos sobre ti. Utilizamos estos datos para personalizar tu
                    experiencia en Eyngel, ofrecerte contenido y anuncios relevantes, y mejorar nuestros
                    servicios. <br><br>
                    Publicidad y marketing: Utilizamos la información recopilada para ofrecerte anuncios
                    personalizados y contenido promocional que creemos que puede ser de tu interés. Esto
                    puede incluir anuncios dentro de Eyngel y en sitios web y aplicaciones de terceros, así
                    como mensajes de marketing por correo electrónico o notificaciones push en la aplicación.
                    Es importante destacar que en Eyngel nos preocupamos por tu privacidad y seguridad.
                    Implementamos medidas técnicas y organizativas adecuadas para proteger tus datos
                    personales contra el acceso no autorizado, la divulgación, la alteración o la destrucción.
                    En ocasiones, es posible que recibas materiales promocionales o notificaciones
                    relacionadas con los Servicios de Eyngel. Si has instalado la aplicación móvil de Eyngel y
                    deseas dejar de recibir notificaciones push, puedes cambiar la configuración tanto en tu
                    dispositivo móvil como a través de la aplicación. <br><br>
                    En cumplimiento con nuestras obligaciones legales, Eyngel puede recopilar y procesar
                    datos de usuarios cuando sea necesario para cumplir con la normativa legal aplicable en el
                    país en el que operamos. Esto incluye responder a órdenes judiciales, requerimientos
                    judiciales o administrativos, citaciones u otras órdenes legalmente establecidas.
                    Al usar Eyngel, aceptas y consientes que podamos utilizar tus datos personales de acuerdo
                    con los fines y prácticas descritos en nuestra Política de Privacidad. Recuerda que siempre
                    tienes la opción de revisar, corregir, actualizar o eliminar la información personal que nos
                    has proporcionado a través de tu cuenta en los Servicios de Eyngel. <br><br>
                    Queremos asegurarte que en Eyngel nos tomamos muy en serio tu privacidad y seguridad.
                    Implementamos medidas técnicas y organizativas sólidas para proteger tus datos personales
                    contra accesos no autorizados, divulgación, alteración o destrucción indebida. Sin embargo,
                    es importante tener en cuenta que, debido a la complejidad del entorno en línea y a las
                    constantes evoluciones tecnológicas, no podemos garantizar una seguridad absoluta de tus
                    datos en todo momento. A pesar de nuestros esfuerzos continuos para mantener la
                    seguridad de la plataforma y tus datos, debes ser consciente de que existe un riesgo
                    inherente asociado con el uso de Internet y la transmisión de información en línea. Por lo
                    tanto, no podemos hacernos responsables de cualquier acceso no autorizado, divulgación,
                    alteración o destrucción de datos que ocurra fuera de nuestro control razonable. <br><br>
                    Recomendamos encarecidamente que tomes precauciones adicionales para proteger tu
                    información personal, como mantener tu información de inicio de sesión confidencial,
                    utilizar contraseñas seguras, mantener actualizados tus dispositivos y utilizar software de
                    seguridad confiable. Si detectas alguna actividad sospechosa o crees que ha ocurrido un
                    acceso no autorizado a tu cuenta de Eyngel, te recomendamos que nos lo notifiques de
                    inmediato para que podamos tomar las medidas necesarias para proteger tus datos. Nuestro
                    compromiso es trabajar diligentemente para mantener la seguridad de tus datos personales y
                    proteger tu privacidad en la medida de lo posible. Continuaremos evaluando y actualizando
                    nuestras medidas de seguridad para estar al tanto de los avances tecnológicos y las mejores
                    prácticas en la protección de datos. <br><br>
                    CONFIDENCIALIDAD Y PROTECCIÓN DE DATOS <br><br>
                    Eyngel implementa diversas medidas para garantizar la seguridad y la integridad de tus
                    datos. Estas medidas incluyen controles organizativos, técnicos y físicos para proteger tus
                    datos de accesos no autorizados, alteraciones o destrucciones. Estas medidas se adaptan
                    según la sensibilidad de la información que compartes con nosotros. <br><br>
                    Sin embargo, es importante tener en cuenta que ninguna precaución ni sistema de seguridad
                    puede ser totalmente infalible. A pesar de nuestros esfuerzos por proteger tus datos, no
                    podemos garantizar ni certificar la seguridad absoluta de la información que transmites a
                    través de Eyngel. Existen riesgos inherentes a la transmisión de datos por Internet, y no
                    podemos garantizar que tus datos no sean accedidos, revelados, alterados o destruidos
                    debido a violaciones de nuestras medidas de seguridad físicas, técnicas u organizativas.
                    Es importante que tomes medidas de seguridad adicionales por tu cuenta, como proteger tus
                    credenciales de inicio de sesión, utilizar contraseñas fuertes, mantener actualizado tu
                    software y sistema operativo, y evitar acceder a tu cuenta desde dispositivos o redes no
                    seguras. <br><br>
                    En caso de detectar alguna vulnerabilidad en nuestras medidas de seguridad o sospechar
                    que ha habido una violación de la seguridad de tus datos, te recomendamos que nos lo
                    notifiques de inmediato para que podamos tomar las medidas adecuadas para abordar el
                    problema. <br><br>
                    Recuerda que la seguridad de tus datos también depende de ti, y es importante que tomes
                    precauciones al compartir información sensible en línea. <br><br>
                    RETENCIÓN DE DATOS <br><br>
                    Eyngel retiene los datos relacionados con tu uso de la aplicación durante el tiempo
                    necesario para cumplir con los fines descritos en este Aviso de Privacidad y según lo exija
                    la legislación aplicable. Esto significa que conservaremos tus datos el tiempo que sea
                    necesario para cumplir con nuestras obligaciones legales, fiscales y contables, así como
                    para otros propósitos comunicados previamente. <br><br>
                    Cuando decidas cerrar tu cuenta y solicitar la eliminación de la información de tu perfil, nos
                    aseguraremos de eliminar todos los datos que no estemos legalmente obligados a conservar.
                    Esto incluye datos personales y cualquier otra información que hayas proporcionado a
                    Eyngel. Tomamos medidas para garantizar que tus datos sean eliminados de forma
                    adecuada y en cumplimiento con la ley aplicable. <br><br>
                    Sin embargo, es importante tener en cuenta que puede haber ciertos casos en los que no
                    podamos eliminar por completo tus datos debido a obligaciones legales, fiscales o contables
                    específicas que requieran la retención de cierta información por un período de tiempo
                    determinado. En tales casos, garantizaremos que la información se mantenga segura y
                    protegida de acuerdo con esta política de privacidad. <br><br>
                    USUARIOS MAYORES DE EDAD <br><br>
                    En Eyngel también protegemos la privacidad de los menores de edad. Por lo tanto, si tienes
                    menos de 13 años, es posible que no puedas utilizar o acceder a los servicios de Eyngel en
                    ningún momento ni de ninguna manera. <br><br>
                    Entendemos la importancia de salvaguardar la privacidad de los menores y nos
                    comprometemos a no recopilar ni mantener datos personales de menores de 13 años, tal
                    como se define en la legislación de protección de la privacidad en línea de menores de cada
                    país. <br><br>
                    En el caso de que descubramos que se han recopilado datos personales de menores de 13
                    años en los servicios de Eyngel, tomaremos las medidas necesarias para eliminar dichos
                    datos de forma oportuna y adecuada. Sin embargo, Eyngel no será responsable en caso de
                    no lograr detectar de manera inmediata la presencia de un usuario menor de 13 años en sus
                    servicios. Aunque implementamos medidas para garantizar el cumplimiento de la política
                    de edad mínima, es posible que no siempre podamos identificar a los usuarios menores de
                    edad de forma inmediata. <br><br>
                    Si eres padre, madre o tutor legal de un menor de 13 años que ha creado una cuenta en los
                    servicios de Eyngel, te recomendamos que te pongas en contacto con nuestro servicio de
                    atención al cliente a través de nuestro correo electrónico soporte@eyngel.com para solicitar
                    el cierre de la cuenta del menor y la eliminación de sus datos personales. <br><br>
                    En Eyngel cumplimos con las leyes y regulaciones de protección de datos aplicables, y si el
                    tratamiento de datos personales se basa en el consentimiento del interesado, no llevaremos
                    a cabo dicho tratamiento si el usuario no tiene la edad mínima requerida para prestar su
                    consentimiento según la ley de protección de datos correspondiente. Si tenemos
                    conocimiento de que hemos realizado dicho tratamiento de datos con usuarios que no
                    cumplen con la edad mínima requerida, lo interrumpiremos de inmediato y tomaremos las
                    medidas necesarias para eliminar los datos correspondientes de nuestros registros sin
                    demora. <br><br>
                    Es responsabilidad de los padres, madres o tutores legales supervisar y controlar el uso de
                    Internet por parte de los menores y garantizar que cumplan con las leyes y regulaciones
                    aplicables en materia de privacidad y protección de datos. <br><br>
                    LIMITACIÓN DE RESPONSABILIDAD
                    <br><br>
                    Al utilizar EYNGEL, usted acepta que es mayor de edad y que comprende y acepta los
                    términos y condiciones de esta Política de Privacidad. Reconoce y acepta que la Compañía
                    no se hace responsable de ningún uso no autorizado de la información personal que pueda
                    ocurrir debido a factores fuera de nuestro control, como brechas de seguridad o acciones de
                    terceros no autorizados. <br><br>
                    CONSENTIMIENTO Y ACEPTACIÓN <br><br>
                    Al acceder y utilizar EYNGEL, usted acepta esta Política de Privacidad y consiente el uso y
                    la recopilación de su información personal según lo descrito en esta Política.
                    FUSIÓN O VENTA
                    En caso de que Eyngel, o la totalidad o parte de los activos relacionados con los servicios
                    de Eyngel, sean adquiridos por o fusionados con una tercera entidad, o en el marco de una
                    operación proyectada de cambio de control, nos reservamos el derecho, en cualquiera de
                    estas circunstancias, a transferir o ceder los datos que hayamos recopilado de los usuarios
                    como parte de dicha fusión, adquisición o cambio de control, incluyendo en el transcurso de
                    la correspondiente diligencia debida. <br><br>
                    En tales situaciones, nos esforzaremos por notificar a los usuarios sobre el cambio de
                    control y la transferencia de sus datos personales, y obtendremos el consentimiento
                    correspondiente si así lo exige la legislación aplicable. La tercera entidad que adquiera o se
                    fusione con Eyngel o los activos relacionados con los servicios de Eyngel también estará
                    sujeta a los términos y condiciones de este Aviso de Privacidad y deberá cumplir con las
                    leyes aplicables en materia de protección de datos. <br><br>
                    Es importante tener en cuenta que, en caso de una fusión, adquisición o cambio de control,
                    la tercera entidad adquirente o fusionada puede tener políticas de privacidad y prácticas de
                    protección de datos diferentes a las de Eyngel. Por lo tanto, te recomendamos revisar la
                    política de privacidad de la tercera entidad después de cualquier transacción de este tipo
                    para conocer cómo manejan tus datos personales. <br><br>
                    MODIFICACIONES A LA POLÍTICA DE PRIVACIDAD <br><br>
                    Nos reservamos el derecho de modificar o actualizar esta Política de Privacidad en
                    cualquier momento. Cualquier cambio significativo se notificará a través de nuestra
                    plataforma o por otros medios adecuados. Le recomendamos que revise periódicamente
                    esta Política de Privacidad para estar informado sobre cómo manejamos y protegemos su
                    información personal. <br><br>
                    TRANSFERENCIA INTERNACIONAL DE DATOS <br><br>
                    En el caso de Eyngel, los datos que recopilamos pueden ser almacenados o procesados en
                    tu región, así como en otros países donde Compañía Buildcom SAS o sus entidades
                    relacionadas, afiliadas, socios o proveedores de servicios tengan presencia o mantengan
                    instalaciones. Esto incluye la posibilidad de que los datos se almacenen en Estados Unidos,
                    donde se encuentran nuestros principales centros de datos. <br>
                    Cuando proporcionemos datos sobre ti a estas entidades, tomaremos las medidas adecuadas
                    para garantizar que tus datos estén protegidos de manera apropiada y de acuerdo con este
                    Aviso de Privacidad y las leyes de privacidad aplicables. <br>
                    En el caso de transferencias internacionales de datos, nos aseguraremos de cumplir con los
                    requisitos legales aplicables. Esto puede incluir la implementación de cláusulas
                    contractuales estándar, el uso de mecanismos de certificación reconocidos o la obtención de
                    tu consentimiento explícito cuando sea necesario. <br>
                    Es importante destacar que las leyes de protección de datos pueden variar de un país a otro,
                    y es posible que la protección de tus datos en determinadas jurisdicciones no sea
                    equivalente a la ofrecida en tu país de residencia. Sin embargo, independientemente de
                    dónde se almacenen o procesen tus datos, tomaremos las medidas necesarias para proteger
                    tu privacidad y cumplir con las leyes aplicables en materia de protección de datos. <br><br>
                    DERECHOS DE LOS USUARIOS <br><br>
                    Como usuario de EYNGEL, usted tiene ciertos derechos en relación con su información
                    personal. Estos derechos pueden incluir:
                    a) Acceso: Derecho a solicitar información sobre los datos personales que tenemos sobre
                    usted y a obtener una copia de dichos datos. <br><br>
                    b) Rectificación: Derecho a solicitar la corrección de datos personales inexactos o
                    incompletos. <br><br>
                    c) Eliminación: Derecho a solicitar la eliminación de sus datos personales en determinadas
                    circunstancias, como cuando los datos ya no sean necesarios para los fines para los que
                    fueron recopilados. <br><br>
                    d) Restricción: Derecho a solicitar la restricción del procesamiento de sus datos personales
                    en ciertas situaciones, como cuando impugna la exactitud de los datos o se opone al
                    procesamiento. <br><br>
                    e) Portabilidad: Derecho a recibir sus datos personales en un formato estructurado, de uso
                    común y legible por máquina, y a transmitir esos datos a otro responsable del tratamiento,
                    en la medida en que sea técnicamente posible. <br><br>
                    f) Oposición: Derecho a oponerse al procesamiento de sus datos personales en ciertas
                    circunstancias, incluido el procesamiento con fines de marketing directo. <br><br>
                    g) Retiro del consentimiento: Si ha otorgado su consentimiento para el procesamiento de
                    sus datos personales, tiene el derecho de retirar ese consentimiento en cualquier momento.
                    Esto puede hacerse al dejar de utilizar nuestra plataforma y eliminar su cuenta de usuario. <br><br>
                    SITIOS WEB Y SERVICIOS DE TERCEROS <br><br>
                    Es importante tener en cuenta que Eyngel no se hace responsable de las prácticas de
                    privacidad de terceros ni del manejo de tus datos personales por parte de ellos. Te
                    sugerimos que revises cuidadosamente las políticas de privacidad y los términos de uso de
                    cualquier sitio web o servicio de terceros al que accedas a través de los Servicios de
                    Eyngel. <br><br>
                    Además, cuando te conectas a servicios de terceros a través de Eyngel, es posible que se
                    recopilen datos adicionales sobre ti por parte de esos terceros. Estos datos se regirán por las
                    políticas de privacidad de esos terceros, y Eyngel no tiene control ni responsabilidad sobre
                    el manejo de esos datos por parte de terceros. <br><br>
                    En resumen, al utilizar los Servicios de Eyngel y acceder a sitios web o servicios de
                    terceros a través de ellos, es importante que revises y comprendas las políticas de
                    privacidad y términos de uso de esos terceros para proteger tu privacidad y seguridad en
                    línea. <br><br>
                    EXTENSIONES Y APLICACIONES <br><br>
                    Es correcto, cuando interactúas con una Extensión en Eyngel, el desarrollador que opera
                    esa Extensión puede recibir datos sobre ti, similares a los descritos anteriormente en el
                    apartado "Datos recogidos de forma automática". Sin embargo, Eyngel no proporcionará tu
                    nombre o ID de usuario a los desarrolladores de Extensiones a menos que otorgues acceso
                    dentro de la Extensión o instales la Extensión en tu perfil. Es tu responsabilidad
                    proporcionar cualquier información al desarrollador de forma independiente, ya sea a través
                    de un formulario web incluido en la Extensión o visitando el sitio web del desarrollador.
                    Además de las Extensiones, los desarrolladores también pueden crear Aplicaciones que no
                    se encuentran en la página del perfil o en Eyngel. En Eyngel, requerimos a los
                    desarrolladores de Extensiones y Aplicaciones que procesen tus datos únicamente para los
                    fines establecidos en nuestro Acuerdo de Servicios para Desarrolladores. Te recomendamos
                    visitar el sitio web de la Aplicación o la página informativa de la Extensión para leer la
                    política de privacidad que el desarrollador haya publicado, ya que puede contener
                    información adicional sobre sus prácticas de privacidad.
                    En general, es importante que estés consciente de las políticas de privacidad y términos de
                    uso de las Extensiones y Aplicaciones que utilices en Eyngel, y que tomes las precauciones
                    necesarias al proporcionar información a los desarrolladores de dichas Extensiones y
                    Aplicaciones. <br><br>
                    ANUNCIANTES Y PROVEEDORES DE ANÁLISIS <br><br>
                    Eyngel puede utilizar servicios de análisis web de terceros para evaluar el uso que los
                    usuarios hacen de los servicios de Eyngel. Estos proveedores de servicios utilizan
                    tecnologías de seguimiento, como cookies, para recopilar datos sobre cómo interactúas con
                    los servicios de Eyngel. Los datos recopilados, que se describen en el apartado "Datos
                    recopilados de forma automática", son obtenidos directamente por estos servicios y se
                    procesan con el fin de analizar y evaluar el uso de los servicios de Eyngel.
                    Además, Eyngel puede colaborar con redes publicitarias de terceros, anunciantes y
                    proveedores de análisis publicitario para ofrecerte anuncios más relevantes y medir su
                    rendimiento tanto dentro como fuera de los servicios de Eyngel. En este contexto, se
                    pueden compartir datos como cookies e identificadores de publicidad móvil con estos
                    terceros, ya sea que Eyngel los comparta directamente o que los terceros los recopilen
                    directamente. Estos datos se utilizan para realizar actividades publicitarias, como
                    comprender tu respuesta a los anuncios y mostrarte anuncios relevantes. Eyngel también
                    puede trabajar con terceros para mostrarte anuncios fuera de sus propios servicios. En estos
                    casos, se pueden compartir datos como tu dirección de correo electrónico o identificador de
                    dispositivo reiniciable para que el socio publicitario pueda compararlos con otra
                    información que posea sobre ti. <br>
                    Es importante tener en cuenta que este Aviso de Privacidad no se aplica a las actividades y
                    tecnologías de seguimiento utilizadas por los Anunciantes de Eyngel, ya que ellos no están
                    bajo el control de Eyngel. Te recomendamos que consultes las políticas de privacidad de
                    los Anunciantes de Eyngel y entidades similares para obtener más información sobre sus
                    prácticas de privacidad y cómo optar por no recibir sus actividades publicitarias. <br><br>
                    NO SEGUIMIENTO <br><br>
                    Eyngel no respalda ni reconoce las señales de DNT (Do Not Track, por sus siglas en inglés)
                    iniciadas por los navegadores. Esto significa que, aunque configures tu navegador para
                    solicitar que no se rastree tu actividad en línea, Eyngel puede seguir recopilando ciertos
                    datos sobre tus visitas y actividades en nuestra plataforma.
                    Sin embargo, queremos asegurarte que en Eyngel valoramos la privacidad de nuestros
                    usuarios y nos comprometemos a tratar tus datos de manera segura y confidencial.
                    Implementamos medidas de seguridad y seguimos las mejores prácticas de la industria para
                    proteger tu información personal. <br><br>
                    CONTACTO <br><br>
                    Si tiene alguna pregunta, inquietud o solicitud relacionada con esta Política de Privacidad, o
                    si desea ejercer alguno de sus derechos como usuario, puede ponerse en contacto con
                    nosotros utilizando la siguiente información: <br>
                    Compañía BuildCom SAS
                    Dirección: Finca Maturin/Vrd Santa Teresa, San Luis de Palenque, Casanare, Colombia.
                    Correo electrónico: soporte@eyngel.com <br><br>
                    MODIFICACIONES A LA POLÍTICA DE PRIVACIDAD <br><br>
                    Nos reservamos el derecho de modificar o actualizar esta Política de Privacidad en
                    cualquier momento. Cualquier cambio significativo se notificará a través de nuestra
                    plataforma o por otros medios adecuados. Le recomendamos que revise periódicamente
                    esta Política de Privacidad para estar informado sobre cómo manejamos y protegemos su
                    información personal. <br>
                    Al aceptar esta Política de Privacidad y al navegar por EYNGEL, usted reconoce y acepta
                    todos los términos y condiciones establecidos en esta Política, incluyendo el uso y la
                    recopilación de su información personal para los fines mencionados anteriormente. <br>
                    Fecha de última actualización: 06/08/2023
                </div>
                <div id="politica-cookies">
                    <h5 class="titulo-h5 mt-4">POLITICA DE COOKIES</h5>
                    Fecha de última actualización: 06/08/2023 <br>
                    Agradecemos su interés en EYNGEL, una plataforma digital y red social proporcionada por
                    Compañía BuildCom SAS. Esta política de cookies establece cómo utilizamos las cookies y
                    tecnologías similares en EYNGEL. Al acceder y utilizar EYNGEL, usted acepta los términos y
                    condiciones establecidos en esta política de cookies. <br><br>
                    1. ¿Qué son las cookies? Las cookies son pequeños archivos de texto que se almacenan en su
                    dispositivo cuando visita un sitio web. Estas cookies pueden contener información sobre su visita
                    al sitio web y se utilizan para mejorar su experiencia de usuario. Además de las cookies, también
                    utilizamos tecnologías similares, como píxeles de seguimiento y almacenamiento local, para
                    recopilar y almacenar información. <br><br>
                    TIPOS DE COOKIES <br><br>
                    Tipos de cookies utilizadas Utilizamos diferentes tipos de cookies en EYNGEL con diversos
                    propósitos. A continuación, se describen los tipos de cookies que utilizamos: <br><br>
                    2.1 Cookies esenciales: Estas cookies son necesarias para el funcionamiento básico de EYNGEL y le
                    permiten navegar por el sitio web y utilizar sus funciones. Sin estas cookies, es posible que no
                    pueda acceder a ciertas áreas de EYNGEL o utilizar algunas de sus características. <br><br>
                    2.2 Cookies de rendimiento: Estas cookies recopilan información sobre cómo los usuarios
                    interactúan con EYNGEL, como las páginas visitadas, la duración de la visita, los errores
                    encontrados, etc. Utilizamos esta información para mejorar el rendimiento y la usabilidad de
                    EYNGEL. <br><br>
                    2.3 Cookies de funcionalidad: Estas cookies permiten recordar las opciones que ha elegido en
                    EYNGEL, como su idioma preferido, preferencias de configuración y otras opciones personalizadas.
                    También se utilizan para proporcionar características mejoradas y personalizadas. <br><br>
                    2.4 Cookies de publicidad: Utilizamos cookies de publicidad para mostrar anuncios relevantes en
                    EYNGEL. Estas cookies recopilan información sobre sus visitas anteriores al sitio web y la
                    comparten con terceros anunciantes y redes de publicidad. Esto nos ayuda a ofrecer anuncios más
                    relevantes y a medir la efectividad de nuestras campañas publicitarias. <br><br>
                    2.5 Cookies de redes sociales: EYNGEL utiliza cookies de redes sociales para permitirle compartir
                    contenido en plataformas de redes sociales y para rastrear su actividad en EYNGEL con fines
                    publicitarios. Estas cookies están controladas por terceros y están sujetas a sus propias políticas de
                    privacidad y cookies. <br><br>
                    GESTIÓN DE COOKIES <br><br>
                    Gestión de cookies Puede administrar las cookies en EYNGEL según sus preferencias. Puede
                    modificar la configuración de su navegador para bloquear o eliminar cookies, o puede configurarlo
                    para que le avise cuando se envíen cookies. Tenga en cuenta que al desactivar o rechazar las
                    cookies, es posible que algunas características de EYNGEL no funcionen correctamente y su
                    experiencia de usuario pueda verse afectada. <br><br>
                    COOKIES DE TERCEROS <br><br>
                    Además de las cookies mencionadas anteriormente, también podemos utilizar cookies de terceros
                    en EYNGEL. Estas cookies son proporcionadas por terceros, como socios publicitarios y
                    proveedores de servicios, y se utilizan para diversos fines, como publicidad personalizada, análisis
                    de datos y mejora de la funcionalidad del sitio web. Estas cookies están sujetas a las políticas de
                    privacidad y cookies de los terceros correspondientes. <br><br>
                    CONSENTIMIENTO DE COOKIES <br><br>
                    Al acceder y utilizar EYNGEL, usted acepta el uso de cookies de acuerdo con esta política de
                    cookies. Al visitar el sitio web por primera vez, se le mostrará un aviso de cookies que le informará
                    sobre el uso de cookies y solicitará su consentimiento. Puede aceptar o rechazar el uso de cookies
                    a través de las opciones proporcionadas en el aviso de cookies. <br><br>
                    CAMBIOS EN LA POLÍTICA DE COOKIES <br><br>
                    Nos reservamos el derecho de modificar esta política de cookies en cualquier momento. Cualquier
                    cambio entrará en vigor a partir de su publicación en EYNGEL. Le notificaremos sobre cambios
                    significativos en esta política a través de un aviso en el sitio web o por otros medios razonables. Le
                    recomendamos que revise periódicamente esta política de cookies para estar al tanto de las
                    actualizaciones. <br><br>
                    CONTACTO <br><br>
                    Si tiene alguna pregunta, inquietud o solicitud relacionada con esta política de cookies o el uso de
                    cookies en EYNGEL, puede ponerse en contacto con nosotros a través de los siguientes datos de
                    contacto: <br>
                    Compañía BuildCom SAS <br>
                    Dirección: Finca Maturin/Vrd Santa Teresa, San Luis de Palenque, Casanare, Colombia.
                    Correo electrónico: soporte@eyngel.com
                    Le agradecemos por leer nuestra política de cookies y confiar en EYNGEL. Estamos comprometidos
                    con la protección de su privacidad y el uso seguro de las cookies para mejorar su experiencia en
                    nuestro sitio web. <br><br>
                    Fecha de última actualización: 06/08/2023
                </div>
                <div id="politica-verificacion-cuenta">
                    <h5 class="titulo-h5 mt-4">POLITICA DE VERIFICACIÓN DE CUENTA Eyngel</h5>
                    Fecha actualización: 06/08/2023 <br><br>
                    En Eyngel, nos enorgullece ofrecer un servicio de verificación de cuenta opcional para
                    aquellos usuarios que deseen fortalecer la autenticidad y la confianza en su perfil. Si
                    decides adquirir el servicio de verificación de cuenta, te pedimos que leas y aceptes nuestra
                    Política de Verificación de Cuenta adicional a continuación: <br><br>
                    1. CONSENTIMIENTO PARA LA VERIFICACIÓN: Al adquirir el servicio de
                    verificación de cuenta, aceptas de manera voluntaria someterte al proceso de
                    verificación proporcionando la información requerida por Eyngel. Esta información
                    puede incluir datos personales como nombre completo, dirección, documento de
                    identidad y cualquier otro detalle que sea necesario para llevar a cabo la
                    verificación. Al aceptar nuestra Política de Verificación de Cuenta, nos otorgas el
                    consentimiento para procesar y utilizar esta información con el propósito exclusivo
                    de verificar tu cuenta en Eyngel. <br><br>
                    2. PRIVACIDAD Y CONFIDENCIALIDAD: En Eyngel, nos comprometemos a
                    proteger tu privacidad y mantener la confidencialidad de los datos proporcionados
                    durante el proceso de verificación. Toda la información suministrada será tratada de
                    acuerdo con nuestras políticas de privacidad y se utilizará exclusivamente para los
                    fines de verificación. No compartiremos tus datos personales con terceros sin tu
                    consentimiento expreso, a menos que esté requerido por ley. <br><br>
                    3. SEGURIDAD DE LOS DATOS: Implementamos medidas de seguridad
                    adecuadas para proteger los datos proporcionados durante el proceso de
                    verificación. Sin embargo, es importante que entiendas que ninguna plataforma en
                    línea puede garantizar una seguridad absoluta. Te recomendamos tomar
                    precauciones adicionales para proteger tu cuenta y cualquier información personal
                    relacionada. <br><br>
                    4. MANTENIMIENTO DE LA VERIFICACIÓN: Al adquirir el servicio de
                    verificación de cuenta, te comprometes a mantener la información de tu cuenta
                    actualizada y notificar cualquier cambio relevante a Eyngel de manera oportuna.
                    Esto incluye cambios en la información de contacto, como dirección de correo
                    electrónico, número de teléfono u otros detalles necesarios para la verificación.
                    Mantener tu información actualizada garantiza la continuidad de tu cuenta
                    verificada y evita cualquier interrupción en los servicios asociados. <br><br>
                    LIMITACIONES Y RESPONSABILIDADES: <br><br> Reconocemos que el servicio de
                    verificación de cuenta proporciona una capa adicional de autenticidad y confianza
                    en tu perfil de Eyngel. Sin embargo, es importante comprender que la verificación
                    de cuenta no garantiza por completo la ausencia de perfiles falsos o actividades
                    maliciosas. En este sentido, Eyngel no asume responsabilidad por las acciones
                    tomadas por otros usuarios, independientemente de su estado de verificación.
                    Cada usuario es responsable de sus propias interacciones y debe ejercer el juicio y la
                    precaución adecuados al interactuar con otros usuarios en la plataforma. Aunque
                    nos esforzamos al máximo para garantizar que todos los perfiles verificados sean
                    auténticos al 100%, no podemos garantizar una autenticidad absoluta en todas las
                    interacciones y transacciones realizadas en Eyngel. <br><br>
                    Es fundamental que todos los usuarios adopten una actitud vigilante y utilicen su
                    discernimiento al establecer conexiones y realizar transacciones en la plataforma.
                    Recomendamos revisar cuidadosamente la información de los perfiles, comunicarse
                    de manera clara y mantenerse alerta ante cualquier actividad sospechosa.
                    5. PAGOS MENSUALES: El servicio de verificación de cuenta en Eyngel requiere
                    un pago mensual. Los detalles sobre los costos y los métodos de pago estarán
                    disponibles en nuestra plataforma. También nos reservamos el derecho de ofrecer
                    promociones especiales en determinados momentos, lo cual será comunicado
                    oportunamente a los usuarios. <br><br>
                    6. COMPROMISO CON LA AUTENTICIDAD: <br><br> Aunque no nos hacemos
                    responsables por el uso informal de perfiles en Eyngel, nos esforzamos al máximo
                    para garantizar que todos los perfiles verificados sean auténticos al 100%. Sin
                    embargo, es importante tener en cuenta que, a pesar de nuestros esfuerzos, no
                    podemos garantizar una autenticidad absoluta en todas las interacciones y
                    transacciones realizadas en la plataforma. <br><br>
                    7. VERIFICACIÓN PARA EMPRESAS: En el caso de cuentas empresariales, se
                    requerirá la presentación de documentos legales adicionales, como certificados de
                    registro, licencias comerciales u otros documentos relevantes para validar la
                    existencia y legitimidad de la empresa. <br><br>
                    Al adquirir el servicio de verificación de cuenta, se entiende que aceptas y te comprometes
                    a cumplir con nuestra Política de Verificación de Cuenta adicional. Reconoces que el
                    cumplimiento de esta política es esencial para mantener la integridad y la confianza en la
                    plataforma Eyngel. <br><br>
                    Entendemos que el incumplimiento de esta política puede tener consecuencias graves,
                    incluida la suspensión o eliminación de tu cuenta de Eyngel. Por lo tanto, es importante que
                    te asegures de comprender y cumplir con los requisitos establecidos en nuestra política.
                    Te animamos a revisar detenidamente nuestra Política de Verificación de Cuenta antes de
                    adquirir el servicio y, si tienes alguna pregunta o inquietud, no dudes en comunicarte con
                    nuestro equipo de soporte. Estamos aquí para ayudarte y asegurarnos de que tengas una
                    experiencia positiva y segura en Eyngel. <br><br>
                    En Eyngel, valoramos tu confianza y estamos comprometidos a brindarte una experiencia
                    segura y auténtica. Agradecemos tu apoyo y cooperación al adquirir nuestro servicio de
                    verificación de cuenta y aceptar nuestra Política de Verificación de Cuenta adicional. <br><br>
                    INFORMACIÓN DE CONTACTO <br><br>
                    Los servicios de Eyngel son proporcionados por Compañía Buildcom SAS, con NIT
                    901593376-6, y tienen su sede en la siguiente dirección: <br>
                    Dirección: Finca Maturin/Vrd Santa Teresa, San Luis de Palenque, Casanare, Colombia.
                    Si eres residente de Colombia y deseas solicitar información, puedes enviar una carta a la
                    dirección mencionada, incluyendo tu dirección de correo electrónico y una solicitud
                    específica. Nos comprometemos a enviarte la información solicitada por correo electrónico.
                    Si tienes preguntas adicionales o necesitas más información, visita nuestro Centro de
                    soporte en el sitio web www.eyngel.com o escríbenos a soporte@eyngel.com, atendido por
                    nuestro Servicio al Cliente. <br><br>
                    Ten en cuenta que Eyngel no está obligado a participar en la resolución de conflictos a
                    través de la plataforma en línea ofrecida por la Comisión Europea.
                    Para solicitudes de información y notificaciones legales, utiliza la siguiente dirección:
                    Compañía Buildcom SAS
                    Departamento Legal
                    Dirección: Finca Maturin/Vrd Santa Teresa, San Luis de Palenque, Casanare, Colombia.
                    Correo: soporte@eyngel.com <br><br>
                    Fecha actualización: 06/08/2023
                </div>
            </div>
        </div>
    </div>
@endsection
