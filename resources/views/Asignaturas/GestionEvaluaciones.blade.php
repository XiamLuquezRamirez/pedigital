@extends('Plantilla.Principal')
@section('title', 'Gestionar de Evaluaciones')
@section('Contenido')
    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
    <input type="hidden" name="idtema" id="idtema" value="{{ $id }}">
    <input type="hidden" name="idAsigGrado" id="idAsigGrado" value="{{ $idAsigGrado }}">
    <input type="hidden" name="idEvalSel" id="idEvalSel" value="">
    <input type="hidden" class="form-control" id="id_usuario" value="{{ Auth::user()->id }}" />
    <input type="hidden" class="form-control" id="tipo_usuario" value="{{ Auth::user()->tipo_usuario }}" />
    <div class="content-header row">
        <div class="content-header-left col-md-12 col-12 mb-2">
            <h3 class="content-header-title mb-0">GESTIONAR EVALUACIONES / ACTIVIDADES</h3>
            <div class="row breadcrumbs-top">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/Administracion') }}">Inicio</a>
                        </li>
                        <li class="breadcrumb-item active">Gestionar Evaluaciones / Actividades
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
                            <h4 class="card-title">Gestionar Evaluaciones Y ACTIVIDADES / {!! $titTema !!}</h4>
                        </div>

                        <div class="card-content collapse show">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">

                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-md-10">
                                                    <div class="btn-list">
                                                        <a class="btn btn-outline-primary"
                                                            href="{{ url('/Asignaturas/AsigEvaluacion/' . $id) }}"
                                                            title="Nueva Evaluación">
                                                            <i class="fa fa-plus"></i> Crear Evaluación
                                                        </a>
                                                        @if (Auth::user()->tipo_usuario == 'Administrador')
                                                            <a class="btn btn-outline-danger" href="#"
                                                                onclick="$.Reasignar();" title="Reasignar Evaluaciones">
                                                                <i class="fa fa-exchange"></i> Reasignar Evaluaciones
                                                            </a>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-1 ml-3">
                                                    <a class="btn btn-outline-dark"
                                                        href="{{ url('/Asignaturas/GestionTem/') }}" title="Volver">
                                                        <i class="fa fa-angle-double-left"></i> Volver
                                                    </a>
                                                </div>
                                                {!! Form::close() !!}
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
                                                        <th>Titulo</th>
                                                        <th>Clasificación</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                        $i = 1;
                                                    @endphp

                                                    @foreach ($Evaluaciones as $Eva)
                                                        <tr data-id='{{ $Eva->id }}' id='eval{{ $Eva->id }}'>
                                                            <td class="text-truncate">
                                                                @if(Auth::user()->tipo_usuario=="Profesor")
                                                                <a href="javascript:void(0)"
                                                                    onclick="$.cargarDocentes({{ $Eva->id }});"
                                                                    title="Compartir"
                                                                    class="btn btn-outline-info  btn-sm"><i
                                                                        class="fa fa-share"></i></a>
                                                                @endif
                                                                <a href='{{ url('Asignaturas/EditarEvaluacion/' . $Eva->id) }}'
                                                                    title="Editar"
                                                                    class="btn btn-outline-success  btn-sm"><i
                                                                        class="fa fa-edit"></i></a>
                                                                <a href='#' title="Eliminar"
                                                                    class="btn  btn-outline-warning  btn-sm btnEliminar"
                                                                    id="btnActi{{ $Eva->id }}"><i
                                                                        class="fa fa-trash"
                                                                        id="iconBoton{{ $Eva->id }}"></i></a>
                                                            </td>
                                                            @php
                                                                $i++;
                                                                $clasif = $Eva->clasificacion;
                                                                $NomClasif = '';
                                                                switch ($clasif) {
                                                                    case $clasif == 'ACTINI':
                                                                        $NomClasif = 'ACTIVIDAD DE INICIO';
                                                                        break;
                                                                    case $clasif == 'PRODUC':
                                                                        $NomClasif = 'PRODUCCIÓN';
                                                                        break;
                                                                }
                                                                $tipo_ev = $Eva->tip_evaluacion;
                                                            @endphp

                                                            <td class="text-truncate" style="text-transform:uppercase;">
                                                                {!! $Eva->titulo !!}</td>
                                                            <td class="text-truncate">{!! $NomClasif !!}</td>

                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <p class="px-1"></p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </section>

    <div class="modal fade text-left" id="ModReasignar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel15"
        aria-hidden="true">
        <div class="modal-dialog  modal-lg" role="document">
            <div class="modal-content ">
                <div class="modal-body">
                    <div class="modal-header bg-blue white">
                        <h4 class="modal-title" id="titu_tema">Reasignar Evaluaciones creadas por
                            Docentes</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <h5> </h5>
                        <div class="row pt-1">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label class="form-label" for="">Seleccione el
                                        Docente</label>
                                    <select class="form-control select2" style="width: 100%;"
                                        onchange="$.CargaEval(this.value);" data-placeholder="Seleccione el Docente"
                                        id="docenteold">
                                        {!! $select_docente !!}

                                    </select>
                                </div>
                            </div>
                            <div class="col-md-5" id="Divdoc2" style="width: 100%; display: none;">
                                <div class="form-group">
                                    <label class="form-label" for="">Seleccione el
                                        Docente a Reasginar el Tema </label>

                                    <select class="form-control select2" style="width: 100%;"
                                        data-placeholder="Seleccione el docente" id="docentenew">
                                        {!! $select_docente !!}

                                    </select>
                                </div>
                            </div>

                            <diV class="col-md-2 text-right" style="display: none;" id="btn_reasignar">
                                <label class="form-label" for=""></label>
                                <a class="btn btn-outline-success" onclick="$.ReasignarEval();"
                                    title="Buscar Estudiantes">
                                    <i class="fa fa-check"></i> Reasignar
                                </a>
                            </diV>

                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="table-responsive">
                                    <form action="{{ url('/Asignaturas/ReasignarEval') }}" method="post"
                                        id="FormEval">
                                        <table id="recent-orders"
                                            class="table table-hover mb-0 ps-container ps-theme-default table-sm">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Evaluación</th>
                                                    <th>Asignatura</th>
                                                    <th class="text-center"><label style='cursor: pointer;'><input
                                                                type='checkbox' onclick="$.SelAllEval();" id="SelAll"
                                                                value=''>
                                                            Seleccionar
                                                        </label></th>
                                                </tr>
                                            </thead>
                                            <tbody id="td-Eval" style="text-transform: capitalize;">

                                            </tbody>
                                        </table>
                                    </form>
                                </div>
                                <p class="px-1"></p>

                            </div>
                        </div>

                        <div id="ResulProv" class="row"></div>
                    </div>



                </div>
            </div>
        </div>
    </div>

    <div class="modal fade text-left show" id="ModCompartir" tabindex="-1" role="dialog"
        aria-labelledby="myModalLabel15">
        <div class="modal-dialog comenta" role="document">
            <div class="modal-content border-blue">
                <div class="modal-header bg-blue white">
                    <h4 class="modal-title" id="titu_tema">Docentes con los que puedes compartir</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row" style="width:100%">
                        <div class="col-md-12">
                            <div class="table-responsive" style="height:250px;">
                                <form action="{{ url('/Evaluaciones/compartirEval') }}" method="post"
                                    id="formCompartir">
                                    <table id="recent-orders"
                                        class="table table-hover mb-0 ps-container ps-theme-default table-sm">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Docente</th>
                                                <th>Seleccionar</th>
                                            </tr>
                                        </thead>

                                        <tbody id="tdcompartir" style="text-transform: capitalize; ">

                                        </tbody>

                                    </table>
                                </form>
                            </div>

                        </div>


                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" onclick="$.guardarDatosComp();" id="btn_GuarComent"
                        class="btn grey btn-outline-success"><i class="fa fa-save"></i>
                        Guardar</button>
                </div>
            </div>
        </div>
    </div>


    </div>

    {!! Form::open(['url' => '/Asignaturas/EliminarEval', 'id' => 'formAuxiliar']) !!}
    {!! Form::close() !!}

    {!! Form::open(['url' => '/Asignaturas/CargarEvalReasignar', 'id' => 'formAuxiliarEval']) !!}
    {!! Form::close() !!}

    {!! Form::open(['url' => '/cambiar/docentesCompEval', 'id' => 'formAuxiliarCargDocentes']) !!}
    {!! Form::close() !!}


