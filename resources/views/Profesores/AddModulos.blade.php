@extends('Plantilla.Principal')
@section('title', 'Asignar Módulo a Docente')
@section('Contenido')

    <div class="content-header row">
        <div class="content-header-left col-md-12 col-12 mb-2">
            <h3 class="content-header-title mb-0">Asignación de Módulos</h3>
            <div class="row breadcrumbs-top">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/Administracion') }}">Inicio</a>
                        </li>
                        <li class="breadcrumb-item"><a href="{{ url('/Profesores/Gestion/') }}">Gestión de Docentes</a>
                        </li>
                        <li class="breadcrumb-item active">Asignar Módulos
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content-body">
        <section id="number-tabs">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Asignar Módulo</h4>
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-md-12">
                                        @if ($errors->any())
                                            <div class="alert alert-danger alert-dismissible show" role="alert">
                                                <button type="button" class="close" data-dismiss="alert"
                                                    aria-hidden="true">×</button>
                                                <h6 style="font: 16px EXODO;">Por favor corrige los siguientes errores:</h6>
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <strong style="font: 15px EXODO;">
                                                            <li>{{ $error }}</li>
                                                        </strong>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <p class="px-1"></p>

                                <!--begin::Form-->
                                @include('Profesores.FormModulos', [
                                    'url' => '/Profesores/guardarModProf',
                                    'method' => 'post',
                                ])
                                <!--end::Form-->
                                <p class="px-1"></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    {!! Form::open(['url' => '/Profesores/ListarGradosMod', 'id' => 'formAuxiliarGrados']) !!}
    {!! Form::close() !!}

    {!! Form::open(['url' => '/Profesores/ListarGruposMod', 'id' => 'formAuxiliarGrupos']) !!}
    {!! Form::close() !!}

    {!! Form::open(['url' => '/Profesores/VerifAsigMod', 'id' => 'formAuxiliarVerAsig']) !!}
    {!! Form::close() !!}
    {!! Form::open(['url' => '/Profesores/DelModDocente', 'id' => 'formAuxiliarDelAsig']) !!}
    {!! Form::close() !!}


