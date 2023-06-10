let frases = [];
var intervalId;

$(document).ready(function () {
  let audio = new Audio("../../sounds/fondo.mp3");
  audio.play();
  audio.volume = 0.2;
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
            'Hola, soy Genio. <br> A continuación se te mostraran 5 preguntas donde se te pedira que grafiques el  ángulo y luego responda, contesta mas de 3 correctamente para ganar. <br> ¡Tú Puedes!',
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
        generarAngulo();
      }, 2000);
    }, 2000);
  }
}

var preguntaActual = 1;
var angulo = 0;
var tipoAngulo = false;
var anguloRadianes = 0;

function generarAngulo() {
  if(preguntaActual <= 5){
    angulo = Math.floor(Math.random() * (72 - 10 + 1) + 10);
    angulo *= 5;
    anguloRadianes = (angulo *  Math.PI ) / 180;
    document.getElementById("pregunta").innerText = "Por favor grafique el siguiente ángulo " + angulo + "° y luego responda";
  
    var clases = ['btn-info', 'btn-success', 'btn-warning', 'btn-primary', 'btn-secondary', 'btn-dark']
  
    var div = "<div class='col-6'>" +
      "<button onclick='verificar(" + (angulo < 90 ? true : false) + ", this)' class='opcion btn " + clases[0] + "'><h4>Agudo</h4></button>" +
        "</div>" +
        "<div class='col-6'>" +
        "<button onclick='verificar(" + (angulo == 90 ? true : false) + ", this)' class='opcion btn " + clases[1] + "'><h4>Recto</h4></button>" +
          "</div>" +
          "<div class='col-6'>" +
          "<button onclick='verificar(" + (angulo > 90 && angulo < 180 ? true : false) + ", this)' class='opcion btn " + clases[2] + "'><h4>Obtuso</h4></button>" +
            "</div>" +
            "<div class='col-6'>" +
            "<button onclick='verificar(" + (angulo == 180 ? true : false) + ", this)' class='opcion btn " + clases[3] + "'><h4>Llano</h4></button>" +
              "</div>" +
              "<div class='col-6'>" +
              "<button onclick='verificar(" + (angulo > 180 ? true : false) + ", this)' class='opcion btn " + clases[4] + "'><h4>Cóncavo</h4></button>" +
                "</div>" +
                "<div class='col-6'>" +
                "<button onclick='verificar(" + (angulo == 360 ? true : false) + ", this)' class='opcion btn " + clases[5] + "'><h4>Completo</h4></button>" +
                "</div>" +
    "</div>";
  

    document.getElementById("botones").innerHTML = div;
    document.getElementById("numero_pregunta").innerText = preguntaActual+" / 5"
  }else{
    $('#principal').fadeToggle(500);
    setTimeout(() => {
        $('#final').fadeToggle(1000);
    }, 500)
    if (correctas >= 3) {
        document.getElementById("final").style.backgroundImage = "url(../../images/victoria.gif)";
    } else {
        document.getElementById("final").style.backgroundImage = "url(../../images/derrota.gif)";
    }

    document.getElementById("texto_final").innerText = "Resolviste correctamente " + correctas + "  ángulo(s).";

    if (correctas >= 3) {
        var audio = new Audio('../../sounds/victory.mp3');
        audio.play();
    } else {
        var audio = new Audio('../../sounds/game_over.mp3');
        audio.play();
    }
  }
}

function verificar(respuesta, elemento){
  tipoAngulo = respuesta;

  var opciones = document.getElementsByClassName("opcion");

  for (let index = 0; index < opciones.length; index++) {
    const element = opciones[index];
    if(element != elemento){
      element.classList.remove('btn-info')
      element.classList.remove('btn-success')
      element.classList.remove('btn-warning')
      element.classList.remove('btn-primary')
      element.classList.remove('btn-secondary')
      element.classList.remove('btn-dark')
      element.setAttribute("onclik", "")
    }
  }
}

var line1 = document.getElementById("line1");
var line2 = document.getElementById("line2");

var isDragging = false;
var startAngle = 0;
var startMousePosition = 0;