@endsection
@section('scripts')
    <script>
        $(document).ready(function() {

            $("#Men_Inicio").removeClass("active");
            $("#Men_Asignaturas").addClass("has-sub open");
            $("#Men_Asignaturas_addTem").addClass("active");


            $.extend({
                Reasignar: function() {
                    $("#ModReasignar").modal({
                        backdrop: 'static',
                        keyboard: false
                    });
                },
                CargaEval: function(Doce) {


                    var form = $("#formAuxiliarEval");
                    var token = $("#token").val();

                    $("#_token").remove();
                    $("#docente").remove();
                    form.append("<input type='hidden' name='doce' id='docente' value='" + Doce + "'>");
                    form.append("<input type='hidden' name='_token'  id='_token' value='" + token +
                        "'>");
                    var url = form.attr("action");
                    var datos = form.serialize();
                    var Tabla = "";
                    var j = 1;

                    $.ajax({
                        type: "post",
                        url: url,
                        data: datos,
                        dataType: "json",
                        success: function(respuesta) {

                            if (Object.keys(respuesta.Temas).length > 0) {
                                $.each(respuesta.Temas, function(i, item) {
                                    Tabla += " <tr data-id='" + item.id +
                                        "' id='Unidad" + item.id + "'>";
                                    Tabla += "<td class='text-truncate'>" + j +
                                        "</td> ";
                                    Tabla += "<td class='text-truncate'>" + item
                                        .titulo + "</td> ";
                                    Tabla += "<td class='text-truncate'>" + item
                                        .asignatura + "</td> ";
                                    Tabla +=
                                        "<input type='hidden' name='idEvaluacion[]' value='" +
                                        item.id +
                                        "'><input type='hidden' id='EvalSel" +
                                        j +
                                        "' name='EvalSel[]' value='no'><td class='text-truncate text-center'><input type='checkbox' onclick='$.SelEval(" +
                                        j + ");' id='Seleccion" +
                                        j +
                                        "' style='cursor: pointer;' name='EvaluacionSel' value=''></td> ";
                                    Tabla += " </tr>";
                                    j++;
                                });
                                $("#td-Eval").html(Tabla);
                                $("#Divdoc2").show();
                                $("#btn_reasignar").show();

                            } else {
                                $("#td-Eval").html('');
                                $("#Divdoc2").hide();
                                $("#btn_reasignar").hide();
                                swal.fire({
                                    title: "Administrar Evaluaciones",
                                    text: 'No existen Evaluaciones para ser Reasignadas',
                                    icon: "warning",
                                    button: "Aceptar",
                                });
                            }

                        },
                        error: function() {

                            mensaje = "No se pudo Cargar las Evaluaciones";

                            swal.fire({
                                title: "",
                                text: mensaje,
                                icon: "warning",
                                button: "Aceptar",
                            });
                        }
                    });
                },
                SelAllEval: function() {
                    var j = 1;
                    if ($('#SelAll').prop('checked')) {
                        $("input[name='EvaluacionSel']").each(function(indice, elemento) {
                            $(elemento).prop("checked", true);
                            $("#EvalSel" + j).val("si");
                            j++;
                        });
                    } else {
                        $("input[name='EvaluacionSel']").each(function(indice, elemento) {
                            $(elemento).prop("checked", false);
                            $("#EvalSel" + j).val("no");
                            j++;
                        });
                    }
                },
                SelEval: function(id) {
                    if ($('#Seleccion' + id).prop('checked')) {
                        $("#EvalSel" + id).val("si");
                    } else {
                        $("#EvalSel" + id).val("no");

                    }
                },
                ReasignarEval: function() {

                    var doc1 = $("#docenteold").val();
                    var doc2 = $("#docentenew").val();

                    var flag = "no";
                    $("input[name='EvaluacionSel']").each(function(indice, elemento) {
                        if ($(elemento).prop('checked')) {
                            flag = "si";
                            return;
                        }
                    });



                    if (doc1 === doc2) {
                        $('#docentenew').val("")
                            .trigger('change.select2');

                        swal.fire({
                            title: "Administrar Evaluaciones",
                            text: 'Debe Seleccionar un docente diferente al seleccionado inicialmente',
                            icon: "warning",
                            button: "Aceptar",
                        });
                        return;
                    } else if (doc2 === "") {
                        swal.fire({
                            title: "Administrar Evaluaciones",
                            text: 'Debe Seleccionar un docente',
                            icon: "warning",
                            button: "Aceptar",
                        });
                        return
                    } else if (flag === "no") {
                        swal.fire({
                            title: "Administrar Evaluaciones",
                            text: 'Debe Seleccionar las Evaluaciones a Reasignar',
                            icon: "warning",
                            button: "Aceptar",
                        });
                        return;
                    }


                    var form = $("#FormEval");
                    var token = $("#token").val();

                    $("#doc2").remove();
                    $("#doc1").remove();
                    $("#_token").remove();

                    form.append("<input type='hidden' name='docenteReasig' id='doc2' value='" + doc2 +
                        "'>");
                    form.append("<input type='hidden' name='docenteOld' id='doc1' value='" + doc1 +
                        "'>");
                    form.append("<input type='hidden' name='_token'  id='_token' value='" + token +
                        "'>");
                    var url = form.attr("action");
                    var datos = form.serialize();

                    mensaje = "¿Desea Reasignar las Evaluaciones Seleccionados?";
                    Swal.fire({
                        title: 'Administrar Temas',
                        text: mensaje,
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Si, Reasignar'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                type: "post",
                                url: url,
                                data: datos,
                                dataType: "json",
                                success: function(respuesta) {
                                    if (respuesta.Estado == "SI") {
                                        swal.fire({
                                            title: "Administrar Evaluaciones",
                                            text: respuesta.mensaje,
                                            icon: "success",
                                            button: "Aceptar"
                                        });


                                        $("#td-Eval").html("");

                                    } else if (respuesta.estado == "SINPERMISO") {
                                        swal.fire({
                                            title: "Administrar Evaluaciones",
                                            text: respuesta.mensaje,
                                            icon: "warning",
                                            button: "Aceptar"
                                        });

                                    } else {
                                        swal.fire({
                                            title: "Administrar Evaluaciones",
                                            text: respuesta.mensaje,
                                            icon: "warning",
                                            button: "Aceptar",
                                        });
                                    }
                                },
                                error: function() {

                                    mensaje = "Administrar Evaluaciones";

                                    swal.fire({
                                        title: "",
                                        text: mensaje,
                                        icon: "warning",
                                        button: "Aceptar",
                                    });
                                }
                            });
                        }
                    });

                },
                cargarDocentes: function(idEval) {

                    var idAsig = $("#idAsigGrado").val();

                    $("#ModCompartir").modal({
                        backdrop: 'static',
                        keyboard: false
                    });

                    var Tabla = "";
                    var j = 1;

                    var form = $("#formAuxiliarCargDocentes");
                    $("#idMod").remove();
                    $("#idEval").remove();
                    form.append("<input type='hidden' name='idMod' id='idMod' value='" + idAsig + "'>");
                    form.append("<input type='hidden' name='idEval' id='idEval' value='" + idEval +
                        "'>");
                    var url = form.attr("action");
                    var datos = form.serialize();
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: datos,
                        dataType: "json",
                        success: function(respuesta) {
                            if (Object.keys(respuesta.Docentes).length > 0) {
                                $.each(respuesta.Docentes, function(i, item) {
                                    Tabla += " <tr data-id='" + item.id +
                                        "' id='Alumno" + item.id + "'>";
                                    Tabla += "<td class='text-truncate'>" + j +
                                        "</td> ";
                                    Tabla += "<td class='text-truncate'>" + item
                                        .ndocente + "</td> ";
                                    Tabla +=
                                        "<input type='hidden' name='idDocente[]' value='" +
                                        item.usuario_profesor + "'>" +
                                        "<input type='hidden' name='grupo[]' value='" +
                                        item.grupo + "'>" +
                                        "<input type='hidden' name='jornada[]' value='" +
                                        item.jornada + "'>";

                                    if ($("#id_usuario").val() == item
                                        .usuario_profesor) {
                                        Tabla +=
                                            "<input type='hidden' id='DoceSel" + j +
                                            "' name='DoceSel[]' value='si'>" +
                                            "<td class='text-truncate text-center'>" +
                                            "<input type='checkbox' onclick='$.SelDocente(" +
                                            j + ");' id='CheckSeleccion" + j +
                                            "' style='cursor: pointer;' disabled checked name='checkDocenteSel' value=''>";
                                    } else {
                                        if (item.Comp == "si") {
                                            Tabla +=
                                                "<input type='hidden' id='DoceSel" +
                                                j +
                                                "' name='DoceSel[]' value='si'>" +
                                                "<td class='text-truncate text-center'>" +
                                                "<input type='checkbox' onclick='$.SelDocente(" +
                                                j + ");' id='CheckSeleccion" + j +
                                                "' style='cursor: pointer;' checked name='checkDocenteSel' value=''>";
                                        } else {
                                            Tabla +=
                                                "<input type='hidden' id='DoceSel" +
                                                j +
                                                "' name='DoceSel[]' value='no'>" +
                                                "<td class='text-truncate text-center'>" +
                                                "<input type='checkbox' onclick='$.SelDocente(" +
                                                j + ");' id='CheckSeleccion" + j +
                                                "' style='cursor: pointer;' name='checkDocenteSel' value=''>";
                                        }
                                    }

                                    Tabla += "</td> ";
                                    Tabla += " </tr>";
                                    j++;
                                });
                                $("#td-alumnos").html(Tabla);
                            } else {
                                $("#td-alumnos").html('');
                                $("#btn-acciones").hide();
                                swal.fire({
                                    title: "Administrar Temas",
                                    text: 'No existen docentes con los que puedas compartir este tema a crear',
                                    icon: "warning",
                                    button: "Aceptar",
                                });
                            }

                            $("#tdcompartir").html(Tabla);
                        }

                    });

                },
                SelDocente: function(id) {
                    if ($('#CheckSeleccion' + id).prop('checked')) {
                        $("#DoceSel" + id).val("si");
                    } else {
                        $("#DoceSel" + id).val("no");

                    }
                },
                guardarDatosComp: function() {

                    var form = $("#formCompartir");
                    var token = $("#token").val();
                    var evalSel = $("#idEval").val();

                    form.append("<input type='hidden' id='idtoken' name='_token'  value='" + token +
                        "'>");
                    form.append("<input type='hidden' id='evalsel' name='idEval2'  value='" + evalSel +
                        "'>");

                    var url = form.attr("action");
                    var datos = form.serialize();
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: new FormData($('#formCompartir')[0]),
                        processData: false,
                        contentType: false,
                        success: function(respuesta) {
                            if(respuesta.estado=="ok"){
                                swal.fire({
                                    title: "Administrar Evaluaciones",
                                    text: "La operación fue realizada exitosamente",
                                    icon: "success",
                                    button: "Aceptar"
                                });
                            }else{

                                swal.fire({
                                    title: "Administrar Evaluaciones",
                                    text: 'No fue posible realizar la operación',
                                    icon: "warning",
                                    button: "Aceptar",
                                });

                            }
                        }

                    });

                }
            });

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

                    mensaje = "¿Desea Eliminar esta Evaluación?";

                    Swal.fire({
                        title: 'Gestionar Evaluaciones',
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
                                    if (respuesta.opc=="NT") {
                                        Swal.fire({
                                            title: "Gestionar Evaluaciones",
                                            text: respuesta.mensaje,
                                            icon: respuesta.icon,
                                            button: "Aceptar"
                                        });
    
                                        if (respuesta.estado === "ELIMINADO") {
                                            $("#eval" + id).hide();
                                        }
                                    }else if (respuesta.opc=="VU") {
                                        Swal.fire({
                                            title: "Gestionar Evaluaciones",
                                            text: respuesta.mensaje,
                                            icon: respuesta.icon,
                                            button: "Aceptar"
                                        });
                                    }

                                },
                                error: function() {
                                    mensaje = "La Evaluación no pudo ser Eliminada";
                                    Swal.fire(
                                        'Gestionar Evaluaciones',
                                        mensaje,
                                        'warning'
                                    )
                                }
                            });
                        }
                    });
                }
            });
        });
    </script>
@endsection
