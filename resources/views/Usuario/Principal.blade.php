<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PEDGITAL - INICIO</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/principal.css') }}">
    <script src="{{ asset('app-assets/js/41bcea2ae3.js') }}" type="text/javascript"></script>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('app-assets/images/ico/favicon.ico') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/nunito') }}">
    <style>
        
      
        .home {
            display: flex;
            height: 100dvh;
            background: linear-gradient(to top, #D2E2FB 30%, #86A8DB);
            position: relative;
            overflow: hidden;
        }

        .home img {
            position: absolute;
            bottom: 0;
            width: 100%;
            pointer-events: none;

        }

        .home .title {
            position: absolute;
            top: 50%;
            left: 50%;
            text-align: center;
            line-height: 5rem;
            transform: translate(-50%, -50%);
            font-size: 65px;
            letter-spacing: 2px;
            font-weight: 900;
            max-width: 800px;
            display: block;
            width: 100%;
            font-weight: 900;
            color: rgba(34, 139, 34, 0.8); /* Color verde principal (rgba de ForestGreen) */
            text-shadow:
                -5px 5px 0 rgba(94, 137, 94, 0.6), /* Sombra verde más oscura */
                -1px 1px 0 #228B22,  /* Sombra verde ForestGreen */
                -2px 2px 0 #228B22,
                -3px 3px 0 #228B22,
                -4px 4px 0 #228B22,
                -5px 5px 0 #228B22,
                -10px 10px 30px rgba(0, 0, 0, 0.2), /* Sombra difusa negra */
                -15px 10px 10px rgba(0, 0, 0, 0.1); /* Sombra difusa negra más ligera */
            /* Sombra difusa negra más ligera */
            -webkit-text-stroke: 1px rgba(165, 234, 165, 0.559);
            transition: all .1s;
            animation: bounce 10s infinite;
        }

        .title i{
            opacity: 0;
            transition: ease-in-out 10s infinite;
            animation: parpadeo 1s infinite;

        }


        .body__page {
            padding: 50px;
            border: 2px color: white;
            position: relative;
            z-index: 100;
        }

        .animation-show {
            transform: translateY(50px);
            opacity: 0;
            transition: 0.7s;
        }

        .active .animation-show {
            transform: translateY(0);
            opacity: 1;
        }

        .leaf1 {
            animation-delay: 0.5s;
        }

        .leaf2 {
            animation-delay: 1s;
        }

        .bush1 {
            animation-delay: 1.5s;

        }

        .bush2 {
            animation-delay: 5s;
            animation: float2 6s ease-in-out infinite;
        }

        .footer-area {
            animation-delay: 5s;
            animation: float2 2s ease-in-out infinite;
        }

        .mount1 {
            animation-delay: 2.5s;
            animation: floatN 4s ease-in-out infinite;
            opacity: .8;
        }

        .mount2 {
            animation-delay: 3s;
            animation: floatN 3s ease-in-out infinite;
            opacity: .5;
        }

        @keyframes floatN {
            0% {
                transform: translateY(0);
                opacity: .2;
            }

            50% {
                transform: translateY(-20px);
                opacity: .8;
            }

            100% {
                transform: translateY(0);
                opacity: .2;
            }
        }
        @keyframes float {
            0% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-20px);
            }

            100% {
                transform: translateY(0);
            }
        }

        @keyframes float2 {
            0% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(5px);
            }

            100% {
                transform: translateY(0);
            }
        }

        @keyframes bounce {
            0%, 100% {
                transform: translate(-50%, -50%);
            }
            50% {
                transform: translate(-50%, -60%);
            }
        }

        @keyframes parpadeo {
            0%, 100% {
                opacity: .8;
            }
            50% {
                opacity: .1;
            }
        }
    </style>
</head>

