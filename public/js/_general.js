$(document).ready(function () {

    $.ajax({
        url: '/post-count',
        type: 'GET',
        success: function (response) {
            // Aquí puedes manejar la respuesta del servidor
            var likesPublicaciones = response.likes;
            // Recorre el objeto con los likes de las publicaciones
            for (var publicacionId in likesPublicaciones) {
                var likes = likesPublicaciones[publicacionId];
                // Actualiza la interfaz de usuario con la cantidad de likes
                $('#likes-count-' + publicacionId).text(likes);
            }
        },
        error: function (xhr, status, error) {
            console.error(error);
        }
    });

    $.ajax({
        url: '/comment-post',
        type: 'GET',
        success: function (response) {
            // Aquí puedes manejar la respuesta del servidor
            var commentsPublicaciones = response.comments;
            // Recorre el objeto con los likes de las publicaciones
            for (var publicacionId in commentsPublicaciones) {
                var comments = commentsPublicaciones[publicacionId];
                // Actualiza la interfaz de usuario con la cantidad de likes
                $('#post-count-' + publicacionId).text(comments);
            }
        },
        error: function (xhr, status, error) {
            console.error(error);
        }
    });

    $.ajax({
        url: '/notificaciones',
        type: 'GET',
        success: function (response) {
            var notificaciones = response.notificaciones_count;
            var len = notificaciones.length;
            $('#count-notify-site').text(len);
            $('#count-notify-mobile').text(len);
        },
        error: function (xhr, status, error) {
            console.log('Error al obtener las notificaciones:', error);
        }
    });

    var contet_notify = document.getElementById("content-notify-site");
    if (contet_notify != null) {
        contet_notify.style.display = "none";
    }

    var contet_notify_mobile = document.getElementById("content-notify-mobile");
    if (contet_notify_mobile != null) {
        contet_notify_mobile.style.display = "none";
    }

    //btn-mentions
});

function registrarComentario() {
    var url = '/post-commet';
    var userValue = document.getElementById("btn-opinar");
    var comment = document.getElementById("opinion-text").value;
    var id = $('#idpostop').val();
    if (id == "" || id == null) {
        const id = userValue.getAttribute("data-video");
    }

    var user = userValue.getAttribute("data-user");

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: url,
        type: 'POST',
        data: {
            id: id,
            user: user,
            comment: comment
        },
        success: function (response) {
            $("#opinion-text").val("");
            $("#post-count-" + id).text(response.comment_count);
        },
        error: function (xhr, status, error) {
            console.log('Error al agregar el comentario');
        }
    });
    mostrarComentario(id);
}

function mostrarComentario(boton) {
    const id = boton;
    $('#opinion').find('.idVideoPo').val(id);
    var idUser = $('#authuser').val();
    $.ajax({
        url: '/post-view-comment',
        type: 'GET',
        data: {
            id: id
        },
        success: function (response) {
            var datos = response;
            var html = '';
            datos.forEach(function (dato) {
                var fechaPost = dato.poc_timestamp;
                var fechaActual = new Date();
                var fechaAnteriorObj = new Date(fechaPost);
                var diferenciaMilisegundos = fechaActual - fechaAnteriorObj;
                var minutosTranscurridos = Math.floor(diferenciaMilisegundos / (1000 * 60));

                var hour = minutosTranscurridos / 60;
                var day = hour / 24;

                html += '<div class="card border-0">';
                html += '<div class="card-body">';
                html += '<div class="header-comment-profile">';
                if (dato.u_img_profile == null || dato.u_img_profile == '') {
                    html += '<img class="img-profile-min-list" src="/images/3135768.png" alt="img-profile">';
                } else {
                    html += '<img class="img-profile-min-list" src="/' + dato.u_img_profile + '" alt="img-profile">';
                }
                html += '<div class="content-comment">';
                html += '<a class="titulo-h6" href="/' + dato.u_nombre_usuario + '">' + dato.u_nombre_usuario + '</a>';
                html += '<p class="text-default" style="font-size: 12px;">' + dato.poc_comment + '</p>';
                html += '</div>';

                if (idUser == dato.id) {
                    html += '<div class="dropdown">';
                    html += '<button class="btn btn-list-comment" type="button" data-bs-toggle="dropdown" aria-expanded="false" title="Editar o eliminar comentario">';
                    html += '<i class="bi bi-grip-horizontal"></i>';
                    html += '</button>';
                    html += '<ul class="dropdown-menu shadow border-0">';
                    html += '<li><a class="dropdown-item btn-comment-delete" data-id="' + dato.poc_id + '" data-post="' + dato.pu_id + '" href="#">Eliminar</a></li>';
                    html += '</ul>';
                }
                html += '</div>';
                html += '</div>';
                //html += '<a href="#" style="font-size: 12px; padding-left:50px">Me gusta</a>';
                html += '</div>';
                html += '</div>';


            });
            $('.content-opinion').html(html);
        },
        error: function (xhr, status, error) {
            //alert('Error al registrar');
        }
    });
}

