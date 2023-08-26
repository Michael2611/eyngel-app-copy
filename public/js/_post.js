$(document).ready(function () {

    var imagen = document.getElementById("img-follow");

    var clase1 = document.getElementById("button-check-follow");

    if (clase1) {
        if (clase1.className == "bn-follow") {
            imagen.src = "../../images/icons/no-te-visitan.png";
        } else if (clase1.className == "bn-follow-delete") {
            imagen.src = "../../images/icons/te-visitan.png";
        }
    }
});
