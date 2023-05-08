@extends('Plantilla.Principal')
@section('title', 'Tablero Módulo E')
@section('Contenido')
    <input type="hidden" class="form-control" name="simulacro_id" id="simulacro_id" value="" />
    <input type="hidden" class="form-control" name="sesion_id" id="sesion_id" value="" />
    <input type="hidden" class="form-control" name="estaSesion" id="estaSesion" value="" />
    <input type="hidden" class="form-control" name="area_id" id="area_id" value="" />
    <input type="hidden" class="form-control" name="banco_id" id="banco_id" value="" />
    <input type="hidden" class="form-control" name="tema_id" id="tema_id" value="" />
    <input type="hidden" class="form-control" name="NPreg" id="NPreg" value="" />
    <input type="hidden" id="token" value="{{ csrf_token() }}">
    <input type="hidden" class="form-control" id="Tip_Usu" value="{{ Auth::user()->tipo_usuario }}" />
    <input type="hidden" name="ruta" id="ruta" value="{{ asset('app-assets/images/') }}">
    <input type="hidden" class="form-control" id="RutaBase" value="{{ url('/') }}/" />

    <input type="hidden" class="form-control" id="h" value="" />
    <input type="hidden" class="form-control" id="m" value="" />
    <input type="hidden" class="form-control" id="s" value="" />
    <input type="hidden" class="form-control" id="tiempo" value="" />
    <input type="hidden" class="form-control" id="tiempoSesiom" value="" />
    <input type="hidden" class="form-control" id="PregActual" value="1" />

    <div class="content-header row" id="cabe_asig">
        <div class="content-header-left col-md-12 col-12 mb-2">
            <h3 class="content-header-title mb-0" id="Titulo">Módulo E</h3>
            <div class="row breadcrumbs-top">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item" id="li_simulacro"><a href="">Tablero Módulo E</a>
                        </li>
                        <li class="breadcrumb-item" id='li_cursos'><a href="#">Inicio</a>
                        </li>

                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content-body">
        @if (Session::has('error'))
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-icon-right alert-warning alert-dismissible mb-2" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <strong>Alerta!</strong> {!! session('error') !!}

                    </div>

                </div>
            </div>
        @endif


        <div class="class pt-0" style="display: none;" id="Div_Simulacros">
            <div class="card-body" id="Simulacros">

            </div>

            <div class="modal-footer">
                <button type="button" id="btn_atras" onclick="$.mostPrincipal();"
                    class="btn grey btn-outline-secondary"><i class="ft-corner-up-left position-right"></i>
                    Atras</button>
            </div>
        </div>

        <div id="Div_Sesiones" style="display: none;" class="class">

            <div class="row" id="Resu_Simulacr" style="display: none;">
                <div class="col-xl-3 col-lg-6 col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media">
                                    <div class="media-body text-left w-100">
                                        <h3 class="primary">300/500</h3>
                                        <span>Puntaje Total</span>
                                    </div>
                                    <div class="media-right media-middle">
                                        <i class="icon-trophy primary font-large-2 float-right"></i>
                                    </div>
                                </div>
                                <div class="progress progress-sm mt-1 mb-0">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 70%"
                                        aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media">
                                    <div class="media-body text-left w-100">
                                        <h3 class="danger">1/2</h3>
                                        <span>Intentos Realizados</span>
                                    </div>
                                    <div class="media-right media-middle">
                                        <i class="icon-refresh danger font-large-2 float-right"></i>
                                    </div>
                                </div>
                                <div class="progress progress-sm mt-1 mb-0">
                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 50%"
                                        aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media">
                                    <div class="media-body text-left w-100">
                                        <h3 class="success">25/50</h3>
                                        <span>Matematicas</span>
                                    </div>
                                    <div class="media-right media-middle">
                                        <i class="icon-layers success font-large-2 float-right"></i>
                                    </div>
                                </div>
                                <div class="progress progress-sm mt-1 mb-0">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 60%"
                                        aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media">
                                    <div class="media-body text-left w-100">
                                        <h3 class="warning">0/50</h3>
                                        <span>Sociales y Ciudadana</span>
                                    </div>
                                    <div class="media-right media-middle">
                                        <i class="icon-globe warning font-large-2 float-right"></i>
                                    </div>
                                </div>
                                <div class="progress progress-sm mt-1 mb-0">
                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 35%"
                                        aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="card-body" id="Div_ListSesiones">

                </div>

            </div>


            <div class="modal-footer">
                <button type="button" id="btn_atras" onclick="$.mostSimulacros();"
                    class="btn grey btn-outline-secondary"><i class="ft-corner-up-left position-right"></i>
                    Atras</button>
            </div>


        </div>
        <div id="Div_PruebaInf" style="display: none;" class="class">
            <div class="row">
                <div class="col-xl-3 col-lg-6 col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media">
                                    <div class="media-body text-left w-100">
                                        <h3 class="primary" id="num_area">4</h3>
                                        <span>Áreas</span>
                                    </div>
                                    <div class="media-right media-middle">
                                        <i class="icon-layers primary font-large-2 float-right"></i>
                                    </div>
                                </div>
                                <div class="progress progress-sm mt-1 mb-0">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 100%"
                                        aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media">
                                    <div class="media-body text-left w-100">
                                        <h3 class="warning" id="num_preg">120</h3>
                                        <span># de Preguntas</span>
                                    </div>
                                    <div class="media-right media-middle">
                                        <i class="fa fa-comments warning font-large-2 float-right"></i>
                                    </div>
                                </div>
                                <div class="progress progress-sm mt-1 mb-0">
                                    <div class="progress-bar bg-warning" id="progbar_preg" role="progressbar"
                                        style="width: 100%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media">
                                    <div class="media-body text-left w-100">
                                        <h3 class="success" id="tiempo_sesion">2:00</h3>
                                        <span>Duración Sesíon</span>
                                    </div>
                                    <div class="media-right media-middle">
                                        <i class="icon-clock success font-large-2 float-right"></i>
                                    </div>
                                </div>
                                <div class="progress progress-sm mt-1 mb-0">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 100%"
                                        aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media">
                                    <div class="media-body text-left w-100">
                                        <h3 class="danger" id="cont_tiempo">00:00:00</h3>
                                        <span id="spanTiempo">Tiempo Faltante</span>
                                    </div>
                                    <div class="media-right media-middle">
                                        <i class="icon-clock danger font-large-2 float-right spinner"></i>
                                    </div>
                                </div>
                                <div class="progress progress-sm mt-1 mb-0">
                                    <div class="progress-bar bg-danger" id="progbar_tiempo" role="progressbar"
                                        style="width: 0%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div id="Div_Areas" style="display: none;" class="class">
            <div class="card-body">
                <form method="post" action="{{ url('/') }}/ModuloE/GuardarSesionTiempo" id="GuardarSesionTiempo">
                    <div class="row match-height" id="Div_ListAreas">

                    </div>
                </form>

            </div>

            <div class="modal-footer">
                <button type="button" id="btn_guardarTodoSesion" onclick="$.GuardarTodoSesion('Est');"
                    class="btn btn-outline-success btn-min-width"><i class="fa fa-save position-right">
                    </i> Guardar y Cerrar Todo
                </button>
                <button type="button" id="btn_atras" onclick="$.mostSesiones();"
                    class="btn grey btn-outline-secondary"><i class="ft-corner-up-left position-right">
                    </i> Atras
                </button>
            </div>


        </div>



        <div id="Div_Preguntas" style="display: none;" class="class">
            <div class="card">
                <div class="card-body">
                    <article id='DetEval' style="text-transform: capitalize;" class="wrapper">
                        <header style="font-size: 15px; font-weight: bold;"></header>
                        <main style="height: 100%; overflow: auto;"></main>
                    </article>
                </div>

                <div class="modal-footer">
                    <button type="button" id="btn_atras" onclick="$.mostAreas();"
                        class="btn grey btn-outline-secondary"><i class="ft-corner-up-left position-right"></i>
                        Atras</button>
                </div>
            </div>
        </div>



        <div class="row" id="Div_TemasAsig" style="display: none;">
            <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="row" id="Div_RowTemas">

                </div>
                <div class="modal-footer">
                    <button type="button" id="btn_atras" onclick="$.mostListAsig();"
                        class="btn grey btn-outline-secondary"><i class="ft-corner-up-left position-right"></i>
                        Atras</button>
                </div>
            </div>

        </div>

        <div class="row" id="Div_DetTemas" style="display: none;">
            <div class="col-xl-12 col-lg-12 col-md-12">
                <h4 class="card-title info" id="TemDetTit2"></h4>


                <div class="modal-footer">
                    >
                    <button type="button" id="btn_atras" onclick="$.mostListTemas();"
                        class="btn grey btn-outline-secondary"><i class="ft-corner-up-left position-right"></i>
                        Atras</button>
                </div>
            </div>

        </div>

        <div class="modal fade text-left" id="VisTema" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
            aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="TemDetTit"></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row" id="Div_RowTemasDet">

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btn_Practica" onclick="$.AbrirPractica();" style="display: none;"
                            onclick="$.mostListTemas();" class="btn grey btn-outline-primary"><i class="ft-list"></i>
                            Practica</button>
                        <button type="button" id="btn_Animaciones" style="display: none;"
                            onclick="$.AbrirAnimaciones();" class="btn btn-outline-amber"><i
                                class="ft-video position-right"></i> Ver Animaciones</button>
                        <button type="button" id="btn_atras" data-dismiss="modal"
                            class="btn grey btn-outline-secondary"><i class="ft-corner-up-left position-right"></i>
                            Atras</button>
                    </div>
                </div>
            </div>
        </div>

        <div style="display:none;" id="Atras_asig" class="modal-footer">
            <button type="button" id="btn_atrasPeri" onclick="$.QuitarAsig();"
                class="btn grey btn-outline-secondary"><i class="ft-corner-up-left position-right"></i>Atras</button>
        </div>

        <div style="display:none;" id="Atras_entre" class="modal-footer">
            <button type="button" id="btn_atrasPeri" onclick="$.QuitarEntre();"
                class="btn grey btn-outline-secondary"><i class="ft-corner-up-left position-right"></i>Atras</button>
        </div>

        <div class="modal fade text-left" id="ModAnima" tabindex="-1" role="dialog" aria-labelledby="myModalLabel15"
            aria-hidden="true">
            <div class="modal-dialog  modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-success white">
                        <h4 class="modal-title" style="text-transform: capitalize;" id="titu_temaAnim">
                            Animaciones
                            Cargadas al Tema</h4>
                        <h4 class="modal-title" style="text-transform: capitalize; display: none;" id="titu_Anima">
                            Animacion</h4>

                    </div>
                    <div class="modal-body">
                        <div id='ListAnimaciones' style="height: 400px; overflow: auto;">
                        </div>
                        <div id='DetAnimaciones' style="height: 400px; overflow: auto;display: none;">
                            <video id="videoclipAnima" width="100%" height="360" controls="controls"
                                title="Video title">
                                <source id="mp4videoAnima" src="" type="video/mp4" />
                            </video>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btn_atrasModAnima" class="btn grey btn-outline-secondary"
                            style="display: none;" onclick="$.AtrasModAnima();"><i
                                class="ft-corner-up-left position-right"></i> Atras</button>
                        <button type="button" id="btn_salirModAnima" class="btn grey btn-outline-secondary"
                            onclick="$.CloseModAnimaciones();" data-dismiss="modal"><i
                                class="ft-corner-up-left position-right"></i> Salir</button>

                    </div>
                </div>
            </div>
        </div>





    </div>

    {!! Form::open(['url' => '/ModuloE/CargarTemasModuloE', 'id' => 'formAuxiliar']) !!}
    {!! Form::close() !!}

    {!! Form::open(['url' => '/ModuloE/CargaDetTemasModuloE', 'id' => 'formAuxiliarTemas']) !!}
    {!! Form::close() !!}

    {!! Form::open(['url' => '/Contenido/CargaCursosMod', 'id' => 'formAuxiliarMod']) !!}
    {!! Form::close() !!}

    {!! Form::open(['url' => '/ModuloE/ContenidoPrueba', 'id' => 'formContenidoPrueba']) !!}
    {!! Form::close() !!}

    {!! Form::open(['url' => '/ModuloE/ConsulPreguntas', 'id' => 'formAuxiliarCargPreg']) !!}
    {!! Form::close() !!}

    {!! Form::open(['url' => '/ModuloE/ConsulAnimaModE', 'id' => 'formConsuAnimModE']) !!}
    {!! Form::close() !!}

    {!! Form::open(['url' => '/ModuloE/ConsultarSimulacros', 'id' => 'formAuxiliarSimulacros']) !!}
    {!! Form::close() !!}


    {!! Form::open(['url' => '/ModuloE/ConsultarSesiones', 'id' => 'formAuxiliarSesiones']) !!}
    {!! Form::close() !!}

    {!! Form::open(['url' => '/ModuloE/GuardarSesionEstudiante', 'id' => 'formAuxiliarGuardarSesion']) !!}
    {!! Form::close() !!}


    {!! Form::open(['url' => '/ModuloE/ConsultarAreasxSesion', 'id' => 'formAuxiliarAreas']) !!}
    {!! Form::close() !!}

    {!! Form::open(['url' => '/ModuloE/ConsultarPreguntasAreas', 'id' => 'formAuxiliarPreguntas']) !!}
    {!! Form::close() !!}


    {!! Form::open(['url' => '/ModuloE/CargarPracticas', 'id' => 'formConsuAct']) !!}
    {!! Form::close() !!}


    {!! Form::open(['url' => '/ModuloE/ContenidoEva', 'id' => 'formContenidoEva']) !!}
    {!! Form::close() !!}

    {!! Form::open(['url' => '/ModuloE/consulPregAlumnoSimu', 'id' => 'formAuxiliarCargEval']) !!}
    {!! Form::close() !!}



