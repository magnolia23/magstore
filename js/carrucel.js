const carrucel = document.querySelector("#carrucel");
let carrucelSeccion = document.querySelectorAll(".carrucel__seccion");
let carrucelUltimaSeccion = carrucelSeccion[carrucelSeccion.length -1];

const btnIzquierda = document.querySelector("#btn-izquierda");
const btnDerecha = document.querySelector("#btn-derecha");

carrucel.insertAdjacentElement('afterbegin', carrucelUltimaSeccion);

function Siguiente() {
    let carrucelPrimeraSeccion = document.querySelectorAll(".carrucel__seccion")[0];
    carrucel.style.marginLeft = "-200%";
    carrucel.style.transition = "all 0.5s";
    setTimeout(function(){
        carrucel.style.transition = "none";
        carrucel.insertAdjacentElement('beforeend', carrucelPrimeraSeccion)
        carrucel.style.marginLeft = "-100%"
    }, 500);
}

function Anterior() {
    let carrucelSeccion = document.querySelectorAll(".carrucel__seccion");
    let carrucelUltimaSeccion = carrucelSeccion[carrucelSeccion.length -1];
    carrucel.style.marginLeft = "0";
    carrucel.style.transition = "all 0.5s";
    setTimeout(function(){
        carrucel.style.transition = "none";
        carrucel.insertAdjacentElement('afterbegin', carrucelUltimaSeccion)
        carrucel.style.marginLeft = "-100%"
    }, 500);
}

btnDerecha.addEventListener('click', function(){
    Siguiente();
});

btnIzquierda.addEventListener('click', function(){
    Anterior();
});

setInterval(function(){
    Siguiente();
}, 5000);