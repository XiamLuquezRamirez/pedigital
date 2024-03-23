let correctas = 0;
let cont = 0;
let avatar = "";
let array_divs = [];
let x = 1;
let cantElem = 0;

let definiciones = [];
let defmostradas = [];
let par;
let cantParte;

var parteAve = [
  {
    parte: "Buche",
    definicion:
      "Estructura dilatada del esófago que almacena temporalmente el alimento antes de su digestión.",
  },
  {
    parte: "Ciego",
    definicion:
      "Porción del intestino donde ocurre la fermentación bacteriana y la absorción de agua en algunas especies de aves.",
  },
  {
    parte: "Cloaca",
    definicion:
      "Órgano donde se unen los sistemas digestivo, excretor y reproductor, y a través del cual se eliminan los desechos y se depositan los huevos.",
  },
  {
    parte: "Conducto-Biliar",
    definicion:
      "Conducto que transporta la bilis desde el hígado hasta el intestino para ayudar en la digestión de las grasas.",
  },
  {
    parte: "Duodena",
    definicion:
      "La primera porción del intestino delgado donde ocurre la digestión final de los alimentos y la absorción de nutrientes.",
  },
  {
    parte: "Siringe",
    definicion:
      "Órgano vocal especializado en las aves que les permite producir sonidos y vocalizaciones.",
  },
  {
    parte: "Esófago",
    definicion:
      "Conducto muscular que transporta el alimento desde el pico hasta el estómago.",
  },
  {
    parte: "Faringe",
    definicion:
      "Parte de la garganta que conecta la boca con el esófago y la tráquea.",
  },
  {
    parte: "Glotis",
    definicion:
      "Abertura en la parte superior de la tráquea que controla el paso del aire hacia los pulmones durante la respiración.",
  },
  {
    parte: "Hígado",
    definicion:
      "Órgano principal del sistema digestivo que produce la bilis y desempeña funciones metabólicas y desintoxicantes.",
  },
  {
    parte: "Intestino",
    definicion:
      "Órgano largo y tubular donde ocurre la digestión final y la absorción de nutrientes.",
  },
  {
    parte: "Laringe",
    definicion:
      "Órgano vocal que se encuentra en la parte superior de la tráquea y juega un papel en la producción de sonidos.",
  },
  {
    parte: "Lengua",
    definicion:
      "Órgano muscular en el interior del pico que ayuda a manipular y tragar los alimentos.",
  },
  {
    parte: "Molleja",
    definicion:
      "Segunda parte del estómago de las aves que ayuda en la trituración y digestión mecánica de los alimentos.",
  },
  {
    parte: "Páncreas",
    definicion:
      "Órgano que secreta enzimas digestivas y hormonas importantes para la digestión y el metabolismo.",
  },
  {
    parte: "Proventriculo",
    definicion:
      "La primera parte del estómago de las aves donde ocurre la secreción de ácido clorhídrico y enzimas digestivas.",
  },
  {
    parte: "Pulmones",
    definicion:
      "Órganos responsables de la respiración en las aves, donde tiene lugar el intercambio de gases.",
  },
  {
    parte: "Tráquea",
    definicion:
      "Tubo flexible que conecta la glotis con los pulmones y permite el paso del aire durante la respiración.",
  },
];

