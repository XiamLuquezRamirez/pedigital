@extends('Plantilla.Principal')
@section('title', 'Gestionar Asignaturas Módulo E')
@section('Contenido')

    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2">
            <h3 class="content-header-title mb-0">Gestionar Asignaturas Módulo E</h3>
            <div class="row breadcrumbs-top">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/Administracion') }}">Inicio</a>
                        </li>
                        <li class="breadcrumb-item active">Gestionar Asignaturas Módulo E
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div <div class="content-body">
    <section id="number-tabs">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Gestionar Asignaturas</h4>
                    </div>
                    <div class="card-content collapse show">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">

                                    <div class="col-12">
                                        <div class="row">

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <a class="btn btn-outline-primary"
                                                        href="{{ url('/ModuloE/NuevaAsignatura') }}"
                                                        title="Nueva Asignatura">
                                                        <i class="fa fa-plus"></i> Crear Asignatura
                                                    </a>
                                                </div>
                                            </div>

                                            <div class="col-md-5">
                                                {!! Form::model(Request::all(), ['url' => '/ModuloE/GestionAsignaturas', 'method' => 'GET', 'autocomplete' => 'off', 'role' => 'search', 'class' => '']) !!}
                                                <div class="form-group">
                                                    <select class="form-control select2" name="nombre" id="nombre">
                                                        {!! $select_Areas !!}
                                                    </select>
                                                </div>

                                            </div>

                                            <div class="col-md-4">
                                                <div class="input-group">
                                                    {!! Form::text('txtbusqueda', null, ['class' => 'form-control form-control-sm', 'placeholder' => 'BUSQUEDA..']) !!}
                                                    <span class="input-group-append">
                                                        <button type="submit" class="btn btn-primary "> <i
                                                                class="fa fa-search"></i></button>
                                                    </span>
                                                </div>
                                                {!! Form::close() !!}
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
                                    <div class="table-responsive">
                                        <table id="recent-orders"
                                            class="table table-hover mb-0 ps-container ps-theme-default table-sm">
                                            <thead class="bg-primary">
                                                <tr>
                                                    <th>#</th>
                                                    <th>Nombre</th>
                                                    <th>Grado</th>
                                                    <th>Área</th>
                                                    <th>Opciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $cont = 1;
                                                @endphp
                                                @foreach ($Asignatura as $Asig)
                                                    <tr data-id='{{ $Asig->id }}' id='Asig{{ $Asig->id }}'>
                                                        <td class="text-truncate">{!! $cont !!}</td>
                                                        <td class="text-truncate">{!! $Asig->nombre !!}</td>
                                                        <td class="text-truncate">{!! 'Grado ' . $Asig->grado . '°' !!}</td>
                                                        <td class="text-truncate">{!! $Asig->nombre_area !!}</td>
                                                        <td class="text-truncate">
                                                            <a href='{{ url('ModuloE/EditarAsignatura/' . $Asig->id) }}'
                                                                title="Editar" class="btn btn-outline-success  btn-sm"><i
                                                                    title="Editar" class="fa fa-edit"></i></a>
                                                            <a href='#' title="Eliminar"
                                                                class="btn } btn-outline-warning btn- btn-sm btnEliminar"
                                                                id="btnActi{{ $Asig->id }}"><i class="fa fa-trash"
                                                                    id="iconBoton{{ $Asig->id }}"></i></a>
                                                        </td>
                                                    </tr>
                                                    @php
                                                        $cont++;
                                                    @endphp
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <p class="px-1"></p>
                            @include('ModuloE.PaginacionAsignaturas')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    </div>

    {!! Form::open(['url' => '/ModuloE/EliminarAsignatura', 'id' => 'formAuxiliar']) !!}
    {!! Form::close() !!}

@endsection
@section('scripts')
    <script>
        $(document).ready(function() {

            $("#Men_Inicio").removeClass("active");
            $("#Men_Presentacion").removeClass("active");
            $("#Men_Modulos_E").addClass("has-sub open");
            $("#Men_ModulosE_addAdig").addClass("active");


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

                    mensaje = "¿Desea Elimninar esta Asignatura?";


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
                                  

                                    if (respuesta.estado === "ELIMINADO") {
                                        Swal.fire({
                                            title: "",
                                            text: respuesta.mensaje,
                                            icon: "success",
                                            button: "Aceptar"
                                        });
                                        $("#Asig" + id).hide();
                                    }

                                },
                                error: function() {

                                    mensaje = "La Asignatura no pudo ser Eliminada";

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
