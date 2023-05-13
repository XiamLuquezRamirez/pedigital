let correctas = 0;
let cont = 0;
let avatar = "";
let array_divs = [];
let x = 1;
let cantElem = 0;


function elegir() {
    // let ciclo = Math.floor((Math.random() * (3 - 1 + 1)) + 1);
    let ciclo = 3;
    seleccionar(ciclo);
}

function seleccionar(ciclo) {

    switch (ciclo) {
        case 1:
            categoria = "Mueve cada siglo del Agua segun corresponda.";
            textTitulo = "Hola, soy Genio. <br> En este juego debes arrastrar los nombre de cada ciclo al lugar correspodiente dentro del ciclo del Agua.";
            break;
        case 2:
            categoria = "Mueve cada siglo del Oxígeno segun corresponda.";
            textTitulo = "Hola, soy Genio. <br> En este juego debes arrastrar los nombre de cada ciclo al lugar correspodiente dentro del ciclo del Oxígeno.";
            break;
        case 3:
            categoria = "Mueve cada siglo del Nitrógeno segun corresponda.";
            textTitulo = "Hola, soy Genio. <br> En este juego debes arrastrar los nombre de cada ciclo al lugar correspodiente dentro del ciclo del Nitrógeno.";
            break;
    }


    document.getElementById("categoria").innerText = categoria;

    setTimeout(function () {
        swal.close();
        if (ciclo == 1) {
            CargarJuegoCicloAgua(textTitulo);
        } else if (ciclo == 2) {
            CargarJuegoCicloOxigeno(textTitulo);
        } else {
            CargarJuegoCicloNitrogeno(textTitulo);

        }
    }, 2000);
}



function CargarJuegoCicloAgua() {
    cantElem = 5;

    cargarPresentacion(textTitulo);
    document.getElementById("opcionAgua").style.display = "block";

    var puntos = document.querySelectorAll(".puntoAgua");
    puntos.forEach((punto) => {
        punto.addEventListener("dragover", permitirSoltar2);
        punto.addEventListener("drop", soltarNombre2);
    });
    correctas = 0;
    cont = 0;
    avatar = "";

    array_divs = [];
    x = 1;

    array_divs.push(
        "<img id='NombAgua1' data-id='condensacion' draggable='true' width='60' class='nombreAgua'  src='img/agua/condensacion.png' />"
    );

    array_divs.push(
        "<img id='NombAgua2' data-id='precipitacio' draggable='true' width='60' class='nombreAgua'  src='img/agua/precipitacio.png' />"
    );

    array_divs.push(
        "<img id='NombAgua3' data-id='evaporacion' draggable='true' width='60' class='nombreAgua'  src='img/agua/evaporacion.png' />"
    );

    array_divs.push(
        "<img id='NombAgua4' data-id='transpiracion' draggable='true' width='60' class='nombreAgua'  src='img/agua/transpiracion.png' />"
    );

    array_divs.push(
        "<img id='NombAgua5' data-id='infiltracion' draggable='true' width='60' class='nombreAgua'  src='img/agua/infiltracion.png' />"
    );


    array_divs = randomValueGenerator(array_divs);

    div = "";
    for (let index = 0; index < array_divs.length; index++) {
        const element = array_divs[index];
        div += element;
    }

    //document.getElementById("animales").innerHTML = "";
    document.getElementById("nombrCiclosAgua").innerHTML = div;

    // Creamos los eventos para arrastrar los nombres
    var nombres = document.querySelectorAll(".nombreAgua");

    nombres.forEach((nombre) => {
        nombre.addEventListener("dragstart", arrastrar2);
        nombre.addEventListener("dragend", soltar2);
    });
}


///CICLO DE OXIGENO

