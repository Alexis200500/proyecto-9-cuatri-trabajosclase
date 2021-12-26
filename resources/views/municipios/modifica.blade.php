@extends('plantilla')
@section('contenido')

<div class="right_col" role="main">
    <div class="control">
        <h1>MODIFICA MUNICIPIOS</h1>
        <div class="x_content">
            <form action="{{route('guardarcambios_municipios')}}" method="POST">
                {{csrf_field()}}
                <div class="field item form-group">
                    <label class="col-form-label col-md-5 col-sm-5  label-align">ID:<span
                            class="required">*</span></label>
                    <div class="col-md-5 col-sm-5">
                        @if($errors->first('idmun'))
                        <i class="text-danger"> {{$errors->first('idmun')}} </i>
                        @endif
                        <input type="text" class="form-control" value="{{$consulta->idmun}}" readonly="readonly"name="idmun">
                    </div>
                </div>

                <div class="field item form-group">
                    <label class="col-form-label col-md-5 col-sm-5  label-align">Municipio:<span
                            class="required">*</span></label>
                    <div class="col-md-5 col-sm-5">
                        @if($errors->first('nombre'))
                        <p class="text-danger"> {{$errors->first('nombre')}} </p>
                        @endif
                        <input type="text" class="form-control" value="{{$consulta->nombre}}" name="nombre">
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
