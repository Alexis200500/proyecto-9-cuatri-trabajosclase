@extends('plantilla')
@section('contenido')
<div class="right_col" role="main">
    <div class="control">
      <h1>ALTA USUARIOS</h1>
  <form action = "{{route('guardarusuario')}}" method = "POST">
    {{csrf_field()}}
      <div class="x_content">
        <!--ID usuario -->
         <div class="field item form-group">
            <label class="col-form-label col-md-5 col-sm-5  label-align">Clave Usuario:<span
             class="required">*</span>
            </label>
           <div class="col-md-5 col-sm-5">
             <input type="text" name="idusuario" id="idusuario" value="{{$idsigue}}"  readonly='readonly'  class="form-control" placeholder="Introduce clave del usuario" tabindex="5">
             @if($errors->first('idusuario'))
              <p class='text-danger'>{{$errors->first('idusuario')}}</p>
             @endif
           </div>
          </div>
           <!--nombre -->
           <div class="field item form-group">
            <label class="col-form-label col-md-5 col-sm-5  label-align">Nombre:<span
                class="required">*</span></label>
            <div class="col-md-5 col-sm-5">
              <input type="text" name="nombre" id="nombre" value="{{old('nombre')}}" class="form-control" placeholder="" tabindex="5">
              @if($errors->first('nombre'))
               <p class='text-danger'>{{$errors->first('nombre')}}</p>
              @endif
            </div>
          </div>
          <!--apellido paterno -->
        <div class="field item form-group">
          <label class="col-form-label col-md-5 col-sm-5  label-align">Apellido Paterno:<span
              class="required">*</span></label>
          <div class="col-md-5 col-sm-5">
            <input type="text" name="apellidop" id="apellidop" value="{{old('apellidop')}}" class="form-control" placeholder="" tabindex="5">
              @if($errors->first('apellidop'))
               <p class='text-danger'>{{$errors->first('apellidop')}}</p>
              @endif
          </div>
        </div>
        <!--apellido materno-->
        <div class="field item form-group">
          <label class="col-form-label col-md-5 col-sm-5  label-align">Apellido Materno:<span
              class="required">*</span></label>
          <div class="col-md-5 col-sm-5">
            <input type="text" name="apellidom" id="apellidom" value="{{old('apellidom')}}" class="form-control" placeholder="" tabindex="5">
              @if($errors->first('apellidom'))
               <p class='text-danger'>{{$errors->first('apellidom')}}</p>
              @endif
          </div>
        </div>
        <!--sexo-->
        <div class="item form-group">
          <label class="col-form-label col-md-5 col-sm-5 label-align">Sexo:<span
            class="required">*</span></label>
          <div class="col-md-5 col-sm-5 ">
            <div id="gender" class="btn-group" data-toggle="buttons">
              <p>
                Masculino
                <input type="radio" class="flat" id="sexo1" name="sexo" value = "M"  checked="" required />
                Femenino
                <input type="radio" class="flat" id="sexo2" name="sexo" value = "F"/>
              </p>
            </div>
          </div>
        </div>
        <!--edad-->
        <div class="field item form-group">
            <label class="col-form-label col-md-5 col-sm-5  label-align">Edad:<span
                class="required">*</span></label>
            <div class="col-md-5 col-sm-5">
              <input type="text" name="edad" id="edad" value="{{old('edad')}}" class="form-control" placeholder="" tabindex="5">
              @if($errors->first('edad'))
               <p class='text-danger'>{{$errors->first('edad')}}</p>
              @endif
            </div>
          </div>
          <!--Telefono-->
          <div class="field item form-group">
            <label class="col-form-label col-md-5 col-sm-5  label-align">Telefono:<span
                class="required">*</span></label>
            <div class="col-md-5 col-sm-5">
              <input type="text" name="telefono" id="telefono" value="{{old('telefono')}}" class="form-control" placeholder="" tabindex="5">
                @if($errors->first('telefono'))
                 <p class='text-danger'>{{$errors->first('telefono')}}</p>
                @endif
            </div>
          </div>
          <!--Tipo de usuario-->
          <div class="field item form-group">
            <label class="col-form-label col-md-5 col-sm-5 label-align">Tipo de usuario:<span
              class="required">*</span></label>
            <div class="col-md-5 col-sm-5 ">
              <select class="select2_group form-control"name="idtipo_u" id="idtipo_u">
                <option disabled="disabled" selected="selected" >Selecciona una opcion</option>
                @foreach($tipousuario as $tipousuario)
                  <option value="{{$tipousuario['idtipo_u']}}">{{$tipousuario['tipo']}}</option>
                @endforeach
              </select>
              @if($errors->first('idtipo_u'))
                 <p class='text-danger'>{{$errors->first('idtipo_u')}}</p>
                @endif
            </div>
          </div>

           <!--correo-->
           <div class="field item form-group">
            <label class="col-form-label col-md-5 col-sm-5  label-align">Correo electronico:<span
                class="required">*</span></label>
            <div class="col-md-5 col-sm-5">
              <input type="text" name="correo" id="correo" value="{{old('correo')}}" class="form-control" placeholder="" tabindex="5">
              @if($errors->first('correo'))
               <p class='text-danger'>{{$errors->first('correo')}}</p>
              @endif
            </div>
          </div>
          
          <div class="field item form-group">
            <label class="col-form-label col-md-5 col-sm-5 label-align"></label>
            <div class="col-md-5 col-sm-5 ">
                <button type="submit" value="Guardar" class="btn btn-success ">Enviar</button>
                <button type="submit" class="btn btn-danger">Cancelar</button>
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