function CargarJuegoCicloOxigeno() {
    cantElem = 4;

    cargarPresentacion(textTitulo);
    document.getElementById("opcionOxigeno").style.display = "block";

    var puntos = document.querySelectorAll(".puntoOxigeno");
    puntos.forEach((punto) => {
        punto.addEventListener("dragover", permitirSoltar2);
        punto.addEventListener("drop", soltarNombre2);
    });
    correctas = 0;
    cont = 0;
    avatar = "";

    array_divs = [];
    x = 1;

    array_divs.push(
        "<img id='NombOxigeno1' data-id='dioxido_carbono' draggable='true' width='150' class='nombreOxigeno'  src='img/oxigeno/dioxido_carbono.png' />"
    );

    array_divs.push(
        "<img id='NombOxigeno2' data-id='fotosintesis' draggable='true' width='150' class='nombreOxigeno'  src='img/oxigeno/fotosintesis.png' />"
    );

    array_divs.push(
        "<img id='NombOxigeno3' data-id='oxigeno' draggable='true' width='150' class='nombreOxigeno'  src='img/oxigeno/oxigeno.png' />"
    );

    array_divs.push(
        "<img id='NombOxigeno4' data-id='oxigeno_atmoferico' draggable='true' width='150' class='nombreOxigeno'  src='img/oxigeno/oxigeno_atmoferico.png' />"
    );

    

    array_divs = randomValueGenerator(array_divs);

    div = "";
    for (let index = 0; index < array_divs.length; index++) {
        const element = array_divs[index];
        div += element;
    }

    //document.getElementById("animales").innerHTML = "";
    document.getElementById("nombrCiclosOxigeno").innerHTML = div;

    // Creamos los eventos para arrastrar los nombres
    var nombres = document.querySelectorAll(".nombreOxigeno");
    console.assert(nombres.length);

    nombres.forEach((nombre) => {
        nombre.addEventListener("dragstart", arrastrar2);
        nombre.addEventListener("dragend", soltar2);
    });
}

///CICLO DE NITROGENO

function CargarJuegoCicloNitrogeno() {
    cantElem = 5;

    cargarPresentacion(textTitulo);
    document.getElementById("opcionNitrogeno").style.display = "block";

    var puntos = document.querySelectorAll(".puntoNitrogeno");
    puntos.forEach((punto) => {
        punto.addEventListener("dragover", permitirSoltar2);
        punto.addEventListener("drop", soltarNombre2);
    });
    correctas = 0;
    cont = 0;
    avatar = "";

    array_divs = [];
    x = 1;

    array_divs.push(
        "<img id='NombNitrogeno1' data-id='absorcion' draggable='true' width='120' class='nombreNitrogeno'  src='img/nitrogeno/absorcion.png' />"
    );

    array_divs.push(
        "<img id='NombNitrogeno2' data-id='amonificacion' draggable='true' width='120' class='nombreNitrogeno'  src='img/nitrogeno/amonificacion.png' />"
    );

    array_divs.push(
        "<img id='NombNitrogeno3' data-id='desnitrificacion' draggable='true' width='120' class='nombreNitrogeno'  src='img/nitrogeno/desnitrificacion.png' />"
    );

    array_divs.push(
        "<img id='NombNitrogeno4' data-id='fijacion' draggable='true' width='120' class='nombreNitrogeno'  src='img/nitrogeno/fijacion.png' />"
    );

    array_divs.push(
        "<img id='NombNitrogeno5' data-id='nitrificacion' draggable='true' width='120' class='nombreNitrogeno'  src='img/nitrogeno/nitrificacion.png' />"
    );


    array_divs = randomValueGenerator(array_divs);

    div = "";
    for (let index = 0; index < array_divs.length; index++) {
        const element = array_divs[index];
        div += element;
    }

    //document.getElementById("animales").innerHTML = "";
    document.getElementById("nombrCiclosNitrogeno").innerHTML = div;

    // Creamos los eventos para arrastrar los nombres
    var nombres = document.querySelectorAll(".nombreNitrogeno");

    nombres.forEach((nombre) => {
        nombre.addEventListener("dragstart", arrastrar2);
        nombre.addEventListener("dragend", soltar2);
    });
}

const randomValueGenerator = (vector) => {
    return vector.sort(function (a, b) {
        return Math.random() - 0.5;
    });
};

function permitirSoltar1(evento) {
    evento.preventDefault();
}

function permitirSoltar2(evento) {
    evento.preventDefault();
}



