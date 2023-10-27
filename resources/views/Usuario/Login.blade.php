<!-- - var navbarShadow = true-->
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<input type="hidden" class="form-control" id="Ruta" data-ruta="{{ asset('/app-assets/images/backgrounds') }}" />

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description"
        content="Stack admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords"
        content="admin template, stack admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>Inicio de Sesión - Plataforma Educativa Digital</title>
    <link rel="apple-touch-icon" href="{{ asset('app-assets/images/ico/apple-icon-120.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('app-assets/images/ico/favicon.ico') }}">

    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/vendors.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/forms/icheck/icheck.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/forms/icheck/custom.css') }}">
    <!-- END VENDOR CSS-->
    <!-- BEGIN STACK CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/app.css') }}">
    <!-- END STACK CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/menu/menu-types/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/colors/palette-gradient.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pages/login-register.css') }}">
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
    <!-- END Custom CSS-->
   
    <style>
        .bg-full-screen-image {
            position: fixed; /* Fijar la imagen de fondo en la ventana */
            top: 0;
            left: 0;
            width: 100%; /* Ocupa el ancho completo de la ventana */
            height: 100%; /* Ocupa la altura completa de la ventana */
            z-index: -1; /* Coloca la imagen detrás de otros elementos */
            background-size: cover; /* Ajusta la imagen al tamaño de la ventana */
            background-position: center center; /* Centra la imagen horizontal y verticalmente */
        }
        

    </style>
</head>

<body class="vertical-layout vertical-menu 1-column menu-expanded blank-page blank-page "
    data-open="click" data-menu="vertical-menu" data-col="1-column">
    <!-- ////////////////////////////////////////////////////////////////////////////-->
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <section class="flexbox-container">
                    <div class="col-12 d-flex align-items-center justify-content-left">
                        <div class="col-md-4 col-10 box-shadow-4 p-0">
                            <div class="card border-grey border-lighten-3 px-1 py-1 m-0">
                                <div class="card-header border-0">
                                    <div class="card-title text-center">
                                        <img src="{{ asset('app-assets/images/logo/stack-logo-dark.png') }}"
                                            alt="branding logo">
                                    </div>
                                    <h1 class="card-subtitle line-on-side text-muted text-center font-small-10 pt-2">
                                        <span>Inicio de Sesión</span>
                                    </h1>

                                </div>
                                <div class="card-content">

                                    <div class="card-body">
                                        <div class="row justify-content-center">
                                            <div class="col-md-12">
                                                @if (Session::has('error'))
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="alert alert-icon-right alert-warning alert-dismissible mb-2"
                                                                role="alert">
                                                                <button type="button" class="close"
                                                                    data-dismiss="alert" aria-label="Close">
                                                                    <span aria-hidden="true">×</span>
                                                                </button>
                                                                <strong>Alerta!</strong> {!! session('error') !!}

                                                            </div>

                                                        </div>
                                                    </div>
                                                @endif
                                                @if (Session::has('success'))
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="alert alert-icon-right alert-info alert-dismissible mb-2"
                                                                role="alert">
                                                                <button type="button" class="close"
                                                                    data-dismiss="alert" aria-label="Close">
                                                                    <span aria-hidden="true">×</span>
                                                                </button>
                                                                <strong>{!! session('success') !!}</strong>
                                                            </div>

                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <form class="form-horizontal" action="{{ url('/Login') }}" method="POST"
                                            novalidate>
                                            {{ csrf_field() }}
                                            <fieldset class="form-group position-relative has-icon-left">
                                                <input type="text" class="form-control" id="user-name"
                                                    name="login_usuario" placeholder="Usuario" required>
                                                <div class="form-control-position">
                                                    <i class="ft-user"></i>
                                                </div>
                                            </fieldset>
                                            <fieldset class="form-group position-relative has-icon-left">
                                                <input type="password" class="form-control" id="user-password"
                                                    name="pasword_usuario" placeholder="Contraseña" required>
                                                <div class="form-control-position">
                                                    <i class="fa fa-key"></i>
                                                </div>
                                            </fieldset>
                                            <div class="form-group row">
                                                <div class="col-md-6 col-12 text-center text-sm-left">

                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-outline-primary btn-block"><i
                                                    class="ft-unlock"></i> Entrar</button>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

    <div class="bg-full-screen-image"></div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->
    <!-- BEGIN VENDOR JS-->
    <script src="{{ asset('app-assets/vendors/js/vendors.min.js') }}" type="text/javascript"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <script src="{{ asset('app-assets/vendors/js/forms/validation/jqBootstrapValidation.js') }}" type="text/javascript">
    </script>
    <script src="{{ asset('app-assets/vendors/js/forms/icheck/icheck.min.js') }}" type="text/javascript"></script>
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN STACK JS-->
    <script src="{{ asset('app-assets/js/core/app-menu.js') }}" type="text/javascript"></script>
    <script src="{{ asset('app-assets/js/core/app.js') }}" type="text/javascript"></script>
    <!-- END STACK JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <script src="{{ asset('app-assets/js/scripts/forms/form-login-register.js') }}" type="text/javascript"></script>
    <!-- END PAGE LEVEL JS-->

    <script>
        $(document).ready(function() {
            var i = 0;
            var anim = $(".bg-full-screen-image");
            let ruta = $('#Ruta').data("ruta");
            var imgs = [
                'bg-1.png',
                'bg-2.png',
                'bg-3.png',
                'bg-4.png',
                'bg-5.png',
                'bg-6.png'
            ];
    
            // Función para cambiar el fondo
            function changeBackground() {
                anim.fadeOut(800, function() {
                    i++;
                    if (i === imgs.length) i = 0;
                    $(this).css("background-image", "url(" + ruta + '/' + imgs[i] + ")");
                    anim.fadeIn(800);
                });
            }
    
            // Cambia el fondo cada 4000ms (4 segundos)
            setInterval(changeBackground, 10000);
    
            // Cambia el fondo inicialmente
            changeBackground();
        });
        
        
    </script>

    <script src="{{ asset('app-assets/js/shortcut.js') }}" type="text/javascript"></script>
    <script type="text/javascript">
        shortcut.add("Ctrl+C", function() {
            alert("Combinación de teclas Ctrl+G");
        }, {
            "type": "keydown",
            "propagate": true,
            "target": document
        });
    </script>
</body>

</html>
