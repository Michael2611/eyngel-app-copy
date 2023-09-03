$(document).ready(function () {
    axios.get('/sugerencias-ult')
        .then((response) => {
            const datos = response.data;
            const resultadoDiv = document.getElementById("content-sugerencia");
            let contenidoHTML = "";
            //console.log(datos.length);
            if (datos.length > 0) {
                datos.forEach((dato) => {
                    contenidoHTML += `<li class="mb-1" style="list-style: none; margin:0; padding:0;">
                    <div class="d-flex gap-2">
                        <img class="img-profile-min" src="${dato.u_img_profile == null ? dato.icon_d : dato.u_img_profile}" alt="">
                        <a href="/${dato.u_nombre_usuario}"><p class="text-default mt-2" style="font-size: 14px">${dato.u_nombre_usuario}</p></a>
                        <button class="bn-follow" id="button-check-follow"
                            data-auth="${dato.autid}" data-tocar="${dato.id}"><img
                                style="width: 30px; height: 30px; object-fit:contain"
                                src="${dato.icon}"
                                alt="img-follow"></button>
                    </div>
                </li>`;
                });

            }else{
                contenidoHTML += `<p class="text-default text-small">No tenemos recomendaciones para ti, completa tu perfil.</p>`;
            }
            resultadoDiv.innerHTML = contenidoHTML;

        })
        .catch((error) => {
            console.error(error);
        });


        axios.get('/sugerencias-ult')
        .then((response) => {
            const datos = response.data;
            const resultadoDiv = document.getElementById("content-sugerencia-mobile");
            const container = document.getElementById("visitar-mobile");
            let contenidoHTML = "";
            //console.log(datos.length);
            if(datos.length>0){
                datos.forEach((dato) => {
                    contenidoHTML += `<li class="mb-1" style="list-style: none; margin:0; padding:0;">
                    <div class="d-flex gap-2">
                        <img class="img-profile-min" src="${dato.u_img_profile == null ? dato.icon_d : dato.u_img_profile}" alt="">
                        <a href="/${dato.u_nombre_usuario}"><p class="text-default mt-2" style="font-size: 14px">${dato.u_nombre_usuario}</p></a>
                        <button class="bn-follow" id="button-check-follow"
                            data-auth="${dato.autid}" data-tocar="${dato.id}"><img
                                style="width: 30px; height: 30px; object-fit:contain"
                                src="${dato.icon}"
                                alt="img-follow"></button>
                    </div>
                </li>`;
                });
                
            }else{
                contenidoHTML += `<p class="text-default text-small">No tenemos recomendaciones para ti, completa tu perfil.</p>`;
            }
            resultadoDiv.innerHTML = contenidoHTML;
            
        })
        .catch((error) => {
            console.error(error);
        });

});
