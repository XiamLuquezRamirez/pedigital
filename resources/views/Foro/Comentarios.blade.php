@extends('Plantilla.Principal')
@section('title', 'Gestión de Comentarios')
@section('Contenido')

    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2">
            <h3 class="content-header-title mb-0">Gestión de Comentarios</h3>
            <div class="row breadcrumbs-top">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/Foro/Gestion') }}">Gestion de Foros</a>
                        </li>
                        <li class="breadcrumb-item active">Gestión de Comentarios
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
                        <div class="card-content collapse show">
                            <div class="card-body">
                                <p class="px-1"></p>
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
                                <div class="row">
                                    <div class="col-12">
                                        <div
                                            class="bs-callout-primary callout-border-right callout-bordered callout-transparent p-1">
                                            <h5 class="primary">{!! $Asignatura->nombre . ' Grado: ' . $Asignatura->grado_modulo . '°' !!}</h5>
                                            <h4><strong>{!! $Foro->titulo !!}</strong></h4>
                                            <p>{!! $Foro->contenido !!}</p>

                                            <div class="card-footer px-0 py-0">
                                                <div class="card-body" id="addcomentarios">
                                                    @foreach ($Comentarios as $Alu)
                                                        <div class="media">
                                                            <div class="media-left">
                                                                <a href="#">
                                                                    <span class="avatar avatar-online">
                                                                        <img src='{{ asset('app-assets/images/' . $Alu->imagen) }}'
                                                                            alt="avatar">
                                                                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="media-body ml-1">
                                                                <p class="text-bold-600 mb-0"><a
                                                                        href="#">{!! $Alu->nombre_usuario !!}</a></p>
                                                                <p class="m-0">{!! $Alu->comentario !!}</p>
                                                                <ul class="list-inline mb-1">
                                                                    <li class="pr-1"
                                                                        style="font-size: 12px; font-style: italic;">
                                                                        <a href="#" class="">
                                                                            <span class="fa fa-calendar"></span>
                                                                            {!! $Alu->created_at !!}</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                                <div class="card-body">
                                                    <fieldset>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control"
                                                                id="comentarioEscrito" placeholder="Escribir comentario"
                                                                aria-describedby="button-addon2">
                                                            <div class="input-group-append" id="button-addon2">
                                                                <button class="btn btn-primary" onclick="$.enviarMensaje();"
                                                                    type="button"><i
                                                                        class="fa fa-paper-plane-o"></i></button>
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="px-1"></p>
                                        <input name="id_foro" id="id_foro" value="{{ $id_foro }}" type="hidden">
                                    </div>
                                </div>
                                {{--  <div class="row">
                                <div class="col-12">
                                    {!!
                                    Form::open(['url'=>"/Comentarios/guardar",'method'=>"POST",'class'=>'','id'=>'formProf','files'=>true])
                                    !!}
                                    
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Comentarios</label>
                                        <textarea name="comentario" class="form-control" id="comentario"
                                                  placeholder="Comentarios" required="" rows="3"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-success">Enviar Comentario</button>
                                    {!! Form::close() !!}
                                </div>
                            </div>  --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>

    {!! Form::open(['url' => '/Foro/Eliminar', 'id' => 'formAuxiliar']) !!}
    {!! Form::close() !!}

    {!! Form::open(['url' => '/Comentarios/guardar', 'id' => 'formAuxiliarEnvioMensaje']) !!}
    {!! Form::close() !!}

    {!! Form::open(['url' => '/Comentarios/cargar', 'id' => 'formAuxiliarCargarComentarios']) !!}
    {!! Form::close() !!}

@endsection
@section('scripts')
    <script>
        $(document).ready(function() {

            $("#Men_Inicio").removeClass("active");
            $("#Men_Presentacion").removeClass("active");
            $("#Men_Foros").addClass("active open");

            $.extend({
                enviarMensaje: function() {
                    let mensajeEs = document.getElementById("comentarioEscrito").value;
                    let foro = document.getElementById("id_foro").value;
                    var form = $("#formAuxiliarEnvioMensaje");
                    $("#Comentario").remove();
                    $("#idForo").remove();
                    form.append("<input type='hidden' name='Comentario' id='Comentario' value='" +
                        mensajeEs + "'>");
                    form.append("<input type='hidden' name='idForo' id='idForo' value='" + foro + "'>");
                    var url = form.attr("action");
                    var datos = form.serialize();

                    if (mensajeEs == "") {
                        Swal.fire({
                            title: "Gestionar Foros",
                            text: "Debes de ingresar un comentario",
                            icon: "warning",
                            button: "Aceptar",
                        });

                        return;
                    }

                    $.ajax({
                        type: "post",
                        url: url,
                        data: datos,
                        success: function(respuesta) {
                            if (respuesta.estado == "ok") {
                                $.cargarComentarios();
                                $("#comentarioEscrito").val("");
                            } else {
                                mensaje = "El comentario no pudo ser guardado";

                                Swal.fire({
                                    title: "Gestionar Foros",
                                    text: mensaje,
                                    icon: "warning",
                                    button: "Aceptar",
                                });
                            }

                        },
                        error: function() {

                            mensaje = "El comentario no pudo ser guardado";

                            Swal.fire({
                                title: "Gestionar Foros",
                                text: mensaje,
                                icon: "warning",
                                button: "Aceptar",
                            });
                        }
                    });
                },
                cargarComentarios: function() {
                    let foro = document.getElementById("id_foro").value;
                    var form = $("#formAuxiliarCargarComentarios");
                    $("#idForo").remove();
                    form.append("<input type='hidden' name='idForo' id='idForo' value='" +
                        foro + "'>");
                    var url = form.attr("action");
                    var datos = form.serialize();
                    let comentarios = '';
                    $.ajax({
                        type: "post",
                        url: url,
                        data: datos,
                        success: function(respuesta) {
                            $("#addcomentarios").html(respuesta.listComentarios);
                        }
                    });


                }
            });

       

            $(".btnEliminar").on({
                click: function(e) {
                    e.preventDefault();
                    var id = $(this).data('id');
                    var form = $("#formAuxiliar");
                    $("#idAuxiliar").remove();
                    form.append("<input type='hidden' name='id' id='idAuxiliar' value='" + id + "'>");
                    var url = form.attr("action");
                    var datos = form.serialize();
                    mensaje = "¿Desea Eliminar este Foro?";

                    Swal.fire({
                        title: 'Gestionar Foros',
                        text: mensaje,
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Si, Elimninar!',
                        cancelButtonText: 'Cancelar'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                type: "post",
                                url: url,
                                data: datos,
                                success: function(respuesta) {
                                    Swal.fire({
                                        title: "",
                                        text: respuesta.mensaje,
                                        icon: "success",
                                        button: "Aceptar",
                                    });

                                    if (respuesta.estado === "ELIMINADO") {
                                        $("#Foro" + id).hide();
                                    }

                                },
                                error: function() {

                                    mensaje = "El Foro no pudo ser Eliminado";

                                    Swal.fire({
                                        title: "",
                                        text: mensaje,
                                        icon: "warning",
                                        button: "Aceptar",
                                    });
                                }
                            });
                        }
                    });
                }
            });

            setInterval($.cargarComentarios, 5000);

        });
    </script>
@endsection
