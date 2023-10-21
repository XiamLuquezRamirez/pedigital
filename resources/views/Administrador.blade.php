@extends('Plantilla.Principal')
@section('title', 'Tablero')
@section('Contenido')
    @if (Session::get('PerAsig') == 'si')
        @if (count($Asignatura) > 0)
            <div class="content-header row" id="cabe_asig">
                <div class="content-header-left col-md-12 col-12 mb-2">
                    <h3 class="content-header-title mb-0" id="Titulo">Asignaturas</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item" onclick="$.mostAsig()"><a href="">Tablero</a>
                                </li>
                                <li class="breadcrumb-item" id='li_cursos'><a href="#">Asignatura</a>
                                </li>

                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endif

    <div class="content-body">
        <label id="id_dat"></label>
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
        @if (Session::get('PerAsig') == 'si')
            <div class="row" id="Div_Asig">
                <div class="col-xl-12 col-lg-12 col-md-12">
                    @if (Auth::user()->tipo_usuario == 'Estudiante')
                        <div class="row">
                            @foreach ($Asignatura as $Asig)
                                <div class="col-xl-4 col-lg-4 col-md-12">
                                    <div class="card hvr-grow-shadow">
                                        <div class="card-content border-blue border-danger">
                                            <div id="carousel-example" class="carousel slide" data-ride="carousel">
                                                <ol class="carousel-indicators">
                                                    <li data-target="#carousel-example" data-slide-to="0" class="active">
                                                    </li>
                                                    <li data-target="#carousel-example" data-slide-to="1"></li>
                                                    <li data-target="#carousel-example" data-slide-to="2"></li>
                                                </ol>
                                                <div class="carousel-inner" role="listbox">
                                                    @php
                                                        $active = 'active';
                                                    @endphp
                                                    @foreach ($imgasig as $img)
                                                        @if ($Asig->id == $img->modulo_img)
                                                            <div class="carousel-item {!! $active !!}">
                                                                <img src="{{ asset('app-assets/images/Img_Modulos/' . $img->url_img) }}"
                                                                    style="height: 200px; width: 350px;" class="img-fluid"
                                                                    alt="First slide">
                                                            </div>
                                                            @php
                                                                $active = '';
                                                            @endphp
                                                        @endif
                                                    @endforeach
                                                </div>
                                                <a class="left carousel-control" href="#carousel-example" role="button"
                                                    class="img-fluid" data-slide="prev">
                                                    <span class="icon-prev" aria-hidden="true"></span>
                                                    <span class="sr-only">Previous</span>
                                                </a>
                                                <a class="right carousel-control" href="#carousel-example" role="button"
                                                    data-slide="next">
                                                    <span class="icon-next" aria-hidden="true"></span>
                                                    <span class="sr-only">Next</span>
                                                </a>
                                            </div>
                                            <div class="card-body">
                                                <h5 class="card-title" style="font-size:12px;">{!! $Asig->nombre . ' - Grado ' . $Asig->grado_modulo . '°' !!}</h5>
                                            </div>
                                            <div class="insights px-2">
                                                <div>
                                                    <span class="text-info h3">{!! $Asig->avance_modulo !!}%</span>
                                                    <span class="float-right">Completado</span>
                                                </div>
                                                <div class="progress progress-md mt-1 mb-0">
                                                    <div class="progress-bar bg-info" role="progressbar"
                                                        style="width: {{ $Asig->avance_modulo }}%" aria-valuenow="25"
                                                        aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <div
                                                class="card-footer border-top-blue-grey border-top-lighten-5 text-muted ml-1 mr-1 mt-0 p-0 pb-1">
                                                <a href="{{ url('/Contenido/Presentacion/' . $Asig->id) }}"
                                                    class="btn btn-blue">Entrar</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="row">
                            @foreach ($Asignatura as $Asig)
                                <div class="col-xl-4 col-lg-4 col-md-12" onclick="$.EntrarAsig({!! $Asig->id !!});"
                                    style="cursor: pointer;">
                                    <div class="card hvr-grow-shadow">
                                        <div class="card-content text-success border-success" style="height: 350px;">
                                            <div id="carousel-example" class="carousel slide" data-ride="carousel">
                                                <ol class="carousel-indicators">
                                                    <li data-target="#carousel-example" data-slide-to="0" class="active">
                                                    </li>
                                                    <li data-target="#carousel-example" data-slide-to="1"></li>
                                                    <li data-target="#carousel-example" data-slide-to="2"></li>
                                                </ol>
                                                <div class="carousel-inner" role="listbox">
                                                    @php
                                                        $active = 'active';
                                                    @endphp
                                                    @foreach ($imgasig as $img)
                                                        @if ($Asig->id == $img->asig_img)
                                                            <div class="carousel-item {!! $active !!}">
                                                                <img src="{{ asset('app-assets/images/Img_Asinaturas/' . $img->url_img) }}"
                                                                    style="height: 200px; width: 350px;" class="img-fluid"
                                                                    alt="First slide">
                                                            </div>
                                                            @php
                                                                $active = '';
                                                            @endphp
                                                        @endif
                                                    @endforeach
                                                </div>
                                                <a class="left carousel-control" href="#carousel-example" role="button"
                                                    class="img-fluid" data-slide="prev">
                                                    <span class="icon-prev" aria-hidden="true"></span>
                                                    <span class="sr-only">Previous</span>
                                                </a>
                                                <a class="right carousel-control" href="#carousel-example" role="button"
                                                    data-slide="next">
                                                    <span class="icon-next" aria-hidden="true"></span>
                                                    <span class="sr-only">Next</span>
                                                </a>
                                            </div>
                                            <div class="card-body mb-0">
                                                <h1 class="card-title" style="font-size:18px; margin-bottom: 0px;">
                                                    {!! $Asig->nombre !!}
                                                </h1>
                                            </div>

                                            <div
                                                class="card-footer border-top-blue-grey border-top-lighten-5 text-muted ml-1 mr-1 mt-0 p-0 pb-1">
                                                <a style="color: #ffffff;" class="btn btn-success mr-1">Entrar</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif

                </div>
            </div>
        @endif

          

        @if (Session::get('PerModu') == 'si')
            @if (count($Modulos) > 0)
                <div class="content-header row" id="cabe_modulos">
                    <div class="content-header-left col-md-12 col-12 mb-2">
                        <h3 class="content-header-title mb-0" id="TituloMod">Módulos Transversales</h3>
                        <div class="row breadcrumbs-top">
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item" onclick="$.mostAsig()"><a href="">Tablero</a>
                                    </li>
                                    <li class="breadcrumb-item" id='li_cursos'><a href="#">Módulos
                                            Transversales</a>
                                    </li>

                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <div class="row" id="Div_modu">
                <div class="col-xl-12 col-lg-12 col-md-12">
                    @if (Auth::user()->tipo_usuario == 'Estudiante')
                        <div class="row">
                            @foreach ($Modulos as $Asig)
                                <div class="col-xl-4 col-lg-4 col-md-12">
                                    <div class="card hvr-grow-shadow">
                                        <div class="card-content border-blue border-danger">
                                            <div id="carousel-example" class="carousel slide" data-ride="carousel">
                                                <ol class="carousel-indicators">
                                                    <li data-target="#carousel-example" data-slide-to="0" class="active">
                                                    </li>
                                                    <li data-target="#carousel-example" data-slide-to="1"></li>
                                                    <li data-target="#carousel-example" data-slide-to="2"></li>
                                                </ol>
                                                <div class="carousel-inner" role="listbox">
                                                    @php
                                                        $active = 'active';
                                                    @endphp
                                                    @foreach ($imgmodulo as $img)
                                                        @if ($Asig->id == $img->modulo_img)
                                                            <div class="carousel-item {!! $active !!}">
                                                                <img src="{{ asset('app-assets/images/Img_GradosModTransv/' . $img->url_img) }}"
                                                                    style="height: 200px; width: 350px;" class="img-fluid"
                                                                    alt="First slide">
                                                            </div>
                                                            @php
                                                                $active = '';
                                                            @endphp
                                                        @endif
                                                    @endforeach
                                                </div>
                                                <a class="left carousel-control" href="#carousel-example" role="button"
                                                    class="img-fluid" data-slide="prev">
                                                    <span class="icon-prev" aria-hidden="true"></span>
                                                    <span class="sr-only">Previous</span>
                                                </a>
                                                <a class="right carousel-control" href="#carousel-example" role="button"
                                                    data-slide="next">
                                                    <span class="icon-next" aria-hidden="true"></span>
                                                    <span class="sr-only">Next</span>
                                                </a>
                                            </div>
                                            <div class="card-body">
                                                <h5 class="card-title" style="font-size:12px;">{!! $Asig->nombre . ' - Grado ' . $Asig->grado_modulo . '°' !!}
                                                </h5>
                                            </div>
                                            <div class="insights px-2">
                                                <div>
                                                    <span class="text-info h3">{!! $Asig->avance_modulo !!}%</span>
                                                    <span class="float-right">Completado</span>
                                                </div>
                                                <div class="progress progress-md mt-1 mb-0">
                                                    <div class="progress-bar bg-info" role="progressbar"
                                                        style="width: {{ $Asig->avance_modulo }}%" aria-valuenow="25"
                                                        aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <div
                                                class="card-footer border-top-blue-grey border-top-lighten-5 text-muted ml-1 mr-1 mt-0 p-0 pb-1">
                                                <a href="{{ url('/Contenido/PresentacionMod/' . $Asig->id) }}"
                                                    class="btn btn-blue">Entrar</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>  
                        @else
                            <div class="row">
                                @foreach ($Modulos as $Asig)
                                    <div class="col-xl-4 col-lg-4 col-md-12"
                                        onclick="$.EntrarModu({!! $Asig->id !!});" style="cursor: pointer;">
                                        <div class="card hvr-grow-shadow">
                                            <div class="card-content text-success border-success" style="height: 350px;">
                                                <div id="carousel-example" class="carousel slide" data-ride="carousel">
                                                    <ol class="carousel-indicators">
                                                        <li data-target="#carousel-example" data-slide-to="0"
                                                            class="active">
                                                        </li>
                                                        <li data-target="#carousel-example" data-slide-to="1"></li>
                                                        <li data-target="#carousel-example" data-slide-to="2"></li>
                                                    </ol>
                                                    <div class="carousel-inner" role="listbox">
                                                        @php
                                                            $active = 'active';
                                                        @endphp
                                                        @foreach ($imgmodulo as $img)
                                                            @if ($Asig->id == $img->asig_img)
                                                                <div class="carousel-item {!! $active !!}">
                                                                    <img src="{{ asset('app-assets/images/Img_ModulosTransv/' . $img->url_img) }}"
                                                                        style="height: 200px; width: 350px;"
                                                                        class="img-fluid" alt="First slide">
                                                                </div>
                                                                @php
                                                                    $active = '';
                                                                @endphp
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                    <a class="left carousel-control" href="#carousel-example"
                                                        role="button" class="img-fluid" data-slide="prev">
                                                        <span class="icon-prev" aria-hidden="true"></span>
                                                        <span class="sr-only">Previous</span>
                                                    </a>
                                                    <a class="right carousel-control" href="#carousel-example"
                                                        role="button" data-slide="next">
                                                        <span class="icon-next" aria-hidden="true"></span>
                                                        <span class="sr-only">Next</span>
                                                    </a>
                                                </div>
                                                <div class="card-body">
                                                    <h1 class="card-title" style="font-size:18px;margin-bottom: 0px;">
                                                        {!! $Asig->nombre !!}
                                                    </h1>
                                                </div>

                                                <div
                                                    class="card-footer border-top-blue-grey border-top-lighten-5 text-muted ml-1 mr-1 mt-0 p-0 pb-1">
                                                    <a style="color: #ffffff;" class="btn btn-success mr-1">Entrar</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach


                            </div>
                    @endif

                </div>

            </div>
        @endif

        @if (Auth::user()->tipo_usuario != 'Estudiante')
            @if (Session::get('PerModE') == 'si')
                @if (count($AsigModuloE) > 0)
                    <div class="content-header row" id="cabe_moduloE">
                        <div class="content-header-left col-md-12 col-12 mb-2">
                            <h3 class="content-header-title mb-0" id="TituloModE">Módulo de Entrenamiento</h3>
                            <div class="row breadcrumbs-top">
                                <div class="breadcrumb-wrapper col-12">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="">Tablero</a>
                                        </li>
                                        <li class="breadcrumb-item" id='li_cursos'><a href="#">Módulo E</a>
                                        </li>

                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row" id="Div_moduE">
                        @foreach ($AsigModuloE as $ModE)
                            @if (Auth::user()->tipo_usuario == 'Estudiante')
                                <div class="col-xl-4 col-lg-4 col-md-12"
                                    onclick="$.EntrarModuE({!! $ModE->id !!});" style="cursor: pointer;">
                                    <div class="card hvr-grow-shadow">
                                        <div class="card-content text-success border-success " style="height: 350px;">
                                            <div id="carousel-example" class="carousel slide" data-ride="carousel">
                                                <ol class="carousel-indicators">
                                                    <li data-target="#carousel-example" data-slide-to="0" class="active">
                                                    </li>
                                                    <li data-target="#carousel-example" data-slide-to="1"></li>
                                                    <li data-target="#carousel-example" data-slide-to="2"></li>
                                                </ol>
                                                <div class="carousel-inner" role="listbox">
                                                    <div class="carousel-item active">
                                                        <img src="{{ asset('app-assets/images/Img_ModuloE/' . $ModE->imagen) }}"
                                                            style="height: 200px; width: 350px;" class="img-fluid"
                                                            alt="First slide">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <h1 class="card-title" style="font-size:18px;margin-bottom: 0px;">
                                                    {!! $ModE->nombre . ' - Grado ' . $ModE->grado . '°' !!}</h1>
                                            </div>

                                            <div
                                                class="card-footer border-top-blue-grey border-top-lighten-5 text-muted ml-1 mr-1 mt-0 p-0 pb-1">
                                                <a style="color: #ffffff;" class="btn btn-success mr-1 mb-1">Entrar</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="col-xl-4 col-lg-4 col-md-12"
                                    onclick="$.EntrarGradoAsig({!! $ModE->id !!});" style="cursor: pointer;">
                                    <div class="card hvr-grow-shadow">
                                        <div class="card-content text-success border-success " style="height: 350px;">
                                            <div id="carousel-example" class="carousel slide" data-ride="carousel">
                                                <ol class="carousel-indicators">
                                                    <li data-target="#carousel-example" data-slide-to="0" class="active">
                                                    </li>
                                                    <li data-target="#carousel-example" data-slide-to="1"></li>
                                                    <li data-target="#carousel-example" data-slide-to="2"></li>
                                                </ol>
                                                <div class="carousel-inner" role="listbox">
                                                    <div class="carousel-item active">
                                                        <img src="{{ asset('app-assets/images/Img_ModuloE/' . $ModE->imagen) }}"
                                                            style="height: 200px; width: 350px;" class="img-fluid"
                                                            alt="First slide">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <h1 class="card-title" style="font-size:18px;margin-bottom: 0px;">
                                                    {!! $ModE->nombre_area !!}</h1>
                                            </div>

                                            <div
                                                class="card-footer border-top-blue-grey border-top-lighten-5 text-muted ml-1 mr-1 mt-0 p-0 pb-1">
                                                <a style="color: #ffffff;" class="btn btn-success mr-1">Entrar</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach


                    </div>


                @endif
            @endif
        @endif

        <div class="row" id="Div_Cursos" style="display: none;">
            <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="row" id="Div_Row">
                </div>
            </div>

        </div>

        <div id="btn-atrasPrincipal" style="display: none;" class="modal-footer">
            <button type="button" onclick="$.atrasPrincipal();"
                class="mr-1 mb-1 btn btn-outline-secondary btn-min-width"><i class="ft-corner-up-left"></i> Atras</button>

        </div>


    </div>

    {!! Form::open(['url' => '/Contenido/CargaCursos', 'id' => 'formAuxiliar']) !!}
    {!! Form::close() !!}

    {!! Form::open(['url' => '/Contenido/CargaCursosMod', 'id' => 'formAuxiliarMod']) !!}
    {!! Form::close() !!}

    {!! Form::open(['url' => '/Contenido/CargaCursosModE', 'id' => 'formAuxiliarModE']) !!}
    {!! Form::close() !!}
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {


            $("#Men_Tablero").addClass("active");
            $.extend({
                EntrarAsig: function(id) {

                    $("#Div_Asig").hide();
                    $("#Div_modu").hide();
                    $("#Div_moduE").hide();
                    $("#Div_Cursos").show();
                    $("#btn-atrasPrincipal").show();

                    $("#cabe_asig").show();
                    $("#cabe_modulos").hide();
                    $("#cabe_moduloE").hide();
                    $("#Div_moduE").hide();

                    var form = $("#formAuxiliar");
                    $("#idAsig").remove();
                    form.append("<input type='hidden' name='idAsig' id='idAsig' value='" + id + "'>");
                    var url = form.attr("action");
                    var datos = form.serialize();
                    var j = 1;
                    var contenido = '';
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: datos,
                        dataType: "json",
                        success: function(respuesta) {
                            $("#Div_Row").html(respuesta.contenido);
                            $("#Titulo").html('Grados de la Asignatura ' + respuesta
                                .NomAsig);
                        }
                    });

                },
                EntrarModu: function(id) {

                    $("#Div_Asig").hide();
                    $("#Div_modu").hide();
                    $("#Div_moduE").hide();
                    $("#Div_Cursos").show();
                    $("#btn-atrasPrincipal").show();

                    $("#cabe_asig").hide();
                    $("#cabe_modulos").show();
                    $("#cabe_moduloE").hide();
                    $("#Div_moduE").hide();

                    var form = $("#formAuxiliarMod");
                    $("#idAsig").remove();
                    form.append("<input type='hidden' name='idAsig' id='idAsig' value='" + id + "'>");
                    var url = form.attr("action");
                    var datos = form.serialize();
                    var j = 1;
                    var contenido = '';
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: datos,
                        dataType: "json",
                        success: function(respuesta) {
                            $("#Div_Row").html(respuesta.contenido);
                            $("#TituloMod").html('Grados del Módulo de ' + respuesta
                                .NomAsig);
                        }
                    });

                },

                atrasPrincipal: function() {
                    $("#Div_Asig").show();
                    $("#Div_modu").show();
                    $("#Div_moduE").show();
                    $("#Div_Cursos").hide();
                    $("#btn-atrasPrincipal").hide();

                    $("#cabe_asig").show();
                    $("#cabe_modulos").show();
                    $("#cabe_moduloE").show();

                    $("#Titulo").html('Asignaturas');
                    $("#TituloMod").html('Módulos Transversales');
                    $("#TituloModE").html('Módulo de Entrenamiento');
                },

                EntrarGradoAsig: function(idArea) {

                    $("#Div_Asig").hide();
                    $("#Div_modu").hide();
                    $("#Div_moduE").hide();
                    $("#Div_Cursos").show();
                    $("#btn-atrasPrincipal").show();

                    $("#cabe_asig").hide();
                    $("#cabe_modulos").hide();
                    $("#cabe_moduloE").show();
                    $("#Div_moduE").hide();

                    var form = $("#formAuxiliarModE");
                    $("#idArea").remove();
                    form.append("<input type='hidden' name='idArea' id='idArea' value='" + idArea +
                        "'>");
                    var url = form.attr("action");
                    var datos = form.serialize();
                    var j = 1;
                    var contenido = '';
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: datos,
                        dataType: "json",
                        success: function(respuesta) {
                            $("#Div_Row").html(respuesta.contenido);
                            $("#TituloModE").html('Grados del Módulo E de ' + respuesta
                                .NomAsig);
                        }
                    });
                },
                mostAsig: function() {
                    $("#Div_Asig").show();
                    $("#Div_Cursos").hide();
                    $("#li_cursos").hide();

                }

            });
        });
    </script>
@endsection