@endsection

@section('scripts')


    <script>
        CKEDITOR.editorConfig = function(config) {
            config.toolbarGroups = [{
                    name: 'document',
                    groups: ['mode', 'document', 'doctools']
                },
                {
                    name: 'clipboard',
                    groups: ['clipboard', 'undo']
                },
                {
                    name: 'styles',
                    groups: ['styles']
                },
                {
                    name: 'editing',
                    groups: ['find', 'selection', 'spellchecker', 'editing']
                },
                {
                    name: 'forms',
                    groups: ['forms']
                },
                {
                    name: 'basicstyles',
                    groups: ['basicstyles', 'cleanup']
                },
                {
                    name: 'paragraph',
                    groups: ['list', 'indent', 'blocks', 'align', 'bidi', 'paragraph']
                },
                {
                    name: 'links',
                    groups: ['links']
                },
                {
                    name: 'insert',
                    groups: ['insert']
                },
                {
                    name: 'colors',
                    groups: ['colors']
                },
                {
                    name: 'tools',
                    groups: ['tools']
                },
                {
                    name: 'others',
                    groups: ['others']
                },
                {
                    name: 'about',
                    groups: ['about']
                }
            ];

            config.removeButtons =
                'Source,Save,NewPage,ExportPdf,Preview,Print,Templates,Cut,Copy,Paste,PasteText,PasteFromWord,Undo,Redo,Replace,Find,Scayt,Form,Checkbox,Radio,TextField,Textarea,Select,SelectAll,Button,ImageButton,HiddenField,Strike,CopyFormatting,RemoveFormat,Indent,Blockquote,Outdent,CreateDiv,JustifyLeft,JustifyCenter,JustifyRight,JustifyBlock,BidiLtr,BidiRtl,Language,Link,Unlink,Anchor,Flash,HorizontalRule,Smiley,SpecialChar,PageBreak,Iframe,Styles,Format,BGColor,ShowBlocks,About,Underline,Italic';
        };

        $(document).ready(function() {

            var flagGlobal = "n";
            var flagTimExt = "n";
            var flagTimFin = "n";
            var flagIntent = "ok"
            var xtiempo;

            $("#Men_ModuloE").addClass("active");
            $.extend({
                EntrarAsig: function(id) {

                    $("#Div_Asig").hide();
                    $("#btn_atrasPeri").hide();
                    $("#Div_TemasAsig").show();

                    var form = $("#formAuxiliar");
                    $("#idAsig").remove();
                    form.append("<input type='hidden' name='idAsig' id='idAsig' value='" + id + "'>");
                    var url = form.attr("action");
                    var datos = form.serialize();
                    var contenido = '';
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: datos,
                        dataType: "json",
                        success: function(respuesta) {
                            $("#Titulo").html(respuesta.NomAsig);
                            $("#Id_Doce").val(respuesta.Docente);
                            $("#li_cursos").html("Temas");
                            var contenido = '<div class="card-body">';
                            var myClass = ["primary", "info", "success", "danger", "pink",
                                "warning "
                            ];
                            var margin = "";
                            var x = 1;

                            $.each(respuesta.Temas, function(i, item) {
                                var rand = Math.floor(Math.random() * myClass
                                    .length);
                                var rValue = myClass[rand];

                                x > 1 ? margin = "mt-1" : margin = "";

                                if (item.tipo_contenido == "DOCUMENTO") {

                                    contenido +=
                                        '<div style="cursor:pointer" onclick="$.MostConteDoc(' +
                                        item.id + ');" class="bs-callout-' +
                                        rValue +
                                        ' callout-transparent callout-bordered ' +
                                        margin + '">' +
                                        '<div class="media align-items-stretch">' +
                                        '<div class="d-flex align-items-center bg-' +
                                        rValue +
                                        ' position-relative callout-arrow-left p-2">' +
                                        '<i class="fa fa-file-powerpoint-o fa-xl white font-medium-5"></i>' +
                                        '</div>' +
                                        ' <div class="media-body p-1">' +
                                        '   <strong style="text-transform: capitalize;">' +
                                        item.titulo + '</strong>' +
                                        ' </div>' +
                                        '  </div>' +
                                        '  </div>';

                                } else if (item.tipo_contenido == "IMAGEN") {
                                    contenido +=
                                        '<div style="cursor:pointer" onclick="$.MostConteImg(' +
                                        item.id + ');" class="bs-callout-' +
                                        rValue +
                                        ' callout-transparent callout-bordered ' +
                                        margin + '">' +
                                        '<div class="media align-items-stretch">' +
                                        '<div class="d-flex align-items-center bg-' +
                                        rValue +
                                        ' position-relative callout-arrow-left p-2">' +
                                        '<i class="fa fa-file-image-o fa-lg white font-medium-5"></i>' +
                                        '</div>' +
                                        ' <div class="media-body p-1">' +
                                        '   <strong style="text-transform: capitalize;">' +
                                        item.titulo + '</strong>' +
                                        ' </div>' +
                                        '  </div>' +
                                        '  </div>';

                                } else {
                                    contenido +=
                                        '<div style="cursor:pointer" onclick="$.MostConteVid(' +
                                        item.id + ');"  class="bs-callout-' +
                                        rValue +
                                        ' callout-transparent callout-bordered ' +
                                        margin + '">' +
                                        '<div class="media align-items-stretch">' +
                                        '<div class="d-flex align-items-center bg-' +
                                        rValue +
                                        ' position-relative callout-arrow-left p-2">' +
                                        '<i class="fa fa-file-video-o fa-lg white font-medium-5"></i>' +
                                        '</div>' +
                                        ' <div class="media-body p-1">' +
                                        '   <strong style="text-transform: capitalize;">' +
                                        item.titulo + '</strong>' +
                                        ' </div>' +
                                        '  </div>' +
                                        '  </div>';
                                }
                                x++;
                            });
                            contenido += '</div>';

                            $("#Div_RowTemas").html(contenido);

                        }
                    });

                },

                VerAsignaturas: function() {

                    $("#Div_Asig").show();
                    $("#Div_Principal").hide();
                    $("#Atras_asig").show();
                    $("#Titulo").html('Asignaturas Módulo E');

                },
                QuitarAsig: function() {

                    $("#Div_Asig").hide();
                    $("#Div_Principal").show();
                    $("#Atras_asig").hide();

                },
                AbrirAnimaciones: function() {
                    let TemId = $("#tema_id").val();


                    $("#ModAnima").modal({
                        backdrop: 'static',
                        keyboard: false
                    });
                    $('#large').modal('toggle');
                    var form = $("#formConsuAnimModE");
                    var id = $("#idTema").val();
                    var contenido = '';
                    $("#TemaAni").remove();
                    form.append("<input type='hidden' name='TemaAni' id='TemaAni' value='" + TemId +
                        "'>");
                    var url = form.attr("action");
                    var datos = form.serialize();
                    var j = 1;
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: datos,
                        dataType: "json",
                        success: function(respuesta) {
                            $.each(respuesta.DesAnim, function(i, item) {
                                contenido =
                                    '<div class="bs-callout-warning callout-square callout-bordered mt-1">' +
                                    '<div class="media align-items-stretch">' +
                                    ' <div style="cursor:pointer" class="d-flex align-items-center bg-success p-2">' +
                                    '       <i class="ft-video white font-medium-5"></i>' +
                                    '    </div>' +
                                    '    <div class="media-body p-1">' +
                                    '    <a style="cursor:pointer"  class="text-truncate">' +
                                    '     <a onclick="$.MostAnim(this.id)" id="' +
                                    item.id + '"  data-archivo="' + item
                                    .cont_didactico +
                                    '"  data-ruta="{{ asset('/app-assets/Contenido_Didactico_ME') }}" > ' +
                                    '<strong style="text-transform: capitalize;" >' +
                                    item.titulo.slice(0, -4).toLowerCase(); +
                                '</strong></a>' +
                                '       </div>' +
                                '    </div>' +
                                '  </div>';
                                j++;
                                $("#ListAnimaciones").append(contenido);

                            });
                            $("#titu_temaAnim").html('ANIMACIONES DEL TEMA - ' + respuesta
                                .TitTema);
                        }
                    });
                },
                MostAnim: function(id) {
                    $("#DetAnimaciones").show();
                    $("#ListAnimaciones").hide();
                    $("#btn_atrasModAnima").show();
                    $("#btn_salirModAnima").hide();
                    var videoID = 'videoclipAnima';
                    var sourceID = 'mp4videoAnima';
                    var nomarchi = $('#' + id).data("archivo");
                    var newmp4 = $('#' + id).data("ruta") + "/" + nomarchi;
                    $('#' + videoID).get(0).pause();
                    $('#' + sourceID).attr('src', newmp4);
                    $('#' + videoID).get(0).load();
                    $('#' + videoID).get(0).play();
                },
                AtrasModAnima: function() {
                    $("#ListAnimaciones").show();
                    $("#DetAnimaciones").hide();
                    $("#btn_salirModAnima").show();
                    $("#btn_atrasModAnima").hide();
                    var videoID = 'videoclipAnima';
                    $('#' + videoID).get(0).pause();
                },
                MostConteDoc: function(id) {
                    $("#VisTema").modal({
                        backdrop: 'static',
                        keyboard: false
                    });

                    $("#tema_id").val(id);

                    var form = $("#formAuxiliarTemas");
                    $("#idTem").remove();
                    $("#TipCont").remove();
                    form.append("<input type='hidden' name='idTem' id='idTem' value='" + id + "'>");
                    form.append("<input type='hidden' name='TipCont' id='TipCont' value='DOC'>");

                    var url = form.attr("action");
                    var datos = form.serialize();
                    var contenido = '';

                    $.ajax({
                        type: "POST",
                        url: url,
                        data: datos,
                        dataType: "json",
                        async: false,
                        success: function(respuesta) {
                            $("#TemDetTit").html(respuesta.Tema.titulo);

                            contenido += '<div class="col-lg-12 col-md-12" > ' +
                                '  <div class="card">' +
                                '    <div class="card-content" style="height: 400px; overflow: auto;">' +
                                '      <div class="card-body" >' +
                                respuesta.TemasDet.contenido +
                                '  </div>' +
                                '  </div>' +
                                ' </div>' +
                                '   </div>';

                            respuesta.npractica > 0 ? $("#btn_Practica").show() : $(
                                "#btn_Practica").hide();
                            respuesta.Tema.animacion == "SI" ? $("#btn_Animaciones")
                                .show() : $("#btn_Animaciones").hide();
                        }
                    });
                    $("#Div_RowTemasDet").html(contenido);

                },
                MostConteImg: function(id) {


                    $("#VisTema").modal({
                        backdrop: 'static',
                        keyboard: false
                    });


                    $("#tema_id").val(id);

                    var form = $("#formAuxiliarTemas");
                    $("#idTem").remove();
                    $("#TipCont").remove();

                    form.append("<input type='hidden' name='idTem' id='idTem' value='" + id + "'>");
                    form.append("<input type='hidden' name='TipCont' id='TipCont' value='IMG'>");
                    var url = form.attr("action");
                    var datos = form.serialize();
                    var contenido = '';

                    $.ajax({
                        type: "POST",
                        url: url,
                        data: datos,
                        async: false,
                        dataType: "json",
                        success: function(respuesta) {
                            $("#TemDetTit").html(respuesta.Tema.titulo);
                            contenido += '<div class="col-lg-2 col-md-2">';
                            $.each(respuesta.TemasDet, function(i, item) {
                                contenido +=
                                    ' <figure class="col-lg-12 col-md-12 col-12 "  itemprop="associatedMedia" itemscope="" itemtype="http://schema.org/ImageObject">' +
                                    '     <a onclick="$.MostImgTema(this.id);" id="' +
                                    item.id + '"  data-archivo="' + item.imagen +
                                    '"  itemprop="contentUrl" >' +
                                    '      <img class="img-thumbnail img-fluid hvr-grow-shadow" src="' +
                                    $('#Ruta').data("ruta") +
                                    '/images/Imagen_Tema_ModuloE/' +
                                    item.imagen +
                                    '"" itemprop="thumbnail" alt="Image description">' +
                                    '    </a>' +
                                    ' </figure>';
                            });

                            contenido += '</div>';

                            contenido += '<div class="col-lg-10 col-md-10">' +
                                '  <div class="card">' +
                                '    <div class="card-content">' +
                                '      <div  id="div_img"  data-archivo="' +
                                respuesta.TemasDet.imagen +
                                '" style="cursor: pointer; text-align: center; height: 500px; overflow: scroll;" class="card-body">' +
                                '   <figure  class="col-lg-12 col-md-6 col-12 zoom " id="ex3" itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">' +
                                ' <div class="easyzoom easyzoom--overlay easyzoom--with-thumbnails"> <img class="img-thumbnail img-fluid" style="height: 450px; " src="' +
                                $('#Ruta').data("ruta") + '/images/Imagen_Tema_ModuloE/' +
                                respuesta.primeImg + '"' +
                                '  itemprop="thumbnail" alt="Image descripción" /></div>' +

                                '   </figure>' +
                                '  </div>' +
                                '  </div>' +
                                ' </div>' +
                                '   </div>';


                            respuesta.npractica > 0 ? $("#btn_Practica").show() : $(
                                "#btn_Practica").hide();
                            respuesta.Tema.animacion == "SI" ? $("#btn_Animaciones")
                                .show() : $("#btn_Animaciones").hide();
                        }
                    });

                    $("#Div_RowTemasDet").html(contenido);

                    $('#ex3').zoom({
                        on: 'click'
                    });


                },
                MostImgTema: function(id) {

                    $("#div_img").html(
                        '<figure  class="col-lg-12 col-md-6 col-12 zoom " id="ex3"  itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">' +
                        '  <img class="img-thumbnail img-fluid" style="height: 450px; " src="' + $(
                            '#Ruta').data("ruta") +
                        '/images/Imagen_Tema_ModuloE/' + $('#' + id).data("archivo") + '"' +
                        '  itemprop="thumbnail" alt="Imagen Descripción" />' +

                        '   </figure>');

                    $('#ex3').zoom({
                        on: 'click'
                    });
                },
                GuardarTodoSesion: function(ori) {

                    var idSesion = $("#idSesi").val();


                    if (ori == "Est") {
                        var sel = "s";
                        $("input[name='estadoArea[]']").each(function(indice, elemento) {

                            if ($(elemento).val() !== 'TERMINADA') {
                                sel = "n";
                            }
                        });


                        if (sel == "n") {
                            Swal.fire({
                                title: "Notificación Simulacro",
                                text: "Faltan Áreas por Desarrollar",
                                icon: "warning",
                                button: "Aceptar",
                            });

                        } else {
                            var form = $("#formAuxiliarGuardarSesion");
                            $("#idSes").remove();

                            form.append("<input type='hidden' name='idSes' id='idSes' value='" +
                                idSesion +
                                "'>");
                            var url = form.attr("action");
                            var datos = form.serialize();

                            $.ajax({
                                type: "POST",
                                url: url,
                                data: datos,
                                dataType: "json",
                                success: function(respuesta) {
                                    if (respuesta.DetaSesion == "1") {
                                        $("#btn_guardarTodoSesion").hide();
                                        Swal.fire({
                                            title: "Notificación Simulacro",
                                            text: "Operación Realizada Exitosamente",
                                            icon: "success",
                                            button: "Aceptar",
                                        });
                                    } else {
                                        $("#btn_guardarTodoSesion").show();

                                    }
                                }
                            });

                        }


                    } else {

                    }
                },
                MostConteVid: function(id) {

                    $("#VisTema").modal({
                        backdrop: 'static',
                        keyboard: false
                    });
                    $("#btn_Animaciones").hide()
                    $("#tema_id").val(id);

                    var form = $("#formAuxiliarTemas");
                    $("#idTem").remove();
                    $("#TipCont").remove();

                    form.append("<input type='hidden' name='idTem' id='idTem' value='" + id + "'>");
                    form.append("<input type='hidden' name='TipCont' id='TipCont' value='VID'>");
                    var url = form.attr("action");
                    var datos = form.serialize();
                    var contenido = '';


                    $.ajax({
                        type: "POST",
                        url: url,
                        data: datos,
                        async: false,
                        dataType: "json",
                        success: function(respuesta) {
                            $("#TemDetTit").html(respuesta.Tema.titulo);
                            contenido += '<div class="col-lg-12 col-md-12">' +
                                '  <div class="card">' +
                                '    <div class="card-content">' +
                                '      <div data-archivo="' + respuesta.TemasDet.video +
                                '" id="div_vid"style="cursor: pointer;" class="card-body">' +
                                '       <video id="videoclipAnima" width="100%" height="360" controls="controls"' +
                                '  title="Video title">' +
                                '    <source id="mp4videoAnima" src="" type="video/mp4" />' +
                                '</video>' +
                                '  </div>' +
                                '  </div>' +
                                ' </div>' +
                                '   </div>';


                            respuesta.npractica > 0 ? $("#btn_Practica").show() : $(
                                "#btn_Practica").hide();
                        }
                    });



                    $("#Div_RowTemasDet").html(contenido);

                    var videoID = 'videoclipAnima';
                    var sourceID = 'mp4videoAnima';
                    var nomarchi = $('#div_vid').data("archivo");
                    var newmp4 = $('#Ruta').data("ruta") + "/Video_Tema_ModuloE/" + nomarchi;
                    $('#' + videoID).get(0).pause();
                    $('#' + sourceID).attr('src', newmp4);
                    $('#' + videoID).get(0).load();
                    $('#' + videoID).get(0).play();
                },

                mostPrincipal: function() {
                    var rutaBase = $("#RutaBase").val();
                    $(location).attr('href', rutaBase + "/ModuloE/CargarContModuloE")

                },

                mostSimulacros: function() {
                    $("#Div_Sesiones").hide();
                    $("#Div_Simulacros").show();
                    $("#li_simulacro").html("TABLERO MÓDULO E");
                    $("#li_cursos").html("SIMULACROS");

                },
                mostSesiones: function() {
                    $("#Div_Sesiones").show();
                    $("#Div_Areas").hide();
                    $("#Div_PruebaInf").hide();
                    $("#li_cursos").html("SESIONES");

                },
                mostAreas: function() {
                    const sesionIni = localStorage.getItem('sesionIniciada');
                    if (sesionIni == "Si") {
                        $("#Div_Areas").show();
                        $("#Div_Preguntas").hide();
                    } else {
                        $("#Div_Areas").show();
                        $("#Div_PruebaInf").hide();
                        $("#Div_Preguntas").hide();
                    }
                },
                hab_ediContComplete: function() {
                    CKEDITOR.replace('RespPregComplete', {
                        width: '100%',
                        height: 100
                    });
                },

                CambArchivo: function() {
                    $("#id_file").show();
                    $("#id_verf").hide();
                    $("#CargArchi").val("");
                },
                CargPreg: function(id) {


                    var npreg = $("#NPreg").val();
                    var pregAct = $("#PregActual").val();


                    var form = $("#formAuxiliarCargEval");
                    var Preg = $("#id-pregunta" + id).val();
                    var parte = $("#parte" + id).val();

                    var opci = "";
                    var parr = "";
                    var punt = "";

                    $("#Pregunta").remove();
                    $("#TipPregunta").remove();
                    $("#partePreg").remove();
                    form.append("<input type='hidden' name='Pregunta' id='Pregunta' value='" + Preg + "'>");
                    form.append("<input type='hidden' name='partePreg' id='parte' value='" + parte + "'>");

                    var url = form.attr("action");
                    var datos = form.serialize();
                    var j = 1;
                    var Pregunta = "";
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: datos,
                        async: true,
                        dataType: "json",
                        success: function(respuesta) {
                            Pregunta +=
                                '<div class="pb-1"><input type="hidden"  name="PreguntaOpc" value="' +
                                respuesta.PregMult.id + '" />' + respuesta.PregMult
                                .pregunta + '</div>';
                            opciones = '';
                            var l = 1;
                            $.each(respuesta.OpciMult, function(k, itemo) {

                                if ($.trim(itemo.pregunta) === $.trim(respuesta
                                        .PregMult.id)) {
                                    if (respuesta.RespPregMul) {
                                        opciones += '<fieldset>';
                                        if ($.trim(respuesta.RespPregMul
                                                .respuesta) === $.trim(itemo.id)) {
                                            opciones +=
                                                '<input type="hidden" id="OpcionSel_' +
                                                l +
                                                '" class="OpcionSel"  name="OpcionSel[]" value="si"/>';
                                            opciones +=
                                                ' <input type="hidden" id=""  name="Opciones[]" value="' +
                                                itemo.id + '"/>';
                                            opciones +=
                                                '<input onclick="$.RespMulPreg(this.id)" id="' +
                                                l +
                                                '" class="checksel" checked type="checkbox" >';
                                        } else {
                                            opciones +=
                                                '<input type="hidden" id="OpcionSel_' +
                                                l +
                                                '" class="OpcionSel"  name="OpcionSel[]" value="no"/>';
                                            opciones +=
                                                ' <input type="hidden" id=""  name="Opciones[]" value="' +
                                                itemo.id + '"/>';
                                            opciones +=
                                                '<input onclick="$.RespMulPreg(this.id)" id="' +
                                                l +
                                                '" class="checksel" type="checkbox" >';
                                        }


                                        opciones += ' <label for="input-15"> ' +
                                            itemo
                                            .opciones +
                                            '</label>' +
                                            '</fieldset>';
                                        l++;
                                    } else {
                                        opciones +=
                                            '<fieldset>';
                                        opciones +=
                                            '<input type="hidden" id="OpcionSel_' +
                                            l +
                                            '" class="OpcionSel"  name="OpcionSel[]" value="-"/>';
                                        opciones +=
                                            ' <input type="hidden" id=""  name="Opciones[]" value="' +
                                            itemo.id + '"/>';
                                        opciones +=
                                            '<input onclick="$.RespMulPreg(this.id)" id="' +
                                            l +
                                            '" class="checksel" type="checkbox" >';

                                        opciones +=
                                            ' <label for="input-15"> ' +
                                            itemo
                                            .opciones +
                                            '</label>' +
                                            '</fieldset>';
                                        l++;
                                    }

                                }

                            });

                            $("#Pregunta" + id).html(Pregunta + opciones);




                        }

                    });

                },
                GuarPreg: function(id, npreg) {

                    for (var instanceName in CKEDITOR.instances) {
                        CKEDITOR.instances[instanceName].updateElement();
                    }

                    flagGlobal = "n";
                    var form = $("#Evaluacion");
                    var url = form.attr("action");
                    var idSimu = $("#idSimu").val();
                    var IdSesion = $("#sesion_id").val();
                    var IdArea = $("#area_id").val();
                    var CantiPreg = $("#NPreg").val();
                    var token = $("#token").val();
                    var Preg = $("#id-pregunta" + id).val();
                    var tiempo = $("#tiempoSesiom").val();
                    var prgAct = id + 1;
                    var PosPreg = npreg;

                    if ($("#Tip_Usu").val() === "Estudiante") {

                        var sel = "n";
                        if ($('.checksel').is(':checked')) {
                            sel = "s";
                        }

                        if (sel === "n") {
                            flagGlobal = "s";
                            mensaje = "No ha seleccionado ninguna Opción";
                            Swal.fire({
                                title: "",
                                text: mensaje,
                                icon: "warning",
                                button: "Aceptar",
                            });
                            return;
                        }

                    }

                    $("#Pregunta").remove();
                    $("#nPregunta").remove();
                    $("#IdSesion").remove();
                    $("#IdArea").remove();
                    $("#idtoken").remove();
                    $("#idSimulacro").remove();
                    $("#prgAct").remove();
                    $("#PosPreg").remove();
                    $("#CantiPreg").remove();

                    $("#Tiempo").remove();
                    //    clearInterval(xtiempo);
                    xtiempo = null;
                    form.append("<input type='hidden' name='Pregunta' id='Pregunta' value='" + Preg +
                        "'>");
                    form.append("<input type='hidden' name='CantiPreg' id='CantiPreg' value='" +
                        CantiPreg + "'>");
                    form.append("<input type='hidden' name='PosPreg' id='PosPreg' value='" + PosPreg +
                        "'>");
                    form.append("<input type='hidden' name='idSimulacro' id='idSimulacro' value='" +
                        idSimu + "'>");
                    form.append("<input type='hidden' name='IdSesion' id='IdSesion' value='" +
                        IdSesion + "'>");
                    form.append("<input type='hidden' name='IdArea' id='IdArea' value='" + IdArea +
                        "'>");
                    form.append("<input type='hidden' name='_token' id='idtoken' value='" + token +
                        "'>");
                    form.append("<input type='hidden' name='Tiempo' id='Tiempo' value='" + tiempo +
                        "'>");
                    form.append("<input type='hidden' name='prgAct' id='prgAct' value='" + prgAct +
                        "'>");

                    var datos = form.serialize();

                    $.ajax({
                        type: "POST",
                        url: url,
                        data: datos,
                        dataType: "json",
                        async: false,
                        success: function(respuesta) {
                            if (PosPreg === "Ultima") {
                                $.mostrarInfSesion(respuesta);
                            } else {

                            }

                        },
                        error: function() {
                            mensaje = "La Prueba no pudo ser Guardada";
                            Swal.fire({
                                title: "",
                                text: mensaje,
                                icon: "warning",
                                button: "Aceptar",
                            });
                        }
                    });

                    $("#Pregunta" + id).html("");



                },
                mostrarInfSesion: function(respuesta) {

                    var contenido = "";
                    var ruta = $("#ruta").val();

                    $("#Div_Areas").show();
                    $("#Div_Preguntas").hide();

                    $("#num_area").html(respuesta.SesAre.length);
                    $("#num_preg").html(respuesta.Sesion.num_preguntas);
                    $("#tiempo_sesion").html(respuesta.Sesion.tiempo_sesion + ":00");
                    $("#tiempo").val(respuesta.Sesion.tiempo_sesion);

                    $.each(respuesta.SesAre, function(i, item) {

                        var pregContestada = "";
                        if (item.resp_preguntas == null) {
                            pregContestada = "0";
                        } else {
                            pregContestada = item.resp_preguntas;

                        }



                        //<h2 class="block"><li class="fa fa-question-circle warning"></li></h2> Estado</li>
                        contenido += '<div class="col-xl-4 col-md-6 col-12">' +
                            '<div class="card profile-card-with-cover">' +
                            '<div class="card-content">' +
                            '<img class="card-img-top img-fluid" src="' + ruta +
                            '/Img_ModuloE/' + item.imagen + '" alt="Imagen Área">' +
                            '<div class="card-profile-image">' +
                            '<img src="' + ruta + '/icon_areas_me/' + item.icon +
                            '" style="width:150px; height:150px; " class="rounded-circle img-border box-shadow-1" alt="Icon Área">' +
                            '</div>' +
                            '<div class="profile-card-with-cover-content text-center">' +
                            '<div class="profile-details mt-3">' +
                            '<h4 class="card-title">' + item.nombre_area + '</h4>' +
                            '<ul class="list-inline clearfix mt-2">' +
                            '<li>' +
                            '<h2 class="block">' + pregContestada + "/" + item.npreguntas +
                            '</h2> Preguntas</li>' +

                            '</ul>' +
                            '</div>' +
                            '<div class="card-body">';
                            
                        if (item.estadoarea == "EN PROCESO") {
                            contenido += '<button type="button" onclick="$.MostrarPrueba(' +
                                item.idSesion +
                                ');" class="btn btn-outline-warning"><i class="fa fa-info-circle"></i> En Proceso</button>';
                        } else if (item.estadoarea == "TERMINADA") {
                            contenido += '<button type="button" onclick="$.MostrarPrueba(' +
                                item.idSesion +
                                ');" class="btn btn-success btn-min-width"><i class="fa fa-check-circle"></i> Terminada</button>';
                        } else {

                            contenido += '<button type="button"  onclick="$.MostrarPrueba(' +
                                item.idSesion +
                                ');"  class="mr-1 mb-1 btn btn-outline-info btn-min-width"><i class="fa fa-arrow-right"></i> Iniciar</button>';
                        }

                        contenido += '<input type="hidden" name="estadoArea[]" value="' + item
                            .estadoarea + '">' +
                            '<input type="hidden" name="idArea[]" value="' + item.idarea +
                            '"></input></div>' +
                            '<input type="hidden" name="npreg[]" value="' + item.npreguntas +
                            '"></input></div>' +
                            '</div>' +
                            '</div>' +
                            '</div>' +
                            '</div>' +
                            '</div>';

                    });

                    $("#Div_ListAreas").html(contenido);

                },
                MostrarSimulacros: function() {
                    var form = $("#formAuxiliarSimulacros");
                    var url = form.attr("action");
                    var datos = form.serialize();
                    var contenido = '';
                    $("#Titulo").html('SIMULACROS - MÓDULO E');
                    $("#li_simulacro").html("TABLERO MÓDULO E");
                    $("#li_cursos").html("SIMULACROS");



                    $("#Div_Principal").hide();
                    $("#Div_Simulacros").show();

                    $.ajax({
                        type: "POST",
                        url: url,
                        data: datos,
                        dataType: "json",
                        async: false,
                        success: function(respuesta) {

                            $.each(respuesta.Simualacros, function(i, item) {

                                if (item.estado_pres === "NO PRESENTADO") {
                                    var bs_callout = "bs-callout-info";
                                    var bg = "bg-info";
                                    var ico = "fa fa-info";

                                } else {

                                    var bs_callout = "bs-callout-success";
                                    var bg = "bg-success";
                                    var ico = "fa fa-check";

                                }
                                var npreg = 0;
                                var n_sesiones = 0;
                                $.each(item.SesionesxSimulacro, function(j, item2) {
                                    npreg = npreg + item2.num_preguntas;
                                    n_sesiones++;

                                });

                                contenido +=
                                    '<div  style="cursor: pointer;" onclick="$.MostrarSesiones(' +
                                    item.id + ');" class="' + bs_callout +
                                    ' callout-bordered pt-0"> ' +
                                    '    <div class="media align-items-stretch"> ' +
                                    '      <div class="media-body p-1"> ' +
                                    '     <strong style="font-size:25px;">' + item
                                    .nombre + '</strong> ' +
                                    ' <p style="font-style: italic;"><b>Sesiones:</b> ' +
                                    n_sesiones +
                                    ' <b> - No. Preguntas:</b>' + npreg + '</p> ' +
                                    ' </div> ' +
                                    ' <div class="d-flex align-items-center ' + bg +
                                    ' p-2"> ' +
                                    '  <i class="fa ' + ico +
                                    ' white font-medium-5"></i> ' +
                                    '  </div> ' +
                                    '  </div> ' +
                                    ' </div> ';

                            });


                        }
                    });

                    $("#Simulacros").html(contenido);

                },
                MostrarSesiones: function(id) {
                    var form = $("#formAuxiliarSesiones");
                    var url = form.attr("action");
                    var datos = form.serialize();

                    var contenido = '';

                    $("#idSimu").remove();
                    form.append("<input type='hidden' name='idSimu' id='idSimu' value='" + id + "'>");

                    var datos = form.serialize();
                    $("#Div_Simulacros").hide();
                    $("#Div_Sesiones").show();


                    $.ajax({
                        type: "POST",
                        url: url,
                        data: datos,
                        dataType: "json",
                        async: false,
                        success: function(respuesta) {

                            $("#li_simulacro").html(respuesta.Simulacro.nombre);
                            $("#li_cursos").html("SESIONES");

                            if (respuesta.Simulacro.estado == null) {
                                $("#Resu_Simulacr").hide();
                            } else {
                                $("#Resu_Simulacr").show();
                            }

                            var id = 1;

                            $.each(respuesta.Sesiones, function(i, item) {
                                if (item.estado == null) {

                                    var bs_callout = "bs-callout-info";
                                    var bg = "bg-info";
                                    var ico = "fa fa-info";

                                } else {

                                    var bs_callout = "bs-callout-success";
                                    var bg = "bg-success";
                                    var ico = "fa fa-check";

                                }
                                var areas = [];
                                $.each(item.AreasxSesiones, function(j, item2) {
                                    areas.push(item2.nombre_area)
                                });

                                contenido +=
                                    '<div  style="cursor: pointer;" id="Sesiones' +
                                    id + '" data-sesion="' + item.id +
                                    '" data-nombre="' + item.sesion +
                                    '"  onclick="$.MostrarAreas(this.id);" class="' +
                                    bs_callout + ' callout-bordered pt-0"> ' +
                                    '    <div class="media align-items-stretch"> ' +
                                    '      <div class="media-body p-1"> ' +
                                    '     <strong style="font-size:20px; text-transform: capitalize">' +
                                    item
                                    .sesion + '</strong> ' +
                                    ' <p style="font-style: italic;"><b>Áreas: </b> ' +
                                    areas.toString() +
                                    ' <b> - No. Preguntas: </b>' + item
                                    .num_preguntas + '</p> ' +
                                    ' </div> ' +
                                    ' <div class="d-flex align-items-center ' + bg +
                                    ' p-2"> ' +
                                    '  <i class="fa ' + ico +
                                    ' white font-medium-5"></i> ' +
                                    '  </div> ' +
                                    '  </div> ' +
                                    ' </div> ';
                                id++;

                            });


                        }
                    });

                    $("#Div_ListSesiones").html(contenido);

                },
                MostrarAreas: function(id) {

                    if (localStorage.getItem('sesionIniciada')) {
                        localStorage.setItem('sesionIniciada', 'Si');
                    } else {
                        localStorage.setItem('sesionIniciada', 'No');
                    }

                    var form = $("#formAuxiliarAreas");
                    var url = form.attr("action");
                    var datos = form.serialize();

                    var idsesion = $("#" + id).data("sesion");
                    var nomsesion = $("#" + id).data("nombre");

                    var contenido = '';
                    $("#Titulo").html('SIMULACROS - MÓDULO E');
                    $("#li_cursos").html(nomsesion);
                    $("#idSesi").remove();
                    form.append("<input type='hidden' name='idSesi' id='idSesi' value='" + idsesion +
                        "'>");

                    var datos = form.serialize();
                    $("#Div_Areas").show();
                    $("#Div_Sesiones").hide();
                    var ruta = $("#ruta").val();


                    $.ajax({
                        type: "POST",
                        url: url,
                        data: datos,
                        dataType: "json",
                        async: false,
                        success: function(respuesta) {

                            $("#num_area").html(respuesta.SesAre.length);
                            $("#num_preg").html(respuesta.Sesion.num_preguntas);
                            $("#tiempo_sesion").html(respuesta.Sesion.tiempo_sesion +
                                ":00");
                            $("#tiempo").val(respuesta.Sesion.tiempo_sesion);

                            var estaSesion = respuesta.Sesion.estado;

                            $("#estaSesion").val(estaSesion);
                            if (estaSesion == "FINALIZADA") {
                                $("#btn_guardarTodoSesion").hide();
                            } else {
                                $("#btn_guardarTodoSesion").show();

                            }

                            var npreg = respuesta.Sesion.num_preguntas;
                            var nPreguntasResuletas = 0;

                            $.each(respuesta.SesAre, function(i, item) {

                                var PreAct = "";
                                if (item.resp_preguntas == null) {
                                    PreAct = "0";
                                } else {
                                    PreAct = item.resp_preguntas;
                                }
                                nPreguntasResuletas = nPreguntasResuletas + item
                                    .resp_preguntas;


                                //<h2 class="block"><li class="fa fa-question-circle warning"></li></h2> Estado</li>
                                contenido +=
                                    '<div class="col-xl-4 col-md-6 col-12 hvr-grow-shadow">' +
                                    '<div class="card profile-card-with-cover">' +
                                    '<div class="card-content">' +
                                    '<img class="card-img-top img-fluid" src="' +
                                    ruta + '/Img_ModuloE/' + item.imagen +
                                    '" alt="Imagen Área">' +
                                    '<div class="card-profile-image">' +
                                    '<img src="' + ruta + '/icon_areas_me/' + item
                                    .icon +
                                    '" style="width:150px; height:150px; " class="rounded-circle img-border box-shadow-1" alt="Icon Área">' +
                                    '</div>' +
                                    '<div class="profile-card-with-cover-content text-center">' +
                                    '<div class="profile-details mt-3">' +
                                    '<h4 class="card-title">' + item.nombre_area +
                                    '</h4>' +
                                    '<ul class="list-inline clearfix mt-2">' +
                                    '<li>' +
                                    '<h2 class="block">' + PreAct + "/" + item
                                    .npreguntas + '</h2> Preguntas</li>' +

                                    '</ul>' +
                                    '</div>' +
                                    '<div class="card-body">';
                                if (item.estadoarea == "EN PROCESO") {
                                    contenido +=
                                        '<button type="button" onclick="$.MostrarPrueba(' +
                                        item.idSesion +
                                        ');" class="btn btn-outline-warning"><i class="fa fa-info-circle"></i> En Proceso</button>';
                                } else if (item.estadoarea == "TERMINADA") {
                                    contenido +=
                                        '<button type="button" onclick="$.MostrarPrueba(' +
                                        item.idSesion +
                                        ');" class="btn btn-success btn-min-width"><i class="fa fa-check-circle"></i> Terminada</button>';
                                } else {
                                    contenido +=
                                        '<button type="button" onclick="$.MostrarPrueba(' +
                                        item.idSesion +
                                        ');" class="btn btn-outline-info"><i class="fa fa-arrow-right"></i> Iniciar</button>';

                                }

                                contenido +=
                                    '<input type="hidden" name="estadoArea[]" value="' +
                                    item.estadoarea + '">' +
                                    '<input type="hidden" name="idArea[]" value="' +
                                    item.idarea + '"></input></div>' +
                                    '<input type="hidden" name="npreg[]" value="' +
                                    item.npreguntas + '"></input></div>' +
                                    '</div>' +
                                    '</div>' +
                                    '</div>' +
                                    '</div>';

                            });


                        }
                    });

                    $("#Div_ListAreas").html(contenido);

                },
                mostListAsig: function() {
                    $("#Div_Asig").show();
                    $("#Div_TemasAsig").hide();
                    $("#btn_atras").hide();
                    $("#btn_atrasPeri").show();
                    $("#Titulo").html('ASIGNATURAS MÓDULO E');

                },
                VerArchResp: function(id) {
                    window.open($('#Respdattaller').data("ruta") + "/" + $('#' + id).data("archivo"),
                        '_blank');
                },
                selopc: function(id, cons) {
                    $("#RespSelect" + cons).val($("#" + id).data("id"));
                    $("#ConsPreg" + cons).val(id);

                },
                RespMulPreg: function(id) {

                    $('.OpcionSel').val("no");

                    if ($('#' + id).prop('checked')) {
                        $('.checksel').prop("checked", "");
                        $('#' + id).prop("checked", "checked");
                        $('#OpcionSel_' + id).val("si");
                    }

                },
                AtrasModActIni: function(opc) {
                    if (opc == "F") {
                        $("#ListEval").show();
                        $("#contTiempo").hide();
                        $("#VidDidac").hide();
                        $("#btn_ConversaEval").hide();
                        $("#DetEval").hide();
                        $("#DetEvalFin").hide();
                        $("#btn_eval").hide();
                        $("#Dat_Cal").hide();
                        $("#btn_atrasModEv").show();
                        $("#btn_salirModEv").hide();
                        $("#titu_Eva").hide();
                        $("#titu_temaEva").show();
                        //            $("#DetEval").html("");
                    } else {

                        var mensaje = "¿Esta seguro de Cerrar La Evaluación?";
                        Swal.fire({
                            title: 'Notificación Evaluación',
                            text: mensaje,
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Si, Cerrar!',
                            cancelButtonText: 'Cancelar'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                $("#ListEval").show();
                                $("#contTiempo").hide();
                                $("#btn_ConversaEval").hide();
                                $("#DetEval").hide();
                                $("#DetEvalFin").hide();
                                $("#btn_eval").hide();
                                $("#VidDidac").hide();
                                $("#Dat_Cal").hide();
                                $("#btn_salirModEv").show();
                                $("#btn_atrasModEv").hide();
                                $("#titu_Eva").hide();
                                $("#titu_temaEva").show();
                                //            $("#DetEval").html("");
                                $.ReiniciarCont();

                            }
                        });
                    }

                },
                mostmodArch: function(id) {

                    var nomarchi = $('#' + id).data("archivo");

                    var ext = nomarchi.substring(nomarchi.lastIndexOf("."));
                    if (ext != ".jpg" && ext != ".png" && ext != ".gif" && ext != ".jpeg" && ext !=
                        ".pdf") {
                        window.open($('#' + id).data("ruta") + "/" + nomarchi, '_blank');
                    } else {
                        $("#cont_tema").hide();
                        $("#cont_archi").show();
                        $("#btn_atras").show();
                        $("#btn_salir").hide();
                        $("#div_arc").html(
                            '<embed src="" type="application/pdf" id="embed_arch" width="100%" height="600px" />'
                        );
                        jQuery('#embed_arch').attr('src', $('#' + id).data("ruta") + "/" + nomarchi);
                    }


                },
                ReiniciarCont: function() {
                    $("#contTiempo").hide();
                    $('#cuenta').timer('remove');
                    clearInterval(xtiempo);
                    xtiempo = null;
                },
                hab_ediContPregEnsayo: function() {
                    CKEDITOR.replace('RespPregEns', {
                        width: '100%',
                        height: 100
                    });
                },
                mostListTemas: function() {
                    $("#Div_TemasAsig").show();
                    $("#Div_DetTemas").hide();
                },
                MostArc: function(id) {
                    window.open($('#dattaller').data("ruta") + "/" + $('#' + id).data("archivo"),
                        '_blank');
                },
                AtrasEval: function() {

                    $("#VisTema").modal({
                        backdrop: 'static',
                        keyboard: false
                    });
                    $('#ModPrueba').modal('toggle');

                },
                MostrarPrueba: function(id) {

                    var form = $("#formAuxiliarPreguntas");
                    var url = form.attr("action");
                    var contenido = '';
                    var Tiempo = $("#tiempo").val();
                    var idSesion = $("#idSesi").val();

                    if ($("#estaSesion").val() == "FINALIZADA") {
                        Swal.fire({
                            title: "Notificaciones Simulacro",
                            text: "La Sesión a Sido Finalizada",
                            icon: "warning",
                            button: "Aceptar",
                        });
                        return;
                    }


                    $("#idAreaSesion").remove();
                    $("#idSes").remove();
                    form.append("<input type='hidden' name='idAreaSesion' id='idAreaSesion' value='" +
                        id + "'>");
                    form.append("<input type='hidden' name='idSes' id='idSes' value='" + idSesion +
                        "'>");

                    var datos = form.serialize();

                    $("#Div_Preguntas").show();
                    $("#Div_PruebaInf").show();
                    $("#Div_Areas").hide();

                    var $wrapper = $('#DetEval');
                    $wrapper.avnSkeleton('display');

                    $.ajax({
                        type: "POST",
                        url: url,
                        data: datos,
                        dataType: "json",
                        async: false,
                        success: function(respuesta) {
                            $wrapper.avnSkeleton('remove');
                            $wrapper.find('> header').append("Preguntas Área " + respuesta
                                .areaxsesion.nombre_area);

                            $("#sesion_id").val(respuesta.areaxsesion.sesion);
                            $("#area_id").val(respuesta.areaxsesion.id);
                            $("#NPreg").val(respuesta.areaxsesion.npreguntas);

                            contenido +=
                                '  <div class="row"><div class="card-content collapse show">' +
                                '  <div class="card-body" style="padding-top: 0px;">' +
                                '        <form method="post" action="{{ url('/') }}/ModuloE/RespSimulacro" id="Evaluacion" class="number-tab-stepsPreg wizard-circle">';
                            var Preg = 1;
                            var ConsPre = 0;
                            

                           
                            $.each(respuesta.PregArea, function(i, item) {

                                contenido += ' <h6></h6>' +
                                    '         <fieldset>' +
                                    '              <div class="row p-1">' +
                                    '   <div  style="width: 100%" class="bs-callout-primary callout-border-right callout-bordered callout-transparent p-1" >';

                                    contenido += ' <div class="row border-bottom-blue-grey"><div class="col-md-12 pb-1"><h6>Enunciado:</h6><label id="enunciado">' + item.enunciado + '</label></div></div>';

                                    contenido += ' <div class="row pt-1" >' +
                                    '<input type="hidden" id="id-pregunta' +
                                    ConsPre + '"  value="' + item.id + '" />' +
                                    '<input type="hidden" id="id-banco' +
                                    ConsPre + '"  value="' + item.banco + '" />' +
                                    '<input type="hidden" id="parte' +
                                    ConsPre + '"  value="' + item.parte + '" />' +
                                    '      <div class="col-md-12"><h4 class="primary">Pregunta ' +
                                    Preg + '</h4></div>' +

                                    '      <div class="col-md-12" id="Pregunta' +
                                    ConsPre + '">' +
                                    '           </div>    ' +
                                    '           </div>    ' +
                                    '           </div>    ' +
                                    '             </div>' +
                                    '        </fieldset>';
                                Preg++;
                                ConsPre++;

                            });

                            contenido += '</form>' +
                                ' </div>' +
                                '</div></div>';


                            $wrapper.find('> main').append(contenido);

                            $.CargPreg("0");
                            const sesionIni = localStorage.getItem('sesionIniciada');

                            $(".number-tab-stepsPreg").steps({
                                headerTag: "h6",
                                bodyTag: "fieldset",
                                transitionEffect: "fade",
                                titleTemplate: '<span class="step">#index#</span> #title#',
                                labels: {
                                    finish: 'Finalizar'
                                },
                                onFinished: function(event, currentIndex) {

                                    if (flagTimFin === "s") {
                                        mensaje =
                                            "El Tiempo de la Sesión a Finalizado";
                                        Swal.fire({
                                            title: "",
                                            text: mensaje,
                                            icon: "warning",
                                            button: "Aceptar",
                                        });
                                        return;
                                    }

                                    $.GuarPreg(currentIndex, 'Ultima');
                                    if (flagGlobal === "s") {
                                        return;
                                    }
                                },
                                onStepChanging: function(event, currentIndex,
                                    newIndex) {
                                    if (flagTimFin === "s") {
                                        mensaje =
                                            "El Tiempo de la Sesión a Finalizado";
                                        Swal.fire({
                                            title: "",
                                            text: mensaje,
                                            icon: "warning",
                                            button: "Aceptar",
                                        });
                                        return;
                                    }

                                    $.GuarPreg(currentIndex, 'next');

                                    if (flagGlobal === "s") {
                                        return;
                                    }

                                    $.CargPreg(newIndex);

                                    if (currentIndex > newIndex) {
                                        return true;
                                    }
                                    form.validate().settings.ignore =
                                        ":disabled,:hidden";
                                    return form.valid();
                                },
                            });


                            ////INICIO DE TIEMPO


                            if (sesionIni == "No") {

                                mensaje = "Esta Sesión Cuenta con un Tiempo de " + Tiempo +
                                    " para ser Desarrollada. ¿Desea dar inicio a la Sesión?";
                                Swal.fire({
                                    title: 'Notificación Simulacro',
                                    text: mensaje,
                                    icon: 'warning',
                                    showCancelButton: true,
                                    confirmButtonColor: '#3085d6',
                                    cancelButtonColor: '#d33',
                                    confirmButtonText: 'Si, Comenzar!',
                                    cancelButtonText: 'Cancelar'
                                }).then((result) => {
                                    if (result.isConfirmed) {

                                        clearInterval();
                                        localStorage.setItem('sesionIniciada',
                                            'Si');
                                        var hora = Tiempo;

                                        parts = hora.split(':');
                                        var hor = parts[0];
                                        var min = parts[1];

                                        var milhor = parseInt(hor) * 3600000;
                                        var milmin = parseInt(min) * 60000;

                                        // Establece la fecha hasta la que estamos contando
                                        var countDownDate = milhor + milmin;

                                        var ahora = new Date().getTime();
                                        localStorage.setItem('horaInicio', ahora);

                                        countDownDate = countDownDate + ahora;
                                        var tiempoextra = 300000;
                                        var totaltiempo = countDownDate - ahora;



                                        // Actualiza la cuenta atrás cada 1 segundo.
                                        xtiempo = setInterval(function() {


                                            // Obtener la fecha y la hora de hoy
                                            var now = new Date().getTime();

                                            // Encuentra la distancia entre ahora y la fecha de la cuenta regresiva
                                            var distance = countDownDate -
                                                now;


                                            // Cálculos de tiempo para días, horas, minutos y segundos
                                            var days = Math.floor(distance /
                                                (1000 * 60 *
                                                    60 * 24));
                                            var hours = Math.floor((
                                                distance % (1000 *
                                                    60 *
                                                    60 * 24)) / (
                                                1000 * 60 * 60));
                                            var minutes = Math.floor((
                                                distance % (1000 *
                                                    60 * 60)) / (
                                                1000 * 60));
                                            var seconds = Math.floor((
                                                distance % (1000 *
                                                    60)) / 1000);

                                            var tiempoCompl = now - ahora;

                                            var por = (tiempoCompl * 100) /
                                                totaltiempo;
                                            $("#progbar_tiempo").css(
                                                "width", por + "%");


                                            // Muestra el resultado en un elemento
                                            document.getElementById(
                                                    "cont_tiempo")
                                                .innerHTML =
                                                hours + "h " + minutes +
                                                "m " + seconds +
                                                "s ";
                                            var horas = Math.floor(
                                                tiempoCompl / (1000 *
                                                    60 * 60));
                                            var minutes = Math.floor(
                                                tiempoCompl / 60000);
                                            var seconds = ((tiempoCompl %
                                                    60000) / 1000)
                                                .toFixed(0);

                                            $("#tiempoSesiom").val(horas +
                                                ":" +
                                                minutes + ":" + (
                                                    seconds < 10 ? '0' :
                                                    '') + seconds);

                                            // Si la cuenta atrás ha terminado, escribe un texto.

                                            if (flagTimExt === "n") {
                                                if (distance <
                                                    tiempoextra) {
                                                    flagTimExt = "s";
                                                    mensaje =
                                                        "La Sesión finalizara en 5 Minutos, si aún tiene preguntas por responder por favor responda y presione el botón Finalizar.";
                                                    Swal.fire({
                                                        title: "Notificación Simulacro",
                                                        text: mensaje,
                                                        icon: "warning",
                                                        button: "Aceptar",
                                                    });
                                                }
                                            }

                                            if (flagTimExt === "s") {
                                                if (distance < 0) {
                                                    flagTimFin = "s";
                                                    clearInterval(xtiempo);
                                                    document.getElementById(
                                                            "cont_tiempo")
                                                        .innerHTML =
                                                        "0h 0m 0s";
                                                    document.getElementById(
                                                            "spanTiempo")
                                                        .innerHTML =
                                                        "Tiempo Terminado";

                                                    mensaje =
                                                        "¡El tiempo se ha agotado!, La Sesion será calificada.";
                                                    Swal.fire({
                                                        title: "Notificación Simulacro",
                                                        text: mensaje,
                                                        icon: "warning",
                                                        button: "Aceptar",
                                                    });


                                                    $.GuardarSesionTiempo();

                                                    return;

                                                }
                                            }

                                        }, 1000);
                                        ////////////////////////FIN CONTADOR////////////////////////


                                    } else {
                                        $.mostAreas();
                                    }
                                });
                            } else {

                                clearInterval(xtiempo);
                                xtiempo = null;
                                var hora = Tiempo;

                                parts = hora.split(':');
                                var hor = parts[0];
                                var min = parts[1];

                                var milhor = parseInt(hor) * 3600000;
                                var milmin = parseInt(min) * 60000;

                                // Establece la fecha hasta la que estamos contando
                                var countDownDate = milhor + milmin;
                                const ahora = localStorage.getItem('horaInicio');


                                countDownDate = countDownDate + parseInt(ahora);
                                var tiempoextra = 300000;
                                var totaltiempo = countDownDate - ahora;
                                var tiempofinalizado = "n";

                                // Actualiza la cuenta atrás cada 1 segundo.
                                xtiempo = setInterval(function() {


                                    // Obtener la fecha y la hora de hoy
                                    var now = new Date().getTime();

                                    // Encuentra la distancia entre ahora y la fecha de la cuenta regresiva
                                    var distance = countDownDate -
                                        now;
                                    console.log("distance= " + distance);
                                    // Cálculos de tiempo para días, horas, minutos y segundos
                                    var days = Math.floor(distance /
                                        (1000 * 60 *
                                            60 * 24));
                                    var hours = Math.floor((
                                        distance % (1000 *
                                            60 *
                                            60 * 24)) / (
                                        1000 * 60 * 60));
                                    var minutes = Math.floor((
                                        distance % (1000 *
                                            60 * 60)) / (
                                        1000 * 60));
                                    var seconds = Math.floor((
                                        distance % (1000 *
                                            60)) / 1000);

                                    var tiempoCompl = now - ahora;

                                    var por = (tiempoCompl * 100) / totaltiempo;
                                    $("#progbar_tiempo").css("width", por + "%");


                                    // Muestra el resultado en un elemento
                                    document.getElementById(
                                            "cont_tiempo")
                                        .innerHTML =
                                        hours + "h " + minutes +
                                        "m " + seconds +
                                        "s ";
                                    var horas = Math.floor(
                                        tiempoCompl / (1000 *
                                            60 * 60));
                                    var minutes = Math.floor(tiempoCompl / 60000);
                                    var seconds = ((tiempoCompl %
                                            60000) / 1000)
                                        .toFixed(0);

                                    $("#tiempoSesiom").val(horas +
                                        ":" +
                                        minutes + ":" + (
                                            seconds < 10 ? '0' :
                                            '') + seconds);

                                    // Si la cuenta atrás ha terminado, escribe un texto.

                                    if (flagTimExt === "n") {
                                        if (distance <
                                            tiempoextra) {
                                            flagTimExt = "s";
                                            mensaje =
                                                "La Sesión finalizara en 5 Minutos, si aún tiene preguntas por responder por favor responda y presione el botón Finalizar.";
                                            Swal.fire({
                                                title: "Notificación de Sesión",
                                                text: mensaje,
                                                icon: "warning",
                                                button: "Aceptar",
                                            });
                                        }
                                    }

                                    if (flagTimExt === "s") {
                                        if (distance < 0) {
                                            flagTimFin = "s";
                                            clearInterval(xtiempo);
                                            document.getElementById(
                                                    "cont_tiempo")
                                                .innerHTML =
                                                "TIEMPO TERMINADO";
                                            mensaje =
                                                "¡El tiempo se ha agotado!, La Sesion será calificada.";
                                            Swal.fire({
                                                title: "Notificación de Sesión",
                                                text: mensaje,
                                                icon: "warning",
                                                button: "Aceptar",
                                            });
                                            tiempofinalizado = "s";

                                        }
                                    }

                                    if (tiempofinalizado == "s") {
                                        console.log(distance);
                                        alert("tiempo finalizado");
                                        return;
                                    }

                                }, 1000);

                            }


                        }
                    });

                },
                GuardarSesionTiempo: function() {

                    var idSesion = $("#idSesi").val();
                    var idSimu = $("#idSimu").val();
                    var token = $("#token").val();

                    var form = $("#GuardarSesionTiempo");
                    $("#idSes").remove();
                    $("#idToken").remove();
                    $("#idSimulacro").remove();

                    form.append("<input type='hidden' name='idSes' id='idSes' value='" + idSesion +
                        "'>");
                    form.append("<input type='hidden' name='_token' id='idToken' value='" + token +
                        "'>");
                    form.append("<input type='hidden' name='idSimulacro' id='idSimulacro' value='" +
                        idSimu + "'>");

                    var url = form.attr("action");
                    var datos = form.serialize();
                    console.log(datos);

                    $.ajax({
                        type: "POST",
                        url: url,
                        async: false,
                        data: new FormData($('#GuardarSesionTiempo')[0]),
                        processData: false,
                        contentType: false,
                        success: function(respuesta) {

                            $("#btn_guardarTodoSesion").show();
                        }
                    });

                },

            });

            $.MostrarSimulacros();


        });
    </script>
@endsection
