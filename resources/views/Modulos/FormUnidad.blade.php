@php
use Illuminate\Support\Facades\Input;
@endphp
{!! Form::open(['url' => $url, 'method' => $method, 'class' => '', 'id' => 'formUnidad', 'files' => true]) !!}
{{ csrf_field() }}
<input type="hidden" class="form-control" name="tema_id" value="" />
<input type="hidden" class="form-control" id="tema_per" value="{{ $unid->periodo }}" />
<input type="hidden" class="form-control" id="tipo_usuario" value="{{ Auth::user()->tipo_usuario }}" />
<input type="hidden" class="form-control" id="id_usuario" value="{{ Auth::user()->id }}" />
<input type="hidden" class="form-control" name="unida_id" id="unida_id" value="{{ $unid->id }}" />
<input type="hidden" class="form-control" id="unid_modulo" value="{{ $unid->modulo }}" />

<h4 class="form-section"><i class="ft-grid"></i> Datos de la Unidad</h4>
<div class="row">

    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('Unidad', 'Unidad:', ['class' => 'form-label']) }}
            <select class="form-control select2" data-placeholder="Seleccione" name="nom_unidad" id="nom_unidad">
                <option value="">Seleccione la Unidad</option>
                @for ($i = 1; $i <= 10; $i++)
                    @if ('Unidad ' . $i == $unid->nom_unidad)
                        <option value="{{ 'Unidad ' . $i }}"
                            {{ Input::old('nom_unidad') == 'Unidad ' . $i ? 'selected' : '' }} selected>
                            {{ 'Unidad ' . $i }}</option>
                    @else
                        <option value="{{ 'Unidad ' . $i }}"
                            {{ Input::old('nom_unidad') == 'Unidad ' . $i ? 'selected' : '' }}>{{ 'Unidad ' . $i }}
                        </option>
                    @endif
                @endfor
            </select>
        </div>
    </div>
    <div class="col-md-9">
        <div class="form-group">
            <label class="form-label" for="des_unidad">Descripción:</label>
            {!! Form::text('des_unidad', old('des_unidad', $unid->des_unidad), ['class' => 'form-control', 'placeholder' => 'Descripción de la Unidad', 'id' => 'des_unidad', 'style' => 'text-transform: uppercase']) !!}
        </div>
    </div>

    <div class="col-md-12" style="display: none;">
        <div class="form-group">
            <label class="form-label" for="introduccion">DBA (Derecho Básico de Aprendizaje):</label>
            {!! Form::textarea('introduccion', old('introduccion', $unid->introduccion), ['class' => 'form-control', 'placeholder' => 'Objetivo', 'id' => 'introduccion', 'rows' => 4]) !!}
        </div>
    </div>

    <div class="col-md-9">
        <div class="form-group">
            <label class="form-label" for="modulo">Módulo:</label>
            <select class="form-control select2" onchange="$.CargPeriodos(this.value)" data-placeholder="Seleccione"
                name="modulo" id="modulo">
                <option value="">Seleccione la Asignatura</option>
                @foreach ($Asigna as $Asig) {
                    @if ($Asig->id == $unid->modulo)
                        <option value="{{ $Asig->id }}" {{ Input::old('modulo') == $Asig->id ? 'selected' : '' }}
                            selected>{{ $Asig->nombre . ' - Grado ' . $Asig->grado_modulo . '°' }}</option>
                    @else
                        <option value="{{ $Asig->id }}"
                            {{ Input::old('modulo') == $Asig->id ? 'selected' : '' }}>
                            {{ $Asig->nombre . ' - Grado ' . $Asig->grado_modulo . '°' }}</option>
                    @endif
                @endforeach
            </select>

        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label class="form-label" for="periodo">Periodo:</label>
            <select class="form-control select2" data-placeholder="Seleccione" id="periodo" name="periodo">

            </select>
        </div>
    </div>
</div>
<div class="modal fade text-left show" id="ModCompartir" tabindex="-1" role="dialog" aria-labelledby="myModalLabel15">
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

                        </div>
                      
                    </div>
                 

                </div>

            </div>
            <div class="modal-footer">
                <button type="button" id="btn_GuarComent" data-dismiss="modal" class="btn grey btn-outline-success"><i class="fa fa-check"></i>
                    Aceptar</button>
            </div>
        </div>
    </div>
</div>


<div class="form-actions right">
    <div class="row ">
        <div class="col-md-12 col-lg-12 ">
            <div class="btn-list">
                @if(Auth::user()->tipo_usuario=="Profesor")
                <a class="btn btn-outline-info" id="btn-Compartir" style="display: none;"  onclick="$.cargarDocentes('btn');"  title="Guardar">
                    <i class="fa fa-share"></i> Compartir
                </a>
                @endif
                @if ($opc != 'Consulta')
                    <button class="btn btn-outline-primary" href="#" title="Guardar" type="submit">
                        <i class="fa fa-save"></i> Guardar
                    </button>
                    @if ($opc != 'editar')
                        <a class="btn btn-outline-warning" href="{{ url('/Modulos/NuevaUnidad') }}" title="Cancelar">
                            <i class="fa fa-close"></i> Cancelar
                        </a>
                    @endif
                @endif
                <a class="btn btn-outline-dark" href="{{ url('/Modulos/GestionUnid') }}" title="Volver">
                    <i class="fa fa-angle-double-left"></i> Volver
                </a>
            </div>
        </div>
    </div>
</div>
{!! Form::close() !!}
