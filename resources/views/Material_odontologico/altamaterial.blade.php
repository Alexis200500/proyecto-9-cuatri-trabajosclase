@extends('plantilla')

@section('contenido')

<div class="right_col" role="main">
  <div class="control">
    <h1>ALTA DE MATERIAL ODONTOLÓGICO</h1>

      <div class="x_content">
        <form action= "{{ route('guardarmaterial')}}" method="POST" enctype="multipart/form-data">
          {{csrf_field()}}

          <div class="field item form-group">
            <label class="col-form-label col-md-5 col-sm-5  label-align">Clave de material <span
                class="text-danger">*</span></label>
            <div class="col-md-5 col-sm-5">
              <input class="form-control" data-validate-length-range="6" data-validate-words="2" name="idmaterial" value="{{$idsigue}}"
                readonly="readonly"/>
                @if($errors->first('idmaterial'))
                <p class="text-danger">{{$errors->first('idmaterial')}}</ide>
                @endif
            </div>
          </div>
          <div class="field item form-group">
            <label class="col-form-label col-md-5 col-sm-5  label-align">Nombre: <span
                class="text-danger">*</span></label>
            <div class="col-md-5 col-sm-5">
              <input class="form-control" data-validate-length-range="6" data-validate-words="2" name="nombre" value="{{old('nombre')}}"
                placeholder="Ej: Brackets"/>
                @if($errors->first('nombre'))
                <p class="text-danger">{{$errors->first('nombre')}}</ide>
                @endif
            </div>
          </div>
          <div class="field item form-group">
            <label class="col-form-label col-md-5 col-sm-5  label-align">Marca: <span
                class="text-danger">*</span></label>
            <div class="col-md-5 col-sm-5">
              <input class="form-control" data-validate-length-range="6" data-validate-words="2" name="marca" value="{{old('marca')}}"
                placeholder="Ej: Dentaurum"/>
                @if($errors->first('marca'))
                <p class="text-danger">{{$errors->first('marca')}}</ide>
                @endif
            </div>
          </div>
          <div class="field item form-group">
            <label class="col-form-label col-md-5 col-sm-5  label-align">Precio: <span
                class="text-danger">*</span></label>
            <div class="col-md-5 col-sm-5">
              <input class="form-control" data-validate-length-range="6" data-validate-words="2" name="precio" value="{{old('precio')}}"
                placeholder="Ej: $180"/>
                @if($errors->first('precio'))
                <p class="text-danger">{{$errors->first('precio')}}</ide>
                @endif
            </div>
          </div>
          <div class="field item form-group">
            <label class="col-form-label col-md-5 col-sm-5  label-align">Fecha de registro:<span
                class="text-danger">*</span></label>
            <div class="col-md-5 col-sm-5">
              <input class="form-control" class='optional' name="fechareg" value="{{old('fechareg')}}" data-validate-length-range="5,15"
                type="date" />
                @if($errors->first('fechareg'))
                <p class="text-danger">{{$errors->first('fechareg')}}</ide>
                @endif
            </div>
          </div>
          <div class="field item form-group">
            <label class="col-form-label col-md-5 col-sm-5  label-align">Hora de registro:<span
                class="text-danger">*</span></label>
            <div class="col-md-5 col-sm-5">
              <input class="form-control" data-validate-length-range="6" data-validate-words="2" name="horareg" value="{{old('horareg')}}"
                placeholder="Ej: 12:00 pm"/>
                @if($errors->first('horareg'))
                <p class="text-danger">{{$errors->first('horareg')}}</ide>
                @endif
            </div>
          </div>
          <div class="field item form-group">
            <label class="col-form-label col-md-5 col-sm-5  label-align">Piezas existentes:<span
                class="text-danger">*</span></label>
            <div class="col-md-5 col-sm-5">
              <input class="form-control" data-validate-length-range="6" data-validate-words="2" name="pzas_exis" value="{{old('pzas_exis')}}"
                placeholder="Ej: 20"/>
                @if($errors->first('pzas_exis'))
                <p class="text-danger">{{$errors->first('pzas_exis')}}</ide>
                @endif
            </div>
          </div>
          <div class="field item form-group">
            <label class="col-form-label col-md-5 col-sm-5  label-align">Lote:<span
                class="text-danger">*</span></label>
            <div class="col-md-5 col-sm-5">
              <input class="form-control" data-validate-length-range="6" data-validate-words="2" name="lote" value="{{old('lote')}}"
                placeholder="Ej: MAT-0001"/>
                @if($errors->first('lote'))
                <p class="text-danger">{{$errors->first('lote')}}</ide>
                @endif
            </div>
          </div>
          <div class="field item form-group">
            <label class="col-form-label col-md-5 col-sm-5  label-align">Imagen:<span
                class="text-danger">*</span></label>
            <div class="col-md-5 col-sm-5">
              <input type="file" class="form-control" data-validate-length-range="6" data-validate-words="2" name="img"/>
                @if($errors->first('img'))
                <p class="text-danger">{{$errors->first('img')}}</p>
                @endif
            </div>
          </div>

            <div class="field item form-group">
            <label class="col-form-label col-md-5 col-sm-5 label-align"></label>
            <div class="col-md-5 col-sm-5 ">
                <button type="submit" class="btn btn-success ">Enviar</button>
                <a href="{{route('reportemateriales')}}"
                <button type="button" class="btn btn-danger">Cancelar</button></a>
            </div>
          </div>
        </form>
      </div>
  </div>
</div>
@stop