<body class="bodyClass">
    <section class="home">
        <img loading="lazy" src="{{ asset('app-assets/images/principal/assets/mount2.png') }}"  class="mount2">
        <img loading="lazy" src="{{ asset('app-assets/images/principal/assets/mount1.png') }}" class="mount1">
        <img loading="lazy" src="{{ asset('app-assets/images/principal/assets/bush2.png') }}" class="bush2">
        <div id="container">
            <h1 class="title">BIENVENIDO A TU <br> NUEVO MUNDO DE <br> APRENDIZAJE<br><br><i class="fa fa-angle-double-down"></i></l></h1>
        </div>


        <img loading="lazy" src="{{ asset('app-assets/images/principal/assets/bush1.png') }}" class="bush1">
        <img loading="lazy" src="{{ asset('app-assets/images/principal/assets/leaf2.png') }}" class="leaf2">
        <img loading="lazy" src="{{ asset('app-assets/images/principal/assets/leaf1.png') }}" class="leaf1">
    </section>
    <div class="body__page"
        style=" background-image: url({{ asset('app-assets/images/principal/assets/fonfoCards.png') }});">
        <div class="container__card ">

            @foreach ($Permiso as $per)
                @if ($per->plataf == 'PED-KID' && $per->estado == 'ACTIVO')
                    <div class="card__father animation-show" id="pedkidCard">
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

                                    <p><strong>PEDIGITAL KIDS</strong> esta plataforma brinda una experiencia de
                                        aprendizaje
                                        enriquecedora, con recursos interactivos que fomentan el desarrollo académico y
                                        personal de los alumnos.</p>
                                    <input type="button" onclick="abrirYRedireccionar(1)" value="Entrar">

                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" id="urlPEDKID" value="{{ $per->url }}" name="urlPEDKID" />
                @endif

                @if ($per->plataf == 'PED' && $per->estado == 'ACTIVO')
                    <div class="card__father animation-show" id="pedCard">
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
                                        herramientas diseñadas específicamente para esta etapa, preparando a los
                                        estudiantes
                                        para desafíos académicos posteriores.</p>
                                    <input type="button" onclick="abrirYRedireccionar(2)" value="Entrar">
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" id="urlPED" value="{{ $per->url }}" name="urlPED" />
                @endif

                @if ($per->plataf == 'etnoPED' && $per->mod_etno == 'si')
                    <div class="card__father animation-show" id="etnoPEDCard">
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

                                    <p> <strong>EtnoPED</strong> es un módulo especializado en enseñanza étnica que
                                        promueve
                                        la diversidad y la inclusión, permitiendo a los estudiantes explorar sus raíces
                                        culturales y aprender de las tradiciones indígenas.</p>
                                    <input type="button" onclick="abrirYRedireccionar(3)" value="Entrar">

                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" id="urletno" value="{{ $per->url }}" name="urletno" />
                @endif
            @endforeach
        </div>
        <div class="layout__background"></div>
    </div>

    {{--  <footer class="footer-area">

    </footer>  --}}
    </div>
    <script src="{{ asset('app-assets/js/shortcut.js') }}" type="text/javascript"></script>

    <script>
        const title = document.querySelector('.title')
        const leaf1 = document.querySelector('.leaf1')
        const leaf2 = document.querySelector('.leaf2')
        const bush2 = document.querySelector('.bush2')
        const mount1 = document.querySelector('.mount1')
        const mount2 = document.querySelector('.mount2')
        let listTab = document.querySelectorAll('.container__card');

        document.addEventListener('scroll', function() {
            let value = window.scrollY
            // console.log(value)
            title.style.marginTop = value * 1.1 + 'px'

            leaf1.style.marginLeft = -value * 2 + 'px'
            leaf2.style.marginLeft = value + 'px'

            bush2.style.marginBottom = value * 5 + +'px'

            mount1.style.marginBottom = -value * 1.1 + 'px'
            mount2.style.marginBottom = -value * 1.2 + 'px'


            listTab.forEach((tab, index) => {
                if (tab.offsetTop + value > 350) {
                    tab.classList.add('active');

                    tab.style.transitionDelay = `${index * 0.3}s`; // Apply transition delay based on index
                } else {
                    tab.classList.remove('active');
                    tab.style.transitionDelay = '0s'; // Reset transition delay
                }
            });



        })

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
            console.log(bannerImages);
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
