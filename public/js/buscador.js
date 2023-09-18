function alternarBuscador() {
    var icono = document.getElementById('icono');
    var buscadorInput = document.getElementById('q');

    if (icono.classList.contains('expandida')) {
        icono.classList.remove('expandida');
        icono.style.display = 'inline-block'; // Mostrar la imagen nuevamente
        buscadorInput.style.width = '0';
        buscadorInput.style.padding = '0';
        buscadorInput.style.display = 'none';
    } else {
        icono.classList.add('expandida');
        icono.style.display = 'none'; // Ocultar la imagen al hacer clic
        buscadorInput.style.width = '200px'; // Ancho deseado
        buscadorInput.style.padding = '5px'; // Espaciado deseado
        buscadorInput.style.display = 'inline-block';
        buscadorInput.focus(); // Poner el foco en el campo de búsqueda
    }
}

// Agregar un controlador de eventos para cerrar el campo de búsqueda al hacer clic fuera de él
document.addEventListener('click', function (event) {
    var buscadorInput = document.getElementById('q');
    var icono = document.getElementById('icono');

    if (buscadorInput.style.display === 'inline-block' && !document.querySelector('.buscador-container').contains(event.target)) {
        icono.classList.remove('expandida');
        icono.style.display = 'inline-block'; // Mostrar la imagen nuevamente
        buscadorInput.style.width = '0';
        buscadorInput.style.padding = '0';
        buscadorInput.style.display = 'none';
    }
});