var parteMamifero = [
  {
    parte: "Boca",
    definicion:
      "Cavidad en la parte frontal de la cabeza donde se encuentran los dientes y la lengua, y donde comienza el proceso de digestión.",
  },
  {
    parte: "Cuajar",
    definicion:
      "Estómago especializado presente en algunos mamíferos rumiantes, como las vacas, que ayuda en la digestión de alimentos fibrosos.",
  },
  {
    parte: "Esófago",
    definicion:
      "Tubo muscular que conecta la boca con el estómago y se encarga de transportar el alimento ingerido hacia el sistema digestivo.",
  },
  {
    parte: "Intestino",
    definicion:
      "Órgano largo y tubular donde se completa la digestión de los alimentos y se absorben los nutrientes en el torrente sanguíneo.",
  },
  {
    parte: "Libro",
    definicion:
      "Primera porción del intestino delgado en mamíferos que recibe los jugos digestivos del páncreas y la bilis del hígado para continuar la digestión.",
  },
  {
    parte: "Retículo",
    definicion:
      "Compartimiento del sistema digestivo presente en rumiantes que ayuda en la fermentación de los alimentos y la formación del bolo alimenticio.",
  },
  {
    parte: "Rumen",
    definicion:
      "Compartimiento del sistema digestivo presente en rumiantes donde ocurre la fermentación microbiana de los alimentos consumidos.",
  },
];
var parteHumana = [
    {
      "parte": "Ano",
      "definicion": "Orificio de salida del sistema digestivo que se encuentra al final del intestino grueso y se utiliza para eliminar los desechos sólidos del cuerpo."
    },
    {
      "parte": "Cavidad oral",
      "definicion": "Espacio que incluye los labios, la lengua, los dientes y las encías, donde se inicia el proceso de digestión con la masticación y la mezcla de alimentos con la saliva."
    },
    {
      "parte": "Esófago",
      "definicion": "Tubo muscular que conecta la cavidad oral con el estómago y se encarga de transportar el alimento ingerido hacia el sistema digestivo."
    },
    {
      "parte": "Estómago",
      "definicion": "Órgano en forma de bolsa donde ocurre la digestión de los alimentos mediante la acción del ácido y las enzimas gástricas, y donde se inicia la descomposición de las proteínas."
    },
    {
      "parte": "Glándulas salivares",
      "definicion": "Glándulas ubicadas en la cavidad oral que producen y liberan saliva, que contiene enzimas digestivas para iniciar la descomposición de los alimentos."
    },
    {
      "parte": "Hígado",
      "definicion": "Órgano grande situado en la parte superior derecha del abdomen que produce la bilis, descompone los nutrientes y desintoxica sustancias nocivas en el cuerpo."
    },
    {
      "parte": "Intestino delgado",
      "definicion": "Porción larga y estrecha del sistema digestivo donde tiene lugar la mayor parte de la digestión y la absorción de los nutrientes en el torrente sanguíneo."
    },
    {
      "parte": "Intestino grueso",
      "definicion": "Porción final del sistema digestivo donde se absorbe agua y se forman las heces antes de ser eliminadas a través del ano."
    },
    {
      "parte": "Páncreas",
      "definicion": "Órgano que produce enzimas digestivas y hormonas como la insulina, que ayudan en la digestión de los alimentos y la regulación de los niveles de azúcar en la sangre."
    },
    {
      "parte": "Recto",
      "definicion": "Última porción del intestino grueso que conecta el colon con el ano y almacena temporalmente las heces antes de su eliminación."
    },
    {
      "parte": "Vesícula biliar",
      "definicion": "Órgano pequeño que almacena y concentra la bilis producida por el hígado, y la libera al intestino delgado para ayudar en la digestión de las grasas."
    }
  ]
  ;
var partePeces = [
    {
      "parte": "Boca",
      "definicion": "Abertura en la cabeza de los peces que se utiliza para la ingesta de alimentos."
    },
    {
      "parte": "Arcos branquiales",
      "definicion": "Estructuras en los peces que contienen las branquias y permiten la respiración acuática al extraer oxígeno del agua."
    },
    {
      "parte": "Corazón",
      "definicion": "Órgano que bombea la sangre a través del sistema circulatorio de los peces, proporcionando oxígeno y nutrientes a los tejidos del cuerpo."
    },
    {
      "parte": "Higado",
      "definicion": "Órgano importante en los peces que realiza funciones de almacenamiento, producción de enzimas digestivas y desintoxicación."
    },
    {
      "parte": "Intestino",
      "definicion": "Órgano donde tiene lugar la digestión final y la absorción de nutrientes en los peces."
    },
    {
      "parte": "Estómago",
      "definicion": "Órgano en el sistema digestivo de los peces que se encarga de la descomposición de los alimentos y la producción de enzimas digestivas."
    },
    {
      "parte": "Ano",
      "definicion": "Abertura ubicada en la parte posterior del cuerpo de los peces a través de la cual se eliminan los desechos sólidos."
    }
  ]
  ;
function elegir() {
  let nutri = Math.floor((Math.random() * (4 - 1 + 1)) + 1);
  //let nutri = 4;
  seleccionar(nutri);
}

