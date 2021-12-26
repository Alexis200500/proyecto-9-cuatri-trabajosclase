@extends('plantilla')

@section('contenido')

<div class="right_col" role="main">
  <div class="control">
    <h1>MODIFICAR CONSULTA</h1>

      <div class="x_content">
        <form action= "{{ route('guardacambios')}}" method="POST">
          {{csrf_field()}}

          <div class="field item form-group">
            <label class="col-form-label col-md-5 col-sm-5  label-align">Número de consulta <span
                class="text-danger">*</span></label>
            <div class="col-md-5 col-sm-5">
              <input class="form-control" data-validate-length-range="6" data-validate-words="2" name="idconsulta" value="{{$consulta->idconsulta}}"
                readonly="readonly"/>
                @if($errors->first('idconsulta'))
                <p class="text-danger">{{$errors->first('idconsulta')}}</ide>
                @endif
            </div>
          </div>
          <div class="field item form-group">
            <label class="col-form-label col-md-5 col-sm-5 label-align">Paciente: <span
                class="text-danger">*</span></label>
            <div class="col-md-5 col-sm-5 ">
              <select name= "idpaciente" class="select2_group form-control">
                <option value="{{$consulta->idpaciente}}"> {{$consulta->paci}} {{$consulta->apellidop}} {{$consulta->apellidom}} </option>
                @foreach($pacientes as $pac)
                <option value="{{$pac->idpaciente}}">{{$pac->nombre}} {{$pac->apellidop}} {{$pac->apellidom}}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="field item form-group">
            <label class="col-form-label col-md-5 col-sm-5 label-align">Odontólogo: <span
                class="text-danger">*</span></label>
            <div class="col-md-5 col-sm-5 ">
              <select name= "idodo" class="select2_group form-control">
                <option value="{{$consulta->idodo}}"> {{$consulta->odo}} {{$consulta->appaterno}} {{$consulta->apmaterno}}</option>
                @foreach($odontologos as $odo)
                <option value="{{$odo->idodo}}">{{$odo->nombre}} {{$odo->appaterno}} {{$odo->apmaterno}}</option>
                @endforeach
              </select>
            </div>
          </div>

          <div class="field item form-group">
            <label class="col-form-label col-md-5 col-sm-5  label-align">Fecha de consulta:<span
                class="text-danger">*</span></label>
            <div class="col-md-5 col-sm-5">
              <input class="form-control" class='optional' name="fecha_consulta" value="{{$consulta->fecha_consulta}}" data-validate-length-range="5,15"
                type="date" />
                @if($errors->first('fecha_consulta'))
                <p class="text-danger">{{$errors->first('fecha_consulta')}}</ide>
                @endif
            </div>
          </div>
          <div class="field item form-group">
            <label class="col-form-label col-md-5 col-sm-5  label-align">Hora de consulta:<span
                class="text-danger">*</span></label>
            <div class="col-md-5 col-sm-5">
              <input class="form-control" data-validate-length-range="6" data-validate-words="2" name="hora_consulta" value="{{$consulta->hora_consulta}}"
                placeholder="Ej: 12:00 pm"/>
                @if($errors->first('hora_consulta'))
                <p class="text-danger">{{$errors->first('hora_consulta')}}</p>
                @endif
            </div>
          </div>
          <div class="field item form-group">
            <label class="col-form-label col-md-5 col-sm-5  label-align">Peso:<span
                class="text-danger">*</span></label>
            <div class="col-md-5 col-sm-5">
              <input class="form-control" data-validate-length-range="6" data-validate-words="2" name="peso" value="{{$consulta->peso}}"
                placeholder="Ej: 56.200 kg"/>
                @if($errors->first('peso'))
                <p class="text-danger">{{$errors->first('peso')}}</ide>
                @endif
            </div>
          </div>
          <div class="field item form-group">
            <label class="col-form-label col-md-5 col-sm-5  label-align">Estatura:<span
                class="text-danger">*</span></label>
            <div class="col-md-5 col-sm-5">
              <input class="form-control" data-validate-length-range="6" data-validate-words="2" name="estatura" value="{{$consulta->estatura}}"
                placeholder="Ej: 1.65"/>
                @if($errors->first('estatura'))
                <p class="text-danger">{{$errors->first('estatura')}}</ide>
                @endif
            </div>
          </div>
          <div class="field item form-group">
            <label class="col-form-label col-md-5 col-sm-5  label-align">Costo de la consulta:<span
                class="text-danger">*</span></label>
            <div class="col-md-5 col-sm-5">
              <input class="form-control" data-validate-length-range="6" data-validate-words="2" name="costo" value="{{$consulta->costo}}"
                placeholder="Ej: $250"/>
                @if($errors->first('costo'))
                <p class="text-danger">{{$errors->first('costo')}}</ide>
                @endif
            </div>
          </div>
          <div class="field item form-group">
            <label class="col-form-label col-md-5 col-sm-5 label-align">Estatus de consulta: <span
                class="text-danger">*</span></label>
            <div class="col-md-5 col-sm-5 ">
              <select name= "idstatus" class="select2_group form-control">
                <option value="{{$consulta->idstatus}}"> {{$consulta->stat}}</option>
                @foreach($statuses as $stat)
                <option value="{{$stat->idstatus}}">{{$stat->nombre}}</option>
                @endforeach
              </select>
            </div>
          </div>

            <div class="field item form-group">
            <label class="col-form-label col-md-5 col-sm-5 label-align"></label>
            <div class="col-md-5 col-sm-5 ">
                <button type="submit" class="btn btn-success ">Enviar</button>
                <a href="{{route('reporteconsultas')}}"
                <button type="button" class="btn btn-danger">Cancelar</button></a>
            </div>
          </div>
        </form>
      </div>
  </div>
</div>
@stop
