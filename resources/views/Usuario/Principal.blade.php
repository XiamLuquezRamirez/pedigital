<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PEDGITAL - INICIO</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/principal.css') }}">

    <script src="{{ asset('app-assets/js/41bcea2ae3.js') }}" type="text/javascript"></script>

</head>

<body class="bodyClass">



    <div class="container_all" id="container__all">
        <div class="cover">

            <div class="bg_color"><h1>PEDIGITAL</h1></div>
            <div class="wave w1"></div>
            <div class="wave w2"></div>
            <div class="wave w3"></div>

            <div class="container__cover">
                <div class="container__info">
                    <h1>&nbsp;</h1>
                </div>
                <div class="container__vector">
                    <img src="{{ asset('app-assets/images/principal/images/undraw_Code_thinking_re_gka2.svg') }}"
                        alt="">
                </div>
            </div>
        </div>
        <!-- Aquí comienza el código -->

        <div class="body__page" style="margin-top: -200px !important;">

            <div class="container__card">

                <div class="card__father">
                    <div class="card">
                        <div class="card__front"
                            style="background-image: url({{ asset('app-assets/images/principal/images/portada-ped.png') }});">
                            <div class="bg"></div>
                            <div class="body__card_front">
                            </div>
                        </div>
                        <div class="card__back">
                            <div class="body__card_back" style="background-image: url({{ asset('app-assets/images/principal/images/contraportada-ped.png') }});">
                                <h1>PEDIGTAL</h1>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur ab quas recusandae
                                    voluptatum aliquid tempore animi corporis voluptas. Tempore neque iure
                                    necessitatibus voluptas nesciunt animi dolores incidunt delectus sapiente illum.</p>
                                <input type="button" onclick="abrirYRedireccionar()" value="Entrar">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card__father">
                    <div class="card">
                        <div class="card__front"
                            style="background-image: url({{ asset('app-assets/images/principal/images/portada-pedkid.png') }});">
                            <div class="bg"></div>
                            <div class="body__card_front">
                            </div>
                        </div>
                        <div class="card__back">
                            <div class="body__card_back" style="background-image: url({{ asset('app-assets/images/principal/images/contraportada-pedkid.png') }});">
                                <h1>PEDIGTAL KIDS</h1>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur ab quas recusandae
                                    voluptatum aliquid tempore animi corporis voluptas. Tempore neque iure
                                    necessitatibus voluptas nesciunt animi dolores incidunt delectus sapiente illum.</p>
                                <input type="button" value="Leer Más">
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
                                <h1>ETNOPED</h1>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur ab quas recusandae
                                    voluptatum aliquid tempore animi corporis voluptas. Tempore neque iure
                                    necessitatibus voluptas nesciunt animi dolores incidunt delectus sapiente illum.</p>
                                <input type="button" value="Leer Más">
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="layout__background"></div>

        </div>





    </div>


    <script>
        function abrirYRedireccionar() {
            // Abrir una URL en una nueva pestaña
            const nuevaPestana = window.open('/loginPED', '_blank');
          
            // Hacer que la nueva pestaña obtenga el foco
            nuevaPestana.focus();
          
            // Redirigir después de 3 segundos (3000 milisegundos)
            {{--  setTimeout(function() {
              nuevaPestana.location.href = 'https://www.otraurl.com';
            }, 3000);  --}}
          }
    </script>
</body>

</html>