function seleccionar(nutri) {

  switch (nutri) {
    case 1:
      categoria = "Mueve cada parte del Ave según la definición mostrada.";
      textTitulo = "Hola, soy Genio. <br> En este juego debes arrastrar las partes del Ave según la definición mostrada al lugar que corresponda.";
      definiciones = parteAve;
      cantParte = definiciones.length;
      break;
    case 2:
        categoria = "Mueve cada parte del Mamífero según la definición mostrada.";
        textTitulo = "Hola, soy Genio. <br> En este juego debes arrastrar las partes del Mamífero según la definición mostrada al lugar que corresponda.";
        definiciones = parteMamifero;
        cantParte = definiciones.length;
      break;
    case 3:
        categoria = "Mueve cada parte del Humano según la definición mostrada.";
        textTitulo = "Hola, soy Genio. <br> En este juego debes arrastrar las partes del Humano según la definición mostrada al lugar que corresponda.";
        definiciones = parteHumana;
        cantParte = definiciones.length;
        break;
        case 4:
            categoria = "Mueve cada parte del Pez según la definición mostrada.";
            textTitulo = "Hola, soy Genio. <br> En este juego debes arrastrar las partes del Pez según la definición mostrada al lugar que corresponda.";
            definiciones = partePeces;
            cantParte = definiciones.length;

        break;

  }

  mostPreg();
  document.getElementById("categoria").innerText = categoria;

  setTimeout(function () {
    swal.close();
    if (nutri == 1) {
      CargarJuegoNutriAves(textTitulo);
    } else if (nutri == 2) {
        CargarJuegoNutriMamifero(textTitulo);
    } else if (nutri == 3) {
        CargarJuegonutriHumana(textTitulo);
    } else {
      CargarJuegonutriPeces(textTitulo);
    }
  }, 2000);
}

function obtenerIndiceAleatorio() {
  let indice = Math.floor(Math.random() * definiciones.length);
  while (defmostradas.includes(indice)) {
    indice = Math.floor(Math.random() * definiciones.length);
  }
  defmostradas.push(indice);

  return indice;
}

function mostPreg() {
  let index = obtenerIndiceAleatorio();

  let def = definiciones[index].definicion;
  par = definiciones[index].parte;
  
  document.getElementById("pregunta").innerText = def;
}

///NUTRICION AVES

function CargarJuegoNutriAves() {
  
  cargarPresentacion(textTitulo);

  document.getElementById("opcionAves").style.display = "block";

  var puntos = document.querySelectorAll(".puntoAve");
  puntos.forEach((punto) => {
    punto.addEventListener("dragover", permitirSoltar);
    punto.addEventListener("drop", soltarNombre);
  });
  correctas = 0;
  cont = 0;
  avatar = "";

  array_divs = [];
  x = 1;

  array_divs.push(
    "<img id='NombAve1' data-id='Buche' draggable='true' width='60' class='nombreAve'  src='img/Aves/buche.png' />"
  );

  array_divs.push(
    "<img id='NombAve2' data-id='Ciego' draggable='true' width='60' class='nombreAve'  src='img/Aves/ciego.png' />"
  );

  array_divs.push(
    "<img id='NombAve3' data-id='cloaca' draggable='true' width='60' class='nombreAve'  src='img/Aves/cloaca.png' />"
  );

  array_divs.push(
    "<img id='NombAve4' data-id='Conducto-Biliar' draggable='true' width='60' class='nombreAve'  src='img/Aves/conducto-biliar.png' />"
  );

  array_divs.push(
    "<img id='NombAve5' data-id='Duodena' draggable='true' width='60' class='nombreAve'  src='img/Aves/duodena.png' />"
  );
  array_divs.push(
    "<img id='NombAve6' data-id='Siringe' draggable='true' width='60' class='nombreAve'  src='img/Aves/siringe.png' />"
  );
  array_divs.push(
    "<img id='NombAve7' data-id='Esófago' draggable='true' width='60' class='nombreAve'  src='img/Aves/esofago.png' />"
  );
  array_divs.push(
    "<img id='NombAve8' data-id='Faringe' draggable='true' width='60' class='nombreAve'  src='img/Aves/faringe.png' />"
  );
  array_divs.push(
    "<img id='NombAve9' data-id='Glotis' draggable='true' width='60' class='nombreAve'  src='img/Aves/glotis.png' />"
  );
  array_divs.push(
    "<img id='NombAve10' data-id='Hígado' draggable='true' width='60' class='nombreAve'  src='img/Aves/higado.png' />"
  );
  array_divs.push(
    "<img id='NombAve11' data-id='Intestino' draggable='true' width='60' class='nombreAve'  src='img/Aves/intestino.png' />"
  );
  array_divs.push(
    "<img id='NombAve12' data-id='Laringe' draggable='true' width='60' class='nombreAve'  src='img/Aves/laringe.png' />"
  );
  array_divs.push(
    "<img id='NombAve13' data-id='Lengua' draggable='true' width='60' class='nombreAve'  src='img/Aves/lengua.png' />"
  );
  array_divs.push(
    "<img id='NombAve14' data-id='Molleja' draggable='true' width='60' class='nombreAve'  src='img/Aves/molleja.png' />"
  );
  array_divs.push(
    "<img id='NombAve15' data-id='Páncreas' draggable='true' width='60' class='nombreAve'  src='img/Aves/pancreas.png' />"
  );
  array_divs.push(
    "<img id='NombAve16' data-id='Proventriculo' draggable='true' width='60' class='nombreAve'  src='img/Aves/proventriculo.png' />"
  );
  array_divs.push(
    "<img id='NombAve17' data-id='Pulmones' draggable='true' width='60' class='nombreAve'  src='img/Aves/pulmones.png' />"
  );
  array_divs.push(
    "<img id='NombAve18' data-id='Tráquea' draggable='true' width='60' class='nombreAve'  src='img/Aves/traquea.png' />"
  );

  array_divs = randomValueGenerator(array_divs);

  div = "";
  for (let index = 0; index < array_divs.length; index++) {
    const element = array_divs[index];
    div += element;
  }

  //document.getElementById("animales").innerHTML = "";
  document.getElementById("nombrCiclosAve").innerHTML = div;

  // Creamos los eventos para arrastrar los nombres
  var nombres = document.querySelectorAll(".nombreAve");

  nombres.forEach((nombre) => {
    nombre.addEventListener("dragstart", arrastrar);
    nombre.addEventListener("dragend", soltar);
  });
}

