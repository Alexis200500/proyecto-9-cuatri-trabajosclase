@extends('plantilla')
@section('contenido')
<div class="right_col" role="main">
    <div class="control">
        <h1>ALTA CONSULTA ESTUDIOS</h1>
        <form action = "{{route('guardarconestudio')}}" method = "POST" enctype="multipart/form-data">
         {{csrf_field()}}
         <div class="x_content">
             <!--ID CCONSULTA ESTUDIO -->
             <div class="field item form-group">
              <label class="col-form-label col-md-5 col-sm-5  label-align">Clave consulta estudio:<span
                 class="required">*</span>
              </label>
             <div class="col-md-5 col-sm-5">
                 <input type="text" name="idconestudio" id="idconestudio" value="{{$idsigue}}"  readonly='readonly' class="form-control" placeholder="Introduce clave de estudio consulta" tabindex="5">
                 @if($errors->first('idconestudio'))
                  <p class='text-danger'>{{$errors->first('idconestudio')}}</p>
                 @endif
              </div>
             </div>
             <!--consulta-->
          <div class="field item form-group">
            <label class="col-form-label col-md-5 col-sm-5 label-align">Consulta:<span
              class="required">*</span></label>
            <div class="col-md-5 col-sm-5 ">
              <select class="select2_group form-control"name="idcon" id="idcon">
                <option disabled="disabled" selected="selected" >Selecciona la consulta</option>
                @foreach($consultas as $consultas)
                  <option value="{{$consultas['idconsulta']}}">{{$consultas['idconsulta']}}</option>
                @endforeach
              </select>
              @if($errors->first('idcon'))
                 <p class='text-danger'>{{$errors->first('idcon')}}</p>
                @endif
            </div>
          </div>
          <!--Estudio-->
          <div class="field item form-group">
            <label class="col-form-label col-md-5 col-sm-5 label-align">Estudio:<span
              class="required">*</span></label>
            <div class="col-md-5 col-sm-5 ">
              <select class="select2_group form-control"name="idestudio" id="idestudio">
                <option disabled="disabled" selected="selected" >Selecciona el estudio</option>
                @foreach($estudio as $estudio)
                  <option value="{{$estudio['idestudio']}}">{{$estudio['nombre']}}</option>
                @endforeach
              </select>
              @if($errors->first('idestudio'))
                 <p class='text-danger'>{{$errors->first('idestudio')}}</p>
                @endif
            </div>
          </div>
          <!--paciente-->
          <div class="field item form-group">
            <label class="col-form-label col-md-5 col-sm-5 label-align">Paciente:<span
              class="required">*</span></label>
            <div class="col-md-5 col-sm-5 ">
              <select class="select2_group form-control"name="idpaciente" id="idpaciente">
                <option disabled="disabled" selected="selected" >Selecciona el paciente</option>
                @foreach($paciente as $paciente)
                  <option value="{{$paciente['idpaciente']}}">{{$paciente['nombre']}} {{$paciente['apellidop']}} {{$paciente['apellidom']}}</option>
                @endforeach
              </select>
              @if($errors->first('idpaciente'))
                 <p class='text-danger'>{{$errors->first('idpaciente')}}</p>
                @endif
            </div>
          </div>
           <!--fechaestudio -->
           <div class="field item form-group">
            <label class="col-form-label col-md-5 col-sm-5  label-align">Fecha que se hará el estudio:<span
                class="required">*</span></label>
            <div class="col-md-5 col-sm-5">
              <input type="date" name="fechaestudio" id="fechaestudio" value="{{old('fechaestudio')}}" class="form-control" placeholder="" tabindex="5">
              @if($errors->first('fechaestudio'))
               <p class='text-danger'>{{$errors->first('fechaestudio')}}</p>
              @endif
            </div>
          </div>
          <!--horaestudio-->
           <div class="field item form-group">
            <label class="col-form-label col-md-5 col-sm-5  label-align">Hora que se hará el estudio:<span
                class="required">*</span></label>
            <div class="col-md-5 col-sm-5">
              <input type="time" name="horaestudio" id="horaestudio" value="{{old('horaestudio')}}" class="form-control" placeholder="" tabindex="5">
              @if($errors->first('horaestudio'))
               <p class='text-danger'>{{$errors->first('horaestudio')}}</p>
              @endif
            </div>
          </div>
          <!--Observaciones -->
           <div class="field item form-group">
            <label class="col-form-label col-md-5 col-sm-5  label-align">Observaciones:<span
                class="required"></span></label>
            <div class="col-md-5 col-sm-5">
              <input type="text" name="obser" id="obser" value="{{old('obser')}}" class="form-control" placeholder="" tabindex="5">
              @if($errors->first('obser'))
               <p class='text-danger'>{{$errors->first('obser')}}</p>
              @endif
            </div>
          </div>
         
          <!--archivo -->
           <div class="field item form-group">
            <label class="col-form-label col-md-5 col-sm-5  label-align">Archivo del estudio:<span
                class="required"></span></label>
            <div class="col-md-5 col-sm-5">
              <input type="file" name="archivo" id="archivo" class="form-control" placeholder="" tabindex="5">
              @if($errors->first('archivo'))
               <p class='text-danger'>{{$errors->first('archivo')}}</p>
              @endif
            </div>
          </div>
           <!--botones-->
              <div class="field item form-group">
              <label class="col-form-label col-md-5 col-sm-5 label-align"></label>
              <div class="col-md-5 col-sm-5 ">
                  <button type="submit" value="Guardar" class="btn btn-success ">Enviar</button>
                  <button type="submit" class="btn btn-danger">Cancelar</button>
              </div>
            </div>


        
    </div>
</div>

<style>
    .required
    {
        color: red;
    }
</style>
</form>
@endsection
