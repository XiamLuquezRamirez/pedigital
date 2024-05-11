<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PEDGITAL - INICIO</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/principal.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/fonts/GothamRnd-Bold.otf') }}">
    <script src="{{ asset('app-assets/js/41bcea2ae3.js') }}" type="text/javascript"></script>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('app-assets/images/ico/favicon.ico') }}">
</head>

<body class="bodyClass">
        <div class="body__page" style="margin-top: 100px !important; padding-bottom: 50px !important;">
            <div class="mensaje">BIENVENIDO A TU NUEVO MUNDO DE APRENDIZAJE</div>
            <div class="container__card">

                @foreach ($Permiso as $per)
                @if ($per->plataf == "PED-KID"  && $per->estado == "ACTIVO")
                <div class="card__father" id="pedkidCard">
                    <div class="card">
                        <div class="card__front"
                            style="background-image: url({{ asset('app-assets/images/principal/images/portada-pedkid.png') }});">
                            <div class="bg"></div>
                            <div class="body__card_front">
                            </div>
                        </div>
                        <div class="card__back">
                            <div class="body__card_back"
                                style="background-image: url({{ asset('app-assets/images/principal/images/contraportada-pedkid.png') }});">

                                <p><strong>PEDIGITAL KIDS</strong> esta plataforma brinda una experiencia de aprendizaje
                                    enriquecedora, con recursos interactivos que fomentan el desarrollo académico y
                                    personal de los alumnos.</p>
                                <input type="button" onclick="abrirYRedireccionar(1)" value="Entrar">

                            </div>
                        </div>
                    </div>
                </div>
                <input type="hidden" id="urlPEDKID" value="{{$per->url}}" name="urlPEDKID" />
                @endif

                @if ($per->plataf == "PED"  && $per->estado == "ACTIVO")
                <div class="card__father" id="pedCard">
                    <div class="card">
                        <div class="card__front"
                            style="background-image: url({{ asset('app-assets/images/principal/images/portada-ped.png') }});">
                            <div class="bg"></div>
                            <div class="body__card_front">
                            </div>
                        </div>
                        <div class="card__back">
                            <div class="body__card_back"
                                style="background-image: url({{ asset('app-assets/images/principal/images/contraportada-ped.png') }});">
                                <p><strong>PEDIGITAL</strong> proporciona un entorno de aprendizaje dinámico con
                                    herramientas diseñadas específicamente para esta etapa, preparando a los estudiantes
                                    para desafíos académicos posteriores.</p>
                                <input type="button" onclick="abrirYRedireccionar(2)" value="Entrar">
                            </div>
                        </div>
                    </div>
                </div>
                <input type="hidden" id="urlPED" value="{{$per->url}}" name="urlPED" />

                @endif

                @if ($per->plataf == "etnoPED" && $per->mod_etno == "si" )
                <div class="card__father" id="etnoPEDCard">
                    <div class="card">
                        <div class="card__front"
                            style="background-image: url({{ asset('app-assets/images/principal/images/portada-etno.png') }});">
                            <div class="bg"></div>
                            <div class="body__card_front">
                            </div>
                        </div>
                        <div class="card__back">
                            <div class="body__card_back"
                                style="background-image: url({{ asset('app-assets/images/principal/images/contraportada-etno.png') }});">

                                <p> <strong>EtnoPED</strong> es un módulo especializado en enseñanza étnica que promueve
                                    la diversidad y la inclusión, permitiendo a los estudiantes explorar sus raíces
                                    culturales y aprender de las tradiciones indígenas.</p>
                                <input type="button" onclick="abrirYRedireccionar(3)" value="Entrar">

                            </div>
                        </div>
                    </div>
                </div>
                <input type="hidden" id="urletno" value="{{$per->url}}" name="urletno" />
                @endif
                @endforeach
            </div>
            <div class="layout__background"></div>
        </div>

        <footer class="footer-area">
         
        </footer>
    </div>
    <script src="{{ asset('app-assets/js/shortcut.js') }}" type="text/javascript"></script>

    <script>

        shortcut.add("Ctrl+A", function() {
            PEDGITALURL = '{{ url('/loginPED') }}';
            const nuevaPestana = window.open(PEDGITALURL, '_blank');
            nuevaPestana.focus();
        }, {
            "type": "keydown",
            "propagate": true,
            "target": document
        });


        document.addEventListener("DOMContentLoaded", function() {


            const bannerImages = document.querySelectorAll(".banner-image");
            let currentIndex = 0;

            function showImage(index) {
                bannerImages[index].classList.add("active");
            }

            function hideImage(index) {
                bannerImages[index].classList.remove("active");
            }

            function rotateImages() {
                hideImage(currentIndex);
                currentIndex = (currentIndex + 1) % bannerImages.length;
                showImage(currentIndex);
            }

            showImage(currentIndex);
            setInterval(rotateImages, 10000);

            {{--  // Array de nombres de módulos permitidos
            const modulosPermitidos = ['ped', 'pedkid', 'etnoPED'];

            // Objeto con permisos de usuario (puedes obtenerlo de tu backend)
            const permisosUsuario = {
                ped: true, // Permitido
                pedkid: false, // No permitido
                etnoPED: false, // Permitido
            };

            // Función para habilitar o deshabilitar un módulo
            function habilitarODeshabilitarModulo(modulo, permitido) {
                const moduloElement = document.getElementById(`${modulo}Card`);
                if (moduloElement) {
                    moduloElement.style.display = permitido ? 'block' : 'none';
                }
            }

            // Recorrer el array de módulos y habilitar o deshabilitar según corresponda
            modulosPermitidos.forEach(modulo => {
                const permitido = permisosUsuario[modulo] || false;
                habilitarODeshabilitarModulo(modulo, permitido);
            });  --}}

        });

        function abrirYRedireccionar(Opc) {

            var PEDGITALURL;
            if (Opc == 1) {
                PEDGITALURL = document.getElementById('urlPEDKID').value;
            } else if (Opc == 2) {
                PEDGITALURL = '{{ url('/loginPED') }}';
            } else if (Opc == 3) {
                PEDGITALURL = document.getElementById('urletno').value;
            }

            const nuevaPestana = window.open(PEDGITALURL, '_blank');
            nuevaPestana.focus();

        }
    </script>
</body>

</html>