///NUTRICION MAMIFERO
function CargarJuegoNutriMamifero() {
  
    cargarPresentacion(textTitulo);
  
    document.getElementById("opcionMamifero").style.display = "block";
  
    var puntos = document.querySelectorAll(".puntoMami");
    puntos.forEach((punto) => {
      punto.addEventListener("dragover", permitirSoltar);
      punto.addEventListener("drop", soltarNombre);
    });
    correctas = 0;
    cont = 0;
    avatar = "";
  
    array_divs = [];
    x = 1;
  
    array_divs.push(
      "<img id='NombMami1' data-id='Boca' draggable='true' width='60' class='nombreMami'  src='img/Mamiferos/Boca.png' />"
    );
  
    array_divs.push(
      "<img id='NombMami2' data-id='Cuajar' draggable='true' width='60' class='nombreMami'  src='img/Mamiferos/Cuajar.png' />"
    );
  
    array_divs.push(
      "<img id='NombMami3' data-id='Esófago' draggable='true' width='60' class='nombreMami'  src='img/Mamiferos/Esofago.png' />"
    );
  
    array_divs.push(
      "<img id='NombMami4' data-id='Intestino' draggable='true' width='60' class='nombreMami'  src='img/Mamiferos/Intestino.png' />"
    );
  
    array_divs.push(
      "<img id='NombMami5' data-id='Libro' draggable='true' width='60' class='nombreMami'  src='img/Mamiferos/libro.png' />"
    );
    array_divs.push(
      "<img id='NombMami6' data-id='Retículo' draggable='true' width='60' class='nombreMami'  src='img/Mamiferos/Reticulo.png' />"
    );
    array_divs.push(
      "<img id='NombMami7' data-id='Rumen' draggable='true' width='60' class='nombreMami'  src='img/Mamiferos/Rumen.png' />"
    );
   
  
    array_divs = randomValueGenerator(array_divs);
  
    div = "";
    for (let index = 0; index < array_divs.length; index++) {
      const element = array_divs[index];
      div += element;
    }
  
    //document.getElementById("animales").innerHTML = "";
    document.getElementById("nombrCiclosMamifero").innerHTML = div;
  
    // Creamos los eventos para arrastrar los nombres
    var nombres = document.querySelectorAll(".nombreMami");
  
    nombres.forEach((nombre) => {
      nombre.addEventListener("dragstart", arrastrar);
      nombre.addEventListener("dragend", soltar);
    });
  }
  