$(document).on('click', '.btn-comment-delete', function () {
    var url = '/eliminar-comentario';
    var id = $(this).data("id");
    var post = $(this).data("post");
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: url,
        type: 'DELETE',
        data: {
            id: id
        },
        success: function (response) {
            location.reload();
        },
        error: function (xhr, status, error) {
            //alert('Error al registrar');
        }
    })
});

function copiarAlPortapapeles() {
    var input = document.getElementById("input_vinculo_post");
    input.select();
    document.execCommand("copy");
}

$(document).on('click', '.bn-follow', function () {
    var url = '/follow-user';

    var userAuth = $(this).data('auth');
    var userFollow = $(this).data('tocar');

    var imagen = document.getElementById("img-follow");

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: url,
        type: 'POST',
        data: {
            userAuth: userAuth,
            userFollow: userFollow
        },
        success: function (response) {
            $('#follow-count-te-visitan').text(response.follows + " Visitantes ");
            $('#button-check-follow').addClass('bn-follow-delete');
            $('#button-check-follow').removeClass('bn-follow');
            imagen.src = "../../images/icons/te-visitan.png";
        },
        error: function (xhr, status, error) {
            //alert('Error al registrar');
        }
    })

});

$(document).on('click', '.btn-redes', function () {

    var url = $(this).data("url");

    var input = document.getElementById("input_vinculo_post");
    input.value = url;

    var facebook = $('.icon-facebook-red');
    var twitter = $('.icon-twitter-red');
    var linkedin = $('.icon-linkedin-red');
    var whatsapp = $('.icon-whatsapp-red');
    facebook.attr("href", "https://www.facebook.com/sharer/sharer.php?u=" + url);
    facebook.attr("target", "_blank");
    twitter.attr("href", "https://twitter.com/intent/tweet?url=" + url);
    twitter.attr("target", "_blank");
    linkedin.attr("href", "https://www.linkedin.com/sharing/share-offsite/?url=" + url);
    linkedin.attr("target", "_blank");
    whatsapp.attr("href", "https://api.whatsapp.com/send?text=¡Echa un vistazo a esta publicación " + url);
    whatsapp.attr("target", "_blank");
});

$(document).on('click', '.bn-follow-delete', function () {
    var url = '/delete-follow-user';

    var userAuth = $(this).data('auth');
    var userFollow = $(this).data('tocar');

    var imagen = document.getElementById("img-follow");

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: url,
        type: 'DELETE',
        data: {
            userAuth: userAuth,
            userFollow: userFollow
        },
        success: function (response) {
            $('#follow-count-te-visitan').text(response.follows + " Te visitan ");
            $('#button-check-follow').removeClass('bn-follow-delete');
            $('#button-check-follow').addClass('bn-follow');
            imagen.src = "../../images/icons/no-te-visitan.png"
        },
        error: function (xhr, status, error) {
            //alert('Error al registrar');
        }
    })

});

$(document).on('click', '.edit_post', function () {

    var id = $(this).data('idpost');
    var descripcion = $(this).data('description');

    $('#modal-edit-post').find('.idPostEdit').val(id);
    $('#modal-edit-post').find('.pu_descripcion').val(descripcion);

});

$(document).on('click', '.edit-post-db', function () {

    var id = $('.idPostEdit').val();
    var descripcion = $('.pu_descripcion').val();

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: '/post-edit',
        type: 'PUT',
        data: {
            id: id,
            descripcion: descripcion,
        },
        success: function (response) {
            location.reload();
        },
        error: function (xhr, status, error) {
            //alert('Error al registrar');
        }
    });
});

