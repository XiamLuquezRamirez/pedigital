@extends('Plantilla.Principal')
@section('title', 'Tablero Módulo E')
@section('Contenido')
    <input type="hidden" class="form-control" name="simulacro_id" id="simulacro_id" value="" />
    <input type="hidden" class="form-control" name="sesion_id" id="sesion_id" value="" />
    <input type="hidden" class="form-control" name="area_id" id="area_id" value="" />
    <input type="hidden" class="form-control" name="banco_id" id="banco_id" value="" />
    <input type="hidden" class="form-control" name="tema_id" id="tema_id" value="" />
    <input type="hidden" class="form-control" name="NPreg" id="NPreg" value="" />
    <input type="hidden" class="form-control" name="infSel" id="infSel" value="" />
    <input type="hidden" id="token" value="{{ csrf_token() }}">
    <input type="hidden" class="form-control" id="Tip_Usu" value="{{ Auth::user()->tipo_usuario }}" />

    <input type="hidden" class="form-control" id="Ruta" data-ruta="{{ asset('/app-assets/') }}" />
    <input type="hidden" class="form-control" id="rutaLogoModE"
        value="{{ asset('/app-assets/images/ico/logoModE.png') }}" />

    <input type="hidden" class="form-control" id="h" value="" />
    <input type="hidden" class="form-control" id="m" value="" />
    <input type="hidden" class="form-control" id="s" value="" />
    <input type="hidden" class="form-control" id="tiempo" value="" />
    <input type="hidden" class="form-control" id="tiempoSesiom" value="" />

    <div class="content-header row" id="cabe_asig">
        <div class="content-header-left col-md-12 col-12 mb-2">
            <h3 class="content-header-title mb-0" id="Titulo">Gestión de Informes Módulo E </h3>
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

        <div class="class" id="Div_Principal">
            <section id="minimal-statistics">


                <div class="row">
                    <div class="col-xl-4 col-lg-6 col-12 hvr-grow-shadow" style="cursor: pointer;"
                        onclick="$.informe('1');">
                        <div class="card ">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="media d-flex">
                                        <div class="media-body text-left">
                                            <h3 class="danger">Individual</h3>
                                            <span>Informe Individual</span>
                                        </div>
                                        <div class="align-self-center">
                                            <i class="icon-user danger font-large-2 float-right"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-12 hvr-grow-shadow" style="cursor: pointer;"
                        onclick="$.informe('2');">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="media d-flex">
                                        <div class="media-body text-left">
                                            <h3 class="success">Áreas</h3>
                                            <span>Informe por Áreas</span>
                                        </div>
                                        <div class="align-self-center">
                                            <i class="icon-pie-chart success font-large-2 float-right"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-12 hvr-grow-shadow" style="cursor: pointer;"
                        onclick="$.informe('3');">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="media d-flex">
                                        <div class="media-body text-left">
                                            <h3 class="warning">Competencias</h3>
                                            <span>Informe por Competenc.. y Compont..</span>
                                        </div>
                                        <div class="align-self-center">
                                            <i class="icon-pie-chart warning font-large-2 float-right"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </section>
        </div>
    </div>

    <div class="modal fade text-left" style="overflow: auto;" id="modalInforme" tabindex="-1" role="dialog"
        aria-labelledby="myModalLabel17" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="modal-header bg-blue white">
                        <h4 class="modal-title" id="titu_tema">Informe Individual de Prueba</h4>
                    </div>

                    <div id="importar" class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <label class="form-label" for="presentacion_modulo">Simulacro:</label>
                                <select name="simulacro"style="width: 100%" id="simulacro"
                                    onchange="$.CargaEstudiantes(this.value);" class="form-control select2">

                                </select>
                            </div>
                            {{--  INFORME INDIVIDUAL  --}}
                            <div class="col-md-12" id="infIndividual" style="display: none;">
                                <div class="table-responsive">
                                    <form action="{{ url('/ModuloE/InfIndividual') }}" method="post"
                                        id="FormEstudiantes">
                                        <table id="recent-orders"
                                            class="table table-hover mb-0 ps-container ps-theme-default table-sm">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Identificación</th>
                                                    <th>Nombre</th>
                                                    <th>Apellido</th>
                                                    <th class="text-center"><label style='cursor: pointer;'><input
                                                                type='checkbox' onclick="$.SelAllEst();" id="SelAll"
                                                                value=''>
                                                            Seleccionar
                                                        </label></th>
                                                </tr>
                                            </thead>
                                            <tbody id="td-alumnos" style="text-transform: capitalize;">

                                            </tbody>
                                        </table>
                                    </form>
                                </div>
                                <div class="modal-footer" style="display: none;" id="btn-acciones">
                                    <button type="button" onclick="$.imprimirInf();" class="btn btn-outline-cyan"><i
                                            class="fa fa-file-pdf-o"></i>
                                        mostrar Resultado</button>


                                </div>
                            </div>

                            {{--  INFORME POR AREAS  --}}
                            <div class="col-md-12" id="infAreas" style="display: none;">
                                <div class="row mt-1">
                                    <div class="col-md-6">
                                        <fieldset class="checkbox">
                                            <label>
                                                <input type="checkbox" id="mayMenor" value="" checked="">
                                                Mostrar los 5
                                                Mayores y Menores Puntajes por Área
                                            </label>
                                        </fieldset>
                                    </div>
                                    <div class="col-md-6">
                                        <fieldset class="checkbox">
                                            <label>
                                                <input type="checkbox" id="estIcfes" onclick="$.habiComp();"
                                                    value="" checked=""> Realizar Comparación con Estándares del
                                                ICFES
                                            </label>
                                        </fieldset>
                                    </div>
                                </div>
                                <div class="modal-footer" style="display: none;" id="btn-imprimir">
                                    <button type="button" onclick="$.generarInforme();" class="btn btn-outline-cyan"><i
                                            class="fa fa-search"></i>
                                        Generar Informe</button>
                                </div>
                                <div style="display: none;" id="divResultado" class="row mt-1">
                                    <div class="col-md-12 col-sm-12 text-center text-md-left">
                                        <div class="media">
                                            <div class="row">
                                                <div class="col-md-2" style="align-content: center">
                                                    <img width="100" id="imgEscudo"
                                                        src="{{ asset('app-assets/images/Colegios/' . Session::get('EscudoColegio')) }}"
                                                        alt="company logo" class="">
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="media-body">
                                                        <ul class="ml-2 px-0 list-unstyled" id="infInforme">
                                                            <li style="font-weight: bold; font-size: 18px;"
                                                                id="tit-informe"></li>
                                                            <li id="nomCol"
                                                                style="font-weight: bold; font-size: 15px;">
                                                                {{ Session::get('NombreColegio') }}</li>
                                                            <li id="ubicol"> {{ Session::get('UbicacionColegio') }}</li>
                                                            <li id="fecInf">Fecha de informe: {{ date('d/m/Y') }}</li>

                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-md-2" style="align-content: center">
                                                    <img width="130" id="imglogoModPed"
                                                        src="{{ asset('app-assets/images/ico/logoModE.png') }}"
                                                        alt="company logo" class="">
                                                </div>
                                            </div>


                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h4 class="card-title">Puntaje promedio de estudiante por Área</h4>

                                                <div id="chartPuntaje"
                                                    style=" width: 100%; height: 350px; padding-left: 10px;"
                                                    class="chart"></div>
                                            </div>
                                            <div class="col-md-12 mt-1" id="grafCompa" style="display: none;">
                                                <h4 class="card-title">Comparativa estandar Nacional</h4>

                                                <div id="chartCompNacio"
                                                    style=" width: 100%; height: 350PX; padding-left: 10px;"
                                                    class="chart"></div>
                                            </div>
                                            <div class="col-md-12 mt-1" id="grafMayMen" style="display: none;">
                                                <h4 class="card-title">Mayores y Menores Puntajes</h4>

                                                <div id="MayorMenor"style=" width: 100%; padding-left: 10px;">

                                                </div>
                                            </div>
                                            <div class="col-md-12 mt-1" id="grafTiempo">
                                                <h4 class="card-title">Promedio de tiempo usado para responder pruebas por
                                                    area</h4>

                                                <div
                                                    id="chartTiempoPrueba"style=" width: 100%; height: 350PX; padding-left: 10px;">

                                                </div>
                                                <div id="analisisTiempo"></div>
                                            </div>
                                        </div>
                                        <div class="modal-footer" id="btn-imprimir">
                                            <button type="button" onclick="$.imprimirInforme();"
                                                class="btn btn-outline-cyan"><i class="fa fa-file-pdf-o"></i>
                                                Imprimir Informe</button>
                                        </div>
                                    </div>



                                </div>

                            </div>

                            {{--  INFORME POR COMPETENCIAS Y COMPONENTES  --}}
                            <div class="col-md-12" id="infCompetencia" style="display: none;">
                                <div class="row mt-1">
                                    <div class="col-md-6">
                                        <label class="form-label" for="presentacion_modulo">Área:</label>
                                        <select name="AreaSel"style="width: 100%" id="AreaSel"
                                            class="form-control select2">

                                        </select>
                                    </div>
                                </div>
                                <div class="modal-footer mt-1" style="display: none;" id="btn-imprimirComp">
                                    <button type="button" onclick="$.generarinformeComp();"
                                        class="btn btn-outline-cyan"><i class="fa fa-search"></i>
                                        Generar Informe</button>
                                </div>
                                <div style="display: none;" id="divResultadoComp" class="row mt-1">
                                    <div class="col-md-12 col-sm-12 text-center text-md-left">
                                        <div class="media">
                                            <div class="row">
                                                <div class="col-md-2" style="align-content: center">
                                                    <img width="100" id="imgEscudo2"
                                                        src="{{ asset('app-assets/images/Colegios/' . Session::get('EscudoColegio')) }}"
                                                        alt="company logo" class="">
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="media-body">
                                                        <ul class="ml-2 px-0 list-unstyled" id="infInforme">
                                                            <li style="font-weight: bold; font-size: 18px;"
                                                                id="tit-informe2"></li>
                                                            <li id="nomCol2"
                                                                style="font-weight: bold; font-size: 15px;">
                                                                {{ Session::get('NombreColegio') }}</li>
                                                            <li id="ubicol2"> {{ Session::get('UbicacionColegio') }}
                                                            </li>
                                                            <li id="fecInf2">Fecha de informe: {{ date('d/m/Y') }}</li>

                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-md-2" style="align-content: center">
                                                    <img width="100" id="imglogoModPed2"
                                                        src="{{ asset('app-assets/images/ico/logoModE.png') }}"
                                                        alt="company logo" class="">
                                                </div>
                                            </div>


                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h4 class="card-title" id="title_Compe">Distribución de preguntas de</h4>

                                                <div id="chartCompetencia"
                                                    style=" width: 100%; height: 350px; padding-left: 10px;"
                                                    class="chart"></div>
                                            </div>
                                            <div class="col-md-12 mt-2">
                                                <h4 class="card-title">Preguntas acertadas por Competencia</h4>
                                                <div id="chartPregCompetencia"
                                                    style=" width: 100%; height: 350px; padding-left: 10px;"
                                                    class="chart"></div>
                                            </div>
                                            <div id="recomendacionesCompetencias"
                                                style="width: 100%; text-align: left; margin-top: 20px;">
                                                <h4 class='card-title'>Recomendaciones.</h4>
                                            </div>

                                            <div class="col-md-12 mt-2">
                                                <h4 class="card-title">Grafico de estudiantes con menores preguntas acertadas por competencia.</h4>
                                                <div id="chartCompEstudiantes"
                                                    style=" width: 100%; height: 350px; padding-left: 10px;"
                                                    class="chart"></div>
                                            </div>

                                            <div class="col-md-12 mt-2">
                                                <h4 class="card-title" id="title_Compo">Distribución de preguntas de</h4>
                                                <div id="chartComponente"
                                                    style=" width: 100%; height: 350px; padding-left: 10px;"
                                                    class="chart"></div>
                                            </div>
                                            <div class="col-md-12 mt-2">
                                                <h4 class="card-title">Preguntas acertadas por Componentes</h4>
                                                <div id="chartPregComponennte"
                                                    style=" width: 100%; height: 350px; padding-left: 10px;"
                                                    class="chart"></div>
                                            </div>

                                            <div id="recomendacionesComponentes"
                                                style="width: 100%; text-align: left; margin-top: 20px;">
                                                <h4 class='card-title'>Recomendaciones.</h4>
                                            </div>

                                            
                                            <div class="col-md-12 mt-2">
                                                <h4 class="card-title">Grafico de estudiantes con menores preguntas acertadas por Componentes.</h4>
                                                <div id="chartCompoEstudiantes"
                                                    style=" width: 100%; height: 350px; padding-left: 10px;"
                                                    class="chart"></div>
                                            </div>

                                       

                                        </div>
                                        <div class="modal-footer" id="btn-imprimir">
                                            <button type="button" onclick="$.imprimirInformeComp();"
                                                class="btn btn-outline-cyan"><i class="fa fa-file-pdf-o"></i>
                                                Imprimir Informe</button>
                                        </div>
                                    </div>



                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="btn_DescargarPdf" style="display: none;" onclick="$.AbrirpDF();"
                        class="btn btn-outline-info"><i class="ft-download position-right"></i> Generar PDF</button>
                    <button type="button" id="btn_atras" onclick="$.mostListinformes();"
                        class="btn grey btn-outline-secondary"><i class="ft-corner-up-left position-right"></i>
                        Atras</button>

                </div>
            </div>
        </div>
    </div>

    <div class="loader-container" id="loaderContainer">
        <div class="loader"></div>
    </div>

    <div class="modal fade text-left" id="modalPuntEstandar" tabindex="-1" role="dialog"
        aria-labelledby="myModalLabel17" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="modal-header bg-blue white">
                        <h4 class="modal-title" id="titu_tema">Puntaje por areas estandar Nacional</h4>
                    </div>

                    <div class="modal-body">
                        <div class="row" id="puntajes">



                        </div>

                    </div>
                </div>
                <div class="modal-footer">

                    <button type="button" id="btn_atrasPunt" onclick="$.mostinf();"
                        class="btn grey btn-outline-secondary"><i class="ft-corner-up-left position-right"></i>
                        Atras</button>

                </div>
            </div>
        </div>
    </div>




    {!! Form::open(['url' => '/ModuloE/CargarSimulacros', 'id' => 'formAuxiliarSimu']) !!}
    {!! Form::close() !!}
    {!! Form::open(['url' => '/ModuloE/CargaEstxSimulacro', 'id' => 'forminfEstuSimulacro']) !!}
    {!! Form::close() !!}
    {!! Form::open(['url' => '/ModuloE/informeArea', 'id' => 'formAuxiliarInformeArea']) !!}
    {!! Form::close() !!}
    {!! Form::open(['url' => '/ModuloE/informeComp', 'id' => 'formAuxiliarInformeComp']) !!}
    {!! Form::close() !!}


