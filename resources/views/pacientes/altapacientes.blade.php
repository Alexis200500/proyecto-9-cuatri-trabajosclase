@extends('plantilla')
@section('contenido')

<div class="right_col" role="main">
    <div class="control">
      <h1>ALTA PACIENTE</h1>
<form action = "{{route('guardarpaciente')}}" method = "POST">
        {{csrf_field()}}
        <div class="x_content">
              <!--ID paciente -->
            <div class="field item form-group">
              <label class="col-form-label col-md-5 col-sm-5  label-align">Clave paciente:<span
                  class="required">*</span>
              </label>
              <div class="col-md-5 col-sm-5">
                <input type="text" name="idpaciente" id="idpaciente" value="{{$idsigue}}"  readonly='readonly' class="form-control" placeholder="Introduce clave paciente" tabindex="5">
                @if($errors->first('idpaciente'))
                  <p class='text-danger'>{{$errors->first('idpaciente')}}</p>
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

            <!--Tipo de sangre-->
            <div class="field item form-group">
              <label class="col-form-label col-md-5 col-sm-5 label-align">Tipo de sangre:<span
                class="required">*</span></label>
              <div class="col-md-5 col-sm-5 ">
                <select class="select2_group form-control"name="idtipossan" id="inputtipossan_id">
                  <option disabled="disabled" selected="selected" >Selecciona una opcion</option>
                  @foreach($tipossan as $tipossan)
                    <option value="{{$tipossan['idtipossan']}}">{{$tipossan['tipo']}}</option>
                  @endforeach
                </select>
                @if($errors->first('idtipossan'))
                   <p class='text-danger'>{{$errors->first('idtipossan')}}</p>
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
              <!--pregunta-->
              <div class="item form-group">
                <label class="col-form-label col-md-5 col-sm-5 label-align">¿Tiene alergias?:<span
                  class="required">*</span></label>
                <div class="col-md-5 col-sm-5 ">
                  <div id="gender" class="btn-group" data-toggle="buttons">
                    <p>
                      Si
                      <input type="radio" class="flat" name="preguntaale" id="gendersi" value="Si" checked="" required />
                      No
                      <input type="radio" class="flat" name="preguntaale" id="genderno" value="No"/>
                    </p>
                  </div>
                </div>
              </div>
            <!--Alergias-->
            <div class="field item form-group">
                <label class="col-form-label col-md-5 col-sm-5  label-align">¿Cuales son sus alergias?:</label>
                <div class="col-md-5 col-sm-5">
                  <input type="text" name="alergias" id="alergias" value="{{old('alergias')}}" class="form-control" placeholder="Si no tiene alergias escribir 'NO APLICA'" tabindex="5">
                  @if($errors->first('alergias'))
                   <p class='text-danger'>{{$errors->first('alergias')}}</p>
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


            
          </form>
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