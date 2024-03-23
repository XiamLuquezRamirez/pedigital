{!! Form::open(['url' => $url, 'method' => $method, 'class' => '', 'id' => 'formProf', 'files' => true]) !!}
{{ csrf_field() }}
<h4 class="form-section"><i class="ft-list"></i> Asignar Módulo</h4>
<input type="hidden" class="form-control" id="profe_id" name="profe_id" value="{{ $id }}" />
<input type="hidden" class="form-control" id="profe_jornada" name="profe_jornada" value="{{ $DatProf->jorna }}" />
<input type="hidden" class="form-control" id="ConsAct" value="{{ $i }}" />
<input type="hidden" class="form-control" name="tipo_usuario" value="Profesor" />

<div class="row">
    <div class="col-md-12">
        @if (Session::has('error'))
            <div class="row">
                <div class="col-md-12">

                    <div class="alert alert-icon-left alert-danger alert-dismissible mb-2" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <strong>{!! session('error') !!}</strong>
                    </div>

                </div>
            </div>
        @endif
        @if (Session::has('success'))
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-icon-left alert-success alert-dismissible mb-2" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
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
    <div class="col-xl-4 col-lg-6 col-md-12">
        <div class="form-group">
            <label class="form-label" for="periodo_modulo">Módulos:</label>
            <select class="form-control select2" onchange="$.ListarGrados(this.value);" data-placeholder="Seleccione..."
                name="asig" id="asignaturas">
                {!! $select_Asignaturas !!}
            </select>
        </div>
    </div>
    <div class="col-xl-2 col-lg-6 col-md-12">
        <div class="form-group">
            <label class="form-label" for="periodo_modulo">Grado:</label>
            <select class="form-control select2" onchange="$.ListarGrupos(this.value);" data-placeholder="Seleccione..."
                name="grado" id="grado">

            </select>
        </div>
    </div>
    <div class="col-xl-2 col-lg-6 col-md-12">
        <div class="form-group">
            <label class="form-label" for="periodo_modulo">Grupo:</label>
            <select class="form-control select2" data-placeholder="Seleccione.." name="grupo" id="grupo">

            </select>
        </div>
    </div>
    <div class="col-xl-2 col-lg-6 col-md-12">
        <div class="form-group">
            <label class="form-label" for="periodo_modulo">Jornada:</label>
            <select class="form-control select2" data-placeholder="Seleccione.." name="jornada" id="jornada">
                <option selected value="">-- Seleccionar --</option>
                <option value="JM">Jornada Mañana</option>
                <option value="JT">Jornada Tarde</option>
                <option value="JN">Jornada Nocturna
                </option>
            </select>
        </div>
    </div>

    <div class="col-xl-2 col-lg-6 col-md-12  text-center">
        <label class="form-label" for="periodo_modulo">&nbsp;</label>
        <div class="form-group">
            <button id="AddAsig" onclick="$.AddAsig();" type="button" class="btn mr-1 mb-1 btn-success"><i
                    class="fa fa-plus"></i> Agregar</button>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <h4 style="text-transform: capitalize;" class="form-section"> Módulos Asignados al Docente
            <strong>{!! $DatProf->nombre . ' ' . $DatProf->apellido !!}</strong> </h4>
        <table class="table table-hover mb-0">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Módulo</th>
                    <th>Opción</th>
                </tr>
            </thead>
            <tbody id='tr_asig'>
                {!! $trAsig !!}
            </tbody>
        </table>
    </div>

</div>

<div class="form-actions">
    <div class="row ">
        <div class="col-md-12 col-lg-12 ">
            <div class="btn-list">
                <button class="btn btn-outline-primary" href="#" title="Guardar" type="submit">
                    <i class="fa fa-save"></i> Guardar
                </button>
                <a class="btn btn-outline-warning" href="{{ url('/Profesores/AddModulos/' . $id) }}"
                    title="Cancelar">
                    <i class="fa fa-close"></i> Cancelar
                </a>
                <a class="btn btn-outline-dark" href="{{ url('/Profesores/Gestion') }}" title="Volver">
                    <i class="fa fa-angle-double-left"></i> Volver
                </a>
            </div>
        </div>
    </div>
</div>
{!! Form::close() !!}
