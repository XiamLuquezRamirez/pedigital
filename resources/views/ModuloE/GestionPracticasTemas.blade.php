@extends('Plantilla.Principal')
@section('title', 'Gestionar de Evaluaciones')
@section('Contenido')
    <input type="hidden" class="form-control" name="grado" id="grado" value="{{ $grado }}" />
    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
    <input type="hidden" name="idEvaluacion" id="idEvaluacion" value="">
    <input type="hidden" data-id='id-dat' id="dattaller"
    data-ruta="{{ asset('/app-assets/Archivos_EvaluacionTaller') }}" />
    <input type="hidden" name="," id="idAlumno" value="">
    <input type="hidden" data-id='id-dat' id="Respdattaller"
        data-ruta="{{ Session::get('URL') }}/Archivos_EvalTaller_Resp" />

    <div class="content-header row">
        <div class="content-header-left col-md-12 col-12 mb-2">
            <h3 class="content-header-title mb-0">GESTIONAR PRACTICAS MÓDULO E</h3>
            <div class="row breadcrumbs-top">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/Administracion') }}">Inicio</a>
                        </li>
                        <li class="breadcrumb-item active">Gestionar Practicas
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content-body">
        <section id="number-tabs">

            <p class="px-1"></p>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title"><label id="titPractica">Gestionar Practicas /</labe>
                                    {!! $titTema !!}</h4>
                        </div>

                        <div id="listpracticas" class="card-content collapse show">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">

                                        <div class="col-12">
                                            <div class="row">

                                                <div class="col-md-10">
                                                    <div class="form-group">
                                                        <a class="btn btn-outline-primary"
                                                            href="{{ url('/ModuloE/NuevaPractica/' . $id) }}"
                                                            title="Nueva Practica">
                                                            <i class="fa fa-plus"> </i> Nueva Practica
                                                        </a>
                                                    </div>
                                                </div>

                                                <div class="col-md-2 ">
                                                    <div class="input-group">
                                                        <a class="btn btn-outline-dark"
                                                            href="{{ url('/ModuloE/GestionTema/') }}" title="Volver">
                                                            <i class="fa fa-angle-double-left"></i> Volver
                                                        </a>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <p class="px-1"></p>
                                <div class="row">
                                    <div class="col-md-12">
                                        @if (Session::has('error'))
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="alert alert-icon-right alert-warning alert-dismissible mb-2"
                                                        role="alert">
                                                        <button type="button" class="close" data-dismiss="alert"
                                                            aria-label="Close">
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
                                                        <button type="button" class="close" data-dismiss="alert"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                        <strong>{!! session('success') !!}</strong>
                                                    </div>

                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="table-responsive scrollable-container">
                                            <table id="recent-orders"
                                                class="table table-hover mb-0 ps-container ps-theme-default table-sm">
                                                <thead class="bg-primary">
                                                    <tr>
                                                        <th>Opciones</th>
                                                        <th>Practica</th>
                                                        <th>Título</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                        $i = 1;
                                                    @endphp

                                                    @foreach ($Evaluaciones as $Eval)
                                                        <tr data-id='{{ $Eval->id }}' id='Preg{{ $Eval->id }}'>
                                                            <td class="text-truncate">
                                                                <a href='{{ url('ModuloE/EditarPregPract/' . $Eval->id) }}'
                                                                    title="Editar" class="btn btn-outline-success btn-sm"><i
                                                                        class="fa fa-edit"></i> </a>

                                                                <a href='#' title="Eliminar"
                                                                    class="btn btn-outline-warning btn-sm btnEliminar"
                                                                    id="btnActi{{ $Eval->id }}"><i class="fa fa-trash"
                                                                        id="iconBoton{{ $Eval->id }}"> </i></a>
                                                                <a href='#'
                                                                    onclick="$.mostrarListEstudiantes({{ $Eval->id }})"
                                                                    title="Calificar Practica"
                                                                    class="btn btn-outline-primary btn-sm"
                                                                    id="btnActi{{ $Eval->id }}"><i
                                                                        class="fa fa-check-square-o"
                                                                        id="iconBoton{{ $Eval->id }}"> </i></a>
                                                            </td>
                                                            <td style="text-transform: uppercase;" class="text-truncate">
                                                                Practica {!! $i !!}</td>

                                                            <td class="text-truncate" style="text-transform:uppercase;">
                                                                {!! $Eval->titulo !!}</td>

                                                        </tr>
                                                        @php
                                                            $i++;
                                                        @endphp
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>


                                </div>
                                <p class="px-1"></p>

                            </div>
                        </div>

                        <div id="detCalificacion" style="display: none;" class="card-content collapse show">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">

                                        <div class="col-12">
                                            <div class="row">

                                                <div class="col-md-10">
                                                    <div class="form-group">
                                                        <label class="form-label">Mostrar estudiantes del:</label>
                                                        <select class="form-control select2" id="selGrupo"
                                                            onchange="$.cambioGrupo(this.value)">
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="input-group">
                                                        <a class="btn btn-outline-dark" href="javascript: $.mostrasEval()"
                                                            title="Volver">
                                                            <i class="fa fa-angle-double-left"></i> Volver
                                                        </a>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="table-responsive scrollable-container">
                                                <table id="recent-orders"
                                                    class="table table-hover mb-0 ps-container ps-theme-default table-sm">
                                                    <thead class="bg-primary">
                                                        <tr>
                                                            <th>Opciones</th>
                                                            <th>#</th>
                                                            <th>Identificación</th>
                                                            <th>Nombre</th>
                                                            <th>Calificación</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="tr_alumnos">


                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade text-left" id="large" tabindex="-1" role="dialog"
                            aria-labelledby="myModalLabel17" aria-hidden="true">

                            <input type="hidden" class="form-control" id="Id_PregEns" value="" />
                            <input type="hidden" class="form-control" id="TipEva" value="" />
                            <input type="hidden" class="form-control" id="PuntMax" value="" />
                            <input type="hidden" class="form-control" id="TipCali" value="" />
                            <div class="modal-dialog modal-xl" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" style="text-transform: capitalize;" id="titu_tema"></h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>

                                    <div class="modal-body">
                                        <div
                                            class="card-subtitle line-on-side text-muted text-center font-small-3 mx-1 my-1">
                                            <h3 class="modal-title" id="h3_alumno" style="text-transform: uppercase;">
                                            </h3>

                                        </div>

                                        <br>
                                        <div id="enunciado" style="padding-left:15px;"></div>
                                        <div id='cont_eva' style=" overflow-x: scroll;">

                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <div class="row">

                                            <div class="col-md-8">
                                                <labe id="fechp">Fecha Presentación:</labe><br>
                                                <labe id="tocupado">Tiempo Ocupado:</labe><br>
                                                <labe id="irealizados">Intentos Realizados:</labe>
                                            </div>
                                            <div class="col-xl-4">
                                                <fieldset class="form-group">
                                                    <label for="roundText">Calificación:</label>
                                                    <input id="txt_califVis"
                                                        style="text-align: center;color: white; font-weight: bold;"
                                                        class="form-control round" placeholder="Calificación" disabled
                                                        type="text">
                                                    <input id="txt_calif" style="text-align: center;"
                                                        class="form-control round" placeholder="Calificación"
                                                        type="hidden">
                                                    <input id="txt_califMax" style="text-align: center;"
                                                        class="form-control round" placeholder="Calificación"
                                                        type="hidden">
                                                    <input id="TipCalif" style="text-align: center;"
                                                        class="form-control round" placeholder="Calificación"
                                                        type="hidden">
                                                </fieldset>
                                            </div>
                                        </div>

                                        <button type="button" id="btn_salir" class="btn grey btn-outline-secondary"
                                            data-dismiss="modal"><i class="ft-corner-up-left position-right"></i>
                                            Salir</button>
                                        <button type="button" id="btn_Conversa" onclick="$.AbrirConv('M');"
                                            style="display: none;" class="btn btn-outline-primary"><i
                                                class="ft-message-square position-right"></i> Comentarios</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </section>
    </div>

    {!! Form::open(['url' => '/ModuloE/EliminarEval', 'id' => 'formAuxiliar']) !!}
    {!! Form::close() !!}

    {!! Form::open(['url' => '/ModuloE/CargarAlumnosCalif', 'id' => 'formAuxiliarAlumnos']) !!}
    {!! Form::close() !!}

    {!! Form::open(['url' => '/ModuloE/CargarAlumnosCalifGrupo', 'id' => 'formAuxiliarAlumnosGrupo']) !!}
    {!! Form::close() !!}

    {!! Form::open(['url' => '/Consultar/RespEval', 'id' => 'formContenidoEva']) !!}
    {!! Form::close() !!}

    {!! Form::open(['url' => '/Calificaciones/consulPregAlumno', 'id' => 'formAuxiliarCargEval']) !!}
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

            $("#Men_Inicio").removeClass("active");
            $("#Men_Presentacion").removeClass("active");
            $("#Men_Modulos_E").addClass("has-sub open");
            $("#Men_ModulosE_addTem").addClass("active");

            $(".btnEliminar").on({
                click: function(e) {
                    e.preventDefault();
                    var boton = $(this);
                    var hijo = $(this).children('i');
                    console.log(hijo.attr('id'));
                    var fila = $(this).parents('tr');
                    var id = fila.data('id');
                    var form = $("#formAuxiliar");
                    $("#idAuxiliar").remove();
                    form.append("<input type='hidden' name='id' id='idAuxiliar' value='" + id + "'>");
                    var url = form.attr("action");
                    var datos = form.serialize();
                    var mensaje = "";

                    var cadena = fila.find("td:eq(8)").text();

                    mensaje = "¿Desea Eliminar esta Pregunta?";


                    Swal.fire({
                        title: 'Gestionar Módulo E',
                        text: mensaje,
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Si, Eliminar!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                type: "post",
                                url: url,
                                data: datos,
                                success: function(respuesta) {

                                    if (respuesta.estado === "ELIMINADO") {
                                        Swal.fire({
                                            title: "",
                                            text: respuesta.mensaje,
                                            icon: "success",
                                            button: "Aceptar"
                                        });
                                        $("#Preg" + id).hide();
                                    }

                                },
                                error: function() {

                                    mensaje = "La Pregunta no pudo ser Eliminada";

                                    Swal.fire(
                                        'Eliminado!',
                                        mensaje,
                                        'success'
                                    )
                                }
                            });
                        }
                    });
                }
            });

            let selectGrupo = "";
            let tablaAlumnos = "";

            $.extend({
                mostrarListEstudiantes: function(idEval) {

                    $("#idEvaluacion").val(idEval);

                    $("#titPractica").html("CALIFICACIÓN DE PRACTICA");
                    $("#listpracticas").hide();
                    $("#detCalificacion").show();
                    $("#tr_alumnos").html("");
                    ////CARGAR ALUMNOS DE GRADO Y GRUPO CORRESPONDIENTES AL TEMA 
                    let gradosel = $("#grado").val();
                    var form = $("#formAuxiliarAlumnos");
                    $("#gradoSel").remove();
                    $("#gradoSel").remove();
                    form.append("<input type='hidden' name='gradoSel' id='gradoSel' value='" +
                        gradosel + "'>");
                    form.append("<input type='hidden' name='eval' id='eval' value='" +
                        idEval + "'>");
                    var datos = form.serialize();
                    var url = form.attr("action");

                    $.ajax({
                        type: "POST",
                        url: url,
                        async: false,
                        data: datos,
                        success: function(respuesta) {

                            $.each(respuesta.alumnosGrupos, function(index, grupos) {
                                selectGrupo += "<option value='" + grupos.grupo +
                                    "'>Grupo " + grupos.grupo + "</option>";
                            });

                            $.dibujarRespuesta(respuesta);
                            $("#selGrupo").html(selectGrupo);
                        }
                    });
                },
                mostrasEval: function() {
                    $("#titPractica").html("Gestionar PRACTICAS");
                    $("#listpracticas").show();
                    $("#detCalificacion").hide();
                },
                cambioGrupo: function(idGrup) {
                    ////CARGAR ALUMNOS DE GRADO Y GRUPO CORRESPONDIENTES AL TEMA 
                    let gradosel = $("#grado").val();
                    let idEval = $("#idEvaluacion").val();


                    var form = $("#formAuxiliarAlumnosGrupo");
                    $("#gradoSel").remove();
                    $("#eval").remove();
                    $("#grupo").remove();
                    form.append("<input type='hidden' name='gradoSel' id='gradoSel' value='" +
                        gradosel + "'>");
                    form.append("<input type='hidden' name='eval' id='eval' value='" +
                        idEval + "'>");
                    form.append("<input type='hidden' name='grupo' id='grupo' value='" +
                        idGrup + "'>");
                    var datos = form.serialize();
                    var url = form.attr("action");
                    let selectGrupo = "";


                    $.ajax({
                        type: "POST",
                        url: url,
                        async: false,
                        data: datos,
                        success: function(respuesta) {
                            $.dibujarRespuesta(respuesta);
                        }
                    });
                },
                dibujarRespuesta: function(respuesta) {
                    let conse = 1;
                    tablaAlumnos = "";
                    $.each(respuesta.alumnosListado, function(index, listado) {
                        let colorCal = "";
                        let calificacion = "";
                        tablaAlumnos += "<tr>";
                        tablaAlumnos +=
                            '<td class="text-truncate"><button type="button" onclick="$.CalEval(' +
                            listado.id +
                            ');" class="btn btn-outline-success btn-sm"><i class="fa fa-check-square-o"></i> Calificar</button></td>';
                        tablaAlumnos += '<td class="text-truncate">' +
                            conse + '</td>';
                        tablaAlumnos += '<td class="text-truncate">' +
                            listado.ident_alumno + '</td>';
                        tablaAlumnos += '<td class="text-truncate">' +
                            listado.nalumno + '</td>';

                        if (listado.estado_eval == "CALIFICADA") {
                            var porcentaje = (parseInt(listado.puntuacion) /
                                parseInt(listado.punt_max)) * 100;
                            console.log(porcentaje);
                            if (porcentaje <= 50) {
                                colorCal = "#f20d00";
                            } else if (porcentaje > 50 && porcentaje <=
                                60) {
                                colorCal = "#F08D0E";
                            } else if (porcentaje > 60 && porcentaje <=
                                70) {
                                colorCal = "#F5DA00";
                            } else if (porcentaje > 70 && porcentaje <=
                                80) {
                                colorCal = "#C0EA1C";
                            } else if (porcentaje > 80 && porcentaje <=
                                100) {
                                colorCal = "#1ECD60";
                            }

                            if (listado.calif_usando === "Puntos") {
                                calificacion = "Calificada (" + listado.puntuacion + "/" +
                                    listado.punt_max+")";
                            } else if (listado.calif_usando ===
                                "Porcentaje") {
                                calificacion = porcentaje + "%";
                            } else {
                                switch (true) {
                                    case (porcentaje < 30):
                                        calificacion =
                                            "Deficiente (D) - (" + listado
                                            .puntuacion + "/" + listado
                                            .punt_max + ")"
                                        break;
                                    case (porcentaje >= 30 && porcentaje <
                                        65):
                                        calificacion =
                                            "Insuficiente - (I) (" + listado
                                            .puntuacion + "/" + listado
                                            .punt_max + ")"
                                        break;
                                    case (porcentaje >= 65 && porcentaje <
                                        80):
                                        calificacion = "Aceptable (A) - (" +
                                            listado.puntuacion + "/" +
                                            listado.punt_max + ")"
                                        break;
                                    case (porcentaje >= 80 && porcentaje <
                                        95):
                                        calificacion =
                                            "Sobresaliente (S) - (" +
                                            listado.puntuacion + "/" +
                                            listado.punt_max + ")"
                                        break;
                                    case (porcentaje >= 95):
                                        calificacion = "Excelente (E) - (" +
                                            listado.puntuacion + "/" +
                                            listado.punt_max + ")"

                                        $("#txt_califVis").val(
                                            "Excelente (E)");
                                        break;
                                }
                            }

                        } else {
                            calificacion = "Pendiente"
                        }



                        tablaAlumnos +=
                            '<td class="text-truncate"><span class="badge badge-default badge-secondary" style="background-color: ' +
                            colorCal + '">' + calificacion +
                            '</span></td>';

                        tablaAlumnos += "</tr>";
                        conse++;
                    });
                    $("#tr_alumnos").html(tablaAlumnos);
                },
                CalEval: function(id) {
               
                    if (id == undefined) {
                        Swal.fire({
                            title: "",
                            text: 'Este Alumno no ha Presentado la Practica',
                            icon: "warning",
                            button: "Aceptar",
                        });
                    } else {
                        
                        $("#large").modal({
                            backdrop: 'static',
                            keyboard: false
                        });
                        var form = $("#formContenidoEva");
                        $("#idRespEval").remove();
                        form.append("<input type='hidden' name='idRespEval' id='idRespEval' value='" +
                            id + "'>");
                        var url = form.attr("action");
                        var datos = form.serialize();
                        $.ajax({
                            type: "POST",
                            url: url,
                            data: datos,
                            async:true,
                            dataType: "json",
                            success: function(respuesta) {
                                $("#idAlumno").val(respuesta.Evaluacion.alumno);
                                $("#titu_tema").html(respuesta.Evaluacion.titulo);

                                $("#h3_alumno").html(respuesta.Evaluacion.nombre_alumno +
                                    " " + respuesta.Evaluacion.apellido_alumno);

                                var Puntos = respuesta.Evaluacion.puntuacion;
                                var puntmax = respuesta.Evaluacion.punt_max;
                                var calfvis = respuesta.Evaluacion.calificacion;
                                $("#idAlumno").val(respuesta.Evaluacion.alumno);

                                $("#enunciado").html(respuesta.Evaluacion.enunciado);
                                $("#txt_calif").val(Puntos);
                                $("#txt_califMax").val(puntmax);
                                $("#txt_califVis").val(calfvis);

                                $("#TipCalif").val(respuesta.Evaluacion.calif_usando);

                                $("#fechp").html("<b>Fecha de Presentación:</b> " +
                                    respuesta.Evaluacion.fecha_pres);
                                $("#tocupado").html("<b>Tiempo Ocupado:</b> " + respuesta
                                    .Evaluacion.tiempo_usado);
                                $("#irealizados").html("<b>Intentos Realizados:</b> " +
                                    respuesta.int_perm);

                                var contenido =
                                    '  <div class="row"><div class="card-content collapse show">' +
                                    '  <div class="card-body" style="padding-top: 0px;">' +
                                    '        <form method="post" action="{{ url('/') }}/Guardar/GuardarPuntPreg" id="formGuarCalPunt" class="number-tab-stepsPreg wizard-circle">';
                                var Preg = 1;
                                var ConsPre = 0;

                                $.MostrCal(Puntos, puntmax, calfvis);

                                ////////////////CARGAR PREGUNTAS
                                $.each(respuesta.PregEval, function(i, item) {
                                    contenido += '         <h6>Pregunta</h6>' +
                                        '         <fieldset>' +
                                        '              <div class="row p-1">' +
                                        '   <div  style="width: 100%" class="bs-callout-primary callout-border-right callout-bordered callout-transparent p-1" >' +
                                        '              <div class="row" >' +
                                        '<input type="hidden" id="id-pregunta' +
                                        ConsPre + '"  value="' + item.idpreg +
                                        '" />' +
                                        '<input type="hidden" id="tip-pregunta' +
                                        ConsPre + '"  value="' + item.tipo +
                                        '" />' +
                                        '      <div class="col-md-9"><h4 class="primary">Pregunta ' +
                                        Preg + '</h4></div>' +
                                        '      <div class="col-md-3">' +
                                        '    <fieldset >' +
                                        '        <div class="input-group">' +
                                        '          <input type="hidden" class="form-control" id="puntajeOcul' +
                                        ConsPre + '"' +
                                        '    name="puntaje" value="10" placeholder="Puntaje" aria-describedby="basic-addon2">' +
                                        '          <input type="text" class="form-control" onblur="$.ValPunt(' +
                                        ConsPre +
                                        ');" onFocus="$.RestCal(this.id)"  id="puntaje' +
                                        ConsPre + '"' +
                                        '    name="puntaje" value="10" placeholder="Puntaje" aria-describedby="basic-addon2">' +
                                        '          <div class="input-group-append">' +
                                        '            <span class="input-group-text" id="basic-addon2">Puntos</span>' +
                                        '          </div>' +
                                        '        </div>' +
                                        '      </fieldset>' +
                                        '</div>' +
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

                                //////////////////////

                                contenido += '</form>' +
                                    ' </div>' +
                                    '</div></div>';

                                $("#cont_eva").html(contenido);
                                

                                $.CargPreg("0");

                                $(".number-tab-stepsPreg").steps({
                                    headerTag: "h6",
                                    bodyTag: "fieldset",
                                    transitionEffect: "fade",
                                    titleTemplate: '<span class="step">#index#</span> #title#',
                                    labels: {
                                        finish: 'Finalizar'
                                    },
                                    onFinished: function(event, currentIndex) {
                                        $.GuarPunt(currentIndex, 'Ultima');
                                        if (flagGlobal === "s") {
                                            return;
                                        }

                                    },
                                    onStepChanging: function(event, currentIndex,
                                        newIndex) {
                                        // Allways allow previous action even if the current form is not valid!
                                        $.GuarPunt(currentIndex, 'next');
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

                            }

                        });
                    }
                },
                CargPreg: function(id) {

                    var form = $("#formAuxiliarCargEval");
                    var Preg = $("#id-pregunta" + id).val();
                    var tipo = $("#tip-pregunta" + id).val();
                    var IdLib = $("#idRespEval").val();

                    var opci = "";
                    var parr = "";
                    var punt = "";

                    $("#Pregunta").remove();
                    $("#TipPregunta").remove();
                    $("#IdLibCalif").remove();
                    form.append("<input type='hidden' name='Pregunta' id='Pregunta' value='" +
                        Preg + "'>");
                    form.append(
                        "<input type='hidden' name='TipPregunta' id='TipPregunta' value='" + tipo +
                        "'>");
                    form.append(
                        "<input type='hidden' name='IdLibCalif' id='IdLibCalif' value='" + IdLib +
                        "'>");
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
                            if (tipo === "PREGENSAY") {
                                $("#RespEvalEnsayo").remove();
                                $("#Retro").remove();
                                $("#puntajeOcul" + id).val(respuesta.PregEnsayo.puntaje);

                                $("#puntaje" + id).val(respuesta.PuntAct);
                                Pregunta += respuesta.PregEnsayo.pregunta;
                                Pregunta += '<div class="col-xl-12 col-lg-6 col-md-12">' +
                                    '   <label style="font-weight:bold;" for="placeTextarea">Respuesta Estudiante:</label>' +
                                    ' <div id="RespEvalEnsayo"></div>' +
                                    ' </div>';

                                    Pregunta += '<div id="Retro" class="col-xl-12 col-lg-6 col-md-12 pt-1">' +
                                        '   <label style="font-weight:bold;" for="placeTextarea">Retroalimentacion:</label>' +
                                        '<div><textarea cols="80" id="Resptroalimentacion" name="Resptroalimentacion"' +
                                        ' rows="3"></textarea></div>' +
                                        ' </div>';

                                $("#Pregunta" + id).html(Pregunta);
                                if (respuesta.RespPregEnsayo) {
                                    $('#RespEvalEnsayo').html(respuesta.RespPregEnsayo
                                        .respuesta);
                                }

                                $.hab_editRetro();
                                if (respuesta.Retro) {
                                    $('#Resptroalimentacion').val(respuesta.Retro);
                                }

                            } else if (tipo === "COMPLETE") {
                                $("#RespPregComplete").remove();
                                $("#Retro").remove();
                                $("#puntajeOcul" + id).val(respuesta.PregComple.puntaje);
                                $("#puntaje" + id).val(respuesta.PuntAct);
                                Pregunta += '<div class="col-xl-12 col-lg-6 col-md-12">' +
                                    '   <label for="placeTextarea">Complete el Parrafo con las siguientes Opciones:</label>' +
                                    '<p>' + respuesta.PregComple.opciones + '</p>' +
                                    ' <div id=""></div>' +
                                    ' </div>';
                                    Pregunta += '<div id="Retro" class="col-xl-12 col-lg-6 col-md-12 pt-1">' +
                                        '   <label style="font-weight:bold;" for="placeTextarea">Retroalimentacion:</label>' +
                                        '<div><textarea cols="80" id="Resptroalimentacion" name="Resptroalimentacion"' +
                                        ' rows="3"></textarea></div>' +
                                        ' </div>';
                      
                                $("#Pregunta" + id).html(Pregunta);
                                $('#RespPregComplete').html(respuesta.PregComple.parrafo);
                                if (respuesta.RespPregComple) {
                                    $('#RespPregComplete').html(respuesta.RespPregComple
                                        .respuesta);
                                }
                                $.hab_editRetro();
                                if (respuesta.Retro) {
                                    $('#Resptroalimentacion').val(respuesta.Retro);
                                }

                            } else if (tipo === "OPCMULT") {
                                $("#puntajeOcul" + id).val(respuesta.PregMult.puntuacion);
                                $("#Retro").remove();
                                $("#puntaje" + id).val(respuesta.PuntAct);
                                $("#puntaje" + id).prop("disabled", true);
                                Pregunta +=
                                    '<div class="pb-1"><input type="hidden"  name="PreguntaOpc" value="' +
                                    respuesta.PregMult.id + '" />' + respuesta.PregMult
                                    .pregunta + '</div>';
                                opciones = '';
                                var l = 1;
                                $.each(respuesta.OpciMult,
                                    function(k, itemo) {

                                        if ($.trim(itemo
                                                .pregunta
                                            ) === $
                                            .trim(respuesta.PregMult.id)) {
                                            if (respuesta.RespPregMul) {
                                                opciones +=
                                                    '<fieldset>';
                                                if ($.trim(respuesta.RespPregMul
                                                        .respuesta) === $.trim(itemo
                                                        .id)) {
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


                                                opciones +=
                                                    ' <label for="input-15"> ' +
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
                                                    '<input disabled id="' +
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

                            var Retro = '<div id="Retro" class="col-xl-12 col-lg-6 col-md-12 pt-1">' +
                                        '<label style="font-weight:bold;" for="placeTextarea">Retroalimentacion:</label>' +
                                        '<div><textarea cols="80" id="Resptroalimentacion" name="Resptroalimentacion"' +
                                        ' rows="3"></textarea></div>' +
                                        '</div>';
                      
                                $("#Pregunta" + id).html(Pregunta + opciones + Retro);
                                $.hab_editRetro();
                                if (respuesta.Retro) {
                                    $('#Resptroalimentacion').val(respuesta.Retro);
                                }

                            } else if (tipo === "VERFAL") {
                                $("#puntajeOcul" + id).val(respuesta.PregVerFal.puntaje);
                                $("#puntaje" + id).val(respuesta.PuntAct);
                                $("#puntaje" + id).prop("disabled", true);
                                $("#Retro").remove();

                                Pregunta += respuesta.PregVerFal.pregunta;
                                var Opc =
                                    '<div class="form-group row">' +
                                    '<div class="col-md-12">' +
                                    '    <fieldset >' +
                                    '        <div class="input-group">';

                                Opc +=
                                    '<input name="radpregVerFal[]" id="RadVer'+ id+'" value="si"  type="radio">';

                                Opc +=
                                    ' <div class="input-group-append" style="margin-left:5px;">' +
                                    '            <span  id="basic-addon2">Verdadero</span>' +
                                    '          </div>' +
                                    '        </div>' +
                                    '      </fieldset>' +
                                    '</div>' +
                                    '<div  class="col-md-12">' +
                                    '    <fieldset >' +
                                    '        <div class="input-group">';
                                Opc +=
                                    ' <input name="radpregVerFal[]" id="RadFal'+ id+'"  value="no"  type="radio">';
                                Opc +=
                                    '<div class="input-group-append" style="margin-left:5px;">' +
                                    '            <span  id="basic-addon2">Falso</span>' +
                                    '          </div>' +
                                    '        </div>' +
                                    '      </fieldset>' +
                                    '</div>' +
                                    '            </div>';

                                    var Retro =  '<div id="Retro" class="col-xl-12 col-lg-6 col-md-12 pt-1">' +
                                        '   <label style="font-weight:bold;" for="placeTextarea">Retroalimentacion:</label>' +
                                        '<div><textarea cols="80" id="Resptroalimentacion" name="Resptroalimentacion"' +
                                        ' rows="3"></textarea></div>' +
                                        ' </div>';


                                $("#Pregunta" + id).html(Pregunta + Opc+Retro);

                                if (respuesta.RespPregVerFal) {
                                    if (respuesta.RespPregVerFal.respuesta_alumno ===
                                        "si") {
                                        $('#RadVer'+id).prop("checked", "checked");
                                    } else {
                                        $('#RadFal'+id).prop("checked", "checked");
                                    }
                                }
                                $.hab_editRetro();
                                if (respuesta.Retro) {
                                    $('#Resptroalimentacion').val(respuesta.Retro);
                                }
                            } else if (tipo === "RELACIONE") {
                                $("#puntajeOcul" + id).val(respuesta.PregRelacione.puntaje);
                                $("#puntaje" + id).val(respuesta.PuntAct);
                                $("#puntaje" + id).prop("disabled", true);
                                $("#Retro").remove();
                                var enun = respuesta.PregRelacione.enunciado;
                                if (enun === null) {
                                    enun = "";
                                }
                                Pregunta += '<div class="row"><div class="col-md-12"><p>' +
                                    enun + '</p></div></div><div class="row">';
                                var j = 1;
                                var selectPreg = '';
                                var cons = 1;

                                $.each(respuesta.PregRelIndi, function(k, item) {

                                    selectPreg = '<div class="contenedor' + cons +
                                        '">' +
                                        '    <div class="selectbox">' +
                                        '        <div class="select" id="select' +
                                        cons + '">' +
                                        '            <div class="contenido-select">' +
                                        '               <h5 class="titulo">Seleccione Una Respuesta</h5>' +
                                        '            </div>' +
                                        '           <i class="fa fa-angle-down"></i>' +
                                        '       </div>' +
                                        '<div class="opciones" id="opciones' +
                                        cons + '">';
                                    var j = 1;
                                    $.each(respuesta.PregRelResp, function(k,
                                        itemr) {
                                        selectPreg +=
                                            ' <a id="' + j +
                                            '" data-id="' + itemr.id +
                                            '" class="opcion">' +
                                            '<div class="contenido-opcion">' +
                                            itemr.respuesta +
                                            '     </div>' +
                                            '   </a>';
                                        j++;
                                    });
                                    selectPreg += '</div>' +
                                        '   </div>' +
                                        '    <input type="hidden"  name="RespSelect[]" id="RespSelect' +
                                        cons + '" value="">' +
                                        '    <input type="hidden"  name="RespPreg[]" value="' +
                                        item.id + '">' +
                                        '    <input type="hidden"  name="ConsPreg[]" id="ConsPreg' +
                                        cons + '" value="">' +
                                        ' </div>';
                                    Pregunta +=
                                        '<div class="col-md-6 pb-2" style="display: flex;align-items: center;justify-content: center;"> <div  id="DivInd' +
                                        j + '">' + item.definicion + '</div></div>';
                                    Pregunta +=
                                        '<div class="col-md-6 pb-2"> <div id="DivRes' +
                                        j + '">' + selectPreg + '</div></div>';
                                    cons++;
                                });

                                Pregunta += '</div>';

                                Pregunta += '<div id="Retro" class="col-xl-12 col-lg-6 col-md-12 pt-1">' +
                                    '   <label style="font-weight:bold;" for="placeTextarea">Retroalimentacion:</label>' +
                                    '<div><textarea cols="80" id="Resptroalimentacion" name="Resptroalimentacion"' +
                                    ' rows="3"></textarea></div>' +
                                    ' </div>';

                                $("#Pregunta" + id).html(Pregunta);
                                cons = 1;
                                $.each(respuesta.PregRelIndi, function(k, item) {
                                    const select = document.querySelector(
                                        '#select' + cons);
                                    const opciones = document.querySelector(
                                        '#opciones' + cons);
                                    const contenidoSelect = document.querySelector(
                                        '#select' + cons + ' .contenido-select');
                                    const hiddenInput = document.querySelector(
                                        '#inputSelect' + cons);

                                    document.querySelectorAll('#opciones' + cons +
                                        ' > .opcion').forEach((opcion) => {
                                        opcion.addEventListener('click', (
                                            e) => {
                                            e.preventDefault();
                                            contenidoSelect
                                                .innerHTML = e
                                                .currentTarget
                                                .innerHTML;
                                            select.classList.toggle(
                                                'active');
                                            opciones.classList
                                                .toggle('active');
                                        });
                                    });

                                    select.addEventListener('click', () => {
                                        select.classList.toggle('active');
                                        opciones.classList.toggle('active');
                                    });
                                    cons++;

                                });

                                cons = 1;
                                $.each(respuesta.RespPregRelacione, function(k, item) {
                                    const select = document.querySelector(
                                        '#select' + cons);
                                    const opciones = document.querySelector(
                                        '#opciones' + cons);
                                    const contenidoSelect = document.querySelector(
                                        '#select' + cons + ' .contenido-select');
                                    const hiddenInput = document.querySelector(
                                        '#inputSelect' + cons);
                                    const sel = document.querySelectorAll(
                                        '#opciones' + cons + ' > .opcion')

                                        for (var i = 0; i < sel.length; i++) {
                                            var item2 = sel[i];
                                            let optioSel=item2.getAttribute('data-id');
                                            if(item.respuesta_alumno==optioSel){
                                                
                                                contenidoSelect.innerHTML = sel[i].innerHTML;
                                            }
    
                                          }
                                    select.classList.toggle('active');
                                    $.selopc(item.consecu, cons)
                                    cons++;
                                });

                                $.hab_editRetro();
                                if (respuesta.Retro) {
                                    $('#Resptroalimentacion').val(respuesta.Retro);
                                }

                            } else if (tipo === "TALLER") {
                                $("#puntajeOcul" + id).val(respuesta.PregTaller.puntaje);
                                $("#puntaje" + id).val(respuesta.PuntAct);
                                $("#CargArchi").val("");
                                $("#Retro").remove();


                                Pregunta +=
                                    '<div class="row"><div class="col-md-12 pb-1">' +
                                    ' <label class="form-label " for="imagen">Ver Archivo Cargado:</label>' +
                                    ' <div class="btn-group" role="group" aria-label="Basic example">' +
                                    '   <button id="idimg' + id +
                                    '" type="button" data-archivo="' + respuesta.PregTaller
                                    .nom_archivo +
                                    '" onclick="$.MostArc(this.id);" class="btn btn-success"><i' +
                                    '             class="fa fa-download"></i> Descargar Archivo</button>' +
                                    '      </div>' +
                                    '</div></div>';

                                Pregunta += ' <div class="row">' +
                                    '   <div class="col-md-12">' +
                                    '       <div class="form-group" id="divarchi'+id+'">' +
                                    '       <h6 class="form-section"><strong>Agregar Desarrollo de Taller: </strong> </h6>' +
                                    '             <input id="archiTaller"  name="archiTaller" type="file">' +
                                    '       </div>' +
                                    '  </div>' +
                                    '</div>';

                                    Pregunta += '<div id="Retro" class="col-xl-12 col-lg-6 col-md-12 pt-1">' +
                                        '   <label style="font-weight:bold;" for="placeTextarea">Retroalimentacion:</label>' +
                                        '<div><textarea cols="80" id="Resptroalimentacion" name="Resptroalimentacion"' +
                                        ' rows="3"></textarea></div>' +
                                        ' </div>';

                                $("#Pregunta" + id).html(Pregunta);

                                var archivo = "";

                                if (respuesta.RespPregTaller) {
                                    $("#CargArchi").val(respuesta.RespPregTaller.archivo);
                                    archivo +=
                                        ' <div class="form-group" id="id_file" style="display:none;">' +
                                        '<label class="form-label " for="imagen">Agregar Desarrollo de Taller: </label>' +
                                        '<input type="file" id="archiTaller" name="archiTaller" />' +
                                        '</div>' +
                                        '<div class="form-group" id="id_verf">' +
                                        '<label class="form-label " for="imagen">Ver Desarrollo de Taller: </label>' +
                                        '<div class="btn-group" role="group" aria-label="Basic example">' +
                                        '<button type="button" id="archi" onclick="$.VerArchResp(this.id);" data-archivo="' +
                                        respuesta.RespPregTaller.archivo +
                                        '" class="btn btn-success"><i' +
                                        '            class="fa fa-search"></i> Ver Archivo</button>' +
                                        ' </div>' +
                                        ' </div>';

                                    $("#divarchi"+id).html(archivo);
                                }

                                $.hab_editRetro();
                                if (respuesta.Retro) {
                                    $('#Resptroalimentacion').val(respuesta.Retro);
                                }

                            }

                            

                        }

                    });

                },
                MostrCal: function(punt, max, calf) {
                    var porcentaje = (parseInt(punt) / parseInt(max)) * 100;
                    if (porcentaje <= 50) {
                        $("#txt_califVis").css('background-color', '#f20d00');
                    } else if (porcentaje > 50 && porcentaje <= 60) {
                        $("#txt_califVis").css('background-color', '#F08D0E');
                    } else if (porcentaje > 60 && porcentaje <= 70) {
                        $("#txt_califVis").css('background-color', '#F5DA00');
                    } else if (porcentaje > 70 && porcentaje <= 80) {
                        $("#txt_califVis").css('background-color', '#C0EA1C');
                    } else if (porcentaje > 80 && porcentaje <= 100) {
                        $("#txt_califVis").css('background-color', '#1ECD60');
                    }

                },
                hab_editRetro: function() {
                    CKEDITOR.replace('Resptroalimentacion', {
                        width: '100%',
                        height: 100
                    });
                },
                VerArchResp: function(id) {
                    window.open($('#Respdattaller').data("ruta") + "/" + $('#' + id).data("archivo"),
                        '_blank');
                },
                selopc: function(id, cons) {
                    $("#RespSelect" + cons).val($("#" + id).data("id"));
                    $("#ConsPreg" + cons).val(id);

                },
                MostArc: function(id) {
                    window.open($('#dattaller').data("ruta") + "/" + $('#' + id).data("archivo"),
                        '_blank');
                },
                RestCal: function(id) {
                    $("#" + id).select();
                    var puntNew = $("#" + id).val();
                    var puntAct = $("#txt_calif").val();

                    if (puntNew !== "") {
                        var Calact = parseInt(puntAct) - parseInt(puntNew);

                        $("#txt_calif").val(Calact);
                    }


                },
                ValPunt: function(id) {
                    var puntPreg = $("#puntajeOcul" + id).val();
                    var puntAct = $("#puntaje" + id).val();

                    if (parseInt(puntAct) > parseInt(puntPreg)) {
                        mensaje = "El Puntaje no debe ser Mayor a " + puntPreg + " Puntos";
                        Swal.fire({
                            title: "Notificación de Evaluación",
                            text: mensaje,
                            icon: "warning",
                            button: "Aceptar",
                        });
                        puntAct = $("#puntaje" + id).val("");
                        return;
                    }


                    $.CalCalif(id);

                },
                CalCalif: function(id) {
                    if ($("#puntaje" + id).val() !== "") {
                        var Puntos = $("#txt_calif").val();
                        var puntmax = $("#txt_califMax").val();
                        var TipCali = $("#TipCalif").val();

                        var newpuntos = parseInt(Puntos) + parseInt($("#puntaje" + id).val());

                        $("#txt_calif").val(newpuntos)

                        var porcentaje = (parseInt(newpuntos) / parseInt(puntmax)) * 100;
                        if (porcentaje <= 50) {
                            $("#txt_califVis").css('background-color', '#f20d00');
                        } else if (porcentaje > 50 && porcentaje <= 60) {
                            $("#txt_califVis").css('background-color', '#F08D0E');
                        } else if (porcentaje > 60 && porcentaje <= 70) {
                            $("#txt_califVis").css('background-color', '#F5DA00');
                        } else if (porcentaje > 70 && porcentaje <= 80) {
                            $("#txt_califVis").css('background-color', '#C0EA1C');
                        } else if (porcentaje > 80 && porcentaje <= 100) {
                            $("#txt_califVis").css('background-color', '#1ECD60');
                        }

                        if (TipCali === "Puntos") {
                            $("#txt_califVis").val(newpuntos + "/" + puntmax);
                        } else if (TipCali === "Porcentaje") {
                            $("#txt_califVis").val(porcentaje + "%");
                        } else {
                            switch (true) {
                                case (porcentaje < 30):
                                    $("#txt_califVis").val("Deficiente (D)");
                                    break;
                                case (porcentaje >= 30 && porcentaje < 65):
                                    $("#txt_califVis").val("Insuficiente (I)");
                                    break;
                                case (porcentaje >= 65 && porcentaje < 80):
                                    $("#txt_califVis").val("Aceptable (A)");
                                    break;
                                case (porcentaje >= 80 && porcentaje < 95):
                                    $("#txt_califVis").val("Sobresaliente (S)");
                                    break;
                                case (porcentaje >= 95):
                                    $("#txt_califVis").val("Excelente (E)");
                                    break;
                            }
                        }
                    }
                },
                GuarPunt: function(id, npreg) {
               

                    for (var instanceName in CKEDITOR.instances) {
                        CKEDITOR.instances[instanceName].updateElement();
                    }
                    
                    var form = $("#formGuarCalPunt");
                    var url = form.attr("action");
                    var IdEval = $("#idEvaluacion").val();
                    var Alumno = $("#idAlumno").val();
                    var token = $("#token").val();
                    var Id_Doce = $("#Id_Doce").val();
                    var Preg = $("#id-pregunta" + id).val();
                    var Punt = $("#puntaje" + id).val();
                    var tipo = $("#tip-pregunta" + id).val();
                    var PunMmax = $("#txt_califMax").val();
                    
                   if (Punt === "") {
                        flagGlobal = "s";
                        mensaje = "Debe de Ingresar la Puntuación de esta Pregunta.";
                        Swal.fire({
                            title: "NOTIFICACIÓN DE CALIFICACIONES",
                            text: mensaje,
                            icon: "warning",
                            button: "Aceptar",
                        });
                        return;
                    } else {
                        flagGlobal = "n";

                    }


                    $("#Pregunta").remove();
                    $("#TipPregunta").remove();
                    $("#nPregunta").remove();
                    $("#IdEvaluacion").remove();
                    $("#IdAlum").remove();
                    $("#idtoken").remove();
                    $("#Puntaje").remove();
                    $("#PMax").remove();

                    form.append("<input type='hidden' name='Pregunta' id='Pregunta' value='" +
                        Preg + "'>");
                    form.append("<input type='hidden' name='nPregunta' id='nPregunta' value='" +
                        npreg + "'>");
                    form.append(
                        "<input type='hidden' name='TipPregunta' id='TipPregunta' value='" + tipo +
                        "'>");
                    form.append("<input type='hidden' name='IdEvaluacion' id='IdEvaluacion' value='" +
                        IdEval + "'>");
                    form.append("<input type='hidden' id='idtoken' name='_token'  value='" + token +
                        "'>");
                    form.append("<input type='hidden' id='IdAlum' name='IdAlum'  value='" + Alumno +
                        "'>");
                    form.append("<input type='hidden' id='Puntaje' name='Puntaje'  value='" + Punt +
                        "'>");

                    form.append("<input type='hidden' id='PMax' name='PMax'  value='" + PunMmax +
                        "'>");
                    var datos = form.serialize();
                    var contenido = "";
                    let grupo = $("#selGrupo").val();
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: datos,
                        async: true,
                        dataType: "json",
                        success: function(respuesta) {
                            var j = 1;
                         
                            $.cambioGrupo(grupo);
                            
                            Swal.fire({
                                title: "",
                                text: "Calificación Guardada Exitosamente",
                                icon: "success",
                                button: "Aceptar",
                            });

                        }
                    });

                },
                   /////////////GUARDAR EVALUACION////////////////////////////
                   GuarCalEval: function() {


                    if ($("#TipEva").val() === "GRUPREGUNTA") {

                        var form = $("#EvalGrupPreg");
                        var url = form.attr("action");
                        var token = $("#token").val();
                        var txt_califVis = $("#txt_califVis").val();
                        var txt_calif = $("#txt_calif").val();
                        var puntTotal = 0;
                        form.append("<input type='hidden' name='_token'  value='" + token + "'>");
                        form.append("<input type='hidden' name='CalfVis'  value='" + txt_califVis +
                            "'>");
                        form.append("<input type='hidden' name='Calf'  value='" + txt_calif + "'>");
                        var datos = form.serialize();
                        $.ajax({
                            type: "POST",
                            url: url,
                            data: datos,
                            dataType: "json",
                            success: function(respuesta) {

                                $.each(respuesta.Alumno, function(i, item) {

                                    contenido += '<tr data-id="' + item.id +
                                        '" id="' + item.id + '">' +
                                               '  <td class="text-truncate">' + j +
                                        '</td>'+
                                        '  <td class="text-truncate">' + item
                                        .nombre_alumno + " " + item
                                        .apellido_alumno + '</td>' +
                                        '  <td class="text-truncate">Grado ' + item
                                        .grado_alumno + '°</td>';
                                    if (item.evaluacion === null) {
                                        contenido +=
                                            '  <td class="text-truncate">Pendiente</td>';
                                    } else {
                                        contenido +=
                                            '  <td class="text-truncate">Presentada</td>';
                                    }
                                    var puntMax = respuesta.PuntMax;
                                    var clase = 'btn bg-info btn-round mr-1 mb-1';
                                    if (item.puntuacion !== null) {

                                        var Punt = item.puntuacion.split("/");
                                        var porc = (Punt[0] / puntMax) * 100;
                                        switch (true) {
                                            case (porc <= 50):
                                                clase =
                                                    'btn btn-danger btn-round mr-1 mb-1';
                                                break;
                                            case (porc > 50 && porc <= 60):
                                                clase =
                                                    'btn bg-warning  btn-round mr-1 mb-1';
                                                break;
                                            case (porc > 60 && porc <= 70):
                                                clase =
                                                    'btn bg-warning  btn-round mr-1 mb-1';
                                                break;
                                            case (porc > 70 && porc <= 80):
                                                clase =
                                                    'btn bg-success btn-round mr-1 mb-1';
                                                break;
                                            case (porc > 80 && porc <= 100):
                                                clase =
                                                    'btn bg-success btn-round mr-1 mb-1';
                                                break;
                                        }

                                        Calf = item.calificacion;
                                    } else {
                                        Calf = "0/" + puntMax;
                                        clase = 'btn bg-info btn-round mr-1 mb-1';
                                    }

                                    contenido +=
                                        '<td class="text-truncate" style="vertical-align: middle;">';
                                    contenido += ' <button type="button"  class="' +
                                        clase + '">' + Calf + '</button>';
                                    contenido += ' </td>';
                                    contenido += '  <td class="text-truncate">' +
                                        '  <a onclick="$.CalEval(' + item.id +
                                        ');" data-toggle="tooltip" title="Calificar" class="btn btn-icon btn-outline-info btn-social-icon btn-sm"><i class="fa fa-check-square-o"></i></a>' +
                                        '  </td>' +
                                        '  </tr>';
                                });
                                $("#Tb_Alumnos").html(contenido);
                                Swal.fire({
                                    title: "",
                                    text: "Calificación Guardada Exitosamente",
                                    icon: "success",
                                    button: "Aceptar",
                                });
                            },
                            error: function() {
                                mensaje = "La Evaluación no pudo ser Guardada";
                                Swal.fire({
                                    title: "",
                                    text: mensaje,
                                    icon: "warning",
                                    button: "Aceptar",
                                });
                            }
                        });
                    } else {
                        var form = $("#formGuarCalEval");
                        var contenido = '';
                        $("#idRespEval").remove();
                        $("#califVis").remove();
                        $("#idRespEval").remove();
                        $("#calif").remove();
                        $("#Evalu").remove();
                        var id = $("#Id_PregEns").val();
                        var calif = $("#txt_calif").val();
                        var califVis = $("#txt_califVis").val();
                        var IdEval = $("#idEvaluacion").val();
                        form.append("<input type='hidden' name='califVis' id='califVis' value='" +
                            califVis + "'>\n\
                                <input type='hidden' name='idRespEval' id='idRespEval' value='" + id + "'>\n\
                                   <input type='hidden' name='calif' id='calif' value='" + calif + "'>\n\
                                    <input type='hidden' name='Evalu' id='Evalu' value='" + IdEval + "'>");
                        var url = form.attr("action");
                        var datos = form.serialize();
                        $.ajax({
                            type: "POST",
                            url: url,
                            data: datos,
                            dataType: "json",
                            success: function(respuesta) {
                                var j = 1;
                                $.each(respuesta.Alumno, function(i, item) {

                                    contenido += '<tr data-id="' + item.id +
                                        '" id="' + item.id + '">' +
                                        '  <td class="text-truncate">' + j +
                                        '</td>'+
                                    '  <td class="text-truncate">' + item
                                        .nombre_alumno + " " + item
                                        .apellido_alumno + '</td>' +
                                        '  <td class="text-truncate">Grado ' + item
                                        .grado_alumno + '°</td>';
                                    if (item.evaluacion === null) {
                                        contenido +=
                                            '  <td class="text-truncate">Pendiente</td>';
                                    } else {
                                        contenido +=
                                            '  <td class="text-truncate">Presentada</td>';
                                    }
                                    var puntMax = respuesta.PuntMax;
                                    var clase = 'btn bg-info btn-round mr-1 mb-1';
                                    if (item.puntuacion !== null) {

                                        var Punt = item.puntuacion.split("/");
                                        var porc = (Punt[0] / puntMax) * 100;
                                        switch (true) {
                                            case (porc <= 50):
                                                clase =
                                                    'btn btn-danger btn-round mr-1 mb-1';
                                                break;
                                            case (porc > 50 && porc <= 60):
                                                clase =
                                                    'btn bg-warning  btn-round mr-1 mb-1';
                                                break;
                                            case (porc > 60 && porc <= 70):
                                                clase =
                                                    'btn bg-warning  btn-round mr-1 mb-1';
                                                break;
                                            case (porc > 70 && porc <= 80):
                                                clase =
                                                    'btn bg-success btn-round mr-1 mb-1';
                                                break;
                                            case (porc > 80 && porc <= 100):
                                                clase =
                                                    'btn bg-success btn-round mr-1 mb-1';
                                                break;
                                        }

                                        Calf = item.calificacion;
                                    } else {
                                        Calf = "0/" + puntMax;
                                        clase = 'btn bg-info btn-round mr-1 mb-1';
                                    }

                                    contenido +=
                                        '<td class="text-truncate" style="vertical-align: middle;">';
                                    contenido += ' <button type="button"  class="' +
                                        clase + '">' + Calf + '</button>';
                                    contenido += ' </td>';
                                    contenido += '  <td class="text-truncate">' +
                                        '  <a onclick="$.CalEval(' + item.id +
                                        ');" data-toggle="tooltip" title="Calificar" class="btn btn-icon btn-outline-info btn-social-icon btn-sm"><i class="fa fa-check-square-o"></i></a>' +
                                        '  </td>' +
                                        '  </tr>';
                                    j++;
                                });
                                $("#Tb_Alumnos").html(contenido);
                                Swal.fire({
                                    title: "",
                                    text: 'Operación Realizada Exitosamente',
                                    icon: "success",
                                    button: "Aceptar",
                                });
                            }
                        });
                    }

                },
            })


        });
    </script>
@endsection