///NUTRICION HUMANA
function CargarJuegonutriHumana() {
  
    cargarPresentacion(textTitulo);
  
    document.getElementById("opcionHumana").style.display = "block";
  
    var puntos = document.querySelectorAll(".puntoHuma");
    puntos.forEach((punto) => {
      punto.addEventListener("dragover", permitirSoltar);
      punto.addEventListener("drop", soltarNombre);
    });
    correctas = 0;
    cont = 0;
    avatar = "";
  
    array_divs = [];
    x = 1;
  
    array_divs.push(
      "<img id='NombHumana1' data-id='Ano' draggable='true' width='60' class='nombreHumana'  src='img/Humana/Ano.png' />"
    );
  
    array_divs.push(
      "<img id='NombHumana2' data-id='Cavidad-oral' draggable='true' width='60' class='nombreHumana'  src='img/Humana/Cavidad-oral.png' />"
    );
  
    array_divs.push(
      "<img id='NombHumana3' data-id='Esófago' draggable='true' width='60' class='nombreHumana'  src='img/Humana/Esofago.png' />"
    );
  
    array_divs.push(
      "<img id='NombHumana4' data-id='Estómago' draggable='true' width='60' class='nombreHumana'  src='img/Humana/Estomago.png' />"
    );
  
    array_divs.push(
      "<img id='NombHumana5' data-id='Glándulas-salivales' draggable='true' width='60' class='nombreHumana'  src='img/Humana/Glandulas-salivales.png' />"
    );
    array_divs.push(
      "<img id='NombHumana6' data-id='Intestino-delgado' draggable='true' width='60' class='nombreHumana'  src='img/Humana/Intestino-delgado.png' />"
    );
    array_divs.push(
      "<img id='NombHumana7' data-id='Intestino-grueso' draggable='true' width='60' class='nombreHumana'  src='img/Humana/Intestino-grueso.png' />"
    );
    array_divs.push(
      "<img id='NombHumana8' data-id='Pancrear' draggable='true' width='60' class='nombreHumana'  src='img/Humana/Pancrear.png' />"
    );
    array_divs.push(
      "<img id='NombHumana9' data-id='Recto' draggable='true' width='60' class='nombreHumana'  src='img/Humana/Recto.png' />"
    );
    array_divs.push(
      "<img id='NombHumana10' data-id='Vesicula-biliar' draggable='true' width='60' class='nombreHumana'  src='img/Humana/Vesicula-biliar.png' />"
    );
    array_divs.push(
      "<img id='NombHumana11' data-id='Hígado' draggable='true' width='60' class='nombreHumana'  src='img/Humana/Higado.png' />"
    );

  
    array_divs = randomValueGenerator(array_divs);
  
    div = "";
    for (let index = 0; index < array_divs.length; index++) {
      const element = array_divs[index];
      div += element;
    }
  
    //document.getElementById("animales").innerHTML = "";
    document.getElementById("nombrCiclosHumana").innerHTML = div;
  
    // Creamos los eventos para arrastrar los nombres
    var nombres = document.querySelectorAll(".nombreHumana");
  
    nombres.forEach((nombre) => {
      nombre.addEventListener("dragstart", arrastrar);
      nombre.addEventListener("dragend", soltar);
    });
  }

///NUTRICION PECES

function CargarJuegonutriPeces() {
  
    cargarPresentacion(textTitulo);
  
    document.getElementById("opcionPeces").style.display = "block";
  
    var puntos = document.querySelectorAll(".puntoPeces");
    puntos.forEach((punto) => {
      punto.addEventListener("dragover", permitirSoltar);
      punto.addEventListener("drop", soltarNombre);
    });
    correctas = 0;
    cont = 0;
    avatar = "";
  
    array_divs = [];
    x = 1;
  
    array_divs.push("<img id='NomPeces1' data-id='Ano' draggable='true' width='60' class='nombrePeces'  src='img/Peces/Ano.png' />");
    array_divs.push("<img id='NombPeces2' data-id='Arcos-branquiales' draggable='true' width='60' class='nombrePeces'  src='img/Peces/Arcos-branquiales.png' />");
    array_divs.push("<img id='NombPeces3' data-id='Boca' draggable='true' width='60' class='nombrePeces'  src='img/Peces/Boca.png' />");
    array_divs.push("<img id='NombPeces4' data-id='Corazón' draggable='true' width='60' class='nombrePeces'  src='img/Peces/Corazon.png' />");
    array_divs.push("<img id='NombPeces5' data-id='Estómago' draggable='true' width='60' class='nombrePeces'  src='img/Peces/Estomago.png' />");
    array_divs.push("<img id='NombPeces6' data-id='Higado' draggable='true' width='60' class='nombrePeces'  src='img/Peces/Higado.png' />");
    array_divs.push("<img id='NombPeces7' data-id='Intestino' draggable='true' width='60' class='nombrePeces'  src='img/Peces/Intestino.png' />");
  
    array_divs = randomValueGenerator(array_divs);
  
    div = "";
    for (let index = 0; index < array_divs.length; index++) {
      const element = array_divs[index];
      div += element;
    }
  
    //document.getElementById("animales").innerHTML = "";
    document.getElementById("nombrCiclosPeces").innerHTML = div;
  
    // Creamos los eventos para arrastrar los nombres
    var nombres = document.querySelectorAll(".nombrePeces");
  
    nombres.forEach((nombre) => {
      nombre.addEventListener("dragstart", arrastrar);
      nombre.addEventListener("dragend", soltar);
    });
  }