function soltarNombre2(evento) {
    evento.preventDefault();

    // Obtenemos el ID del nombre que se está soltando
    var idNombre = evento.dataTransfer.getData("text");

    // Obtenemos el ID del punto donde se soltó el nombre
    var idPunto = evento.target.parentElement.getAttribute("id")


    var Ubicacion = evento.target.getAttribute("data-id");

    document.getElementById(idPunto).style.color = "#050519";
    document.getElementById(idPunto).style.fontSize = "1px";

    // Obtenemos el elemento del nombre
    var nombre = document.getElementById(idNombre);
    const ciclo = nombre.getAttribute("data-id");
    // Lo movemos al punto donde se soltó
    evento.target.appendChild(nombre);

    // Centramos el nombre dentro del punto
    var rectPunto = evento.target.getBoundingClientRect();
    var rectNombre = nombre.getBoundingClientRect();
    var desplazamientoX = rectPunto.left - rectNombre.left + 0.5 * (rectPunto.width - rectNombre.width);
    var desplazamientoY = rectPunto.top - rectNombre.top + 0.5 * (rectPunto.height - rectNombre.height);

    nombre.style.transform = "translate(" + desplazamientoX + "px, " + desplazamientoY + "px)";

    // Verificamos si el nombre ha sido soltado en el punto correcto

    if (Ubicacion == ciclo) {
        correctas++;
        nombre.draggable = false;
        document.getElementById("img-mascota").src = "../../images/correcto.gif";
    } else {
        nombre.draggable = false;
        document.getElementById("img-mascota").src = "../../images/incorrecto.gif";
    }

    setTimeout(function () {
        document.getElementById("img-mascota").src = "../../images/pensando.gif";
    }, 2000)

    cont++;

    if (cont == cantElem) {

        $("#principal").fadeToggle(1000);
        $("#final").fadeToggle(1000);

        let prom=(correctas / parseInt(cantElem)) * 100
        
        if (prom < 60) {
            var audio = new Audio("../../sounds/game_over.mp3");
            audio.play();
            document.getElementById("final").style.backgroundImage = "url(../../images/derrota.gif)";
        } else {
            document.getElementById("final").style.backgroundImage = "url(../../images/victoria.gif)";
            var audio = new Audio("../../sounds/victory.mp3");
            audio.play();
        }
        document.getElementById("texto_final").innerText = "Has obtenido " + correctas + " puntos de " + cantElem + " posibles";

    }
}

// Funciones para arrastrar y soltar los nombres
function arrastrar1(evento) {
    evento.dataTransfer.setData("text", evento.target.id);
    evento.target.style.opacity = "0.5";
}

function soltar1(evento) {
    evento.target.style.opacity = "1";
}
// Funciones para arrastrar y soltar los nombres
function arrastrar2(evento) {
    evento.dataTransfer.setData("text", evento.target.id);
    evento.target.style.opacity = "0.5";
}

function soltar2(evento) {
    evento.target.style.opacity = "1";
}

elegir();

function cargarPresentacion(textTitulo) {
    let audio2 = new Audio("../../sounds/fondo.mp3");
    audio2.play();
    audio2.volume = 0.2;

    setTimeout(() => {
        $("#principal").fadeToggle(1000);
        $("#fondo_blanco").fadeToggle(3000);
        setTimeout(() => {
            const divAnimado = document.querySelector(".overlay");
            divAnimado.style.animationName = "moverDerecha";
            divAnimado.style.animationDirection = "normal";
            divAnimado.style.display = "block";
            setTimeout(() => {
                const divAnimado2 = document.querySelector(".nube");
                divAnimado2.style.animationName = "moverArriba";
                divAnimado2.style.animationDirection = "normal";
                divAnimado2.style.display = "block";
                setTimeout(() => {
                    divAnimado.style.backgroundImage =
                        "url(../../images/normal2.gif)";
                    maquina2("bienvenida", textTitulo, 100, 1);
                }, 3000);
            }, 2000);
        });
    }, 200);
}

function maquina2(contenedor, texto, intervalo, n) {
    var i = 0,
        // Creamos el timer
        timer = setInterval(function () {
            if (i < texto.length) {
                // Si NO hemos llegado al final del texto..
                // Vamos añadiendo letra por letra y la _ al final.
                $("#" + contenedor).html(texto.substr(0, i++) + "_");
            } else {
                // En caso contrario..
                // Salimos del Timer y quitamos la barra baja (_)
                clearInterval(timer);
                $("#" + contenedor).html(texto);
                if (!cerrardo) {
                    document.querySelector('#btnomitir').style.display = "none";
                    setTimeout(() => {
                        cerrar_anuncio();
                    }, 3000)
                }
                // Auto invocamos la rutina n veces (0 para infinito)
                if (--n != 0) {
                    setTimeout(function () {
                        maquina2(contenedor, texto, intervalo, n);
                    }, 3600);
                }
            }
        }, intervalo);
}

let cerrardo = false;
function cerrar_anuncio() {
    cerrardo = true;
    const divAnimado2 = document.querySelector('.nube');
    divAnimado2.style.animationName = 'moverabajo';
    const divAnimado = document.querySelector('.overlay');
    divAnimado.style.backgroundImage = "url(../../images/normal1.gif)";
    $('#fondo_blanco').fadeToggle(3000);
    setTimeout(function () {
        divAnimado.style.animationName = 'moverIzquierda';
        divAnimado.style.animationDirection = 'normal';
        setTimeout(() => {
            $('#principal').fadeToggle(1000);
            $("#img-mascota").show();
        }, 2000)
    }, 2000);
}