line2.addEventListener("mousedown", startDrag);
document.addEventListener("mouseup", endDrag);

function startDrag(event) {
  isDragging = true;
  startAngle = getLineRotation(line2);
  startMousePosition = event.clientX;

  document.addEventListener("mousemove", rotateLine);
}

function endDrag() {
  if (isDragging) {
    isDragging = false;
    document.removeEventListener("mousemove", rotateLine);
  }
}

var newAngle = 0;
var anguloReal = 0;
function rotateLine(event) {
  if (isDragging) {
    var currentMousePosition = event.clientX;
    var centerX = line1.getBoundingClientRect().left + line1.getBoundingClientRect().width / 2;
    var centerY = line1.getBoundingClientRect().top + line1.getBoundingClientRect().height / 2;

    var mouseAngle = Math.atan2(currentMousePosition - centerX, centerY - event.clientY) * (180 / Math.PI);

    newAngle = startAngle + (startMousePosition + mouseAngle);
    newAngle %= 360; // Asegura que newAngle esté en el rango de 0 a 360
    if (newAngle < 0) {
      newAngle += 360; // Ajusta los ángulos negativos
    }

    console.log("ángulo real = " + Math.round((360 - newAngle)) + "°");
    anguloReal = Math.round(360 - newAngle);
    line2.style.transform = "rotate(" + newAngle + "deg)";


  }
}

function validar(){
  var distancia = Math.abs(anguloReal - angulo);
  if(distancia <= 3){
    if(tipoAngulo){
      if(parseFloat(document.getElementById("angulo_radianes").value) == anguloRadianes){
        Swal.fire({
          position: "center",
          imageUrl: "../../images/correcto.gif",
          imageWidth: 250,
          imageHeight: 250,
          title: "Felicidades!",
          text:'¡haz respondido correctamente!',
          showConfirmButton: false,
          timer: 2500,
        });
      }else{
        Swal.fire({
          position: "center",
          imageUrl: "../../images/incorrecto.gif",
          imageWidth: 250,
          imageHeight: 250,
          title: "Incorrecto!",
          text:'¡Haz convertido el ángulo a radianes incorrectamente!',
          showConfirmButton: false,
          timer: 2500,
        });
      }
    }else{
      Swal.fire({
        position: "center",
        imageUrl: "../../images/incorrecto.gif",
        imageWidth: 250,
        imageHeight: 250,
        title: "Incorrecto!",
        text:'¡el tipo de ángulo es incorrecto!',
        showConfirmButton: false,
        timer: 2500,
      });
    }
  }else{
    Swal.fire({
      position: "center",
      imageUrl: "../../images/incorrecto.gif",
      imageWidth: 250,
      imageHeight: 250,
      title: "Incorrecto!",
      text:'¡Haz medido el ángulo incorrectamente!',
      showConfirmButton: false,
      timer: 2500,
    });
  }

  setTimeout(()=>{
    tipoAngulo = false;
    document.getElementById("angulo_radianes").value = "";
    preguntaActual++;
    generarAngulo();
  }, 3000)
}

function getLineRotation(line) {
  var transform = line.style.transform;
  var match = transform.match(/rotate\(([^)]+)\)/);

  if (match && match[1]) {
    return parseFloat(match[1]);
  }

  return 0;
}

var dragImage = document.getElementById('drag-image2');
var offsetX = 0;
var offsetY = 0;
var isDragging2 = false;

dragImage.addEventListener('mousedown', function (e) {
  isDragging2 = true;
  offsetX = e.offsetX;
  offsetY = e.offsetY;
});

document.addEventListener('mousemove', function (e) {
  if (isDragging2) {
    dragImage.parentElement.style.left = e.clientX - offsetX + 'px';
    dragImage.parentElement.style.top = e.clientY - offsetY + 'px';
  }
});

document.addEventListener('mouseup', function () {
  isDragging2 = false;
});

var mostrado = 0;
function mostrarOcultar() {
  var elemento = document.getElementById("img_trans");
  if (mostrado == 0) {
    elemento.style.display = "none";
    mostrado = 1;
  } else {
    elemento.style.display = "block";
    mostrado = 0;
  }
}
