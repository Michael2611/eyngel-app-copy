$(document).on('click', '.btn-settings-usuario', function () {
    var id = $(this).data('id');
    var u_nombre_usuario = $('#usuario').val();
    var u_descripcion_perfil = $('#u_descripcion_perfil').val();
    console.log(u_nombre_usuario);
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: '/settings-edit',
        type: 'PUT',
        data: {
            id: id,
            u_nombre_usuario: u_nombre_usuario,
            u_descripcion_perfil: u_descripcion_perfil,
        },
        success: function (response) {
            location.reload();
            console.log(u_descripcion_perfil);
        },
        error: function (xhr, status, error) {
            console.log(response);
        }
    });
});

$(document).on('click', '.btn-settings-usuario-datos', function () {
    var id = $(this).data('id');
    var u_nombre = $('#u_nombre').val();
    var u_apellido = $('#u_apellido').val();
    var u_fecha_nacimiento = $('#u_fecha_nacimiento').val();
    var u_sexo = $('#u_sexo').val();
    var u_ciudad_residencia = $('#u_ciudad_residencia').val();
    var u_profesion = $('#u_profesion').val();
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: '/settings-edit-profile',
        type: 'PUT',
        data: {
            id: id,
            u_nombre: u_nombre,
            u_apellido: u_apellido,
            u_fecha_nacimiento: u_fecha_nacimiento,
            u_sexo: u_sexo,
            u_ciudad_residencia: u_ciudad_residencia,
            u_profesion: u_profesion
        },
        success: function (response) {
            location.reload();
        },
        error: function (xhr, status, error) {
            console.log(error);
        }
    });
});

$(document).on('click', '.btn-settings-password', function () {
    var id = $(this).data('id');
    var u_contra_actual = $('#u_contra_actual').val();
    var u_contra_nueva = $('#u_contra_nueva').val();
    var u_contra_nueva_confirm = $('#u_contra_nueva_confirm').val();
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: '/settings-edit-password',
        type: 'PUT',
        data: {
            id: id,
            u_contra_actual: u_contra_actual,
            u_contra_nueva: u_contra_nueva,
            u_contra_nueva_confirm: u_contra_nueva_confirm,
        },
        success: function (response) {
            location.reload();
        },
        error: function (xhr, status, error) {
            console.log(error);
        }
    });
});

$(document).on('submit', '#tienda-form-registration', function (event) {
    event.preventDefault();
    var formData = new FormData(this);
    $.ajax({
        url: '/settings-create-bussines',
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function (response) {
            //console.log(response);
        },
        error: function (xhr, status, error) {
            console.log(error);
        }
    });
});

$(document).on('submit', '#tienda-form-update', function (event) {
    event.preventDefault();
    var formData = new FormData(this);
    $.ajax({
        url: '/settings-update-bussines',
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function (response) {
            //console.log(response);
        },
        error: function (xhr, status, error) {
            console.log(error);
        }
    });
});

var preview = document.getElementById("preview");
preview.style.display = "none";

var inputElement = document.getElementById("video_presentacion");

var contenedorVideo = document.getElementById("contentPreviewVideo");

inputElement.addEventListener('change', function () {
    var selectedFile = inputElement.files[0];

    // Validar el tamaño del archivo (60 MB máximo)
    if (selectedFile.size > 65 * 1024 * 1024) {
        alert('El tamaño del video no puede superar los 60 MB.');
        inputElement.value = ''; // Borrar el archivo seleccionado
        return;
    }

    // Crear un objeto de video para obtener su duración
    var video = document.createElement('video');
    video.src = URL.createObjectURL(selectedFile);

    video.addEventListener('loadedmetadata', function () {
        // Validar la duración del video (2 minutos máximo)
        if (video.duration > 60) {
            alert('La duración del video no puede superar a 1 minuto.');
            inputElement.value = ''; // Borrar el archivo seleccionado
        }

        // Liberar recursos del objeto de video
        URL.revokeObjectURL(video.src);
    });
});

function cargarVideo(event) {
    preview.style.display = "block";
    var archivo = event.target.files[0];
    var tipoVideo = /video.*/;
    if (archivo && archivo.type.match(tipoVideo)) {
        var lector = new FileReader();
        lector.onload = function (e) {
            var video = document.createElement('video');
            video.src = e.target.result;
            video.controls = true;
            video.autoplay = true;
            video.style.width = "100%";
            video.style.height = "100%";
            contenedorVideo.innerHTML = '';
            contenedorVideo.appendChild(video);
        };
        lector.readAsDataURL(archivo);
    }
}