const randomValueGenerator = (vector) => {
  return vector.sort(function (a, b) {
    return Math.random() - 0.5;
  });
};

function permitirSoltar(evento) {
  evento.preventDefault();
}

function soltarNombre(evento) {
  evento.preventDefault();

  // Obtenemos el ID del nombre que se está soltando
  var idNombre = evento.dataTransfer.getData("text");

  // Obtenemos el ID del punto donde se soltó el nombre
  var idPunto = evento.target.getAttribute("id");

  var idelement = document.getElementById(idPunto);
  idPunto.draggable = false;

  var Ubicacion = evento.target.getAttribute("data-id");

  document.getElementById(idPunto).style.color = "#050519";
  document.getElementById(idPunto).style.fontSize = "1px";

  // Obtenemos el elemento del nombre
  var nombre = document.getElementById(idNombre);
  var nombreSol = nombre.getAttribute("data-id");
  // Lo movemos al punto donde se soltó
  evento.target.appendChild(nombre);

  // Centramos el nombre dentro del punto
  var rectPunto = evento.target.getBoundingClientRect();
  var rectNombre = nombre.getBoundingClientRect();
  var desplazamientoX =
    rectPunto.left -
    rectNombre.left +
    0.5 * (rectPunto.width - rectNombre.width);
  var desplazamientoY =
    rectPunto.top -
    rectNombre.top +
    0.5 * (rectPunto.height - rectNombre.height);

  nombre.style.transform =
    "translate(" + desplazamientoX + "px, " + desplazamientoY + "px)";
  nombre.style.width = "70px";
  nombre.style.height = "15px";
  nombre.style.border = "hidden";
  idelement.removeEventListener("dropover", permitirSoltar);
  idelement.removeEventListener("drop", soltarNombre);

  // Verificamos si el nombre ha sido soltado en el punto correcto

  if (Ubicacion == nombreSol && nombreSol == par) {
    idelement.style.border = "#8BC541 1px solid";
    correctas++;
    nombre.draggable = false;
  } else {
    idelement.style.border = "#880C12 1px solid";
    nombre.draggable = false;
  }

  cont++;

  if (cont == cantParte) {
    $("#principal").fadeToggle(1000);
    $("#final").fadeToggle(1000);

    let prom = (correctas / parseInt(cantParte)) * 100;

    if (prom < 60) {
      var audio = new Audio("../../sounds/game_over.mp3");
      audio.play();
      document.getElementById("final").style.backgroundImage =
        "url(../../images/ciencia/derrota.gif)";
    } else {
      document.getElementById("final").style.backgroundImage =
        "url(../../images/ciencia/victoria.gif)";
      var audio = new Audio("../../sounds/victory.mp3");
      audio.play();
    }
    document.getElementById("texto_final").innerText =
      "Has obtenido " + correctas + " puntos de " + cantParte + " posibles";
  } else {
    mostPreg();
  }
}

// Funciones para arrastrar y soltar los nombres
function arrastrar(evento) {
  evento.dataTransfer.setData("text", evento.target.id);
  evento.target.style.opacity = "0.5";
}

function soltar(evento) {
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
          divAnimado.style.backgroundImage = "url(../../images/ciencia/normal2.gif)";
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
          document.querySelector("#btnomitir").style.display = "none";
          setTimeout(() => {
            cerrar_anuncio();
          }, 3000);
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
  const divAnimado2 = document.querySelector(".nube");
  divAnimado2.style.animationName = "moverabajo";
  const divAnimado = document.querySelector(".overlay");
  divAnimado.style.backgroundImage = "url(../../images/ciencia/normal1.gif)";
  $("#fondo_blanco").fadeToggle(3000);
  setTimeout(function () {
    divAnimado.style.animationName = "moverIzquierda";
    divAnimado.style.animationDirection = "normal";
    setTimeout(() => {
      $("#principal").fadeToggle(1000);
      $("#img-mascota").show();
    }, 2000);
  }, 2000);
}
