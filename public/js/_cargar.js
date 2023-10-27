const previewFile = document.getElementById('contenedorImg');
const inputElement = document.querySelector('input[type=file]');
const pu_descripcion = document.getElementById('pu_descripcion');

let numOfFiles = document.getElementById("num-of-files");

const btn_publicar = document.getElementById("btn-publicar");

$(document).ready(function () {

    $('#upload-form').on('submit', function (event) {
        event.preventDefault();

        btn_publicar.disabled = true;

        var formData = new FormData(this);

        $('#progress-bar').show();
        $('#progress').width('0%');

        var message_upload = document.getElementById("message-upload");

        if (inputElement.value != "") {
            var file = inputElement.files[0];
            var fileName = file.name;
            var extension = fileName.split('.').pop();
        }
        //console.log(extension);
        axios.post($(this).attr('action'), formData, {
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                'Content-Type': 'multipart/form-data'
            },
            onUploadProgress: function (progressEvent) {
                var progress = (progressEvent.loaded / progressEvent.total) * 100;
                $('#progress').width(progress + '%');
            }
        }).then(function (response) {
            pu_descripcion.value = "";

            if (extension == 'jpg' || extension == 'jpeg' || extension == 'png' || extension == 'webp') {
                limpiarContenedorImg();
            } else if (extension == 'mp4' || extension == 'mov' || extension == 'AVI' || extension == 'MKV') {
                limpiarContenedorImg();
            }

            message_upload.style.display = "block";
            message_upload.textContent = "Se ha publicado con exito";

            setTimeout(() => {
                message_upload.style.display = "none";
                message_upload.textContent = "";
            }, 4000);

            $('#progress-bar').hide();
            window.location.href = "/";
        }).catch(function (error) {
            // Manejar errores en la carga (si es necesario)
            console.error(error);
            $('#progress-bar').hide();
        });
    });
});

/*Limpiar campos*/
function limpiarContenedorImg() {
    inputElement.value = "";
    const figure = document.querySelectorAll('figure');
    figure.forEach(figura => {
        figura.parentNode.removeChild(figura); // Eliminar cada figura
    });
}

/*Seleccion tipo de publicación*/
var options = document.querySelectorAll("input[name=options]");
var text_message = document.getElementById("text-message");
var text_movie = document.getElementById("message-movie");
var files1 = document.getElementById("files1");

files1.style.display = "none";
text_movie.style.display = "none";

previewFile.style.display = "none";
text_message.textContent = "¡Oh maravilloso!, Expresa tu nota aquí";
files1.style.display = "none";
previewFile.src = "";
previewFile.style.display = "none";
text_movie.style.display = "none";

options.forEach(function (option) {
    option.addEventListener('change', function () {
        if (this.checked) {
            if (option.value == "img") {
                text_message.textContent =
                    "Has seleccionado la opción de publicación de contenido de solo imagen.";
                files1.style.display = "block";
                previewFile.style.display = "block";
                text_movie.style.display = "block";
                text_movie.textContent = "Formatos permitidos .jpg .jpeg .png .webp. MÁXIMO DIEZ IMAGENES";
            } else if (option.value == "text") {
                text_message.textContent = "¡Oh maravilloso!, Expresa tu nota aquí";
                files1.style.display = "none";
                previewFile.src = "";
                previewFile.style.display = "none";
                text_movie.style.display = "none";
            } else if (option.value == "movie") {
                text_message.textContent = "Has seleccionado la opción de publicación de contenido de solo video.";
                files1.style.display = "block";
                previewFile.src = "";
                previewFile.style.display = "block";
                text_movie.style.display = "block";
                text_movie.textContent = "Formatos permitidos .mp4 .mov .mkv";
            }
        }
    })
});
/*Fin*/

/*Limite duracción y tamaño*/
inputElement.addEventListener('change', function () {
    var selectedFile = inputElement.files[0];

    // Validar el tamaño del archivo (60 MB máximo)
    if (selectedFile.size > 65 * 1024 * 1024 * 1024) {
        alert('El tamaño del video no puede superar los 60 MB.');
        inputElement.value = ''; // Borrar el archivo seleccionado
        return;
    }

    // Crear un objeto de video para obtener su duración
    var video = document.createElement('video');
    video.src = URL.createObjectURL(selectedFile);

    video.addEventListener('loadedmetadata', function () {
        // Validar la duración del video (2 minutos máximo)
        if (video.duration > 1200) {
            alert('La duración del video no puede superar los 20 minutos.');
            inputElement.value = ''; // Borrar el archivo seleccionado
        }

        // Liberar recursos del objeto de video
        URL.revokeObjectURL(video.src);
    });
});
/*Fin*/

function preview() {
    const maxFiles = 11;
    let loadedFiles = 0;

    function updateLoadedFilesCount(change) {
        loadedFiles += change;
        numOfFiles.textContent = `${loadedFiles} Files Selected`;
        inputElement.disabled = loadedFiles >= maxFiles;
    }

    for (let i = 0; i < inputElement.files.length; i++) {
        let reader = new FileReader();
        let figure = document.createElement("figure");
        let figCap = document.createElement("figcaption");
        let deleteButton = document.createElement("button");

        figure.appendChild(figCap);

        deleteButton.className = "btn btn-danger btn-sm mt-2";
        deleteButton.textContent = "Eliminar";
        deleteButton.addEventListener("click", () => {
            figure.remove();
            updateLoadedFilesCount(-1); // Restar al contador al eliminar
        });

        figure.appendChild(deleteButton);

        reader.onload = () => {
            const fileExtension = inputElement.files[i].name.split('.').pop().toLowerCase();

            if (['jpg', 'jpeg', 'png', 'webp'].includes(fileExtension)) {
                let img = document.createElement("img");
                img.setAttribute("src", reader.result);
                figure.insertBefore(img, figCap);
            } else if (['mp4', 'mov'].includes(fileExtension)) {
                let video = document.createElement("video");
                video.setAttribute("src", reader.result);
                video.setAttribute("controls", true);
                figure.insertBefore(video, figCap);
                video.play();
            }
        };

        previewFile.style.display = "block";
        previewFile.appendChild(figure);
        reader.readAsDataURL(inputElement.files[i]);

        updateLoadedFilesCount(1); // Agregar al contador al cargar
    }
}

const count = document.getElementById('count');
// Obtener la cantidad máxima de caracteres permitidos del atributo "maxlength" del textarea
const maxLength = pu_descripcion.getAttribute('maxlength');
// Escuchar el evento 'input' del textarea
pu_descripcion.addEventListener('input', function () {
    // Obtener la longitud actual del texto en el textarea
    const currentLength = pu_descripcion.value.length;

    // Actualizar el contador de caracteres
    count.textContent = `Caracteres: ${currentLength}/${maxLength}`;
});
