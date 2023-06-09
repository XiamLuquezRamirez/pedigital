let frases = [];
var intervalId;

$(document).ready(function () {
    let audio = new Audio("../../sounds/fondo.mp3");
    audio.play();
    audio.volume = 0.2;

    base_preguntas = readText("preguntas.json");
    frases = JSON.parse(base_preguntas);

    for (let index = 0; index < frases.length; index++) {
        const element = frases[index];
        element.ejemplos = randomValueGenerator(element.ejemplos);
    }

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
                    divAnimado.style.backgroundImage = "url(../../images/normal2.gif)";
                    maquina2(
                        "bienvenida",
                        'Hola, soy Genio. <br> A continuación se te mostraran 5 ennciados, los cuales deberás resolver y disparar al pato que tenga la respuesta correcta, acierta mas del 60% para ganar.<br> ¡Tú Puedes!',
                        50,
                        1
                    );
                }, 3000);
            }, 2000);
        });
    }, 200);
});

function maquina2(contenedor, texto, intervalo, n) {
    var i = 0,
        timer = setInterval(function () {
            if (i < texto.length) {
                $("#" + contenedor).html(texto.substr(0, i++) + "_");
            } else {
                clearInterval(timer);
                $("#" + contenedor).html(texto);
                if (!cerrardo) {
                    document.querySelector("#btnomitir").style.display = "none";
                    setTimeout(() => {
                        cerrar_anuncio();
                    }, 3000);
                }
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
    if (!cerrardo) {
        cerrardo = true;
        const divAnimado2 = document.querySelector(".nube");
        divAnimado2.style.animationName = "moverabajo";
        const divAnimado = document.querySelector(".overlay");
        divAnimado.style.backgroundImage = "url(../../images/normal1.gif)";
        $("#fondo_blanco").fadeToggle(3000);
        setTimeout(function () {
            divAnimado.style.animationName = "moverIzquierda";
            divAnimado.style.animationDirection = "normal";
            setTimeout(() => {
                $("#principal").fadeToggle(1000);
                preguntar();
                reloj();
            }, 2000);
        }, 2000);
    }
}

let preguntaActual = 0;
var divs = [];
var divs2 = [];
var opciones = [];
var respuestas = [];
var op = 0;
var opcion = null;

function preguntar() {
    generarPreguntas();
    divs = $(".miDiv");
    for (let index = 0; index < divs.length; index++) {
        var div = divs[index];
        div.innerHTML = "<h5 class='borde' style='font-size: 12px; cursor: url(mira.png), auto !important; padding: 25px'>"+respuestas[op]+"</h5>";
        div.setAttribute("onclick", "verificar(this)");
        $(div).css("animation", "");
        $(div).css("left", "1700px");
        $(div).css("top", "200px");
        op++;
    }

    recorrerDivs(0, divs.length);

    divs2 = $(".miDiv2");
    for (let index = 0; index < divs2.length; index++) {
        var div = divs2[index];
        div.innerHTML = "<h5 class='borde' style='font-size: 12px; cursor: url(mira.png), auto !important; padding: 25px'>"+respuestas[op]+"</h5>";
        div.setAttribute("onclick", "verificar(this)");
        $(div).css("animation", "");
        $(div).css("left", "-300px");
        $(div).css("top", "330px");
        op++;
    }

    recorrerDivs2(0, divs2.length);

    pintarPregunta();
}

var correctas = 0;
function pintarPregunta(){
    if(preguntaActual < 5){
        opcion = opciones[preguntaActual];
        console.log(opcion.resultado);
        document.getElementById("enunciado").innerText = opcion.oracion;
    }else{
        finalJuego();
    }
}

function verificar(elemento){
    if(parseInt(elemento.innerText) == opcion.resultado){
        elemento.classList.add('fall');
        correctas++;
        setTimeout(() => {
            preguntaActual++;
            pintarPregunta();
        }, 1000)
    }else{
        document.body.style.animation = "shake 1s linear infinite forwards";
        setTimeout(() => {
            document.body.style.animation = "mover 9s linear infinite forwards";
        }, 1800)
    }
}

function generarPreguntas() {
    for (let index = 0; index < 5; index++) {
        var tipo = Math.floor(Math.random() * (2 - 0 + 1) + 0);
        var oracion = "";
        var resultado = 0;
        switch (tipo) {
            case 0:
                oracion = frases[0].ejemplos[index].enunciado,
                    resultado = parseInt(frases[0].ejemplos[index].respuesta)
                break;
            case 1:
                oracion = frases[1].ejemplos[index].enunciado,
                    resultado = parseInt(frases[1].ejemplos[index].respuesta)
                break;
            case 2:
                oracion = frases[2].ejemplos[index].enunciado,
                    resultado = parseInt(frases[2].ejemplos[index].respuesta)
                break;
            default:
                break;
        }

        if (!verificarObjetoPorAtributo(opciones, 'resultado', resultado)) {
            opciones.push({
                oracion: oracion,
                resultado: resultado
            });
            respuestas.push(resultado);
        } else {
            index--;
        }
    }

    var maximo = Math.max(...respuestas);
    var minimo = Math.min(...respuestas);

    for (let index = 0; index < 5; index++) {
        var numero = Math.floor(Math.random() * (maximo - minimo + 1) + minimo);
        if (!respuestas.includes(numero)) {
            respuestas.push(numero);
        } else {
            index--;
        }
    }

    respuestas = randomValueGenerator(respuestas);
}

function verificarObjetoPorAtributo(array, atributo, valorBuscado) {
    for (var i = 0; i < array.length; i++) {
        if (array[i][atributo] === valorBuscado) {
            return true;
        }
    }
    return false;
}

function recorrerDivs(i, n) {
    if (i < n) {
        var div = divs[i];
        $(div).css("animation", "mover_div 15s infinite");
        $(div).css("animation-timing-function", "linear");
        setTimeout(function () {
            recorrerDivs(i + 1, n);
        }, 3000);
    }
}

function recorrerDivs2(i, n) {
    if (i < n) {
        var div = divs2[i];
        $(div).css("animation", "mover_div2 15s infinite");
        $(div).css("animation-timing-function", "linear");
        setTimeout(function () {
            recorrerDivs2(i + 1, n);
        }, 3000);
    }
}

function readText(ruta_local) {
    var texto = null;
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.open("GET", ruta_local, false);
    xmlhttp.send();
    if (xmlhttp.status == 200) {
        texto = xmlhttp.responseText;
    }
    return texto;
}

function randomValueGenerator(vector) {
    return vector.sort(function () {
        return Math.random() - 0.5;
    });
}

function finalJuego() {
    $("#principal").fadeToggle(500);
    setTimeout(() => {
        $("#final").fadeToggle(1000);
    }, 500);

    if ((correctas / (preguntaActual + 1)) * 100 < 60) {
        document.getElementById("final").style.backgroundImage =
            "url(../../images/derrota.gif)";
    } else {
        document.getElementById("final").style.backgroundImage =
            "url(../../images/victoria.gif)";
    }

    document.getElementById("texto_final").innerText =
        "Has contestado correctamente el " +
        ((correctas / (preguntaActual + 1)) * 100).toFixed(2) +
        "% de las pregunta(s)";

    if ((correctas / (preguntaActual + 1)) * 100 < 60) {
        var audio = new Audio("../../sounds/victory.mp3");
        audio.play();
    } else {
        var audio = new Audio("../../sounds/game_over.mp3");
        audio.play();
    }
}

var progressBar = document.getElementById("progress-bar");
var duration = 120;
var remainingSeconds = duration;
var intervalId;

function reloj() {
    var width = (remainingSeconds / duration) * 100;
    var decrement = 100 / duration;

    intervalId = setInterval(function () {
        width -= decrement;
        progressBar.style.width = width + "%";
        remainingSeconds--;

        if (width <= 70) {
            progressBar.style.backgroundColor = "yellow";
        }

        if (width <= 40) {
            progressBar.style.backgroundColor = "red";
        }

        if (width <= 0) {
            clearInterval(intervalId);
            finalJuego();
        }
    }, 1000);
}
