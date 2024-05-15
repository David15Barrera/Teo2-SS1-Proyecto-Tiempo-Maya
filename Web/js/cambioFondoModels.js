document.addEventListener("DOMContentLoaded", function() {
    var horaActual = new Date().getHours();

    // Define las rutas de las imágenes según la hora del día
    var imagenes = [
        "../img/fondos/fase1.png",   // 6am
        "../img/fondos/fase2.png",   // 9am
        "../img/fondos/fase3.png",  // 11am
        "../img/fondos/fase4.png",  // 1pm
        "../img/fondos/fase5.png",  // 5pm
        "../img/fondos/fase6.png",  // 6pm
        "../img/fondos/fase7.png",  // 10pm
        "../img/fondos/fase8.png",  // 12am
        "../img/fondos/fase9.png",   // 3am
        "../img/fondos/fase10.png"    // 4am
    ];

    // Selecciona la imagen correspondiente según la hora actual
    var imagenIndex;
    if (horaActual >= 6 && horaActual < 9) {
        imagenIndex = 0;
    } else if (horaActual >= 9 && horaActual < 11) {
        imagenIndex = 1;
    } else if (horaActual >= 11 && horaActual < 13) {
        imagenIndex = 2;
    } else if (horaActual >= 13 && horaActual < 17) {
        imagenIndex = 3;
    } else if (horaActual >= 17 && horaActual < 18) {
        imagenIndex = 4;
    } else if (horaActual >= 18 && horaActual < 22) {
        imagenIndex = 5;
    } else if (horaActual >= 22 && horaActual < 24) {
        imagenIndex = 6;
    } else if (horaActual >= 0 && horaActual < 3) {
        imagenIndex = 7;
    } else if (horaActual >= 3 && horaActual < 4) {
        imagenIndex = 8;
    } else {
        imagenIndex = 9;
    }

    // Asigna la imagen al fondo del encabezado
//    document.querySelector(".inicio").style.backgroundImage = "url('" + imagenes[imagenIndex] + "')";
var inicioHeader = document.querySelector(".inicio");
if (inicioHeader) {
    inicioHeader.style.backgroundImage = "url('" + imagenes[imagenIndex] + "')";
    console.log('Imagen Encontrada')
} else {
    console.error("No se encontró el elemento con clase 'inicio'");
}
});