@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $("#Men_Inicio").removeClass("active");
            $("#Men_Presentacion").removeClass("active");
            $("#Men_Profesores").addClass("active open");

            $.extend({
                AddAsig: function() {


                    var profe_id = $("#profe_id").val();
                    var Asig = $("#asignaturas").val();
                    var grado = $("#grado").val();
                    var grupo = $("#grupo").val();
                    var jornada = $("#jornada").val();
                    var ConsAct = $("#ConsAct").val();
                    var flag = "ok";

                    if (Asig === "") {
                        Swal.fire('Error!', 'Seleccione un Módulo...', 'warning');
                        return;
                    }

                    if (grado === "") {
                        Swal.fire('Error!', 'Seleccione un Grado...', 'warning');
                        return;
                    }

                    if (grupo === "") {
                        Swal.fire('Error!', 'Seleccione un grupo...', 'warning');
                        return;
                    }

                    if (jornada === "") {
                        Swal.fire('Alerta!', 'Seleccione una jornada...', 'warning');
                        return;
                    }


                    var form = $("#formAuxiliarVerAsig");
                    $("#idGrado").remove();
                    $("#IdGrupo").remove();
                    $("#jorna").remove();
                    form.append("<input type='hidden' name='idGrado2' id='idGrado2' value='" + grado +
                        "'>");
                    form.append("<input type='hidden' name='IdGrupo2' id='IdGrupo2' value='" + grupo +
                        "'>");
                    form.append("<input type='hidden' name='jorna' id='jorna' value='" + jornada +
                        "'>");


                    var url = form.attr("action");
                    var datos = form.serialize();
                    $.ajax({
                        type: "POST",
                        async: false,
                        url: url,
                        data: datos,
                        dataType: "json",
                        success: function(respuesta) {

                            if (respuesta.exit === "si") {

                                if ($('#profe_id').val() == respuesta.IdDocente) {
                                    Swal.fire('Alerta!',
                                        'Este módulo y grupo ya ha sido asignado a este docente...',
                                        'warning');
                                } else {
                                    Swal.fire('Alerta!',
                                        'Este módulo y grupo ya ha sido asignado al docente ' +
                                        respuesta.docente.toUpperCase(), 'warning');
                                }

                                flag = "no";
                            }
                        }

                    });

                    {{--  $(".grupo").each(function() {
                        if ($(this).val() === grupo) {
                            swal.fire('Error!',
                                'Este Módulo ya ha sido Asignado a este Docente...',
                                'warning');
                            flag = "no";
                        }

                    }); --}}

                    if (flag === "no") {
                        return;
                    }

                    let jor = (jornada == "JM") ? 'Jornada mañana' : ((jornada == "JT") ?
                        "Jornada tarde" : ((jornada == "JN") ? "Jornada nocturna" : ""));

                    var campo = '<tr id="Fila_Asig' + ConsAct + '">' +
                        '<td class="text-truncate">' + ConsAct + '</td>' +
                        '<td class="text-truncate"><b>' + $("select[name='asig'] option:selected")
                        .text() +
                        '</b> ' + $("select[name='grado'] option:selected").text() + ' (' + $(
                            "select[name='grupo'] option:selected").text() + ') ' + jor +
                        '</td>' +
                        '<input type="hidden" id="Asig' + ConsAct + '" name="txtasig[]"  value="' +
                        Asig + '">' +
                        '<input type="hidden" id="grado' + ConsAct + '" name="txtgrado[]"  value="' +
                        grado + '">' +
                        '<input type="hidden" class="grupo" id="grupo' + ConsAct +
                        '" name="txtgrupo[]"  value="' + grupo + '">' +
                        '<input type="hidden" class="jornada" id="jornada' + ConsAct +
                        '" name="txtjornada[]"  value="' + jornada + '">' +
                        '<td class="text-truncate">' +
                        '<a id="DelAsig'+ConsAct+'" data-id="0" onclick="$.DelAsig(' + ConsAct +
                        ')" data-toggle="tooltip" title="Eliminar" class="btn btn-icon btn-outline-warning btn-social-icon btn-sm"><i class="fa fa-trash"></i></a>' +
                        '</td>' +
                        ' </tr>';

                    $("#tr_asig").append(campo);
                    $("#ConsAct").val(parseFloat(ConsAct) + 1);
                    $('#asignaturas').val('').trigger('change.select2');
                    $('#grado').html('');
                    $('#grupo').html('');
                },
                DelAsig: function(id_fila) {
               
                    var idAsig = $("#DelAsig"+id_fila).data("id");

                    var form = $("#formAuxiliarDelAsig");
                   
                    $("#idAsig").remove();
                  
                    form.append("<input type='hidden' name='idAsig' id='idAsig' value='" +
                    idAsig + "'>");
                    var url = form.attr("action");
                    var datos = form.serialize();

                    mensaje = "¿Desea Eliminar esta asignación?";

                    Swal.fire({
                        title: 'Gestionar Docentes',
                        text: mensaje,
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Si, Eliminar!'
                    }).then((result) => {
                        if (result.isConfirmed) {

                            $.ajax({
                                type: "POST",
                                url: url,
                                data: datos,
                                dataType: "json",
                                success: function(respuesta) {
                                    Swal.fire({
                                        title: "Gestionar Asignación de Módulos",
                                        text: respuesta.mensaje,
                                        icon: "success",
                                        button: "Aceptar"
                                    });

                                    if (respuesta.estado === "ok") {
                                        $('#Fila_Asig' + id_fila).remove();
                                        //$.reordenarAsig();
                                        ConsAct = $('#ConsAct').val() - 1;
                                        $("#ConsAct").val(ConsAct);
                                    } else {
                                        Swal.fire({
                                            title: "Gestionar Asignación de Módulos",
                                            text: "No se pudo realizar la Operación",
                                            icon: "success",
                                            button: "Aceptar"
                                        });
                                    }
                                }

                            });
                        }
                    });

                },
                reordenarAsig: function() {

                    var num = 1;
                    $('#tr_asig tr').each(function() {
                        $(this).find('td').eq(0).text(num);
                        num++;
                    });

                    num = 1;
                    $('#tr_asig input').each(function() {
                        $(this).attr('id', "Asig" + num);
                        num++;
                    });
                },
                ListarGrados: function(id) {

                    var form = $("#formAuxiliarGrados");
                    $("#idAsig").remove();
                    form.append("<input type='hidden' name='idAsig' id='idAsig' value='" + id + "'>");
                    var url = form.attr("action");
                    var datos = form.serialize();
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: datos,
                        dataType: "json",
                        success: function(respuesta) {
                            $("#grado").html(respuesta.Select_Grados);
                        }

                    });
                },
                ListarGrupos: function(id) {

                    var form = $("#formAuxiliarGrupos");
                    $("#idGrado").remove();
                    form.append("<input type='hidden' name='idGrado' id='idGrado' value='" + id + "'>");
                    var url = form.attr("action");
                    var datos = form.serialize();
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: datos,
                        dataType: "json",
                        success: function(respuesta) {
                            $("#grupo").html(respuesta.Select_Grupos);
                        }

                    });
                }
            });



            //======================EVENTO AGREGAR ASIGNATURAS=======================\\


        });
    </script>
@endsection
