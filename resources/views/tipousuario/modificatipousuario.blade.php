@extends('plantilla')
@section('contenido')
<div class="right_col" role="main">
    <div class="control">
      <h1>Modifica tipo usuario</h1>
<form action = "{{route('guardacambiostipousuario')}}" method = "POST">
        {{csrf_field()}}
      <div class="x_content">
          <div class="field item form-group">
            <label class="col-form-label col-md-5 col-sm-5  label-align">Clave tipo usuario:<span
             class="required">*</span>
            </label>
           <div class="col-md-5 col-sm-5">
             <input type="text" name="idtipo_u" id="idtipo_u" value="{{$consulta->idtipo_u}}"  readonly='readonly' class="form-control" placeholder="Introduce clave del tipo de usuario" tabindex="5">
             @if($errors->first('idtipo_u'))
              <p class='text-danger'>{{$errors->first('idtipo_u')}}</p>
             @endif
           </div>
          </div>
           <!--nombre -->
           <div class="field item form-group">
            <label class="col-form-label col-md-5 col-sm-5  label-align">Tipo:<span
                class="required">*</span></label>
            <div class="col-md-5 col-sm-5">
              <input type="text" name="tipo" id="tipo" value="{{$consulta->tipo}}" class="form-control" placeholder="" tabindex="5">
              @if($errors->first('tipo'))
               <p class='text-danger'>{{$errors->first('tipo')}}</p>
              @endif
            </div>
          </div>
          <!--Botones -->
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