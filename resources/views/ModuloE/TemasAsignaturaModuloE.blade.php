@extends('Plantilla.Principal')
@section('title', 'Temas de Asignaturas Módulo de Entrenamiento')
@section('Contenido')
    <input type="hidden" id="idAsig" value="{{ $idAsig }}" />
    <input type="hidden" class="form-control" name="tema_id" id="tema_id" value="" />
    <input type="hidden" id="token" value="{{ csrf_token() }}">
    <input type="hidden" class="form-control" id="Tip_Usu" value="{{ Auth::user()->tipo_usuario }}" />
    <input type="hidden" class="form-control" id="Ruta" data-ruta="{{ asset('/app-assets/') }}" />
    <input type="hidden" class="form-control" id="Id_Doce" value="{{ Session::get('DOCENTE') }}" />
    <input type="hidden" data-id='id-dat' id="dattaller"
        data-ruta="{{ asset('/app-assets/Archivos_EvaluacionTaller') }}" />
    <input type="hidden" data-id='id-dat' id="Respdattaller"
        data-ruta="{{ asset('/app-assets/Archivos_EvalTaller_Resp') }}" />

    <div class="content-header row" id="cabe_asig">
        <div class="content-header-left col-md-12 col-12 mb-2">
            <h3 class="content-header-title mb-0" id="Titulo">TEMAS DE ASIGNATURAS MÓDULO DE ENTRENAMIENTO</h3>
            <div class="row breadcrumbs-top">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="">Tablero</a>
                        </li>
                        <li class="breadcrumb-item" id='li_cursos'><a href="#">Temas Módulo E</a>
                        </li>

                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content-body">

        <div class="row" id="Div_TemasAsig">
            <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="row" id="Div_RowTemas">

                </div>
                <div class="modal-footer">
                    <a type="submit" id="btn_atras" href="{{ url('/Administracion') }}"
                        class="btn grey btn-outline-secondary"><i class="ft-corner-up-left position-right"></i>
                        Atras</a>
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
                        <div class="row" style="display: none;" id="Div_RowPracticas">

                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btn_Practica" onclick="$.AbrirListPractica();" style="display: none;"
                            class="btn grey btn-outline-primary"><i class="ft-list"></i>
                            Practica</button>
                        <button type="button" id="btn_Animaciones" style="display: none;" onclick="$.AbrirAnimaciones();"
                            class="btn btn-outline-amber"><i class="ft-video position-right"></i> Ver Animaciones</button>
                        <button type="button" id="btn_atrasVisTema" data-dismiss="modal"
                            class="btn grey btn-outline-secondary"><i class="ft-corner-up-left position-right"></i>
                            Atras</button>
                        <button type="button" style="display: none;" id="btn_atrasTemas" onclick="$.AtrasEval();"
                            class="btn grey btn-outline-secondary"><i class="ft-corner-up-left position-right"></i>
                            Atras</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade text-left" id="ModPrueba" tabindex="-1" role="dialog" aria-labelledby="myModalLabel15"
            aria-hidden="true">
            <div class="modal-dialog  modal-xl" role="document">
                <div class="modal-content ">
                    <div class="modal-body">
                        <article id='DetEval' style="display: none;text-transform: capitalize;" class="wrapper">
                            <header></header>
                            <main style="height: 400px; overflow: auto;"></main>
                        </article>

                        <article id='DetEvalFin' style="display: none;text-transform: capitalize;" class="wrapper">
                            <header></header>
                            <main style="height: 400px; overflow: auto;"></main>
                        </article>

                    </div>
                    <div class="modal-footer">
                        <div id="contTiempo"
                            style="text-align: left; font-size: 25px;display: none; padding-right: 20px;">
                            <div class="content-header row">

                                <div class="content-header-left col-md-12 col-12">
                                    <div class="btn-group float-md-right" role="group"
                                        aria-label="Button group with nested dropdown">

                                        <a class="btn btn-outline-primary"><i class="ft-clock"> Tiempo para
                                                Terminar</i></a>
                                        <a class="btn btn-outline-primary" style="color: #CE2605;" id="cuenta"></a>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row" id="Dat_Cal" style="display: none;">
                            <div class="col-md-5" style="text-align: center;">
                                <labe>Intentos Permitidos:</labe><br>
                                <labe id="label_IntPerm" style="color:  #CE2605;"></labe>
                            </div>
                            <div class="col-md-5" style="text-align: center;">
                                <labe>Intentos Realizados:</labe><br>
                                <labe id="label_IntReal"></labe>
                            </div>
                        </div>
                        <button type="button" id="VidDidac" onclick="$.MostVid();" style="display: none;"
                            class="btn btn-success"><i class="fa fa-video-camera"></i> Ver Contenido
                            Didactico</button>
                        <button type="button" id="btn_ConversaEval" onclick="$.AbrirConvEval('M');"
                            style="display: none;" class="btn btn-outline-pink"><i
                                class="ft-message-square position-right"></i> Comentarios</button>
                        <button type="button" id="btn_salirModEv" class="btn grey btn-outline-secondary"
                            onclick="$.AtrasEvaluacion();"><i class="ft-corner-up-left position-right"></i> Salir</button>
                        <button type="button" id="btn_atrasModEv" style="display: none;"
                            class="btn grey btn-outline-secondary" onclick="$.AtrasModActIni();"><i
                                class="ft-corner-up-left position-right"></i>
                            Atras</button>
                    </div>
                </div>
            </div>
        </div>




    </div>
    {!! Form::open(['url' => '/ModuloE/CargarTemasModuloE', 'id' => 'formAuxiliar']) !!}
    {!! Form::close() !!}
    {!! Form::open(['url' => '/ModuloE/CargaDetTemasModuloE', 'id' => 'formAuxiliarTemas']) !!}
    {!! Form::close() !!}
    {!! Form::open(['url' => '/ModuloE/CargarPracticas', 'id' => 'formConsuAct']) !!}
    {!! Form::close() !!}
    {!! Form::open(['url' => '/ModuloE/ContenidoEva', 'id' => 'formContenidoEva']) !!}
    {!! Form::close() !!}
    {!! Form::open(['url' => '/ModuloE/consulPregAlumno', 'id' => 'formAuxiliarCargPregTem']) !!}
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

            $("#Men_Tablero").addClass("active");
            $.extend({
                EntrarAsig: function(id) {

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
                                        '<div style="cursor:pointer; width: 100%;" onclick="$.MostConteDoc(' +
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

                    $("#Div_RowTemasDet").show();
                    $("#Div_RowPracticas").hide();

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

                    $("#Div_RowTemasDet").show();
                    $("#Div_RowPracticas").hide();

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

                MostConteVid: function(id) {

                    $("#VisTema").modal({
                        backdrop: 'static',
                        keyboard: false
                    });
                    $("#btn_Animaciones").hide()
                    $("#tema_id").val(id);

                    $("#Div_RowTemasDet").show();
                    $("#Div_RowPracticas").hide();

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
                AbrirListPractica: function() {

                    $("#Div_RowTemasDet").hide();
                    $("#Div_RowPracticas").show();
                    $("#btn_Practica").hide();

                    $("#btn_atrasVisTema").hide();
                    $("#btn_atrasTemas").show();

                    var form = $("#formConsuAct");
                    var id = $("#tema_id").val();

                    var contenido = '';
                    $("#Tema").remove();
                    $("#clasf").remove();
                    var Text_Coment = $("#Text_Coment").val();
                    form.append("<input type='hidden' name='Tema' id='Tema' value='" + id +
                        "'><input type='hidden' name='clasf' id='clasf' value='PRACTICA'>");
                    var url = form.attr("action");
                    var datos = form.serialize();
                    var j = 1;

                    contenido += "<div class='col-lg-12 col-md-12' > " +
                        "  <div class='card'>" +
                        "    <div class='card-content' style='height: 400px; overflow: auto;'>" +
                        "      <div class='card-body' >";
                    let estadoEval = "none";
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: datos,
                        async: false,
                        dataType: "json",
                        success: function(respuesta) {
                            $("#TemDetTit").html(respuesta.TitTemas);
                            $.each(respuesta.Eval, function(i, item) {
                                if (item.evaluado == "CALIFICADA") {
                                    estadoEval = "block";
                                }
                                contenido +=
                                    "<div class='bs-callout-info callout-square callout-bordered mt-1'>" +
                                    "<div class='media align-items-stretch'>" +
                                    " <div style='cursor:pointer' onclick='$.MostEval(" +
                                    item.id +
                                    ");' class='d-flex align-items-center bg-info p-2'>" +
                                    "       <i class='ft-user-check white font-medium-5'></i>" +
                                    " </div>" +
                                    "    <div class='media-body p-1'>" +
                                    "    <a style='cursor:pointer;text-transform: capitalize;font-weight: bold;'> " +
                                    item.titulo.toLowerCase(); +
                                "</a>";
                                contenido += " </div>" +
                                    "    <div class='media-body p-1' style='display:" +
                                    estadoEval + "'>" +
                                    "   <button type='button' onclick='$.detalleEvaluacion(" +
                                    item.id +
                                    ");' class='btn btn-icon btn-success mr-1'><i class='fa fa-check-square-o'></i> Calificada</button>";
                                contenido += " </div>" +
                                    "    </div>" +
                                    "  </div>";
                                j++;
                            });
                        }
                    });

                    contenido += '</div></div></div>';

                    $("#Div_RowPracticas").html(contenido);



                },
                MostEval: function(id) {

                    let TemId = $("#tema_id").val();

                    $("#ModPrueba").modal({
                        backdrop: 'static',
                        keyboard: false
                    });

                    $('#VisTema').modal('toggle');
                    $("#DetEval").show();
                    var contenido = "";
                    $("#IdEval").val(id);

                    var $wrapper = $('#DetEval');
                    $wrapper.avnSkeleton('display');
                    $("#label_IntPerm").html("");
                    $("#label_IntReal").html("");
                    $("#txt_califVis").val("");
                    $("#txt_califVis").css('background-color', '#ffffff');
                    var NomVidEval = "";
                    var Parrafo = "";
                    var PregMul = "";
                    var TipEval = "";
                    var Tiempo = "";
                    var HabTie = "";
                    var Enunciado = "";
                    var form = $("#formContenidoEva");
                    var token = $("#token").val();
                    $("#idTemaEva").remove();

                    form.append("<input type='hidden' name='id_tema' id='idTemaEva' value='" + id +
                        "'>");
                    form.append("<input type='hidden' name='_token'  value='" + token + "'>");
                    var url = form.attr("action");
                    var datos = form.serialize();
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: datos,
                        async: false,
                        dataType: "json",
                        success: function(respuesta) {

                            $wrapper.avnSkeleton('remove');
                            var n = 1;
                            TipEval = respuesta.tipeval;
                            Tiempo = respuesta.tiempo;
                            HabTie = respuesta.hab_tiempo;
                            var contenido = '';
                            $wrapper.find('> header').append(respuesta.titulo
                                .toLowerCase());
                            Enunciado = respuesta.enunciado;
                            if (Enunciado == null) {
                                Enunciado = "";
                            }

                            //////////////CARGAR ENUNCIADO
                            contenido += ' <div class="row">' +
                                '<div class="col-md-12">' +
                                '<p>' + Enunciado + '</p>' +
                                '</div>' +
                                ' </div>';

                            /////////

                            //////// CARGAR INFORMACIÓN DE VIDEOS

                            if (respuesta.VideoEval !== "no") {
                                $("#VidDidac").show();
                                $("#datruta").html(
                                    '<source src="" id="sour_video" type="video/mp4">'
                                );
                                jQuery('#sour_video').attr('src', $('#datruta').data(
                                    "ruta") + "/" + respuesta.VideoEval);
                                $("#Nom_Video").val(respuesta.VideoEval);
                            } else {
                                $("#VidDidac").hide();
                            }

                            //////////////

                            //////CARGAR INFORMACIÓN DE INTENTOS

                            $("#Dat_Cal").show();
                            var int_real = respuesta.int_realizados;
                            var int_perm = respuesta.int_perm;

                            $("#label_IntPerm").html(int_perm);
                            $("#label_IntReal").html(int_real);
                            if (respuesta.perfil === "Estudiante") {
                                if (parseInt(respuesta.int_realizados) >= parseInt(respuesta
                                        .int_perm)) {
                                    flagIntent = "fail";
                                } else {
                                    flagIntent = "ok";
                                }
                            } else {
                                flagIntent = "ok";
                            }
                            //////MOSTRAR SI TIENE CONVERSACIONES HABILITADAS

                            if (respuesta.conversa == "SI") {
                                $("#btn_ConversaEval").show();
                            } else {
                                $("#btn_ConversaEval").hide();
                            }
                            /////////////////////////

                            contenido +=
                                '  <div class="row"><div class="card-content collapse show">' +
                                '  <div class="card-body" style="padding-top: 0px;">' +
                                '        <form method="post" action="{{ url('/') }}/ModuloE/RespEvaluaciones" id="Evaluacion" class="number-tab-stepsPreg wizard-circle">';
                            var Preg = 1;
                            var ConsPre = 0;

                            ////////////////CARGAR PREGUNTAS
                            $.each(respuesta.PregEval, function(i, item) {
                                contenido += '         <h6>Pregunta</h6>' +
                                    '         <fieldset>' +
                                    '              <div class="row p-1">' +
                                    '   <div  style="width: 100%" class="bs-callout-primary callout-border-right callout-bordered callout-transparent p-1" >' +
                                    '              <div class="row" >' +
                                    '<input type="hidden" id="id-pregunta' +
                                    ConsPre + '"  value="' + item.idpreg + '" />' +
                                    '<input type="hidden" id="tip-pregunta' +
                                    ConsPre + '"  value="' + item.tipo + '" />' +
                                    '      <div class="col-md-9"><h4 class="primary">Pregunta ' +
                                    Preg + '</h4></div>' +
                                    '      <div class="col-md-3"><span class=" float-right"><i class="fa fa-circle success"></i id="Puntaje' +
                                    ConsPre + '"> 10 Puntos</span></div>' +
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


                            $wrapper.find('> main').append(contenido);

                            $.CargPreg("0");

                            ///////////////INICALIZAR STEPS

                            $(".number-tab-stepsPreg").steps({
                                headerTag: "h6",
                                bodyTag: "fieldset",
                                transitionEffect: "fade",
                                titleTemplate: '<span class="step">#index#</span> #title#',
                                labels: {
                                    finish: 'Finalizar',
                                },
                                onFinished: function(event, currentIndex) {

                                    if (flagTimFin === "s") {
                                        mensaje =
                                            "El Tiempo de Evaluación a Finalizado";
                                        Swal.fire({
                                            title: "",
                                            text: mensaje,
                                            icon: "warning",
                                            button: "Aceptar",
                                        });
                                        return;
                                    }
                                    if ($("#Tip_Usu").val() == "Estudiante") {
                                        $.GuarPreg(currentIndex, 'Ultima');
                                        if (flagGlobal === "s") {
                                            return;
                                        }
                                    }else{
                                      
                                            mensaje = "Las evaluaciones solo pueden ser resueltas por los Estudiantes";
                                            Swal.fire({
                                                title: "Módulo de Entrenamiento",
                                                text: mensaje,
                                                icon: "warning",
                                                button: "Aceptar",
                                            });
                                            return;
                                        
                                    }
                                },
                                onStepChanging: function(event, currentIndex,
                                    newIndex) {
                                    // Allways allow previous action even if the current form is not valid!
                                    if (flagTimFin === "s") {
                                        mensaje =
                                            "El Tiempo de Evaluación a Finalizado";
                                        Swal.fire({
                                            title: "Módulo de Entrenamiento",
                                            text: mensaje,
                                            icon: "warning",
                                            button: "Aceptar",
                                        });
                                        return;
                                    }
                                    if ($("#Tip_Usu").val() == "Estudiante") {
                                        $.GuarPreg(currentIndex, 'next');

                                        if (flagGlobal === "s") {
                                            return;
                                        }
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

                            ///////////////////////


                        }

                    });

                    $("#btn_salirModEv").hide();
                    $("#btn_atrasModEv").show();



                    //////MOSTRAR CONTADOR DE EVALUACIÓN//////////
                    if (HabTie === "SI") {
                        mensaje = "Esta Evaluación Cuenta con un Tiempo de " + Tiempo +
                            " para ser Desarrollada. ¿Desea Realizar Esta Evaluación?";
                        Swal.fire({
                            title: 'Notificación Evaluación',
                            text: mensaje,
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Si, Comenzar!',
                            cancelButtonText: 'Cancelar'
                        }).then((result) => {
                            if (result.isConfirmed) {

                                $("#btn_eval").show();
                                $("#titu_Eva").show();
                                $("#titu_temaEva").hide();

                                clearInterval();

                                if (HabTie == "SI") {
                                    var hora = Tiempo;

                                    parts = hora.split(':');
                                    var hora = Tiempo;
                                    parts = hora.split(':');
                                    var hor = parts[0];
                                    var min = parts[1];

                                    var milhor = parseInt(hor) * 3600000;
                                    var milmin = parseInt(min) * 60000;


                                    $("#contTiempo").show();
                                    // Establece la fecha hasta la que estamos contando
                                    var countDownDate = milhor + milmin;

                                    var ahora = new Date().getTime();
                                    countDownDate = countDownDate + ahora;
                                    var tiempoextra = 300000;



                                    // Actualiza la cuenta atrás cada 1 segundo.
                                    xtiempo = setInterval(function() {

                                        var oElem = document.getElementById('cuenta');
                                        oElem.style.backgroundColor = oElem.style
                                            .backgroundColor == 'white' ? '#00b5b8' :
                                            'white';

                                        // Obtener la fecha y la hora de hoy
                                        var now = new Date().getTime();

                                        // Encuentra la distancia entre ahora y la fecha de la cuenta regresiva
                                        var distance = countDownDate - now;

                                        // Cálculos de tiempo para días, horas, minutos y segundos
                                        var days = Math.floor(distance / (1000 * 60 *
                                            60 * 24));
                                        var hours = Math.floor((distance % (1000 * 60 *
                                            60 * 24)) / (1000 * 60 * 60));
                                        var minutes = Math.floor((distance % (1000 *
                                            60 * 60)) / (1000 * 60));
                                        var seconds = Math.floor((distance % (1000 *
                                            60)) / 1000);

                                        var tiempoCompl = now - ahora;


                                        // Muestra el resultado en un elemento
                                        document.getElementById("cuenta").innerHTML =
                                            hours + "h " + minutes + "m " + seconds +
                                            "s ";
                                        var horas = Math.floor(tiempoCompl / (1000 *
                                            60 * 60));
                                        var minutes = Math.floor(tiempoCompl / 60000);
                                        var seconds = ((tiempoCompl % 60000) / 1000)
                                            .toFixed(0);

                                        $("#tiempEvaluacion").val(horas + ":" +
                                            minutes + ":" + (seconds < 10 ? '0' :
                                                '') + seconds);

                                        // Si la cuenta atrás ha terminado, escribe un texto.

                                        if (flagTimExt === "n") {
                                            if (distance < tiempoextra) {
                                                flagTimExt = "s";
                                                mensaje =
                                                    "La Evaluación finalizara en 5 Minutos, si aún tiene preguntas por responder por favor responda y presione el botón Finalizar.";
                                                Swal.fire({
                                                    title: "Notificación de Evaluación",
                                                    text: mensaje,
                                                    icon: "warning",
                                                    button: "Aceptar",
                                                });
                                            }
                                        }

                                        if (flagTimExt === "s") {
                                            if (distance < 0) {
                                                flagTimFin = "s";
                                                clearInterval(x);
                                                document.getElementById("cuenta")
                                                    .innerHTML =
                                                    "TIEMPO DE EVALUACIÓN TERMINADO";

                                                mensaje =
                                                    "La Evaluación ha finalizado, si no logro terminar informe al Docente encargado.";
                                                Swal.fire({
                                                    title: "Notificación de Evaluación",
                                                    text: mensaje,
                                                    icon: "warning",
                                                    button: "Aceptar",
                                                });

                                            }
                                        }

                                    }, 1000);
                                }
                                ////////////////////////FIN CONTADOR////////////////////////


                            } else {
                                $.AtrasModActIni('F');
                            }
                        });
                    }



                },
                CargPreg: function(id) {
                    var form = $("#formAuxiliarCargPregTem");
                    var Preg = $("#id-pregunta" + id).val();
                    var tipo = $("#tip-pregunta" + id).val();

                    var opci = "";
                    var parr = "";
                    var punt = "";

                    $("#Pregunta").remove();
                    $("#TipPregunta").remove();
                    form.append("<input type='hidden' name='Pregunta' id='Pregunta' value='" +
                        Preg + "'>");
                    form.append(
                        "<input type='hidden' name='TipPregunta' id='TipPregunta' value='" + tipo +
                        "'>"
                    );
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
                                $("#Puntaje" + id).html(respuesta.PregEnsayo.puntaje +
                                    " Puntos");

                                Pregunta += respuesta.PregEnsayo.pregunta;
                                Pregunta += '<div class="col-xl-12 col-lg-6 col-md-12">' +
                                    '   <label for="placeTextarea">Respuesta:</label>' +
                                    ' <textarea cols="80" id="RespPregEns'+id+'" name="RespPregEns"' +
                                    ' rows="3"></textarea>' +
                                    ' </div>';
                                $("#Pregunta" + id).html(Pregunta);
                                $.hab_ediContPregEnsayo(id);
                                if (respuesta.RespPregEnsayo) {
                                    $('#RespPregEns'+id).val(respuesta.RespPregEnsayo
                                        .respuesta);
                                }
                            } else if (tipo === "COMPLETE") {
                                $("#Puntaje" + id).html(respuesta.PregComple.puntaje +
                                    " Puntos");
                                Pregunta += '<div class="col-xl-12 col-lg-6 col-md-12">' +
                                    '   <label for="placeTextarea">Complete el Parrafo con las siguientes Opciones:</label>' +
                                    '<p>' + respuesta.PregComple.opciones + '</p>' +
                                    ' <textarea cols="80" id="RespPregComplete" name="RespPregComplete"' +
                                    ' rows="3"></textarea>' +
                                    ' </div>';
                                $("#Pregunta" + id).html(Pregunta);
                                $.hab_ediContComplete();
                                $('#RespPregComplete').val(respuesta.PregComple.parrafo);
                                if (respuesta.RespPregComple) {
                                    $('#RespPregComplete').val(respuesta.RespPregComple
                                        .respuesta);
                                }

                            } else if (tipo === "OPCMULT") {
                                $("#Puntaje" + id).html(respuesta.PregMult.puntuacion +
                                    " Puntos");
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


                            } else if (tipo === "VERFAL") {
                                $("#Puntaje" + id).html(respuesta.PregVerFal.puntaje +
                                    " Puntos");


                                Pregunta += respuesta.PregVerFal.pregunta;
                                var Opc =
                                    '<div class="form-group row">' +
                                    '<div class="col-md-12">' +
                                    '    <fieldset >' +
                                    '        <div class="input-group">';

                                Opc +=
                                    '<input name="radpregVerFal[]" id="RadVer" value="si"  type="radio">';

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
                                    ' <input name="radpregVerFal[]" id="RadFal"  value="no"  type="radio">';
                                Opc +=
                                    '<div class="input-group-append" style="margin-left:5px;">' +
                                    '            <span  id="basic-addon2">Falso</span>' +
                                    '          </div>' +
                                    '        </div>' +
                                    '      </fieldset>' +
                                    '</div>' +
                                    '            </div>';


                                $("#Pregunta" + id).html(Pregunta + Opc);

                                if (respuesta.RespPregVerFal) {
                                    if (respuesta.RespPregVerFal.respuesta_alumno ===
                                        "si") {
                                        $('#RadVer').prop("checked", "checked");
                                    } else {
                                        $('#RadFal').prop("checked", "checked");
                                    }
                                }
                            } else if (tipo === "RELACIONE") {
                                $("#Puntaje" + id).html(respuesta.PregRelacione.puntaje +
                                    " Puntos");
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

                                    selectPreg =
                                        '<div style="text-transform: none;" class="contenedor' +
                                        cons +
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
                                            ' <a onclick="$.selopc(this.id,' +
                                            cons + ')" id="' + j +
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
                                console.log(respuesta.RespPregRelacione);
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
                                        let optioSel = item2.getAttribute(
                                        'data-id');
                                        if (item.respuesta_alumno == optioSel) {

                                            contenidoSelect.innerHTML = sel[i]
                                                .innerHTML;
                                        }

                                    }

                                    select.classList.toggle('active');
                                    $.selopc(item.consecu, cons)
                                    cons++;
                                });

                            } else if (tipo === "TALLER") {
                                $("#Puntaje" + id).html(respuesta.PregTaller.puntaje +
                                    " Puntos");

                                $("#CargArchi").val("");

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
                                    '       <div class="form-group" id="divarchi">' +
                                    '       <h6 class="form-section"><strong>Agregar Desarrollo de Taller: </strong> </h6>' +
                                    '             <input id="archiTaller"  name="archiTaller" type="file">' +
                                    '       </div>' +
                                    '  </div>' +
                                    '</div>';

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
                                        '<button type="button" onclick="$.CambArchivo();" class="btn btn-warning"><i' +
                                        '           class="fa fa-refresh"></i> Cambiar Archivo</button>' +
                                        ' </div>' +
                                        ' </div>';

                                    $("#divarchi").html(archivo);
                                }

                            }

                        }

                    });

                },
                AtrasEval: function() {
                    $("#Div_RowTemasDet").show();
                    $("#Div_RowPracticas").hide();
                    $("#btn_atrasVisTema").show();
                    $("#btn_atrasTemas").hide();
                    $("#btn_Practica").show();


                },
                AtrasModActIni: function(opc) {
                    if (opc == "F") {

                        $("#contTiempo").hide();
                        $("#VidDidac").hide();
                        $("#btn_ConversaEval").hide();

                        $("#DetEvalFin").hide();
                        $("#btn_eval").hide();
                        $("#Dat_Cal").hide();
                        $("#btn_atrasModEv").show();
                        $("#btn_salirModEv").hide();
                        $("#titu_Eva").hide();
                        $("#titu_temaEva").show();

                        $("#VisTema").modal({
                            backdrop: 'static',
                            keyboard: false
                        });

                        $('#ModPrueba').modal('toggle');
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

                                $("#VisTema").modal({
                                    backdrop: 'static',
                                    keyboard: false
                                });

                                $('#ModPrueba').modal('toggle');
                                $("#contTiempo").hide();
                                $("#btn_ConversaEval").hide();

                                $("#DetEvalFin").hide();
                                $("#btn_eval").hide();
                                $("#VidDidac").hide();
                                $("#Dat_Cal").hide();
                                $("#btn_salirModEv").show();
                                $("#btn_atrasModEv").hide();
                                $("#titu_Eva").hide();
                                $("#titu_temaEva").show();
                                $.ReiniciarCont();

                            }
                        });
                    }

                },
                hab_ediContPregEnsayo: function(id) {
                    CKEDITOR.replace('RespPregEns'+id, {
                        width: '100%',
                        height: 100
                    });
                },
                ReiniciarCont: function() {
                    $("#contTiempo").hide();
                    $('#cuenta').timer('remove');
                    clearInterval(xtiempo);
                    xtiempo = null;
                },
              
                mostListTemas: function() {
                    $("#Div_TemasAsig").show();
                    $("#Div_DetTemas").hide();
                },
                MostArc: function(id) {
                    window.open($('#dattaller').data("ruta") + "/" + $('#' + id).data("archivo"),
                        '_blank');
                },
                AtrasEvaluacion: function() {

                    $("#VisTema").modal({
                        backdrop: 'static',
                        keyboard: false
                    });
                    $('#ModPrueba').modal('toggle');

                },

            });

            $.EntrarAsig($("#idAsig").val());
        });
    </script>
@endsection