@endsection

@section('scripts')
    <script>
        var chartTiempo = am4core.create("chartTiempoPrueba", am4charts.XYChart);
        let dataCompe = [];
        let dataCompo = [];

        $(document).ready(function() {
            $("#Men_ModuloE").addClass("active");
            let allPuntaje = [];
            let tiempoSesi = [];
            let pregCompe = [];
            let pregCompo = [];
            var recomendacion = "";
            var recomendacionCom = "";

            ///Graficas informe por Areas
            var chartPunt = am4core.create("chartPuntaje", am4charts.XYChart);
            var chartComp = am4core.create("chartCompNacio", am4charts.XYChart);


            ///]Graficas informe por Competencias
            var chartCompe = am4core.create("chartCompetencia", am4charts.PieChart3D);
            var chartCompo = am4core.create("chartComponente", am4charts.PieChart3D);
            var chartPregCompetencia = am4core.create("chartPregCompetencia", am4charts.XYChart);
            var chartPregComponennte = am4core.create("chartPregComponennte", am4charts.XYChart);

            // Datos de ejemplo: Nombre de los estudiantes y sus calificaciones en diferentes competencias
            var chart = am4core.create("chartCompEstudiantes", am4charts.XYChart);
            var chart2 = am4core.create("chartCompoEstudiantes", am4charts.XYChart);


            $.extend({
                informe: function(inf) {
                    if (inf == "1") {
                        $.informeIndividual();
                        $("#infSel").val('individual');
                    } else if (inf == "2") {
                        $.informeAreas();
                        $("#infSel").val('area');
                    } else if (inf == "3") {
                        $.informeCompetencia();
                        $("#infSel").val('competencia');
                    }

                },
                informeIndividual: function() {
                    $("#modalInforme").modal({
                        backdrop: 'static',
                        keyboard: false
                    });
                    //Mostrar info de informe
                    $("#infIndividual").show();
                    $("#infAreas").hide();
                    $("#infCompetencia").hide();


                    $("#titu_tema").html('Informe de Resultados de Pruebas Individual');
                    $("#tit-informe").html('Informe de Resultados de Pruebas Individual');


                    var token = $("#token").val();

                    var form = $("#formAuxiliarSimu");
                    $("#_token").remove();
                    form.append("<input type='hidden' name='_token' id='_token' value='" + token +
                        "'>");
                    var url = form.attr("action");
                    var datos = form.serialize();
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: datos,
                        dataType: "json",
                        success: function(respuesta) {
                            $("#simulacro").html(respuesta.Simualacros);
                        }
                    });
                },

                informeAreas: function() {
                    $("#modalInforme").modal({
                        backdrop: 'static',
                        keyboard: false
                    });

                    //Mostrar info de informe
                    $("#infAreas").show();
                    $("#infIndividual").hide();
                    $("#infCompetencia").hide();


                    $("#titu_tema").html('Informe de Resultados por Áreas');
                    $("#tit-informe").html('Informe de Resultados por Áreas');

                    var token = $("#token").val();

                    var form = $("#formAuxiliarSimu");
                    $("#_token").remove();
                    form.append("<input type='hidden' name='_token' id='_token' value='" + token +
                        "'>");
                    var url = form.attr("action");
                    var datos = form.serialize();
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: datos,
                        dataType: "json",
                        success: function(respuesta) {
                            $("#simulacro").html(respuesta.Simualacros);
                        }
                    });


                },
                informeCompetencia: function() {
                    $("#modalInforme").modal({
                        backdrop: 'static',
                        keyboard: false
                    });

                    //Mostrar info de informe
                    $("#infAreas").hide();
                    $("#infIndividual").hide();
                    $("#infCompetencia").show();

                    $("#titu_tema").html(
                        'Informe de Resultados de Prueba por Competencias y Componentes');

                    $("#tit-informe2").html(
                        'Informe de Resultados de Prueba por competencias y Componentes');

                    var token = $("#token").val();

                    var form = $("#formAuxiliarSimu");
                    $("#_token").remove();
                    form.append("<input type='hidden' name='_token' id='_token' value='" + token +
                        "'>");
                    var url = form.attr("action");
                    var datos = form.serialize();
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: datos,
                        dataType: "json",
                        success: function(respuesta) {
                            $("#simulacro").html(respuesta.Simualacros);
                        }
                    });

                },
                habiComp: function() {
                    let estIcfes = document.getElementById("estIcfes");
                    if (estIcfes.checked) {
                        $('#modalInforme').modal('toggle');
                        $("#modalPuntEstandar").modal({
                            backdrop: 'static',
                            keyboard: false
                        });

                    }

                },
                generarInforme: function() {

                    if ($('#simulacro').val() === "") {
                        Swal.fire({
                            title: "Informes de Resultados por Áreas",
                            text: "Seleccione el simulacro.",
                            icon: "warning",
                            button: "Aceptar",
                        });
                        $("#divResultado").hide();
                        return;

                    }


                    $("#divResultado").show();

                    const estIcfes = document.getElementById("estIcfes");
                    let estI = "";
                    if (estIcfes.checked) {
                        estI = "s";
                    } else {
                        estI = "n";

                    }

                    const mayMenor = document.getElementById("mayMenor");
                    let mayM = "";
                    if (mayMenor.checked) {
                        mayM = "s";
                    } else {
                        mayM = "n";

                    }

                    ///CONSUTLAR TODO

                    var token = $("#token").val();
                    var simulacro = $("#simulacro").val();

                    $("#chartPuntaje").html("");
                    $("#chartCompNacio").html("");
                    $("#chartTiempoPrueba").html("");

                    chartPunt = am4core.create("chartPuntaje", am4charts.XYChart);
                    chartComp = am4core.create("chartCompNacio", am4charts.XYChart);
                    chartTiempo = am4core.create("chartTiempoPrueba", am4charts.XYChart);


                    var form = $("#formAuxiliarInformeArea");
                    $("#_token").remove();
                    $("#simu").remove();
                    $("#estI").remove();
                    $("#mayM").remove();
                    form.append("<input type='hidden' name='_token' id='_token' value='" + token +
                        "'>");
                    form.append("<input type='hidden' name='simu' id='simu' value='" + simulacro +
                        "'>");
                    form.append("<input type='hidden' name='estI' id='estI' value='" + estI + "'>");
                    form.append("<input type='hidden' name='mayM' id='mayM' value='" + mayM + "'>");
                    var url = form.attr("action");
                    var datos = form.serialize();

                    $.ajax({
                        type: "POST",
                        url: url,
                        data: datos,
                        dataType: "json",
                        async: false,
                        success: function(respuesta) {
                            data = respuesta.promPuntArea;
                            allPuntaje = respuesta.allPuntArea;
                            tiempoSesi = respuesta.Sesion_tiempo;
                        }
                    });



                    ////////

                    //////////INFORME DE PUNTAJE 

                    // Configurar el tema del gráfico

                    am4core.useTheme(am4themes_animated);

                    // Crear una instancia del gráfico de barras


                    // Agregar datos al gráfico
                    chartPunt.data = data;

                    // Crear ejes
                    var categoryAxis = chartPunt.xAxes.push(new am4charts.CategoryAxis());
                    categoryAxis.dataFields.category = "area";
                    categoryAxis.title.text = "Áreas";

                    var valueAxis = chartPunt.yAxes.push(new am4charts.ValueAxis());
                    valueAxis.title.text = "Puntaje Promedio";

                    valueAxis.min = 0;
                    valueAxis.max = 100;

                    // Crear series de barras
                    var series = chartPunt.series.push(new am4charts.ColumnSeries());
                    series.dataFields.valueY = "promedio";
                    series.dataFields.categoryX = "area";
                    series.columns.template.tooltipText = "{categoryX}: [bold]{valueY}[/]";

                    // Color de las barras

                    series.columns.template.adapter.add("fill", function(fill, target) {
                        return chartPunt.colors.getIndex(target.dataItem.index);
                    });

                    // Agregar etiquetas en las barras
                    var labelBullet = series.bullets.push(new am4charts.LabelBullet());
                    labelBullet.label.text = "{valueY}";
                    labelBullet.label.verticalCenter = "bottom";
                    labelBullet.label.dy = -10; // Ajustar la posición de la etiqueta



                    // Ejecutar el gráfico
                    chartPunt.cursor = new am4charts.XYCursor();

                    //////////////////

                    /////////DIFERENCIA CON ESTANDAR NACIONAL

                    if (estI == "s") {
                        $("#grafCompa").show();
                        am4core.useTheme(am4themes_animated);
                        // Themes end

                        // Create chart instance


                        // Export
                        chartComp.exporting.menu = new am4core.ExportMenu();


                        data.forEach(item => {
                            let areaActual = item["idarea"];
                            item["estandar"] = $("#puntArea" + areaActual).val();
                        });

                        /* Create axes */
                        var categoryAxis = chartComp.xAxes.push(new am4charts.CategoryAxis());
                        categoryAxis.dataFields.category = "area";
                        categoryAxis.renderer.minGridDistance = 30;

                        /* Create value axis */
                        var valueAxis = chartComp.yAxes.push(new am4charts.ValueAxis());

                        /* Create series */
                        var columnSeries = chartComp.series.push(new am4charts.ColumnSeries());
                        columnSeries.name = "Promedio Asignatura";
                        columnSeries.dataFields.valueY = "promedio";
                        columnSeries.dataFields.categoryX = "area";

                        // Etiquetas en las columnas (barras)
                        var labelBullet2 = columnSeries.bullets.push(new am4charts.LabelBullet());
                        labelBullet2.label.text = "{valueY}";
                        labelBullet2.label.verticalCenter =
                            "bottom"; // Alinea el texto en la parte inferior de la barra
                        labelBullet2.label.dy = -
                            10; // Ajusta la distancia vertical del texto con la barra
                        labelBullet2.label.fontSize = 12; // Tamaño de fuente del texto

                        columnSeries.columns.template.tooltipText =
                            "[#fff font-size: 15px]{name} en {categoryX}:\n[/][#fff font-size: 20px]{valueY}[/] [#fff]{additional}[/]"
                        columnSeries.columns.template.propertyFields.fillOpacity = "fillOpacity";
                        columnSeries.columns.template.propertyFields.stroke = "stroke";
                        columnSeries.columns.template.propertyFields.strokeWidth = "strokeWidth";
                        columnSeries.columns.template.propertyFields.strokeDasharray = "columnDash";
                        columnSeries.tooltip.label.textAlign = "middle";



                        var lineSeries = chartComp.series.push(new am4charts.LineSeries());
                        lineSeries.name = "Estandar Nacional";
                        lineSeries.dataFields.valueY = "estandar";
                        lineSeries.dataFields.categoryX = "area";

                        // Etiquetas en las líneas
                        var labelBullet3 = lineSeries.bullets.push(new am4charts.LabelBullet());
                        labelBullet3.label.text = "{valueY}";
                        labelBullet3.label.verticalCenter =
                            "bottom"; // Alinea el texto en la parte inferior de la línea
                        labelBullet3.label.dy = -
                            10; // Ajusta la distancia vertical del texto con la línea
                        labelBullet3.label.fontSize = 12; // Tamaño de fuente del texto


                        lineSeries.stroke = am4core.color("#fdd400");
                        lineSeries.strokeWidth = 3;
                        lineSeries.propertyFields.strokeDasharray = "lineDash";
                        lineSeries.tooltip.label.textAlign = "middle";

                        var bullet = lineSeries.bullets.push(new am4charts.Bullet());
                        bullet.fill = am4core.color(
                            "#fdd400"); // tooltips grab fill from parent by default
                        bullet.tooltipText =
                            "[#fff font-size: 15px]{name} en {categoryX}:\n[/][#fff font-size: 20px]{valueY}[/] [#fff]{additional}[/]"
                        var circle = bullet.createChild(am4core.Circle);
                        circle.radius = 4;
                        circle.fill = am4core.color("#fff");
                        circle.strokeWidth = 3;

                        // Datos para la diferencia entre income y expenses
                        var dataWithDifference = [];
                        for (var i = 0; i < data.length; i++) {
                            var newDataItem = {
                                "area": data[i].area,
                                "promedio": data[i].promedio,
                                "estandar": data[i].estandar,
                                "Diferencia": data[i].promedio - data[i].estandar
                            };
                            dataWithDifference.push(newDataItem);
                        }

                        // Crear una nueva serie para mostrar la diferencia
                        var differenceSeries = chartComp.series.push(new am4charts.LineSeries());
                        differenceSeries.name = "Diferencia";
                        differenceSeries.dataFields.valueY = "Diferencia";
                        differenceSeries.dataFields.categoryX = "area";

                        // Etiquetas en las líneas de la diferencia
                        var labelBullet = differenceSeries.bullets.push(new am4charts.LabelBullet());
                        labelBullet.label.text = "{Diferencia}";
                        labelBullet.label.verticalCenter =
                            "bottom"; // Alinea el texto en la parte inferior de la línea
                        labelBullet.label.dy = -
                            10; // Ajusta la distancia vertical del texto con la línea
                        labelBullet.label.fontSize = 12; // Tamaño de fuente del texto

                        // Agregar la leyenda
                        chartComp.legend = new am4charts.Legend();
                        chartComp.data = dataWithDifference;
                    } else {
                        $("#grafCompa").hide();

                    }

                    ////GENERAR GRAFICA MAYORES Y MENORES PUNTAJES

                    if (mayM == "s") {
                        $("#grafMayMen").show();

                        // Recorrer los datos y generar el nuevo array con los resultados
                        const idAreasUnicos = [...new Set(allPuntaje.map(d => d.idarea))];
                        const resultadosPorIdArea = idAreasUnicos.map(idarea => {
                            const {
                                mejores,
                                peores
                            } = obtenerMejoresPeoresPorIdArea(allPuntaje, idarea);
                            return {
                                idarea: idarea,
                                mejores: mejores,
                                peores: peores,
                            };
                        });


                        // Obtener el contenedor principal del documento
                        const contenedorPrincipal = document.getElementById("MayorMenor");

                        // Recorre el array de datos y agrega el contenido HTML de cada área al contenedor principal
                        resultadosPorIdArea.forEach((areaData) => {
                            const contenidoArea = crearContenidoArea(areaData);
                            contenedorPrincipal.appendChild(contenidoArea);
                        });

                    } else {
                        $("#grafMayMen").hide();
                    }

                    ////GRAFICAR TIEMPO SESION
                    grafTiempo(tiempoSesi)

                    // Calcular la media de los tiempos de respuesta
                    const totalTiempos = tiempoSesi.reduce((sum, area) => sum + area.tiempo, 0);
                    const mediaTiempos = totalTiempos / data.length;

                    console.log(mediaTiempos);

                    // Identificar áreas con tiempos significativamente más altos o más bajos que la media
                    const areasAltos = [];
                    const areasBajos = [];

                    tiempoSesi.forEach(area => {
                        if (area.tiempo > mediaTiempos) {
                            areasAltos.push(area.area);
                        } else if (area.tiempo < mediaTiempos) {
                            areasBajos.push(area.area);
                        }
                    });



                    // Generar el texto con las recomendaciones de mejora
                    let textoRecomendacion = "Recomendaciones:\n";

                    if (areasAltos.length > 0) {
                        textoRecomendacion +=
                            "- Mejorar los tiempos de respuesta en las siguientes áreas: " + areasAltos
                            .join(", ") + ".\n";
                    }

                    if (areasBajos.length > 0) {
                        textoRecomendacion +=
                            "- Mantener y consolidar el buen rendimiento en las áreas: " + areasBajos
                            .join(", ") + ".\n";
                    }

                    if (areasAltos.length === 0 && areasBajos.length === 0) {
                        textoRecomendacion +=
                            "- No se identificaron áreas con tiempos significativamente más altos o más bajos que la media. <br/> ¡Excelente trabajo en general!\n";
                    }

                    $("#analisisTiempo").html(textoRecomendacion);



                },

                generarinformeComp: function() {

                    if ($('#simulacro').val() === "") {
                        Swal.fire({
                            title: "Informes de Competencia y Componentes",
                            text: "Seleccione el simulacro.",
                            icon: "warning",
                            button: "Aceptar",
                        });
                        $("#divResultadoComp").hide();
                        return;
                    }

                    if ($('#AreaSel').val() === " ") {
                        Swal.fire({
                            title: "Informes de Competencia y Componentes",
                            text: "Seleccione el Área.",
                            icon: "warning",
                            button: "Aceptar",
                        });
                        $("#divResultadoComp").hide();
                        return;
                    }

                    $("#divResultadoComp").show();

                    var token = $("#token").val();
                    var simulacro = $("#simulacro").val();
                    var AreaSel = $("#AreaSel").val();
                    var NomAreaSel = $('#AreaSel option:selected').text();

                    $("#title_Compe").html("Distribución de preguntas por competencias de " +
                        convertirAOracionMinuscula(NomAreaSel));
                    $("#title_Compo").html("Distribución de preguntas por componetes de " +
                        convertirAOracionMinuscula(NomAreaSel));

                    $("#chartCompetencia").html("");
                    $("#chartComponente").html("");
                    $("#chartPregCom petencia").html("");
                    $("#chartPregComponennte").html("");

                    $("#chartCompEstudiantes").html("");
                    $("#chartCompoEstudiantes").html("");

                    chartCompe = am4core.create("chartCompetencia", am4charts.PieChart3D);
                    chartCompo = am4core.create("chartComponente", am4charts.PieChart3D);
                    chartPregCompetencia = am4core.create("chartPregCompetencia", am4charts.XYChart);
                    chartPregComponennte = am4core.create("chartPregComponennte", am4charts.XYChart);
                    chart = am4core.create("chartCompEstudiantes", am4charts.XYChart);
                    chart2 = am4core.create("chartCompoEstudiantes", am4charts.XYChart);

                    let nEstudiantes= 0;

                    var form = $("#formAuxiliarInformeComp");
                    $("#_token").remove();
                    $("#simu").remove();
                    $("#ASel").remove();
                    form.append("<input type='hidden' name='_token' id='_token' value='" + token +
                        "'>");
                    form.append("<input type='hidden' name='simu' id='simu' value='" + simulacro +
                        "'>");
                    form.append("<input type='hidden' name='ASel' id='ASel' value='" + AreaSel + "'>");
                    var url = form.attr("action");
                    var datos = form.serialize();

                    $.ajax({
                        type: "POST",
                        url: url,
                        data: datos,
                        dataType: "json",
                        async: false,
                        success: function(respuesta) {
                            pregCompe = respuesta.detCompe;
                            pregCompo = respuesta.detCompo;
                            dataCompe = respuesta.dataPuntCompe;
                            dataCompo = respuesta.dataPuntCompo;
                            nEstudiantes = respuesta.numeroEstudiantes;
                        }
                    });


                    //GRAFICACA  DE COMPETENCIAS////////////////////////////
                    am4core.useTheme(am4themes_animated);
                    // Themes end
                    chartCompe.hiddenState.properties.opacity = 0; // this creates initial fade-in
                    chartCompe.legend = new am4charts.Legend();

                    chartCompe.data = pregCompe;

                    var series = chartCompe.series.push(new am4charts.PieSeries3D());
                    series.dataFields.value = "npreg";
                    series.dataFields.category = "nombre";
                    // Ajustar los labels para que se muestren completos
                    series.labels.template.padding(0, 0, 0,
                        0); // Ajustar el padding alrededor del label
                    series.labels.template.maxWidth = 200; // Establecer el ancho máximo del label
                    series.labels.template.maxHeight = 50; // Establecer la altura máxima del label
                    series.labels.template.wrap =
                        true; // Permitir que el texto se ajuste en varias líneas

                    ////GRAFICA DE ACIERTO DE PREGUNTAS DE COMPETENCIA

                    // Calcular el porcentaje de preguntas acertadas para cada componente de área
                    pregCompe.forEach(function(item) {
                        item.porcentajeAcertado = (item.preAcert / parseInt(item.npreg*nEstudiantes)) * 100;
                    });

                    // Crear el gráfico de barras

                    chartPregCompetencia.data = pregCompe;
                    chartPregCompetencia.padding(40, 40, 40, 40);

                    // Agregar ejes y series
                    var categoryAxis = chartPregCompetencia.xAxes.push(new am4charts.CategoryAxis());
                    categoryAxis.dataFields.category = "nombre";
                    categoryAxis.renderer.grid.template.location = 0;
                    categoryAxis.renderer.minGridDistance = 30;

                    var valueAxis = chartPregCompetencia.yAxes.push(new am4charts.ValueAxis());
                    valueAxis.min = 0;
                    valueAxis.max = 120;
                    valueAxis.strictMinMax = true;
                    valueAxis.calculateTotals = true;

                    var series = chartPregCompetencia.series.push(new am4charts.ColumnSeries());
                    series.dataFields.valueY = "porcentajeAcertado";
                    series.dataFields.categoryX = "nombre";
                    series.columns.template.strokeOpacity = 0;
                    series.columns.template.column.cornerRadiusTopRight = 10;
                    series.columns.template.column.cornerRadiusTopLeft = 10;
                    series.columns.template.column.fillOpacity = 0.8;

                    series.columns.template.adapter.add("fill", function(fill, target) {
                        return chartPunt.colors.getIndex(target.dataItem.index);
                    });

                    // Agregar etiquetas de valor en las barras
                    var labelBullet = series.bullets.push(new am4charts.LabelBullet());
                    labelBullet.label.text =
                        "{valueY.formatNumber('#.')}% de acierto \n de {npreg} preguntas]";
                    labelBullet.label.verticalCenter = "bottom";
                    labelBullet.label.dy = -10;


                    // Tema animado
                    chartPregCompetencia.theme = am4themes_animated;
                    //Generar Recomendaciones 
                    pregCompe.forEach(function(item) {
                        var porcentajeAcierto = item.value;

                        if (porcentajeAcierto >= 90) {
                            recomendacion =
                                "<blockquote class='blockquote pl-1 ml-2 border-left-success border-left-3'>" +
                                "<p class='mb-0'>Excelente desempeño en la competencia " + item
                                .nombre + ".</p>" +
                                "</blockquote>";
                        } else if (porcentajeAcierto >= 70 && porcentajeAcierto < 90) {
                            recomendacion =
                                "<blockquote class='blockquote pl-1 ml-2 border-left-info border-left-3'>" +
                                "<p class='mb-0'>Buen desempeño en la competencia " + item
                                .nombre + ".</p>" +
                                "</blockquote>";
                        } else {
                            recomendacion =
                                "<blockquote class='blockquote pl-1 ml-2 border-left-danger border-left-3'>" +
                                "<p class='mb-0'>Se recomienda revisar y mejorar el desempeño en la competencia " +
                                item.nombre + ".</p>" +
                                "</blockquote>";
                            item.nombre + ".</p>";
                        }

                        item.recomendacion = recomendacion;
                    });

                    var recomendacionesContainer = document.getElementById(
                        "recomendacionesCompetencias");
                    recomendacionesContainer.innerHTML = "";

                    pregCompe.forEach(function(item) {
                        var recomendacionElement = document.createElement("p");
                        recomendacionElement.innerHTML = item.recomendacion;
                        recomendacionesContainer.appendChild(recomendacionElement);
                    });


                    //GRAFICACA  DE COMPONENTES ////////////////////////////

                    am4core.useTheme(am4themes_animated);
                    // Themes end
                    chartCompo.hiddenState.properties.opacity = 0; // this creates initial fade-in
                    chartCompo.legend = new am4charts.Legend();

                    chartCompo.data = pregCompo;

                    var series = chartCompo.series.push(new am4charts.PieSeries3D());
                    series.dataFields.value = "npreg";
                    series.dataFields.category = "nombre";
                    // Ajustar los labels para que se muestren completos
                    series.labels.template.padding(0, 0, 0,
                        0); // Ajustar el padding alrededor del label
                    series.labels.template.maxWidth = 200; // Establecer el ancho máximo del label
                    series.labels.template.maxHeight = 50; // Establecer la altura máxima del label
                    series.labels.template.wrap =
                        true; // Permitir que el texto se ajuste en varias líneas

                    ////GRAFICA DE ACIERTO DE PREGUNTAS DE COMPETENCIA

                    // Calcular el porcentaje de preguntas acertadas para cada componente de área
                    pregCompo.forEach(function(item) {
                        item.porcentajeAcertado = (item.preAcert / parseInt(item.npreg*nEstudiantes)) * 100;
                    });

                    // Crear el gráfico de barras

                    chartPregComponennte.data = pregCompo;
                    chartPregComponennte.padding(40, 40, 40, 40);

                    // Agregar ejes y series
                    var categoryAxis = chartPregComponennte.xAxes.push(new am4charts.CategoryAxis());
                    categoryAxis.dataFields.category = "nombre";
                    categoryAxis.renderer.grid.template.location = 0;
                    categoryAxis.renderer.minGridDistance = 30;

                    var valueAxis = chartPregComponennte.yAxes.push(new am4charts.ValueAxis());
                    valueAxis.min = 0;
                    valueAxis.max = 120;
                    valueAxis.strictMinMax = true;
                    valueAxis.calculateTotals = true;

                    var series = chartPregComponennte.series.push(new am4charts.ColumnSeries());
                    series.dataFields.valueY = "porcentajeAcertado";
                    series.dataFields.categoryX = "nombre";
                    series.columns.template.strokeOpacity = 0;
                    series.columns.template.column.cornerRadiusTopRight = 10;
                    series.columns.template.column.cornerRadiusTopLeft = 10;
                    series.columns.template.column.fillOpacity = 0.8;


                    series.columns.template.adapter.add("fill", function(fill, target) {
                        return chartPunt.colors.getIndex(target.dataItem.index);
                    });

                    // Agregar etiquetas de valor en las barras
                    var labelBullet = series.bullets.push(new am4charts.LabelBullet());
                    labelBullet.label.text =
                        "{valueY.formatNumber('#.')}% de acierto \n de {npreg} preguntas]";
                    labelBullet.label.verticalCenter = "bottom";
                    labelBullet.label.dy = -10;


                    // Tema animado
                    chartPregComponennte.theme = am4themes_animated;
                    //Generar Recomendaciones 
                    pregCompo.forEach(function(item) {
                        var porcentajeAciertoComp = item.value;

                        if (porcentajeAciertoComp >= 90) {
                            recomendacionCom =
                                "<blockquote class='blockquote pl-1 ml-2 border-left-success border-left-3'>" +
                                "<p class='mb-0'>Excelente desempeño en el componente " + item
                                .nombre + ".</p>" +
                                "</blockquote>";
                        } else if (porcentajeAciertoComp >= 70 && porcentajeAciertoComp < 90) {
                            recomendacionCom =
                                "<blockquote class='blockquote pl-1 ml-2 border-left-info border-left-3'>" +
                                "<p class='mb-0'>Buen desempeño en el componente " + item
                                .nombre + ".</p>" +
                                "</blockquote>";
                        } else {
                            recomendacionCom =
                                "<blockquote class='blockquote pl-1 ml-2 border-left-danger border-left-3'>" +
                                "<p class='mb-0'>Se recomienda revisar y mejorar el desempeño en el componente " +
                                item.nombre + ".</p>" +
                                "</blockquote>";
                            item.nombre + ".</p>";
                        }

                        item.recomendacion = recomendacionCom;
                    });

                    var recomendacionesContainerComp = document.getElementById(
                        "recomendacionesComponentes");
                    recomendacionesContainerComp.innerHTML = "";
                    pregCompo.forEach(function(item) {
                        var recomendacionElementCompo = document.createElement("p");
                        recomendacionElementCompo.innerHTML = item.recomendacion;
                        recomendacionesContainerComp.appendChild(recomendacionElementCompo);
                    });

                    ////obtener menos puntajes por competencia 

                    // Ordenar el array en función del puntaje total de menor a mayor
                    dataCompe.sort((a, b) => calcularPuntajeTotal(a) - calcularPuntajeTotal(b));

                    // Obtener los 5 menores puntajes
                    dataCompe = dataCompe.slice(0, 5);

                    // Imprimir los 5 menores puntajes
                    // Llamada a la función para obtener las calificaciones de todas las competencias
                    const calificacionesCompetencias = obtenerCalificaciones();

                    // Crear el gráfico de columnas agrupadas con AmCharts
                    am4core.ready(function() {
                        // Crear el gráfico
                       

                        // Configurar los datos
                        chart.data = calificacionesCompetencias;

                        // Crear las columnas
                        const categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
                        categoryAxis.dataFields.category = "name";
                        categoryAxis.renderer.minGridDistance = 40; // Ajustar la distancia mínima entre las etiquetas
                        categoryAxis.renderer.labels.template.fontSize = 10; // Cambiar el tamaño de fuente de los nombres
                        categoryAxis.renderer.labels.template.maxWidth = 150;
                        categoryAxis.renderer.labels.template.wrap = true; // Permitir que los nombres se dividan en dos líneas


                        const valueAxis = chart.yAxes.push(new am4charts.ValueAxis());

                        // Recorrer todas las competencias y crear una serie de columnas para cada una
                        const competencias = Object.keys(calificacionesCompetencias[0]).filter(key => key !== "name");
                        competencias.forEach(competencia => {
                            const series = chart.series.push(new am4charts.ColumnSeries());
                            series.dataFields.valueY = competencia;
                            series.dataFields.categoryX = "name";
                            series.name = competencia;
                            series.columns.template.tooltipText = "{categoryX}: [bold]{valueY}[/]";


                            // Etiquetas sobre las barras para mostrar el valor
                            const label = series.bullets.push(new am4charts
                            .LabelBullet());
                            label.label.text = "{valueY}";
                            label.label.dy = -
                            10; // Desplazamiento vertical de la etiqueta
                            label.label.fill = am4core.color(
                            "#6771dc"); // Color de texto de la etiqueta
                            label.label.hideOversized =
                            false; // Mostrar etiquetas incluso si se superponen
                        });

                        // Alinear las columnas agrupadas
                        //chart.cursor = new am4charts.XYCursor();
                        //chart.cursor.behavior = "zoomY";

                        chart.legend = new am4charts.Legend();
                    });

                    ////obtener menos puntajes por componente 

                    // Ordenar el array en función del puntaje total de menor a mayor
                    dataCompo.sort((a, b) => calcularPuntajeTotal(a) - calcularPuntajeTotal(b));

                    // Obtener los 5 menores puntajes
                    dataCompo = dataCompo.slice(0, 5);

                    // Imprimir los 5 menores puntajes
                    // Llamada a la función para obtener las calificaciones de todas las competencias
                    const calificacionesCompetenciasCompo = obtenerCalificacionesCompo();

                    console.log(calificacionesCompetenciasCompo);

                    // Crear el gráfico de columnas agrupadas con AmCharts
                    am4core.ready(function() {
                        // Crear el gráfico
                       

                        // Configurar los datos
                        chart2.data = calificacionesCompetenciasCompo;

                        // Crear las columnas
                        const categoryAxis = chart2.xAxes.push(new am4charts.CategoryAxis());
                        categoryAxis.dataFields.category = "name";
                        categoryAxis.renderer.minGridDistance = 40; // Ajustar la distancia mínima entre las etiquetas
                        categoryAxis.renderer.labels.template.fontSize = 10; // Cambiar el tamaño de fuente de los nombres
                        categoryAxis.renderer.labels.template.maxWidth = 150;
                        categoryAxis.renderer.labels.template.wrap = true; // Permitir que los nombres se dividan en dos líneas


                        const valueAxis = chart2.yAxes.push(new am4charts.ValueAxis());

                        // Recorrer todas las competencias y crear una serie de columnas para cada una
                        const componentes = Object.keys(calificacionesCompetenciasCompo[0]).filter(key => key !== "name");
                        componentes.forEach(componentes => {
                            const series = chart2.series.push(new am4charts.ColumnSeries());
                            series.dataFields.valueY = componentes;
                            series.dataFields.categoryX = "name";
                            series.name = componentes;
                            series.columns.template.tooltipText = "{categoryX}: [bold]{valueY}[/]";


                            // Etiquetas sobre las barras para mostrar el valor
                            const label = series.bullets.push(new am4charts
                            .LabelBullet());
                            label.label.text = "{valueY}";
                            label.label.dy = -
                            10; // Desplazamiento vertical de la etiqueta
                            label.label.fill = am4core.color(
                            "#6771dc"); // Color de texto de la etiqueta
                            label.label.hideOversized =
                            false; // Mostrar etiquetas incluso si se superponen
                        });

                        // Alinear las columnas agrupadas
                        //chart.cursor = new am4charts.XYCursor();
                        //chart.cursor.behavior = "zoomY";

                        chart2.legend = new am4charts.Legend();
                    });

                },

                mostListinformes: function() {
                    $('#modalInforme').modal('toggle');
                },
                mostinf: function() {
                    $('#modalPuntEstandar').modal('toggle');
                    $("#modalInforme").modal({
                        backdrop: 'static',
                        keyboard: false
                    });
                },
                CargaEstudiantes: function(idSimu) {
                    let tipInf = $("#infSel").val();

                    var token = $("#token").val();
                    var form = $("#forminfEstuSimulacro");
                    $("#_token").remove();
                    $("#idSimu").remove();
                    $("#tipInf").remove();
                    form.append("<input type='hidden' name='_token' id='_token' value='" + token +
                        "'>");
                    form.append("<input type='hidden' name='idSimu' id='idSimu' value='" + idSimu +
                        "'>");
                    form.append("<input type='hidden' name='tipInf' id='tipInf' value='" + tipInf +
                        "'>");
                    var url = form.attr("action");
                    var datos = form.serialize();

                    var Tabla = "";
                    var j = 1;

                    $.ajax({
                        type: "POST",

                        url: url,
                        data: datos,
                        dataType: "json",
                        success: function(respuesta) {

                            if (tipInf == "individual") {
                                if (Object.keys(respuesta.Estusimulacro).length > 0) {
                                    $.each(respuesta.Estusimulacro, function(i, item) {
                                        Tabla += " <tr data-id='" + item.id +
                                            "' id='Alumno" + item.id + "'>";
                                        Tabla += "<td class='text-truncate'>" + j +
                                            "</td> ";
                                        Tabla += "<td class='text-truncate'>" + item
                                            .ident_alumno + "</td> ";
                                        Tabla += "<td class='text-truncate'>" + item
                                            .nombre_alumno + "</td> ";
                                        Tabla += "<td class='text-truncate'>" + item
                                            .apellido_alumno + "</td> ";
                                        Tabla +=
                                            "<input type='hidden' name='idestu[]' value='" +
                                            item.id + "'>" +
                                            "<input type='hidden' name='usuEstu[]' value='" +
                                            item.usuario_alumno + "'>" +
                                            "<input type='hidden' id='EstSel" +
                                            j +
                                            "' name='EstSel[]' value='no'><td class='text-truncate text-center'><input type='checkbox' name='checkSelEst' onclick='$.SelAlumno(" +
                                            j + ");' id='Seleccion" +
                                            j +
                                            "' style='cursor: pointer;' name='AlumnoSel' value=''></td> ";
                                        Tabla += " </tr>";
                                        j++;
                                    });
                                    $("#td-alumnos").html(Tabla);
                                    $("#btn-acciones").show();
                                } else {
                                    $("#td-alumnos").html('');
                                    $("#btn-acciones").hide();
                                    swal.fire({
                                        title: "Administrar Estudiantes",
                                        text: 'Ningun estudiante a desarrollado este Simulacro',
                                        icon: "warning",
                                        button: "Aceptar",
                                    });
                                }

                            } else if (tipInf == "area") {
                                $("#btn-imprimir").show();
                                var puntAreas = '';
                                $.each(respuesta.Sesiones, function(i, item) {
                                    puntAreas +=
                                        '     <div class="col-xl-6 col-lg-6 col-md-12 mb-1">' +
                                        '<fieldset class="form-group">' +
                                        '  <label>' + item.nombre_area +
                                        '</label>' +
                                        ' <input type="text" style="width: 100%" onkeypress="return validartxtnum(event)"  value="0" class="form-control" name="puntAreas" id="puntArea' +
                                        item.area + '">' +
                                        '</fieldset>' +
                                        '    </div>'
                                });

                                $("#puntajes").html(puntAreas);

                            } else if (tipInf == "competencia") {

                                var Areas = '<option value=" ">Seleccione...</option>';
                                if (respuesta.Sesiones) {
                                    $.each(respuesta.Sesiones, function(i, item) {
                                        Areas += '<option value="' + item.area +
                                            '">' + item.nombre_area + '</option>';
                                    });
                                    $("#btn-imprimirComp").show();
                                }

                                $("#AreaSel").html(Areas);

                            }


                        }
                    });

                },
                SelAlumno: function(id) {

                    // Nombre del grupo de checkboxes
                    const nombreCheckboxes = 'checkSelEst';

                    // Obtener todos los checkboxes con el nombre especificado
                    const checkboxes = document.querySelectorAll(
                        `input[type="checkbox"][name="${nombreCheckboxes}"]`);
                    console.log(checkboxes);
                    // Verificar si todos los checkboxes están seleccionados
                    const todosSeleccionados = Array.from(checkboxes).every(checkbox => checkbox
                        .checked);

                    // Generar la respuesta
                    let respuesta;
                    if (todosSeleccionados) {
                        $("#SelAll").prop("checked", true);
                    } else {
                        $("#SelAll").prop("checked", false);
                    }

                    // Imprimir la respuesta
                    console.log(respuesta);



                    if ($('#Seleccion' + id).prop('checked')) {
                        $("#EstSel" + id).val("si");
                    } else {
                        $("#EstSel" + id).val("no");

                    }
                },
                SelAllEst: function() {
                    var j = 1;
                    if ($('#SelAll').prop('checked')) {
                        $("input[name='checkSelEst']").each(function(indice, elemento) {
                            $(elemento).prop("checked", true);
                            $("#EstSel" + j).val("si");
                            j++;
                        });
                    } else {
                        $("input[name='checkSelEst']").each(function(indice, elemento) {
                            $(elemento).prop("checked", false);
                            $("#EstSel" + j).val("no");
                            j++;
                        });
                    }
                },
                imprimirInf: function(DesEst) {
                    var simulacro = $("#simulacro").val();
                    var flag = "no";
                    $("input[name='checkSelEst']").each(function(indice, elemento) {
                        if ($(elemento).prop('checked')) {
                            flag = "si";
                            return;
                        }
                    });

                    if (flag === "si") {
                        var form = $("#FormEstudiantes");
                        var token = $("#token").val();
                        $("#simulacro").remove();
                        $("#_token").remove();
                        form.append("<input type='hidden' name='simulacro' id='simulacro' value='" +
                            simulacro + "'>");
                        form.append("<input type='hidden' name='_token'  id='_token' value='" + token +
                            "'>");
                        var url = form.attr("action");
                        var datos = form.serialize();
                        var mensaje = "";

                        $.ajax({
                            url: url,
                            method: 'POST',
                            data: datos,
                            xhrFields: {
                                responseType: 'blob'
                            },
                            success: function(data) {
                                // Crear un enlace de descarga para el PDF
                                var a = document.createElement('a');
                                var url = window.URL.createObjectURL(data);
                                a.href = url;
                                a.download = 'ResultadoIndividual.pdf';
                                a.click();
                                window.URL.revokeObjectURL(url);
                            }
                        });

                    } else {
                        swal.fire({
                            title: "Adminitrar Estudiantes",
                            text: "Debe Seleccionar almenos un Estdiante",
                            icon: "warning",
                            button: "Aceptar",
                        });
                    }



                },
                imprimirInforme: async function() {
                    document.getElementById('loaderContainer').style.display = 'block';
                    const image = document.getElementById('imgEscudo');
                    const imagelogo = document.getElementById('imglogoModPed');

                    // Get the sample text from the paragraph element
                    let titulo = document.getElementById('tit-informe').textContent;
                    let nomCol = document.getElementById('nomCol').textContent;
                    let ubicol = document.getElementById('ubicol').textContent;
                    let fecInf = document.getElementById('fecInf').textContent;
                    let analisisTiempo = document.getElementById('analisisTiempo').textContent;
                    let rutImg = document.getElementById('rutaLogoModE').value;

                    // Convert the image into a Base64 data URL
                    const canvas = document.createElement('canvas');
                    canvas.width = 350;
                    canvas.height = 350;
                    const ctx = canvas.getContext('2d');
                    ctx.drawImage(image, 0, 0);
                    const base64data = canvas.toDataURL();

                    const canvas2 = document.createElement('canvas');
                    canvas2.width = 350;
                    canvas2.height = 350;
                    const ctx2 = canvas2.getContext('2d');
                    ctx2.drawImage(imagelogo, 0, 0)
                    const base64dataLogo = canvas2.toDataURL();


                    // Define the document content
                    var infArea = {
                        content: [{
                            style: 'tableExample',
                            table: {
                                widths: [80, 350, 50],
                                body: [
                                    [{
                                            rowSpan: 4,
                                            image: base64data,
                                            fit: [60, 60],
                                            border: [true, true, false, true],

                                        },
                                        {
                                            text: titulo,
                                            border: [false, true, false, false],
                                            style: 'header'
                                        },
                                        {
                                            rowSpan: 4,
                                            image: base64dataLogo,
                                            fit: [100, 80],
                                            border: [false, true, true, true],

                                        },
                                    ],
                                    [
                                        '',
                                        {
                                            text: nomCol,
                                            border: [false, false, false, false],
                                            style: 'subheader'
                                        },
                                        ''
                                    ],
                                    [
                                        '',
                                        {
                                            text: ubicol,
                                            border: [false, false, false, false],
                                        },
                                        ''
                                    ],
                                    [
                                        '',
                                        {
                                            text: fecInf,
                                            border: [false, false, false, true]
                                        },
                                        ''
                                    ],

                                ]
                            }
                        }],
                        styles: {
                            header: {
                                fontSize: 14,
                                bold: true,
                                margin: [0, 0, 0, 0]
                            },
                            subheader: {
                                fontSize: 12,
                                bold: true,
                                margin: [0, -15, 0, 0]
                            },
                            tableExample: {
                                margin: [0, 0, 0, 15]
                            },
                            tableHeader: {
                                bold: true,
                                fontSize: 13,
                                color: 'black'
                            }
                        },
                        defaultStyle: {
                            // alignment: 'justify'
                        }

                    }

                    infArea.content.push({
                        text: "Puntaje promedio de estudiante por Área",
                        alignment: 'left',
                        fontSize: 13,
                        bold: true,
                        margin: [0, 5, 0, 0]
                    });


                    const [imgPunt, imgComp, imgTiempo] = await Promise.all([
                        chartPunt.exporting.getImage('png'),
                        chartComp.exporting.getImage('png'),
                        chartTiempo.exporting.getImage('png'),

                    ]);

                    infArea.content.push({
                        image: imgPunt,
                        alignment: 'center',
                        width: 300
                    });


                    infArea.content.push({
                        text: "Comparativa estandar Nacional",
                        alignment: 'left',
                        fontSize: 13,
                        bold: true,
                        margin: [0, 10, 0, 0]
                    });


                    infArea.content.push({
                        image: imgComp,
                        alignment: 'center',
                        width: 300
                    });

                    const docMenMay = {
                        content: [{
                                text: 'Tabla de Puntajes por Área',
                                style: 'header'
                            },
                            {
                                text: ' ',
                                style: 'space'
                            },
                            {
                                style: 'table',
                                table: {
                                    headerRows: 1,
                                    widths: ['auto', 'auto', 'auto', 'auto'],
                                    body: [
                                        ['Área', 'Nombre Estudiante', 'Mayor Puntaje',
                                            'Menor Puntaje'
                                        ],
                                        ...generateTableBody(allPuntaje),
                                    ],
                                },
                            },
                        ],
                        styles: {
                            header: {
                                fontSize: 18,
                                bold: true,
                                alignment: 'center',
                            },
                            space: {
                                margin: [0, 0, 0, 10],
                            },
                            table: {
                                fontSize: 12,
                            },
                        },
                    };

                    infArea.content.push({
                        text: "Mayores y Menores Puntajes",
                        alignment: 'left',
                        fontSize: 13,
                        bold: true,
                        margin: [0, 10, 0, 0]
                    });


                    const idAreasUnicos = [...new Set(allPuntaje.map(d => d.idarea))];
                    const resultadosPorIdArea = idAreasUnicos.map(idarea => {
                        const {
                            mejores,
                            peores
                        } = obtenerMejoresPeoresPorIdArea(allPuntaje, idarea);
                        return {
                            idarea: idarea,
                            mejores: mejores,
                            peores: peores,
                        };
                    });

                    $.each(resultadosPorIdArea, function(j, item1) {
                        console.log(item1.mejores[0].area);
                        infArea.content.push({
                            text: item1.mejores[0].area,
                            fontSize: 12,
                            bold: true,
                            italics: true,
                            margin: [0, 10, 0, 0]
                        });

                        infArea.content.push({
                            text: "Mejores Puntajes.",
                            fontSize: 10,
                            margin: [0, 10, 0, 0]
                        }, {
                            table: {
                                widths: ['5%', '75%', '20%'],
                                body: [
                                    ['#', 'Estudiante', 'Puntaje']

                                ]
                            },
                            fontSize: 10,
                            bold: true,
                            fillColor: '#D7D7DB'

                        });

                        let conta = 1;
                        $.each(item1.mejores, function(y, item2) {

                            infArea.content.push({
                                table: {
                                    widths: ['5%', '75%', '20%'],
                                    body: [
                                        [conta, item2.nombre_est, {
                                            text: item2.puntaje,
                                            bold: true,
                                            italics: true,
                                            color: '#2ED26E'
                                        }]
                                    ]
                                },
                                layout: {
                                    defaultBorder: true, // Asegura que todas las celdas tengan el borde activado
                                },
                                // Establece el grosor del borde en 1 punto para todas las celdas
                                border: [false, false, false, true],
                                fontSize: 8,
                                bold: true

                            });
                            conta++;
                        });

                        infArea.content.push({
                            text: "Menores Puntajes.",
                            fontSize: 10,
                            margin: [0, 10, 0, 0]
                        }, {
                            table: {
                                widths: ['5%', '75%', '20%'],
                                body: [
                                    ['#', 'Estudiante', 'Puntaje']

                                ]
                            },
                            fontSize: 10,
                            bold: true,
                            fillColor: '#D7D7DB'

                        });

                        conta = 1;
                        $.each(item1.peores, function(y, item3) {

                            infArea.content.push({
                                table: {
                                    widths: ['5%', '75%', '20%'],
                                    body: [
                                        [conta, item3.nombre_est, {
                                            text: item3.puntaje,
                                            bold: true,
                                            italics: true,
                                            color: '#EA4359'
                                        }]
                                    ]
                                },

                                fontSize: 8,
                                bold: true

                            });
                            conta++;
                        });
                    });

                    infArea.content.push({
                        text: "Promedio de tiempo usado para responder pruebas por area",
                        alignment: 'left',
                        fontSize: 13,
                        bold: true,
                        margin: [0, 10, 0, 0]
                    });

                    infArea.content.push({
                        image: imgTiempo,
                        alignment: 'center',
                        width: 300
                    });

                    infArea.content.push({
                        text: analisisTiempo,
                        alignment: 'justify',
                        fontSize: 10,
                        margin: [0, 10, 0, 0]
                    });


                    pdfMake.createPdf(infArea).download('InformeAreas.pdf');
                    // Generate the PDF

                    setTimeout(function() {
                        // Ocultar el loader después de generar el PDF (simulación)
                        document.getElementById('loaderContainer').style.display = 'none';
                    }, 3000);

                },
                imprimirInformeComp: async function() {
                    document.getElementById('loaderContainer').style.display = 'block';

                    const image = document.getElementById('imgEscudo2');
                    const imagelogo = document.getElementById('imglogoModPed2');

                    // Get the sample text from the paragraph element
                    let titulo = document.getElementById('tit-informe2').textContent;
                    let nomCol = document.getElementById('nomCol2').textContent;
                    let ubicol = document.getElementById('ubicol2').textContent;
                    let fecInf = document.getElementById('fecInf2').textContent;
                    let rutImg = document.getElementById('rutaLogoModE').value;

                    var NomAreaSel = $('#AreaSel option:selected').text();


                    // Convert the image into a Base64 data URL
                    const canvas = document.createElement('canvas');
                    canvas.width = 350;
                    canvas.height = 350;
                    const ctx = canvas.getContext('2d');
                    ctx.drawImage(image, 0, 0);
                    const base64data = canvas.toDataURL();

                    const canvas2 = document.createElement('canvas');
                    canvas2.width = 350;
                    canvas2.height = 350;
                    const ctx2 = canvas2.getContext('2d');
                    ctx2.drawImage(imagelogo, 0, 0)
                    const base64dataLogo = canvas2.toDataURL();

                    // Define the document content
                    var infArea = {
                        content: [{
                            style: 'tableExample',
                            table: {
                                widths: [80, 350, 50],
                                body: [
                                    [{
                                            rowSpan: 4,
                                            image: base64data,
                                            fit: [60, 60],
                                            border: [true, true, false, true],

                                        },
                                        {
                                            text: titulo,
                                            border: [false, true, false, false],
                                            style: 'header'
                                        },
                                        {
                                            rowSpan: 4,
                                            image: base64dataLogo,
                                            fit: [100, 80],
                                            border: [false, true, true, true],

                                        },
                                    ],
                                    [
                                        '',
                                        {
                                            text: nomCol,
                                            border: [false, false, false, false],
                                            style: 'subheader'
                                        },
                                        ''
                                    ],
                                    [
                                        '',
                                        {
                                            text: ubicol,
                                            border: [false, false, false, false],
                                        },
                                        ''
                                    ],
                                    [
                                        '',
                                        {
                                            text: fecInf,
                                            border: [false, false, false, true],
                                            style: 'subheader'
                                        },
                                        ''
                                    ],

                                ]
                            }
                        }],
                        styles: {
                            header: {
                                fontSize: 14,
                                bold: true,
                                margin: [0, 0, 0, 0]
                            },
                            subheader: {
                                fontSize: 12,
                                bold: true,
                                margin: [0, -15, 0, 0]
                            },
                            tableExample: {
                                margin: [0, 0, 0, 15]
                            },
                            tableHeader: {
                                bold: true,
                                fontSize: 13,
                                color: 'black'
                            }
                        },
                        defaultStyle: {
                            // alignment: 'justify'
                        }

                    }

                    const [imgCompe, imgCompo, imgPregCompe, imgPregCompo,imgPregAcerCompe,imgPregAcerCompo] = await Promise.all([
                        chartCompe.exporting.getImage('png'),
                        chartCompo.exporting.getImage('png'),
                        chartPregCompetencia.exporting.getImage('png'),
                        chartPregComponennte.exporting.getImage('png'),
                        chart.exporting.getImage('png'),
                        chart2.exporting.getImage('png'),

                    ]);

                    infArea.content.push({
                        text: "Distribución de preguntas por competencias de " +
                            convertirAOracionMinuscula(NomAreaSel),
                        alignment: 'left',
                        fontSize: 13,
                        bold: true,
                        margin: [0, 5, 0, 0]
                    });

                    infArea.content.push({
                        image: imgCompe,
                        alignment: 'center',
                        width: 300
                    });

                    infArea.content.push({
                        text: "Preguntas acertadas por Competencias",
                        alignment: 'left',
                        fontSize: 13,
                        bold: true,
                        margin: [0, 5, 0, 0]
                    });

                    infArea.content.push({
                        image: imgPregCompe,
                        alignment: 'center',
                        width: 300
                    });

                    infArea.content.push({
                        text: "Recomendaciones.",
                        alignment: 'left',
                        fontSize: 12,
                        bold: true,
                        margin: [0, 5, 0, 0]
                    });

                    pregCompe.forEach(function(item) {
                        const tempElement = document.createElement('div');
                        tempElement.innerHTML = item.recomendacion;

                        const parrafoElemento = tempElement.querySelector('blockquote p');
                        infArea.content.push({

                            text: "- " + parrafoElemento.textContent,
                            alignment: 'left',
                            fontSize: 10,
                            margin: [0, 5, 0, 0]
                        });
                    });

                    infArea.content.push({
                        text: "Grafico de estudiantes con menores preguntas acertadas por competencia.",
                        alignment: 'left',
                        fontSize: 13,
                        bold: true,
                        margin: [0, 5, 0, 0]
                    });

                    infArea.content.push({
                        image: imgPregAcerCompe,
                        alignment: 'center',
                        width: 400
                    });



                    /////Imprimir detalles de componentes 
                    infArea.content.push({
                        text: "Distribución de preguntas por componentes de " +
                            convertirAOracionMinuscula(NomAreaSel),
                        alignment: 'left',
                        fontSize: 13,
                        bold: true,
                        margin: [0, 10, 0, 0]
                    });

                    infArea.content.push({
                        image: imgCompo,
                        alignment: 'center',
                        width: 300
                    });

                    infArea.content.push({
                        text: "Preguntas acertadas por Componentes",
                        alignment: 'left',
                        fontSize: 13,
                        bold: true,
                        margin: [0, 10, 0, 0]
                    });

                    infArea.content.push({
                        image: imgPregCompo,
                        alignment: 'center',
                        width: 300
                    });

                    infArea.content.push({
                        text: "Recomendaciones.",
                        alignment: 'left',
                        fontSize: 12,
                        bold: true,
                        margin: [0, 5, 0, 0]
                    });

                    pregCompo.forEach(function(item) {
                        const tempElement = document.createElement('div');
                        tempElement.innerHTML = item.recomendacion;

                        const parrafoElemento = tempElement.querySelector('blockquote p');
                        infArea.content.push({
                            text: "- " + parrafoElemento.textContent,
                            alignment: 'left',
                            fontSize: 10,
                            margin: [0, 5, 0, 0]
                        });
                    });

                    infArea.content.push({
                        text: "Grafico de estudiantes con menores preguntas acertadas por componentes.",
                        alignment: 'left',
                        fontSize: 13,
                        bold: true,
                        margin: [0, 5, 0, 0]
                    });

                    infArea.content.push({
                        image: imgPregAcerCompo,
                        alignment: 'center',
                        width: 400
                    });


                    pdfMake.createPdf(infArea).download('InformeCompetencias.pdf');

                    setTimeout(function() {
                        // Ocultar el loader después de generar el PDF (simulación)
                        document.getElementById('loaderContainer').style.display = 'none';
                    }, 3000);
                }
            });

        });



        // Función para obtener los 5 mejores y los 5 peores puntajes para un idarea
        function obtenerMejoresPeoresPorIdArea(datos, idarea) {
            const datosPorIdArea = datos.filter(d => d.idarea === idarea);
            const ordenados = datosPorIdArea.sort((a, b) => b.puntaje - a.puntaje);
            return {
                mejores: ordenados.slice(0, 5),
                peores: ordenados.slice(-5).reverse(),
            };
        }

        // Función para crear un elemento HTML con el nombre del estudiante y su puntaje
        function crearCeldaEstudiante(estudiante, esMayor) {
            const celda = document.createElement("td");
            const puntaje = estudiante.puntaje;
            celda.textContent = `${estudiante.nombre_est} (`; // Apertura del texto

            if (esMayor) {
                celda.innerHTML += `<span style="color: green;">${puntaje}</span>`;
            } else {
                celda.innerHTML += `<span style="color: red;">${puntaje}</span>`;
            }

            celda.innerHTML += `)`; // Cierre del texto

            return celda;
        }

        // Función para crear la tabla con los mejores y peores puntajes
        function crearTabla(mejores, peores) {
            const tabla = document.createElement("table");
            tabla.classList.add("table");

            // Crea la fila de los encabezados de mayores puntajes
            const filaEncabezadosMejores = document.createElement("tr");
            const encabezadoMejores = document.createElement("th");
            encabezadoMejores.textContent = "Mejores Puntajes";
            filaEncabezadosMejores.appendChild(encabezadoMejores);
            tabla.appendChild(filaEncabezadosMejores);

            // Crea la fila de los mejores puntajes
            const filaMejores = document.createElement("tr");
            mejores.forEach((estudiante) => {
                const celda = crearCeldaEstudiante(estudiante, true);
                filaMejores.appendChild(celda);
            });
            tabla.appendChild(filaMejores);

            // Crea la fila de los encabezados de peores puntajes
            const filaEncabezadosPeores = document.createElement("tr");
            const encabezadoPeores = document.createElement("th");
            encabezadoPeores.textContent = "Peores Puntajes";
            filaEncabezadosPeores.appendChild(encabezadoPeores);
            tabla.appendChild(filaEncabezadosPeores);

            // Crea la fila de los peores puntajes
            const filaPeores = document.createElement("tr");
            peores.forEach((estudiante) => {
                const celda = crearCeldaEstudiante(estudiante, false);
                filaPeores.appendChild(celda);
            });
            tabla.appendChild(filaPeores);

            return tabla;
        }

        // Función para crear el contenido HTML para cada área
        function crearContenidoArea(areaData) {
            const contenedor = document.createElement("div");

            // Crea el título h1 con el nombre del área
            const tituloArea = document.createElement("h5");
            tituloArea.textContent = areaData.mejores[0].area;
            contenedor.appendChild(tituloArea);

            // Crea la tabla con los mejores y peores puntajes
            const tabla = crearTabla(areaData.mejores, areaData.peores);
            contenedor.appendChild(tabla);

            return contenedor;
        }

        function grafTiempo(tiempoSesi) {

            // Configuramos la gráfica
            am4core.useTheme(am4themes_animated);

            // Crear una instancia del gráfico de barras


            // Agregar datos al gráfico
            chartTiempo.data = tiempoSesi;

            // Crear ejes
            var categoryAxis = chartTiempo.xAxes.push(new am4charts.CategoryAxis());
            categoryAxis.dataFields.category = "area";
            categoryAxis.title.text = "Áreas";

            var valueAxis = chartTiempo.yAxes.push(new am4charts.ValueAxis());
            valueAxis.title.text = "Tiempo Promedio Utilizado";
            valueAxis.renderer.labels.template.adapter.add("text", function(text) {
                return text + " min";
            });

            valueAxis.min = 0;
            valueAxis.max = 150;

            // Crear series de barras
            var series = chartTiempo.series.push(new am4charts.ColumnSeries());
            series.dataFields.valueY = "tiempo";
            series.dataFields.categoryX = "area";
            series.name = "Tiempo Promedio";
            series.columns.template.tooltipText = "{categoryX}: [bold]{valueY}[/] min";

            // Color de las barras

            series.columns.template.adapter.add("fill", function(fill, target) {
                return chartTiempo.colors.getIndex(target.dataItem.index);
            });

            // Agregar etiquetas en las barras
            var labelBullet = series.bullets.push(new am4charts.LabelBullet());
            labelBullet.label.text = "{valueY} min";
            labelBullet.label.verticalCenter = "bottom";
            labelBullet.label.dy = -10; // Ajustar la posición de la etiqueta

            // Agregar la leyenda
            chartTiempo.legend = new am4charts.Legend();


        }


        const generateTableBody = (data) => {
            const result = [];
            const areas = {};
            console.log(data);
            // Agrupar los datos por área
            data.forEach((item) => {
                const {
                    area,
                    nombre_est,
                    puntaje
                } = item;
                if (!areas[area]) {
                    areas[area] = {
                        nombre_estudiantes: [],
                        puntajes: []
                    };
                }
                areas[area].nombre_estudiantes.push(nombre_est);
                areas[area].puntajes.push(puntaje);
            });

            // Calcular el mayor y menor puntaje por área
            Object.keys(areas).forEach((area) => {
                const {
                    nombre_estudiantes,
                    puntajes
                } = areas[area];
                const maxPuntaje = Math.max(...puntajes);
                const minPuntaje = Math.min(...puntajes);

                result.push([
                    area,
                    nombre_estudiantes.join(', '),
                    `${maxPuntaje} (${nombre_estudiantes[puntajes.indexOf(maxPuntaje)]})`,
                    `${minPuntaje} (${nombre_estudiantes[puntajes.indexOf(minPuntaje)]})`,
                ]);
            });

            return result;
        };


        function validartxtnum(e) {
            tecla = e.which || e.keyCode;
            patron = /[0-9]+$/;
            te = String.fromCharCode(tecla);
            //    if(e.which==46 || e.keyCode==46) {
            //        tecla = 44;
            //    }
            return (patron.test(te) || tecla == 9 || tecla == 8 || tecla == 37 || tecla == 39 || tecla == 44);
        }

        // Función para obtener un arreglo con las calificaciones de una competencia específica
        function obtenerCalificaciones() {
            const competencias = Object.keys(dataCompe[0]).filter(key => key !== "nombre");
            return dataCompe.map(estudiante => ({
                name: estudiante.nombre,
                ...competencias.reduce((acc, comp) => ({
                    ...acc,
                    [comp]: estudiante[comp]
                }), {})
            }));
        }
        // Función para obtener un arreglo con las calificaciones de una componentes específica
        function obtenerCalificacionesCompo() {
            const componentes = Object.keys(dataCompo[0]).filter(key => key !== "nombre");
            return dataCompo.map(estudiante => ({
                name: estudiante.nombre,
                ...componentes.reduce((acc, comp) => ({
                    ...acc,
                    [comp]: estudiante[comp]
                }), {})
            }));
        }

        function calcularPuntajeTotal(item) {
            return Object.values(item).reduce((total, valor) => typeof valor === 'number' ? total + valor : total, 0);
        }


        function convertirAOracionMinuscula(cadena) {
            // Convertir toda la cadena a minúsculas
            const cadenaMinuscula = cadena.toLowerCase();

            // Capitalizar la primera letra de la cadena
            const cadenaCapitalizada = cadenaMinuscula.charAt(0).toUpperCase() + cadenaMinuscula.slice(1);

            return cadenaCapitalizada;
        }
    </script>
@endsection
