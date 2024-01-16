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



    <div class="container_all" id="container__all">
        <div class="cover">

            <div class="bg_color"></div>
            <div class="wave w1"></div>
            <div class="wave w2"></div>
            <div class="wave w3"></div>

            <div class="container__cover">
                <div class="container__info">
                    <h1>&nbsp;</h1>
                </div>
                <div class="container__vector">
                    <img src="{{ asset('app-assets/images/principal/images/bg-header/img1.png') }}"
                        class="banner-image active">
                    <img src="{{ asset('app-assets/images/principal/images/bg-header/img2.png') }}"
                        class="banner-image">
                    <img src="{{ asset('app-assets/images/principal/images/bg-header/img3.png') }}"
                        class="banner-image">
                    <img src="{{ asset('app-assets/images/principal/images/bg-header/img4.png') }}"
                        class="banner-image">
                    <img src="{{ asset('app-assets/images/principal/images/bg-header/img5.png') }}"
                        class="banner-image">
                    <img src="{{ asset('app-assets/images/principal/images/bg-header/img6.png') }}"
                        class="banner-image">
                    <img src="{{ asset('app-assets/images/principal/images/bg-header/img7.png') }}"
                        class="banner-image">
                    <img src="{{ asset('app-assets/images/principal/images/bg-header/img8.png') }}"
                        class="banner-image">
                </div>
            </div>
        </div>
        <!-- Aquí comienza el código -->

        <div class="body__page" style="margin-top: -200px !important;">

            <div class="container__card">



                <div class="card__father">
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

                <div class="card__father">
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

                <div class="card__father">
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

            </div>
            <div class="layout__background"></div>

        </div>

        <footer class="footer-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <p>Copyright &copy;
                            <script>
                                document.write(new Date().getFullYear());
                            </script> PEDIGITAL
                        </p>
                    </div>

                </div>
            </div>
        </footer>
    </div>

    <script>
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
        });

        function abrirYRedireccionar(Opc) {

            var PEDGITALURL;
            if (Opc == 1) {
                PEDGITALURL = 'http://192.168.1.74/PEDIGITAL-KID/public/';
            } else if (Opc == 2) {
                PEDGITALURL = '{{ url('/loginPED') }}';
            } else if (Opc == 3) {
                PEDGITALURL = 'http://192.168.1.74/EtnoPED/public/';
            }

            const nuevaPestana = window.open(PEDGITALURL, '_blank');
            nuevaPestana.focus();

        }
    </script>
</body>

</html>
