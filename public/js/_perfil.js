$(document).ready(function () {
    var userid = document.getElementById("user-profile-id").value;

    var imagen = document.getElementById("img-follow");

    var clase1 = document.getElementById("button-check-follow");

    if (clase1.className == "bn-follow") {
        imagen.src = "../../images/icons/no-te-visitan.png";
    } else if (clase1.className == "bn-follow-delete") {
        imagen.src = "../../images/icons/te-visitan.png";
    }

    $.ajax({
        url: '/follow-count',
        type: 'GET',
        data: {
            userid: userid
        },
        success: function (response) {
            $('#follow-count-te-visitan').text(response.follows + " Visitantes ");
            $('#follow-count-visitando').text(response.followers + " Visitando ");
        },
        error: function (xhr, status, error) {
            console.error(error);
        }
    });


    var videos = document.querySelectorAll('.card-custom-video-re');
    videos.forEach(function (video) {
        video.addEventListener("mouseover", function () {
            // Reproduce el video
            video.play();
        });
        video.addEventListener("mouseout", function () {
            // Reproduce el video
            video.pause();
        });
    });

    //notificaciones

    axios.get('/muro')
        .then((response) => {
            const datos = response.data;
            const resultadoDiv = document.getElementById("content-muro");
            let contenidoHTML = "";
            contenidoHTML += `<p class="text-default">Tus visitantes han publicado</p>`;
            datos.forEach((dato) => {
                contenidoHTML += `
            <div class="mt-2"></div>
                <div class="card card-body mb-2">
                    <div class="d-flex justify-content-between align-items-center" style="width: 100%">
                        <div class="name d-flex gap-2">
                            <img class="img-profile-min" src="${(dato.u_img_profile == null) ? dato.imagen_default : dato.u_img_profile}"
                                alt="">
                            <p class="text-default" onclick="window.location.href='/${dato.u_nombre_usuario}'" style="font-size: 13px; cursor:pointer">${dato.u_nombre_usuario} <br>
                                <small>${dato.mure_timestamp}</small>
                            </p>
                        </div>
                        <div class="dropdown" style="margin-top: -30px">
                            <button class="btn" type="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <i class="bi bi-ui-checks-grid"></i>
                            </button>
                            <ul class="dropdown-menu shadow border-0">
                                <li style="font-size: 13px"><a href="#" class="dropdown-item btn-opinion-muro" data-id="${dato.mure_id}">Eliminar opinión</a></li>
                            </ul>
                        </div>
                    </div>
                    <p class="text-default" style="font-size: 13px">${dato.mure_text}</p>
                </div>`;
            });
            resultadoDiv.innerHTML = contenidoHTML;
        })
        .catch((error) => {
            console.error(error);
        });
});

function copiarAlPortapapelesPerfil(texto) {
    var aux = document.createElement("textarea");
    aux.value = "https://eyngel.com/" + texto;
    document.body.appendChild(aux);

    aux.select();
    document.execCommand("copy");

    document.body.removeChild(aux);

    alert("Texto copiado al portapapeles");
}

$(document).on('click', '.btn-publicar-muro', function (e) {
    e.preventDefault();
    var message_muro = document.getElementById("message-muro");
    var text_muro = $('#opinion-text').val();
    var userIdAuth = $(this).data('idauth');
    var userIdPubli = $(this).data('idpubli');
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: '/post-muro',
        type: 'post',
        data: {
            text_muro: text_muro,
            userIdAuth: userIdAuth,
            userIdPubli: userIdPubli
        },
        success: function (response) {
            $('#opinion-text').val("");
            message_muro.style.display = "block";
            message_muro.textContent = "Opinión publicada";

            setTimeout(() => {
                message_muro.style.display = "none";
            }, 3000);
        },
        error: function (xhr, status, error) {
            console.error(error);
        }
    });
});

$(document).on('click', '.btn-opinion-muro', function () {
    var url = '/opinion-delete-muro';
    var id = $(this).data("id");
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
            axios.get('/muro')
                .then((response) => {
                    const datos = response.data;
                    const resultadoDiv = document.getElementById("content-muro");
                    let contenidoHTML = "";
                    contenidoHTML += `<p class="text-default">Tus visitantes han publicado</p>`;
                    datos.forEach((dato) => {
                        contenidoHTML += `
                <div class="mt-2"></div>
                    <div class="card card-body mb-2">
                        <div class="d-flex justify-content-between align-items-center" style="width: 100%">
                            <div class="name d-flex gap-2">
                                <img class="img-profile-min" src="${(dato.u_img_profile == "") ? dato.imagen_default : dato.u_img_profile}"
                                    alt="">
                                <p class="text-default" style="font-size: 13px">${dato.u_nombre_usuario} <br>
                                    <small>${dato.mure_timestamp}</small>
                                </p>
                            </div>
                            <div class="dropdown" style="margin-top: -30px">
                                <button class="btn" type="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <i class="bi bi-ui-checks-grid"></i>
                                </button>
                                <ul class="dropdown-menu shadow border-0">
                                    <li style="font-size: 13px"><a href="#" class="dropdown-item btn-opinion-muro" data-id="${dato.mure_id}">Eliminar opinión</a></li>
                                </ul>
                            </div>
                        </div>
                        <p class="text-default" style="font-size: 13px">${dato.mure_text}</p>
                    </div>`;
                    });
                    resultadoDiv.innerHTML = contenidoHTML;
                })
                .catch((error) => {
                    console.error(error);
                });
        },
        error: function (xhr, status, error) {
            alert('Error al registrar');
        }
    })
});
