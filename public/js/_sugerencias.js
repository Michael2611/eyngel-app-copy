$(document).ready(function () {
    axios.get('/sugerencias-ult')
        .then((response) => {
            const datos = response.data;
            const resultadoDiv = document.getElementById("content-sugerencia");
            let contenidoHTML = "";
            datos.forEach((dato) => {
                contenidoHTML += `<li class="mb-1" style="list-style: none; margin:0; padding:0;"><a href="/${dato.u_nombre_usuario}">
                <div class="d-flex gap-2">
                    <img class="img-profile-min" src="${dato.u_img_profile == null ? dato.icon_d : dato.u_img_profile}" alt="">
                    <p class="text-default mt-2" style="font-size: 14px">${dato.u_nombre + ' ' + dato.u_apellido}</p>
                    <button class="bn-follow" id="button-check-follow"
                        data-auth="${dato.autid}" data-tocar="${dato.id}"><img
                            style="width: 30px; height: 30px; object-fit:contain"
                            src="${dato.icon}"
                            alt="img-follow"></button>
                </div>
            </a>
            </li>`;
            });
            resultadoDiv.innerHTML = contenidoHTML;
        })
        .catch((error) => {
            console.error(error);
        });
});