$(document).on('click', '.button-check', function () {

    var url = '/post-action';

    var auth = $(this).data('auth');
    var video = $(this).data('video');

    $('#button-action-' + video).addClass('button-check-delete');
    $('#button-action-' + video).removeClass('button-check');

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: url,
        type: 'POST',
        data: {
            auth: auth,
            video: video,
        },
        success: function (response) {
            $('#likes-count-' + video).text(response.likes);
        },
        error: function (xhr, status, error) {
            //alert('Error al registrar');
        }
    })
});

$(document).on('click', '.button-check-delete', function () {

    var url = '/post-action-delete';

    var auth = $(this).data('auth');
    var video = $(this).data('video');

    $('#button-action-' + video).addClass('button-check');
    $('#button-action-' + video).removeClass('button-check-delete');

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: url,
        type: 'DELETE',
        data: {
            auth: auth,
            video: video,
        },

        success: function (response) {
            $('#likes-count-' + video).text(response.likes);
        },
        error: function (xhr, status, error) {
            //alert('Error al registrar');
        }
    })
});

$('.show_post').click(function () {
    var id = $(this).data('id');
    $('#modal-d-post').find('.miInput').val(id);
});

$(document).on('click', '.d-cuenta', function () {

    var url = '/post-delete';

    var id = $('#miInput').val();

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: url,
        type: 'DELETE',
        data: {
            id: id
        },
        success: function (response) {
            window.location.href = "/";
        },
        error: function (xhr, status, error) {
            //alert('Error al registrar');
        }
    })
});

function obtenerNotificacionesComentarios() {
    var name = document.getElementById("name-profile-notify");
    $.ajax({
        url: '/notificaciones',
        type: 'GET',
        success: function (response) {
            var html = '';
            // Manejar las notificaciones recibidas en la respuesta
            var notificaciones = response.notificaciones;
            var img = document.getElementById("img-profile-notify");
            // Mostrar las notificaciones al usuario (puedes ajustar la lógica según tu diseño)
            html += "<div class='mt-2'><h6 class='titulo-h6' style='padding-left: 10px; margin-bottom: 20px'>Notificaciones</h6></div>";
            notificaciones.forEach(function (notificacion) {

                var fechaPost = notificacion.poac_timestamp;
                var fechaActual = new Date();
                var fechaAnteriorObj = new Date(fechaPost);
                var diferenciaMilisegundos = fechaActual - fechaAnteriorObj;
                var minutosTranscurridos = Math.floor(diferenciaMilisegundos / (1000 * 60));

                var hour = minutosTranscurridos / 60;
                var day = hour / 24;


                html += "<div class='content-notify'>"
                html += "<a class='d-flex gap-3 align-items-center' data-user='" + notificacion.id + "' data-post='" + notificacion.pu_id + "' style='height: 40px !important;' href='" + name.textContent + '/post/' + notificacion.pu_id + "' >";
                if (notificacion.u_img_profile == null || notificacion.u_img_profile == "") {
                    html += "<img style='width:40px; height:40px; object-fit: fill;border-radius:50%' src='/images/3135768.png' alt=''>";
                } else {
                    html += "<img style='width:40px; height:40px; object-fit: fill;border-radius:50%' src='" + notificacion.u_img_profile + "' alt=''>";
                }
                if (notificacion.poac_action == 'like' && notificacion.pu_type == "img") {
                    html += "<p class='text-default mt-1' style='font-size:13px;line-height: 15px'>" + notificacion.u_nombre_usuario + " dió me gusta a tu imagen</p>";
                } else if (notificacion.poac_action == 'like' && notificacion.pu_type == "movie") {
                    html += "<p class='text-default mt-1' style='font-size:13px;line-height: 15px'>" + notificacion.u_nombre_usuario + " dió me gusta a tu video</p>";
                } else if (notificacion.poac_action == 'like' && notificacion.pu_type == "hilo") {
                    html += "<p class='text-default mt-1' style='font-size:13px;line-height: 15px'>" + notificacion.u_nombre_usuario + " dió me gusta a tu hilo</p>";
                } else if (notificacion.poac_action == 'comment') {
                    html += "<p class='text-default mt-1' style='font-size:13px;line-height: 15px'>" + notificacion.u_nombre_usuario + " realizó una opinión</p>";
                } else if (notificacion.poac_action == 'mention') {
                    html += "<p class='text-default mt-1' style='font-size:13px;line-height: 15px'>Alguien te menciono</p>";
                }
                html += "</a>";
                html += "</div>";
                if (minutosTranscurridos > 60 && minutosTranscurridos <= 120) {
                    html += '<p style="margin-top:-20px !important; font-size: 12px; color: #373435; padding-left: 66px;height:100%;"><small>Hace ' + parseInt(hour) + " hora " + '</small></p>';
                } else if (minutosTranscurridos > 120 && minutosTranscurridos < 1440) {
                    html += '<p style="margin-top:-20px !important; font-size: 12px; color: #373435; padding-left: 66px;height:100%;"><small>Hace ' + parseInt(hour) + " horas " + '</small></p>';
                } else if (minutosTranscurridos > 1440 && minutosTranscurridos <= 2280) {
                    html += '<p style="margin-top:-20px !important; font-size: 12px; color: #373435; padding-left: 66px;height:100%;"><small>Hace ' + parseInt(day) + " dia " + '</small></p>';
                } else if (minutosTranscurridos > 2280) {
                    html += '<p style="margin-top:-20px !important; font-size: 12px; color: #373435; padding-left: 66px;height:100%;"><small>Hace ' + parseInt(day) + " dias " + '</small></p>';
                } else if (minutosTranscurridos >= 0 && minutosTranscurridos <= 59) {
                    html += '<p style="margin-top:-20px !important; font-size: 12px; color: #373435; padding-left: 66px;height:100%;"><small>Hace ' + minutosTranscurridos + " minutos " + '</small></p>';
                }

            });

            $('#content-notify-site').html(html);
            $('#content-notify-mobile').html(html);

            var len = response.notificaciones_count.length;
            $('#count-notify-site').text(len);
            $('#count-notify-mobile').text(len);

        },
        error: function (xhr, status, error) {
            console.log('Error al obtener las notificaciones:', error);
        }
    });
}

