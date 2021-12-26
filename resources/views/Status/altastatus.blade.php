@extends('plantilla')

@section('contenido')

<div class="right_col" role="main">
  <div class="control">
    <h1>ALTA DE ESTATUS </h1>

      <div class="x_content">
        <form action= "{{ route('guardarestatus')}}" method="POST">
          {{csrf_field()}}

          <div class="field item form-group">
            <label class="col-form-label col-md-5 col-sm-5  label-align">Clave de Estatus: <span
                class="text-danger">*</span></label>
            <div class="col-md-5 col-sm-5">
              <input class="form-control" data-validate-length-range="6" data-validate-words="2" name="idstatus" value="{{$idsigue}}"
                readonly="readonly"/>
                @if($errors->first('idstatus'))
                <p class="text-danger">{{$errors->first('idstatus')}}</ide>
                @endif
            </div>
          </div>
          <div class="field item form-group">
            <label class="col-form-label col-md-5 col-sm-5  label-align">Nombre: <span
                class="text-danger">*</span></label>
            <div class="col-md-5 col-sm-5">
              <input class="form-control" data-validate-length-range="6" data-validate-words="2" name="nombre" value="{{old('nombre')}}"
                placeholder="Ej: Pendiente"/>
                @if($errors->first('nombre'))
                <p class="text-danger">{{$errors->first('nombre')}}</ide>
                @endif
            </div>
          </div>

            <div class="field item form-group">
            <label class="col-form-label col-md-5 col-sm-5 label-align"></label>
            <div class="col-md-5 col-sm-5 ">
                <button type="submit" class="btn btn-success ">Enviar</button>
                <a href="{{route('reportestatus')}}"
                <button type="button" class="btn btn-danger">Cancelar</button></a>
            </div>
          </div>
        </form>
      </div>
  </div>
</div>
@stop
