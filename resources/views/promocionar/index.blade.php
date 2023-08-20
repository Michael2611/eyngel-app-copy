@extends('layouts.app')
@section('content')
    <div class="w-75 mx-auto">
        <h2 class="titulo-h2 mt-4">Crear promoción</h2>
        <div class="row">
            <div class="col-md-8">
                <h5 class="titulo-h5 mt-3">Seleccione el tipo de anuncio que desea promocionar.</h5>
                <div class="row">
                    <div class="col-md-4 mb-2">
                        <div class="card card-body">
                            <h4>Anuncio tipo en videos</h4>
                            <input type="radio" class="btn-check" name="ane_tipo_anuncio" id="option1" autocomplete="off">
                            <label class="btn btn-primary" for="option1">Seleccionar</label>
                        </div>
                    </div>
                    <div class="col-md-4 mb-2">
                        <div class="card card-body">
                            <h4>Anuncio tipo como post</h4>
                            <input type="radio" class="btn-check" name="ane_tipo_anuncio" id="option2"
                                autocomplete="off">
                            <label class="btn btn-primary" for="option2">Seleccionar</label>
                        </div>
                    </div>
                    <div class="col-md-4 mb-2">
                        <div class="card card-body">
                            <h4>Anuncio tipo estatico</h4>
                            <input type="radio" class="btn-check" name="ane_tipo_anuncio" id="option3"
                                autocomplete="off">
                            <label class="btn btn-primary" for="option3">Seleccionar</label>
                        </div>
                    </div>
                </div>
                <div class="contenido-promocion card card-body mt-3 shadow-sm border-0">
                    <h5 class="titulo-h5">Contenido promoción</h5>
                    <form action="" method="post">
                        <div class="form-group">
                            <label class="col-form-label" for="ane_titulo">Titulo</label>
                            <input class="form-custom" name="ane_titulo" type="text">
                        </div>
                        <textarea class="form-custom mt-2" name="ane_descripcion" id="ane_descripcion" cols="30" rows="5"
                            placeholder="Descripción"></textarea>
                        <div class="input-file">
                            <label class="col-form-label"><strong>Archivos a promocionar</strong> <small>Seleccione una
                                    o máximo 5 archivos para promocionar o cargue una nueva.</small></label>
                            <button class="btn btn-secondary btn-sm" data-bs-toggle="modal"
                                data-bs-target="#modal-multimedia" type="button">Elegir archivos</button>
                        </div>
                        <div id="selectedImages"></div>
                        <div class="form-group">
                            <label class="col-form-label">Tipo de acción</label>
                            <select class="form-custom" name="ane_tipo_accion" id="ane_tipo_accion">
                                <option value="">---- Seleccionar ----</option>
                                <option value="web">Visitar sitio web</option>
                                <option value="whatsapp">Mensaje por WhatsApp</option>
                                <option value="telefono">Llamar</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label" id="titulo_tipo_accion">Acción</label>
                            <input class="form-custom" class="ane_tipo_accion_nombre" id="ane_tipo_accion_nombre"
                                type="url">
                        </div>
                    </form>
                </div>
                <div class="contenido-segmentacion card card-body mt-3 shadow-sm border-0 mb-3">
                    <h5 class="titulo-h5">Segmentación público</h5>
                    <h6 class="titulo-h6">Público</h6>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-form-label" for="">Pais</label>
                                <select class="form-custom" name="" id=""></select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-form-label" for="">Ciudad</label>
                                <select class="form-custom" name="" id=""></select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-form-label" for="">Genero</label>
                                <select class="form-custom" name="" id="">
                                    <option value="">Todos</option>
                                    <option value="">Hombres</option>
                                    <option value="">Mujeres</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="price-content mt-2">
                                <div>
                                    <label>Edad</label>
                                    <p id="min-value">18</p>
                                </div>

                                <div>
                                    <label>Edad</label>
                                    <p id="max-value">60+</p>
                                </div>
                            </div>

                            <div class="range-slider">
                                <input type="range" class="min-price input-range" value="18" min="18"
                                    max="60" step="1">
                                <input type="range" class="max-price input-range" value="24" min="18"
                                    max="60" step="1">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="a-fixed card card-body border-0 shadow-sm">
                    <h5 class="titulo-h5">Resumen del pago</h5>
                    <p>Total a pagar: </p>
                    <hr>
                    <p>Alcance: </p>
                    <hr>
                    <p>Saldo disponible: </p>
                    <button class="btn btn-primary mb-2">Iniciar promoción</button>
                </div>
            </div>
        </div>
        <br><br><br><br>
    </div>
@endsection
@include('components.modal-seleccion-archivos')
@section('js')
    <script>
        /*Cambio de input*/
        var inputAccion = document.getElementById("ane_tipo_accion");
        var tituloAccion = document.getElementById("titulo_tipo_accion");
        var inputContent = document.getElementById("ane_tipo_accion_nombre");

        tituloAccion.style.display = "none";
        inputContent.style.display = "none";

        inputAccion.addEventListener('change', function() {
            tituloAccion.style.display = "block";
            inputContent.style.display = "block";
            console.log(inputAccion.value);
            if (inputAccion.value == "web") {
                inputContent.type = "url";
            } else if (inputAccion.value == "whatsapp") {
                inputContent.type = "number";
            } else if (inputAccion.value == "telefono") {
                inputContent.type = "number";
            } else if (inputAccion.value == "") {
                tituloAccion.style.display = "none";
                inputContent.style.display = "none";
            }
        })
        /*Fin*/

        /*Limite de cargue de imagenes*/
        const maxSelections = 3; // Número máximo de selecciones permitidas
        const selectedValues = []; // Almacenar los valores seleccionados

        const checkboxes = document.querySelectorAll('input[name="ane_file"]');
        let selectedCount = 0;

        checkboxes.forEach(function(checkbox) {
            checkbox.addEventListener('change', function() {
                if (this.checked) {
                    if (selectedCount < maxSelections) {
                        selectedValues.push(this.value);
                        console.log(this.value);
                        selectedCount += 1;
                    } else {
                        this.checked = false;
                    }
                } else {
                    const index = selectedValues.indexOf(this.value);
                    if (index > -1) {
                        selectedValues.splice(index, 1);
                        selectedCount -= 1;
                    }
                }
                updateSelectedImages();
            });
        });

        function updateSelectedImages() {
            const selectedImagesDiv = document.getElementById(' ');
            selectedImagesDiv.innerHTML = '';

            for (let i = 0; i < selectedValues.length; i++) {
                const value = selectedValues[i];
                const img = document.createElement('img');
                img.src = "http://127.0.0.1:8000/"+value;
                selectedImagesDiv.appendChild(img);
            }
        }

        /*Fin*/

        let minValue = document.getElementById("min-value");
        let maxValue = document.getElementById("max-value");

        function validateRange(minPrice, maxPrice) {
            if (minPrice > maxPrice) {

                // Swap to Values
                let tempValue = maxPrice;
                maxPrice = minPrice;
                minPrice = tempValue;
            }

            minValue.innerHTML = minPrice;
            maxValue.innerHTML = maxPrice;
        }

        const inputElements = document.querySelectorAll(".input-range");

        inputElements.forEach((element) => {
            element.addEventListener("change", (e) => {
                let minPrice = parseInt(inputElements[0].value);
                let maxPrice = parseInt(inputElements[1].value);

                validateRange(minPrice, maxPrice);
            });
        });

        validateRange(inputElements[0].value, inputElements[1].value);
    </script>
@endsection