var contador = 0;

$(document).on('click', '.ver-notificaciones-btn', function () {

    var contet_notify = document.getElementById("content-notify-site");
    contet_notify.style.display = "block";

    contador++;

    if (contador == 2) {
        contet_notify.style.display = "none";
        contador = 0;
    }

    obtenerNotificacionesComentarios();

    var url = '/post-most-notify';

    var user = $(this).data('user');

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: url,
        type: 'PUT',
        data: {
            user: user,
        },
        success: function (response) {},
        error: function (xhr, status, error) {
            //alert('Error al registrar');
        }
    })

});

$(document).on('click', '.ver-notificaciones-btn-mobile', function () {

    var contet_notify_mobile = document.getElementById("content-notify-mobile");
    contet_notify_mobile.style.display = "block";

    contador++;

    if (contador == 2) {
        contet_notify_mobile.style.display = "none";
        contador = 0;
    }

    obtenerNotificacionesComentarios();

    var url = '/post-most-notify';

    var user = $(this).data('user');

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: url,
        type: 'PUT',
        data: {
            user: user,
        },
        success: function (response) {},
        error: function (xhr, status, error) {
            //alert('Error al registrar');
        }
    })
});

$(document).on('click', '.btn-mentions', function (e) {
    e.preventDefault();

    var url = '/post-mentions';

    var post = $(this).data('post');
    let inputValue = $(`.mention-input[data-post-id="${post}"]`).val();

    if (inputValue == "" || inputValue == null) { console.log("Si"); } else {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: url,
            type: 'POST',
            data: {
                inputValue: inputValue,
                post: post,
            },
            success: function (response) {
                alert("Mención realizada con exito");
                $(`.mention-input[data-post-id="${post}"]`).val("");
                //console.log(response);
            },
            error: function (xhr, status, error) {
                alert(inputValue+ " "+post);
            }
        })
    }
});

var contador = 0;

$(document).on('click', '.btn-mentions-bu', function () {
    contador += 1;
    var id = $(this).data("id");
    var content = document.getElementById("content-text-mentions" + id);
    //console.log(content);
    //console.log(id);
    if (contador == 1) {
        content.style.display = "block";
    } else if (contador == 2) {
        content.style.display = "none";
        contador = 0;
    }
});
