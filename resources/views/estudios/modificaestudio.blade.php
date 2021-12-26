@extends('plantilla')
@section('contenido')
<div class="right_col" role="main">
    <div class="control">
      <h1>MODIFICA ESTUDIO</h1>
      <form action = "{{route('guardacambiosestudio')}}" method = "POST">
        {{csrf_field()}}
         <div class="x_content">
             <!--ID paciente -->
            <div class="field item form-group">
              <label class="col-form-label col-md-5 col-sm-5  label-align">Clave estudio:<span
                  class="required">*</span>
              </label>
              <div class="col-md-5 col-sm-5">
                <input type="text" name="idestudio" id="idestudio" value="{{$consulta->idestudio}}"  readonly='readonly' class="form-control" placeholder="Introduce clave estudio" tabindex="5">
                @if($errors->first('idestudio'))
                  <p class='text-danger'>{{$errors->first('idestudio')}}</p>
                @endif
              </div>
            </div>
             <!--nombre estudio -->
            <div class="field item form-group">
                <label class="col-form-label col-md-5 col-sm-5  label-align">Nombre estudio:<span
                    class="required">*</span></label>
                <div class="col-md-5 col-sm-5">
                  <input type="text" name="nombree" id="nombree" value="{{$consulta->nombre}}"  class="form-control" placeholder="" tabindex="5">
                  @if($errors->first('nombree'))
                   <p class='text-danger'>{{$errors->first('nombree')}}</p>
                  @endif
                </div>
              </div>
               <!--tipo etudio -->
            <div class="field item form-group">
                <label class="col-form-label col-md-5 col-sm-5  label-align">Tipo estudio:<span
                    class="required">*</span></label>
                <div class="col-md-5 col-sm-5">
                  <input type="text" name="tipoes" id="tipoes" value="{{$consulta->tipo}}"  class="form-control" placeholder="" tabindex="5">
                  @if($errors->first('tipoes'))
                   <p class='text-danger'>{{$errors->first('tipoes')}}</p>
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
</div>
</form>
<style>
    .required
    {
        color: red;
    }
</style>
@endsection