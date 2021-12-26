@extends('plantilla')
@section('contenido')
<div class="right_col" role="main">
    <div class="control">
        <h1>MODIFICA CONSULTA ESTUDIOS</h1>
        <form action = "{{route('guardacambiosconestudio')}}" method = "POST" enctype="multipart/form-data">
         {{csrf_field()}}
         <div class="x_content">
             <!--ID CCONSULTA ESTUDIO -->
             <div class="field item form-group">
              <label class="col-form-label col-md-5 col-sm-5  label-align">Clave consulta estudio:<span
                 class="required">*</span>
              </label>
             <div class="col-md-5 col-sm-5">
                 <input type="text" name="idces" id="idconestudio" value="{{$consulta->idces}}"  readonly='readonly' class="form-control" placeholder="Introduce clave de estudio consulta" tabindex="5">
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
              <select class="select2_group form-control"name="idconsulta" >
               <option value="{{$consulta->idconsulta}}">{{$consulta->con}}</option>
                  @foreach($consultas as $con)
                    <option value="{{$con->idconsulta}}">{{$con->idconsulta}}</option>
                  @endforeach
              </select>
              
            </div>
          </div>
          <!--Estudio-->
          <div class="field item form-group">
            <label class="col-form-label col-md-5 col-sm-5 label-align">Estudio:<span
              class="required">*</span></label>
            <div class="col-md-5 col-sm-5 ">
              <select class="select2_group form-control"name="idestudio" id="idestudio">
                <option value="{{$consulta->idestudio}}">{{$consulta->estu}}</option>
                  @foreach($estudios as $estu)
                    <option value="{{$estu->idestudio}}">{{$estu->nombre}}</option>
                  @endforeach
              </select>
              
            </div>
          </div>
          <!--paciente-->
          <div class="field item form-group">
            <label class="col-form-label col-md-5 col-sm-5 label-align">Paciente:<span
              class="required">*</span></label>
            <div class="col-md-5 col-sm-5 ">
              <select class="select2_group form-control"name="idpaciente" id="idpaciente">
                <option value="{{$consulta->idpaciente}}">{{$consulta->paci}} {{$consulta->apellidop}}  {{$consulta->apellidom}}</option>
                  @foreach($pacientes as $paciente)
                    <option value="{{$paciente->idpaciente}}">{{$paciente->nombre}} {{$paciente->apellidop}} {{$paciente->apellidom}}</option>
                  @endforeach
              </select>
             
            </div>
          </div>
           <!--fechaestudio -->
           <div class="field item form-group">
            <label class="col-form-label col-md-5 col-sm-5  label-align">Fecha que se hará el estudio:<span
                class="required">*</span></label>
            <div class="col-md-5 col-sm-5">
              <input type="date" name="fechaestudio" id="fechaestudio" value="{{$consulta->fecha_estudio}}"  class="form-control" placeholder="" tabindex="5">
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
              <input type="time" name="horaestudio" id="horaestudio" value="{{$consulta->hora_estudio}}"  class="form-control" placeholder="" tabindex="5">
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
              <input type="text" name="obser" id="obser" value="{{$consulta->observaciones}}"  class="form-control" placeholder="" tabindex="5">
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
              <div align="center">
                
              <img src="{{asset('archivos/'. $consulta->archivo)}}" height="150" width="150">
              </div>
              @if($errors->first('archivo'))
               <p class='text-danger'>{{$errors->first('archivo')}}</p>
              @endif
            </div>
          </div>
           <!--botones-->
              <div class="field item form-group">
              <label class="col-form-label col-md-5 col-sm-5 label-align"></label>
              <div class="col-md-5 col-sm-5 " >
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
