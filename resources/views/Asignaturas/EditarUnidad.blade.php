@extends('Plantilla.Principal')
@section('title','Editar Unidad')
@section('Contenido')

<div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-2">
        <h3 class="content-header-title mb-0">{{Session::get('des')}}</h3>
        <div class="row breadcrumbs-top">
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/Administracion')}}">Inicio</a>
                    </li>
                    <li  class="breadcrumb-item active">Editar Unidad
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
                        <h4 class="card-title">Editar Unidad</h4>                    
                    </div>
                    <div class="card-content collapse show">
                        <div class="card-body">

                            <div class="row">
                                <div class="col-md-12">
                                    @if($errors->any())
                                    <div class="alert alert-danger alert-dismissible show" role="alert" >
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <h6 style="font: 16px EXODO;">Por favor corrige los siguientes errores:</h6>
                                        <ul>
                                            @foreach($errors->all() as $error)
                                            <strong style="font: 15px EXODO;"><li>{{ $error }}</li></strong>                                        
                                            @endforeach
                                        </ul>
                                    </div>        
                                    @endif                    
                                </div>
                            </div>

                            <p class="px-1"></p>

                            <!--begin::Form-->
                            @include('Asignaturas.FormUnidad',
                            ['url'=>'/Asignaturas/ModificarUnidad/'.$unid->id,
                            'method'=>'put'
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

{!! Form::open(['url'=>'/cambiar/Periodos2','id'=>'formAuxiliarPeri'])!!}
{!! Form::close() !!}

{!! Form::open(['url' => '/cambiar/docentesEditUnid', 'id' => 'formAuxiliarCargDocentes']) !!}
{!! Form::close() !!}


@endsection
@section('scripts')
<script>
    $(document).ready(function () {
        $("#Men_Inicio").removeClass("active");
        $("#Men_Asignaturas").addClass("has-sub open");
        $("#Men_Asignaturas_addUnid").addClass("active");

        $.extend({
            CargPeriodos: function () {
            $("#btn-Compartir").show();
            var form = $("#formAuxiliarPeri");
            $("#idAsig").remove();
            id=$("#modulo").val();
            id_per=$("#tema_per").val();
            form.append("<input type='hidden' name='id' id='idAsig' value='" + id + "'><input type='hidden' name='idPer' id='idPer' value='" + id_per + "'>");
            var url = form.attr("action");
            var datos = form.serialize();
            $.ajax({
                type: "POST",
                url: url,
                data: datos,
                dataType: "json",
                success: function (respuesta) {
                    $("#periodo").html(respuesta.select_Periodo);
                }
            });
            },
            cargarDocentes: function(or) {

                if(or=="btn"){
                    $("#ModCompartir").modal({
                        backdrop: 'static',
                        keyboard: false
                    });
                }
             

                var Tabla="";
                var j=1;

                var modu_id= $("#unid_modulo").val();
                var unida_id= $("#unida_id").val();
                var form = $("#formAuxiliarCargDocentes");
                $("#idTema").remove();
                $("#idMod").remove();
                form.append("<input type='hidden' name='idMod' id='idMod' value='" + modu_id + "'>");
                form.append("<input type='hidden' name='idunid' id='idunid' value='" + unida_id + "'>");
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
                                Tabla += "<td class='text-truncate'>" + item.ndocente+ "</td> ";
                                Tabla +=
                                    "<input type='hidden' name='idDocente[]' value='" + item.usuario_profesor + "'>"+
                                    "<input type='hidden' name='grupo[]' value='" + item.grupo + "'>"+
                                    "<input type='hidden' name='jornada[]' value='" + item.jornada + "'>";

                                    if($("#id_usuario").val()==item.usuario_profesor){
                                        Tabla +=   "<input type='hidden' id='DoceSel" + j +"' name='DoceSel[]' value='si'>"+
                                        "<td class='text-truncate text-center'>"+
                                        "<input type='checkbox' onclick='$.SelDocente(" + j + ");' id='CheckSeleccion" + j +"' style='cursor: pointer;' disabled checked name='checkDocenteSel' value=''>";
                                    }else{
                                        if(item.Comp=="si"){
                                            Tabla += "<input type='hidden' id='DoceSel" + j +"' name='DoceSel[]' value='si'>"+
                                            "<td class='text-truncate text-center'>"+
                                            "<input type='checkbox' onclick='$.SelDocente(" + j + ");' id='CheckSeleccion" + j +"' style='cursor: pointer;' checked name='checkDocenteSel' value=''>";
                                        }else{
                                            Tabla += "<input type='hidden' id='DoceSel" + j +"' name='DoceSel[]' value='no'>"+
                                            "<td class='text-truncate text-center'>"+
                                            "<input type='checkbox' onclick='$.SelDocente(" + j + ");' id='CheckSeleccion" + j +"' style='cursor: pointer;' name='checkDocenteSel' value=''>";
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
                                text: 'No existen docentes con los que puedas compartir esta Unidad a crear',
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

        });
        
        $.CargPeriodos();
        $.cargarDocentes("loading");
        
    });

    function validartxtnum(e) {
        tecla = e.which || e.keyCode;
        patron = /[0-9]+$/;
        te = String.fromCharCode(tecla);
        //    if(e.which==46 || e.keyCode==46) {
        //        tecla = 44;
        //    }
        return (patron.test(te) || tecla == 9 || tecla == 8 || tecla == 37 || tecla == 39 || tecla == 44);
    }
</script>
@endsection

