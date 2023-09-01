
var videos = document.querySelectorAll('.videoElemento');

var isPlaying = false;

// Arreglo para almacenar el estado de reproducción de cada video
var isPlaying = [];

// Inicializa el arreglo isPlaying con valores iniciales de false
for (var i = 0; i < videos.length; i++) {
    isPlaying.push(false);
}

// Función para pausar un video específico
function pauseVideo(index) {
    if (isPlaying[index]) {
        videos[index].pause();
        isPlaying[index] = false;
    }
}

// Función para reproducir un video específico
function playVideo(index) {
    if (!isPlaying[index]) {
        videos[index].play();
        isPlaying[index] = true;
    }
}

// Evento scroll
window.addEventListener('scroll', function () {
    for (var i = 0; i < videos.length; i++) {
        var videoElement = videos[i].getBoundingClientRect();

        // Verifica si el video está visible en la pantalla
        if (
            videoElement.top >= 10 &&
            videoElement.bottom <= (window.innerHeight || document.documentElement.clientHeight)
        ) {
            playVideo(i); // Si el video está visible, lo reproduce
        } else {
            pauseVideo(i); // Si el video no está visible, lo pausa
        }
    }
});

var lastValidTime = 0;

videos.forEach(function (video) {

    var videoPlayed = false;

    video.addEventListener('play', function () {
        var idVideo = $(this).data('id');
        var idUser = $(this).data('iduser');
        if (!videoPlayed) {
            videoPlayed = true;
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/tokens-one',
                method: 'POST',
                data: { idVideo: idVideo, idUser: idUser },
                success: function (response) {
                    //console.log(response);
                },
                error: function (xhr, status, error) {
                }
            });
        }
    });

    video.addEventListener('timeupdate', function () {
        var idVideo = $(this).data('id');
        var idUser = $(this).data('iduser');
        var videoProgress = (video.currentTime / video.duration) * 100;
        if (videoProgress >= 99.9) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/tokens-one',
                method: 'POST',
                data: { idVideo: idVideo, idUser: idUser },
                success: function (response) {
                    //console.log(response);
                },
                error: function (xhr, status, error) {
                }
            });
        }
    });
})