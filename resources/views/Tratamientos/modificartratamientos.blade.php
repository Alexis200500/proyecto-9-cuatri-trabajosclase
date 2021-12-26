@extends('plantilla')

@section('contenido')

<div class="right_col" role="main">
  <div class="control">
    <h1>MODIFICACIÓN DE TRATAMIENTOS </h1>

      <div class="x_content">
        <form action= "{{ route('guardacambiost')}}" method="POST">
          {{csrf_field()}}

          <div class="field item form-group">
            <label class="col-form-label col-md-5 col-sm-5  label-align">Clave tratamiento <span
                class="text-danger">*</span></label>
            <div class="col-md-5 col-sm-5">
              <input class="form-control" data-validate-length-range="6" data-validate-words="2" name="idtratamiento" value="{{$consulta->idtratamiento}}"
                readonly="readonly"/>
                @if($errors->first('idtratamiento'))
                <p class="text-danger">{{$errors->first('idtratamiento')}}</ide>
                @endif
            </div>
          </div>
          <div class="field item form-group">
            <label class="col-form-label col-md-5 col-sm-5  label-align">Nombre: <span
                class="text-danger">*</span></label>
            <div class="col-md-5 col-sm-5">
              <input class="form-control" data-validate-length-range="6" data-validate-words="2" name="nombre" value="{{$consulta->nombre}}"
                placeholder="Ej: Blanqueamiento dental"/>
                @if($errors->first('nombre'))
                <p class="text-danger">{{$errors->first('nombre')}}</ide>
                @endif
            </div>
          </div>

          <div class="field item form-group">
            <label class="col-form-label col-md-5 col-sm-5  label-align">Duración: <span
                class="text-danger">*</span></label>
            <div class="col-md-5 col-sm-5">
              <input class="form-control" data-validate-length-range="6" data-validate-words="2" name="duracion" value="{{$consulta->duracion}}"
                placeholder="Ej: 2 sesiones"/>
                @if($errors->first('duracion'))
                <p class="text-danger">{{$errors->first('duracion')}}</ide>
                @endif
            </div>
          </div>
          <div class="field item form-group">
            <label class="col-form-label col-md-5 col-sm-5  label-align">Medicamento: <span
                class="text-danger">*</span></label>
            <div class="col-md-5 col-sm-5">
              <input class="form-control" data-validate-length-range="6" data-validate-words="2" name="medicamento" value="{{$consulta->medicamento}}"
                placeholder="Ej: Desinflamatorio"/>
                @if($errors->first('medicamento'))
                <p class="text-danger">{{$errors->first('medicamento')}}</ide>
                @endif
            </div>
          </div>

          <div class="field item form-group">
            <label class="col-form-label col-md-5 col-sm-5  label-align">Precio:<span
                class="text-danger">*</span></label>
            <div class="col-md-5 col-sm-5">
              <input class="form-control" data-validate-length-range="6" data-validate-words="2" name="precio" value="{{$consulta->precio}}"
                placeholder="Ej: $260"/>
                @if($errors->first('precio'))
                <p class="text-danger">{{$errors->first('precio')}}</ide>
                @endif
            </div>
          </div>

            <div class="field item form-group">
            <label class="col-form-label col-md-5 col-sm-5 label-align"></label>
            <div class="col-md-5 col-sm-5 ">
                <button type="submit" class="btn btn-success ">Enviar</button>
                <a href="{{route('reportetratamientos')}}"
                <button type="button" class="btn btn-danger">Cancelar</button></a>
            </div>
          </div>
        </form>
      </div>
  </div>
</div>
@stop
