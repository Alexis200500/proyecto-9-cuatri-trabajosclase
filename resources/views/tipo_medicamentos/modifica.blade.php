@extends('plantilla')
@section('contenido')

<div class="right_col" role="main">
    <div class="control">
        <h1>MODIFICA TIPO DE MEDICAMENTOS</h1>
        <div class="x_content">
            <form action="{{route('guardarcambios_tipomedicamentos')}}" method="POST">
                {{csrf_field()}}
                <div class="field item form-group">
                    <label class="col-form-label col-md-5 col-sm-5  label-align">ID:<span
                            class="required">*</span></label>
                    <div class="col-md-5 col-sm-5">
                        @if($errors->first('idtipomed'))
                        <i class="text-danger"> {{$errors->first('idtipomed')}} </i>
                        @endif
                        <input type="text" class="form-control" value="{{$consulta->idtipomed}}" readonly="readonly"name="idtipomed">
                    </div>
                </div>

                <div class="field item form-group">
                    <label class="col-form-label col-md-5 col-sm-5  label-align">Tipo de medicamento:<span
                            class="required">*</span></label>
                    <div class="col-md-5 col-sm-5">
                        @if($errors->first('tipo'))
                        <p class="text-danger"> {{$errors->first('tipo')}} </p>
                        @endif
                        <input type="text" class="form-control" value="{{$consulta->tipo}}" name="tipo">
                    </div>
                </div>



                <!-- <div class="row">
                <div class="col-xs-6 col-md-6"><input type="submit" value="Guardar" class="btn btn-danger btn-block btn-lg" tabindex="7"
                    title="Guardar datos ingresados"></div>
            </div> -->


                <div class="field item form-group">
                    <label class="col-form-label col-md-5 col-sm-5 label-align"></label>
                    <div class="col-md-5 col-sm-5 ">
                        <input type="submit" value="Guardar" class="btn btn-success col-md-5 col-sm-5 ">

                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
@stop
