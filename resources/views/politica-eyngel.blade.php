@extends('layouts.app')
@section('content')
    <div class="container p-4">
        <div class="d-flex mt-4">
            <img class="mt-3" style="width: 40px; object-fit: contain"
                src="{{ asset('images/icons/icon-logo-40x40px.png') }}" alt="">
            <h3 class="titulo-h3 mt-4" style="margin-left: 20px">Al usar Eyngel está aceptando:</h3>
        </div>
        <div class="row">
            <div class="col-md-4">
                <ul class="ul-pol mt-4">
                    <li><a href="#terminos-y-condiciones">Terminos y condiciones</a></li>
                    <li><a href="#politica-privacidad">Politica de privacidad</a></li>
                    <li><a href="#politica-cookies">Politica de cookies</a></li>
                    <li><a href="#politica-verificacion-cuenta">Politica verificación de cuenta</a></li>
                    <li><a href="#politica-monetizacion">Politica de monetización</a></li>
                    <li><a href="#accesibilidad-eyngel">Declaración de accesibilidad de Eyngel</a></li>
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
                <div id="politica-monetizacion">
                    <h5 class="titulo-h5 mt-4">POLITICA DE MONETIZACIÓN PARA CREADORES DE CONTENIDO</h5>
                    Fecha de última actualización: 06/08/2023 <br> <br>
                    En eyngel, nos comprometemos a proporcionar a los creadores de contenido una plataforma
                    digital que les permita monetizar su talento y esfuerzo. Esta Política de Monetización
                    establece los términos y condiciones detallados bajo los cuales los creadores de contenido
                    pueden obtener ganancias a través de nuestra plataforma. Al enviar una solicitud de
                    postulación como creador de contenido en eyngel, aceptas cumplir con esta política en su
                    totalidad. <br><br>
                    1. REQUISITOS DE ELEGIBILIDAD: Para postularse como creador de contenido
                    en eyngel y ser elegible para la monetización, debes cumplir con los siguientes
                    requisitos: a) Ser mayor de edad o contar con el consentimiento y supervisión de un
                    tutor legal para participar en el programa de monetización. b) Contar con un mínimo
                    de 3,000 usuarios visitando tu perfil de Eyngel. Los visitantes representan la
                    audiencia de tu perfil en la plataforma. c) Tener un mínimo de 50,000 EY. Los EY
                    son una medida utilizada para cuantificar las visualizaciones, interacciones y
                    estrellas que los creadores de contenido obtienen cuando los usuarios o sus
                    visitantes consumen su contenido en Eyngel. Los requisitos de elegibilidad podrán
                    ser modificados por eyngel en cualquier momento a su discreción. Es tu
                    responsabilidad cumplir con los requisitos actuales establecidos por eyngel para
                    participar en el programa de monetización. <br><br>
                    <strong>Este requisito también se aplica a los creadores de contenido en formato de
                        audio, como artistas musicales, podcasters.</strong> <br><br>
                    2. GANANCIAS Y DISTRIBUCIÓN DE INGRESOS: Al ser aceptado como
                    creador de contenido en eyngel, tendrás la oportunidad de generar ingresos a través
                    de la colocación de publicidad en tu contenido. El 75% de los ingresos generados
                    por la publicidad colocada en tu contenido serán para ti como creador de contenido,
                    y el 25% restante será para eyngel. Los ingresos generados se calcularán
                    mensualmente, al finalizar el mes, y se enviarán después de 30 días una vez que
                    eyngel haya realizado el corte correspondiente y te haya facturado por el primer mes
                    pasado. El umbral mínimo de retiro de ganancias es de $80 USD. Una vez que
                    hayas alcanzado este monto, podrás solicitar el retiro de tus ganancias. Para
                    garantizar la transparencia y la confiabilidad del proceso de monetización, eyngel
                    llevará un registro detallado de las reproducciones y EY generados por el contenido de cada creador. Los
                    datos estarán disponibles en el panel de control del creador de
                    contenido para su seguimiento y verificación. <br><br>
                    <strong>Este requisito también se aplica a los creadores de contenido en formato de
                        audio, como artistas musicales, podcasters.</strong><br><br>
                    3. MONETIZACIÓN DE MÚSICA, PODCASTS U OTROS FORMATOS DE
                    AUDIO: <br>
                    En eyngel, los creadores de contenido en formato de audio, como artistas musicales,
                    podcasters y otros, tienen la oportunidad de generar ingresos a través de diversas
                    formas: <br><br>
                    Interacciones de la audiencia: Los creadores de contenido pueden obtener
                    ingresos basados en la cantidad de interacciones que su audiencia tiene al escuchar
                    su contenido. Estas interacciones pueden incluir reproducciones, comentarios,
                    compartidos y otros tipos de participación de los usuarios. <br><br>
                    Uso de audio por otros creadores de contenido: Si eres un creador de contenido
                    en formato de audio y otro usuario utiliza tu música, podcast o cualquier otro tipo de
                    audio en su propio contenido, puedes recibir una retribución en EY por cada vez
                    que tu audio sea utilizado. Esto proporciona una oportunidad adicional para generar
                    ingresos a través de la utilización de tu contenido por parte de otros creadores en
                    eyngel. <br><br>
                    4. ¿QUÉ SON LOS EY? Los EY son una medida de Eyngel que valora la cantidad de
                    interacciones reales que tu contenido recibe por parte de tu audiencia cada vez que
                    lo ven, escuchan o utilizan. La conversión dependerá del tipo de contenido que estés
                    monetizando, ya sea música, podcasts, videos, entre otros. Para obtener información
                    más detallada sobre las conversiones y opciones de envío de dinero, podrás acceder
                    al panel administrador después de ser aceptado como colaborador de Eyngel.
                    Además de PayPal y transferencia bancaria a tu cuenta bancaria nacional, Eyngel
                    también puede ofrecer otras opciones de envío de dinero, que estarán disponibles en
                    el panel administrador. <br><br>
                    5. PROGRAMA DE VALORACIÓN DE CALIDAD DE CONTENIDO:
                    Programa de Valoración de Calidad de Contenido: En eyngel, valoramos la calidad
                    del contenido y reconocemos el talento de nuestros creadores. Por ello, hemos
                    desarrollado un programa especial para evaluar y premiar el arte y la creatividad de
                    los colaboradores de contenido. Ocasionalmente, eyngel organizará competencias y
                    desafíos en los que se invitará a los creadores de contenido a participar y demostrar
                    su talento en diferentes áreas artísticas, como videos, audios, imágenes u otros formatos relevantes en
                    la plataforma. Para ser elegible y participar en estos
                    programas, los creadores de contenido deben contar con un mínimo de <strong>10,000
                        usuarido visitando su perfil de eyngel</strong> . Las visitas representan la interacción y el
                    apoyo de su audiencia en la plataforma. Durante estas competencias, se medirá la
                    interacción y el engagement generado por cada participante. Los criterios
                    específicos de evaluación pueden variar según la naturaleza del desafío, pero se
                    tendrán en cuenta aspectos como la originalidad, la calidad técnica, la narrativa y la
                    conexión con la audiencia. El creador de contenido que obtenga la mayor
                    interacción y destaque en términos de calidad y creatividad en el desafío
                    correspondiente será reconocido y recibirá beneficios adicionales en eyngel. Los
                    beneficios adicionales pueden incluir mayor visibilidad en la plataforma, promoción
                    especial de su contenido, acuerdos de patrocinio, acceso a oportunidades exclusivas
                    de colaboración y otros incentivos que eyngel determine en cada competencia. La
                    participación en estas competencias es opcional, y cada creador de contenido tendrá
                    la libertad de decidir si desea participar o no en función de su disponibilidad y
                    preferencias personales. <br><br>
                    6. PROGRAMA DE COMPETENCIA DE CREADORES DE CONTENIDO: <br>
                    Como colaborador de eyngel, tendrás la oportunidad de participar en el programa de
                    Competencia de Creadores de Contenido. La Competencia de Creadores de
                    Contenido consiste en subir videos, audios, imágenes u otros tipos de contenido
                    según lo solicitado por las marcas interesadas en anunciarse en eyngel. Para ser
                    elegible y participar en el programa de Competencia de Creadores de Contenido,
                    debes cumplir con los siguientes requisitos: a) Contar con un mínimo de 40,000
                    visitando tu perfil de eyngel. Las visitas representan la interacción de las personas
                    que te visitan, lo cual refleja tu audiencia o público en la plataforma. Durante la
                    competencia, las marcas evaluarán los contenidos enviados por los creadores de
                    contenido elegibles. La forma de evaluación y los criterios pueden variar según las
                    exigencias específicas de cada marca. Las marcas seleccionarán al creador de
                    contenido que consideren más adecuado para representar su marca en las campañas
                    publicitarias, tomando en cuenta aspectos como la calidad del contenido, el enfoque
                    creativo y la conexión con la audiencia. El creador de contenido seleccionado como
                    representante de la marca podrá recibir beneficios adicionales, como acuerdos de
                    patrocinio, mayor visibilidad y oportunidades de crecimiento en eyngel. <br>
                    Nota: La participación en el programa de Competencia de Creadores de Contenido
                    es opcional y no afectará tu participación en el programa de monetización regular. <br><br>
                    7. MONETIZACIÓN EXTERNA: Además de la monetización interna en eyngel, los
                    creadores de contenido en general, ya sean músicos, creadores de videos, artistas
                    visuales, fotógrafos u otros, también tienen la oportunidad de generar ingresos a
                    través de la monetización externa. Esto implica colaborar con marcas y empresas que deseen promocionar
                    sus productos o servicios a través de tu contenido en
                    eyngel. Cuando una empresa está interesada en que promociones su marca en tu
                    perfil, puede establecer un acuerdo contigo para que realices publicaciones o
                    menciones relacionadas con sus productos o servicios. Estas colaboraciones suelen
                    basarse en la audiencia o seguidores que tienes en eyngel, ya que las marcas buscan
                    llegar a un público amplio y comprometido. Es importante destacar que estos
                    contenidos patrocinados o de promoción externa no serán monetizados directamente
                    por eyngel. La compensación por estas colaboraciones será acordada entre el
                    creador de contenido y la empresa interesada, y generalmente implica el pago de
                    una tarifa o una contraprestación acordada. Independientemente del tipo de
                    contenido que crees en eyngel, ya sea música, videos, imágenes, etc., si tienes una
                    audiencia significativa, es posible atraer el interés de marcas y empresas que deseen
                    llegar a tu público objetivo. La monetización externa puede brindarte una
                    oportunidad adicional para diversificar tus fuentes de ingresos como creador de
                    contenido. Es importante tener en cuenta que al realizar colaboraciones o menciones
                    de marcas en tu perfil de eyngel, debes seguir las políticas y regulaciones
                    establecidas por eyngel, así como cumplir con las leyes y normativas relacionadas
                    con la publicidad y la divulgación de contenido patrocinado en tu región o país.
                    Además, es recomendable establecer acuerdos claros y transparentes con las marcas
                    para garantizar una colaboración justa y beneficiosa para ambas partes. <br><br>
                    8. CONTENIDO PROHIBIDO: No se permitirá la publicación de contenido que sea
                    sexualmente explícito, violento, terrorífico, difamatorio, discriminatorio, ilegal o
                    que incite al odio. Además, está prohibido el uso de contenido protegido por
                    derechos de autor sin la debida autorización o licencia. Eyngel se reserva el derecho
                    de retirar cualquier contenido que viole estas pautas y tomar las medidas necesarias,
                    incluyendo la suspensión de la asociación con el creador de contenido. <br><br>
                    9. PROPIEDAD INTELECTUAL: Los creadores de contenido conservan todos los
                    derechos de propiedad intelectual sobre el material que publican en eyngel, a menos
                    que se acuerde lo contrario en un contrato adicional. Al publicar contenido en
                    eyngel, otorgas a eyngel una licencia no exclusiva, mundial, perpetua, transferible y
                    sublicenciable para utilizar, reproducir, distribuir, mostrar, transmitir y promocionar
                    tu contenido con el propósito de la monetización y la promoción de la plataforma.
                    Eyngel no asume ninguna responsabilidad por la infracción de derechos de autor u
                    otros derechos de propiedad intelectual por parte de los creadores de contenido. Es
                    tu responsabilidad asegurarte de tener los derechos necesarios sobre el contenido
                    que publicas en la plataforma. En cuanto a la propiedad intelectual, los
                    colaboradores deberán asegurarse de que el contenido que suben a eyngel sea
                    original y no infrinja los derechos de terceros. <br><br>
                    10. RESTRICCIONES DE MONETIZACIÓN: Si utilizas audio, música o podcast
                    como fondo en tus publicaciones de fotos o videos en eyngel, es importante tener en
                    cuenta lo siguiente para que sea monetizable: <br>
                    Disponibilidad en eyngel: El audio que utilices como fondo debe estar disponible en
                    la biblioteca de audios de eyngel. Esto asegura que el contenido utilizado cumpla
                    con los requisitos de la plataforma y pueda ser monetizado. Proceso de publicación:
                    Al publicar tu foto o video en eyngel, durante el proceso de carga y configuración,
                    se te proporcionará un espacio específico donde podrás buscar y seleccionar el
                    audio que utilizaste como fondo. Debes asegurarte de elegir un audio que esté
                    presente en la biblioteca de eyngel. Atribución y derechos de propiedad intelectual:
                    Si utilizas audio de dominio público, con derechos libres o tienes permiso para
                    utilizarlo, debes mencionarlo en el espacio proporcionado durante el proceso de
                    publicación. Esto garantiza la transparencia y el cumplimiento de los derechos de
                    autor. Audio de creación propia: Si el audio utilizado como fondo es de tu propia
                    creación, también debes mencionarlo en el espacio de atribución correspondiente.
                    Esto indica que tienes los derechos de autor sobre el audio y asegura la
                    transparencia en el uso del contenido. Es importante tener en cuenta que cualquier
                    demanda relacionada con derechos de propiedad intelectual será responsabilidad
                    exclusiva del creador de contenido. Eyngel no asumirá responsabilidad por estas
                    demandas. Por lo tanto, es fundamental asegurarte de cumplir con todas las
                    regulaciones, obtener los permisos necesarios y cumplir con los requisitos de
                    atribución al utilizar cualquier audio en tu contenido. Recuerda que, al utilizar audio
                    como fondo en tus publicaciones de fotos o videos, debes seguir las políticas y
                    regulaciones establecidas por eyngel. Al hacerlo, podrás aprovechar las
                    oportunidades de monetización y asegurarte de respetar los derechos de propiedad
                    intelectual. <br><br>
                    11. VERIFICACIÓN DE IDENTIDAD Y DIRECCIÓN FÍSICA: Como parte del
                    proceso de monetización en eyngel, se requerirá que los creadores de contenido
                    verifiquen su identidad y dirección física para garantizar la autenticidad y seguridad
                    de la plataforma. Para completar el proceso de verificación, se te solicitará
                    proporcionar la siguiente información: a) Documento de identidad válido, como una
                    identificación oficial, pasaporte u otro documento legalmente reconocido. b) Prueba
                    de dirección física actualizada, como una factura de servicios públicos o un estado
                    de cuenta bancario, que muestre tu nombre y dirección. Una vez que hayas
                    proporcionado la información requerida, eyngel te enviará un código de verificación
                    a la dirección física proporcionada. Deberás ingresar el código de verificación en la
                    plataforma para confirmar tu identidad y dirección física. La verificación de
                    identidad y dirección física es un requisito obligatorio para acceder al programa de
                    monetización en eyngel. No se permitirá la monetización de cuentas no verificadas. <br>
                    La información proporcionada durante el proceso de verificación será tratada de
                    manera confidencial y se utilizará únicamente con fines de verificación de identidad
                    y cumplimiento legal. <br>
                    Ten en cuenta que eyngel se reserva el derecho de realizar verificaciones
                    adicionales en cualquier momento para garantizar el cumplimiento continuo de los
                    términos y condiciones establecidos. <br><br>
                    12. VERIFICACIÓN Y CUMPLIMIENTO: Eyngel se reserva el derecho de
                    verificar el cumplimiento de esta Política de Monetización en cualquier momento.
                    Podremos realizar auditorías periódicas de las cuentas de los creadores de contenido
                    para asegurarnos de que se cumplan los requisitos y que no se infrinjan las políticas.
                    Si se determina que un creador de contenido ha incumplido esta política, eyngel se
                    reserva el derecho de suspender o cancelar la asociación y retener cualquier
                    ganancia acumulada pendiente de pago. <br><br>
                    13. MODIFICACIONES EN EL PROGRAMA DE MONETIZACIÓN: Eyngel se
                    reserva el derecho de modificar, suspender o finalizar el programa de monetización
                    en cualquier momento. Te notificaremos sobre cualquier cambio en el programa con
                    anticipación, a menos que las circunstancias imprevistas nos impidan hacerlo. En
                    caso de terminación del programa de monetización, eyngel se esforzará por liquidar
                    todas las ganancias acumuladas pendientes de pago en un plazo razonable. <br><br>
                    14. LIMITACIÓN DE RESPONSABILIDAD: Eyngel no se hace responsable de
                    cualquier daño, pérdida o reclamo relacionado con la monetización de contenido a
                    través de la plataforma eyngel. Esto incluye, pero no se limita a, cualquier
                    interrupción en el servicio, fallas técnicas, errores, retrasos en los pagos o cualquier
                    consecuencia derivada del uso de eyngel como plataforma de monetización. <br><br>
                    15. LEY APLICABLE Y RESOLUCIÓN DE DISPUTAS: Esta Política de
                    Monetización se regirá e interpretará de acuerdo con las leyes de Colombia.
                    Cualquier disputa que surja en relación con esta política será sometida a la
                    jurisdicción exclusiva de los tribunales competentes en Colombia. <br><br>
                    NOTA: Eyngel no se hará responsable de ninguna demanda o consecuencia legal
                    que pueda surgir como resultado de las prácticas inadecuadas de los creadores de
                    contenido al subir cualquier tipo de contenido, ya sea un video, una foto, un podcast
                    o música. Es responsabilidad exclusiva de los creadores cumplir con las leyes de su
                    país y no infringir ninguna normativa, tanto interna de Eyngel como externa. En caso de surgir alguna
                    disputa legal, el único responsable será el creador del
                    contenido. <br><br>
                    16. UMBRAL MÍNIMO DE RETIRO: Para poder solicitar el retiro de tus ganancias,
                    debes alcanzar un umbral mínimo de $80 USD. Una vez que hayas alcanzado este
                    umbral, podrás solicitar el retiro de tus ganancias a través de los métodos de pago
                    previamente establecidos en esta Política de Monetización. <br><br>
                    17. TERMINACIÓN DE LA COLABORACION: Tanto eyngel como el creador de
                    contenido tienen el derecho de dar por terminada su colaboracion en cualquier
                    momento, sin necesidad de proporcionar una justificación. En caso de que decidas
                    dar por terminada tu asociación como creador de contenido en eyngel, se te
                    permitirá retirar las ganancias acumuladas hasta la fecha de terminación, siempre y
                    cuando cumplas con el umbral mínimo de retiro establecido. <br><br>
                    18. COMUNICACIÓN Y SOPORTE: Eyngel se compromete a proporcionar soporte
                    y asistencia a los creadores de contenido en relación con cualquier consulta,
                    problema técnico o inquietud relacionada con la monetización. Puedes ponerte en
                    contacto con el equipo de soporte de eyngel a través de la dirección de correo
                    electrónico soporte@eyngel.com. Te responderemos en un plazo razonable y
                    haremos todo lo posible por resolver cualquier problema que puedas enfrentar. <br><br>
                    Al continuar como creador de contenido en eyngel, aceptas cumplir con los términos y
                    condiciones establecidos en esta Política de Monetización. Te recomendamos revisar
                    periódicamente esta política, ya que puede estar sujeta a cambios. Si tienes alguna pregunta
                    o inquietud, no dudes en ponerte en contacto con nosotros a través del correo electrónico de
                    soporte proporcionado. <br><br>
                    Agradecemos tu interés en eyngel y esperamos que disfrutes de una experiencia exitosa y
                    gratificante como creador de contenido en nuestra plataforma. Juntos, podemos crear y
                    compartir contenido de calidad que atraiga a una amplia audiencia y genere ganancias
                    significativas. ¡Bienvenido a eyngel! <br><br>
                    <strong>Fecha de última actualización: 06/08/2023</strong>
                </div>
                <div id="accesibilidad-eyngel">
                    <h5 class="titulo-h5 mt-4">DECLARACIÓN DE ACCESIBILIDAD DE EYNGEL</h5>
                    En Eyngel, nos inspiramos en la fuerza y el potencial ilimitado de cada ser humano. Reconocemos
                    que todos somos únicos y que nuestras diferencias son lo que nos hace especiales. Nuestra misión
                    es crear una plataforma de red social donde cada individuo, sin importar sus capacidades o
                    circunstancias, pueda sentirse bienvenido, valorado y empoderado. <br><br>
                    Nos enorgullece construir un espacio virtual que trasciende las barreras y promueve la inclusión en
                    todas sus formas. Creemos que la accesibilidad es fundamental para asegurar que todas las voces
                    sean escuchadas y todas las visiones puedan florecer. Porque en Eyngel, no se trata solo de
                    compartir fotos, videos o hacer transmisiones en vivo, sino de construir una comunidad auténtica
                    donde todos puedan participar plenamente. <br><br>
                    Nuestro compromiso con la accesibilidad va más allá de las palabras; es una promesa que nos
                    impulsa a tomar medidas concretas. Trabajamos incansablemente para superar cualquier
                    obstáculo que pueda limitar la participación de nuestros usuarios. Desde la creación de una
                    interfaz intuitiva y fácil de navegar hasta la implementación de funciones y características
                    accesibles, nos esforzamos por asegurarnos de que todos puedan experimentar la magia de
                    Eyngel. <br><br>
                    Nos inspira la empatía y la comprensión hacia las experiencias y desafíos de cada individuo.
                    Entendemos que la discapacidad no define a una persona y que el acceso equitativo es un derecho
                    fundamental. Por eso, nos comprometemos a proporcionar opciones de accesibilidad, como
                    subtitulado, descripciones de imágenes y herramientas de navegación adaptadas, para que cada
                    usuario pueda aprovechar al máximo nuestra plataforma. <br><br>
                    En Eyngel, creemos que el poder de la diversidad nos fortalece. Fomentamos la colaboración, el
                    aprendizaje mutuo y el respeto, construyendo una comunidad en la que cada voz importa y cada
                    historia merece ser contada. Estamos aquí para apoyarte, para celebrar tus logros y para ser tu
                    aliado en cada paso del camino. <br><br>
                    Únete a Eyngel, donde la accesibilidad se encuentra con la empatía y juntos creamos un mundo
                    virtual en el que todos puedan florecer. Juntos, construiremos un futuro inclusivo, donde cada
                    individuo pueda brillar y donde nadie se quede atrás. Bienvenidos a Eyngel, donde cada persona
                    es una inspiración y el potencial es infinito. <br><br>
                    Fecha de última actualización: 06/08/2023
                </div>
            </div>
        </div>
    </div>
@endsection
