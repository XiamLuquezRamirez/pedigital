@extends('Plantilla.Principal')
@section('title', 'Tablero Módulo E')
@section('Contenido')
    <input type="hidden" class="form-control" name="simulacro_id" id="simulacro_id" value="" />
    <input type="hidden" class="form-control" name="sesion_id" id="sesion_id" value="" />
    <input type="hidden" class="form-control" name="area_id" id="area_id" value="" />
    <input type="hidden" class="form-control" name="banco_id" id="banco_id" value="" />
    <input type="hidden" class="form-control" name="tema_id" id="tema_id" value="" />
    <input type="hidden" class="form-control" name="NPreg" id="NPreg" value="" />
    <input type="hidden" id="token" value="{{ csrf_token() }}">
    <input type="hidden" class="form-control" id="Tip_Usu" value="{{ Auth::user()->tipo_usuario }}" />

    <input type="hidden" class="form-control" id="Ruta" data-ruta="{{ asset('/app-assets/') }}" />

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
                    <div class="col-xl-3 col-lg-6 col-12 hvr-grow-shadow" style="cursor: pointer;"
                        onclick="$.informe('1');">
                        <div class="card ">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="media d-flex">
                                        <div class="media-body text-left">
                                            <h3 class="danger">1</h3>
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
                    <div class="col-xl-3 col-lg-6 col-12 hvr-grow-shadow" style="cursor: pointer;"
                        onclick="$.informe('1');">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="media d-flex">
                                        <div class="media-body text-left">
                                            <h3 class="success">2</h3>
                                            <span>Informe 2</span>
                                        </div>
                                        <div class="align-self-center">
                                            <i class="icon-pie-chart success font-large-2 float-right"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12 hvr-grow-shadow" style="cursor: pointer;"
                        onclick="$.informe('1');">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="media d-flex">
                                        <div class="media-body text-left">
                                            <h3 class="warning">3</h3>
                                            <span>Informe 3</span>
                                        </div>
                                        <div class="align-self-center">
                                            <i class="icon-pie-chart warning font-large-2 float-right"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12 hvr-grow-shadow" style="cursor: pointer;"
                        onclick="$.informe('1');">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="media d-flex">
                                        <div class="media-body text-left">
                                            <h3 class="primary">4</h3>
                                            <span>Informe 4</span>
                                        </div>
                                        <div class="align-self-center">
                                            <i class="icon-pie-chart primary font-large-2 float-right"></i>
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

    <div class="modal fade text-left" id="modalInforme" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17"
        aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="modal-header bg-blue white">
                        <h4 class="modal-title" id="titu_tema">Informe Individual de Prueba</h4>
                   

                    </div>

                    <div id="importar" class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <label class="form-label"  for="presentacion_modulo">Simulacro:</label>
                                <select name="simulacro"style="width: 100%" id="simulacro" onchange="$.CargaEstudiantes(this.value);" class="form-control select2">
                                  
                                </select>
                            </div>
                            <div class="col-md-12">
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
                                                                type='checkbox' onclick="$.SelAllEst();"
                                                                id="SelAll" value=''>
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
                                    <button type="button" onclick="$.Promover();" class="btn btn-outline-cyan"><i
                                            class="fa fa-file-pdf-o"></i>
                                        mostrar Resultado</button>
                           
                                   
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


    {!! Form::open(['url' => '/ModuloE/CargarSimulacros', 'id' => 'formAuxiliarSimu']) !!}
    {!! Form::close() !!}
    {!! Form::open(['url' => '/ModuloE/CargaEstxSimulacro', 'id' => 'forminfEstuSimulacro']) !!}
    {!! Form::close() !!}


@endsection

@section('scripts')
    <script>
        $(document).ready(function() {

            $("#Men_ModuloE").addClass("active");
            $.extend({
                informe: function(inf) {
                    if (inf == "1") {
                        $.informeIndividual();
                    } else if (inf == "2") {

                    } else if (inf == "3") {

                    }

                },
                informeIndividual: function() {
                    $("#modalInforme").modal({
                        backdrop: 'static',
                        keyboard: false
                    });

                    var token = $("#token").val();

                    var form = $("#formAuxiliarSimu");
                    $("#_token").remove();
                    form.append("<input type='hidden' name='_token' id='_token' value='" + token + "'>");
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
                mostListinformes: function() {
                    $('#modalInforme').modal('toggle');
                },
                CargaEstudiantes: function(idSimu) {
                    alert("entr");
                    var token = $("#token").val();

                    var form = $("#forminfEstuSimulacro");
                    $("#_token").remove();
                    $("#idSimu").remove();
                    form.append("<input type='hidden' name='_token' id='_token' value='" + token + "'>");
                    form.append("<input type='hidden' name='idSimu' id='idSimu' value='" + idSimu + "'>");
                    var url = form.attr("action");
                    var datos = form.serialize();
                    $.ajax({
                        type: "POST",
     
                        url: url,
                        data: datos,
                        dataType: "json",
                        success: function(respuesta) {
                            if (Object.keys(respuesta.Alumnos).length > 0) {
                                $.each(respuesta.Alumnos, function(i, item) {
                                    Tabla += " <tr data-id='" + item.id +
                                        "' id='Alumno" + item.id + "'>";
                                    Tabla += "<td class='text-truncate'>" + j +
                                        "</td> ";
                                    Tabla += "<td class='text-truncate'>" + item.ident_alumno + "</td> ";
                                    Tabla += "<td class='text-truncate'>" + item.nombre_alumno + "</td> ";
                                    Tabla += "<td class='text-truncate'>" + item.apellido_alumno + "</td> ";
                                    Tabla +=
                                        "<input type='hidden' name='idestu[]' value='" + item.id + "'>"+
                                        "<input type='hidden' name='usuEstu[]' value='" + item.usuario_alumno + "'>"+
                                        "<input type='hidden' id='EstSel" +
                                        j +
                                        "' name='EstSel[]' value='no'><td class='text-truncate text-center'><input type='checkbox' onclick='$.SelAlumno(" +
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
                                    text: 'No existen Estudiantes registrados con estos parametros',
                                    icon: "warning",
                                    button: "Aceptar",
                                });
                            }
                        }
                    });
                },
                SelAllEst: function() {
                    var j = 1;
                    if ($('#SelAll').prop('checked')) {
                        $("input[name='AlumnoSel']").each(function(indice, elemento) {
                            $(elemento).prop("checked", true);
                            $("#EstSel" + j).val("si");
                            j++;
                        });
                    } else {
                        $("input[name='AlumnoSel']").each(function(indice, elemento) {
                            $(elemento).prop("checked", false);
                            $("#EstSel" + j).val("no");
                            j++;
                        });
                    }
                },
            });


        });
    </script>
@endsection