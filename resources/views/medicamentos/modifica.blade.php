@extends('plantilla')
@section('contenido')

<div class="right_col" role="main">
    <div class="control">
        <h1>ALTA MEDICAMENTOS</h1>
        <div class="x_content">
            <form action="{{route('cambio_medicamentos')}}" method="POST">
                {{csrf_field()}}
                <div class="field item form-group">
                    <label class="col-form-label col-md-5 col-sm-5  label-align">ID:<span
                            class="required">*</span></label>
                    <div class="col-md-5 col-sm-5">
                        @if($errors->first('idmed'))
                        <i class="text-danger"> {{$errors->first('idmed')}} </i>
                        @endif
                        <input type="text" class="form-control" value="{{$consulta->idmed}}" readonly="readonly" name="idmed">
                    </div>
                </div>

                <div class="field item form-group">
                    <label class="col-form-label col-md-5 col-sm-5  label-align">Medicamento:<span
                            class="required">*</span></label>
                    <div class="col-md-5 col-sm-5">
                        @if($errors->first('nombre'))
                        <p class="text-danger"> {{$errors->first('nombre')}} </p>
                        @endif
                        <input type="text" class="form-control" value="{{$consulta->nombre}}" name="nombre">
                    </div>
                </div>

                <div class="field item form-group">
                    <label class="col-form-label col-md-5 col-sm-5 label-align">Tipo del Medicamento:</label>
                    <div class="col-md-5 col-sm-5 ">
                    <select name = 'idtipomed' class="custom-select">
                  <option value="{{$consulta->idtipomed}}">{{$consulta->tm}}</option>
                  @foreach ($tipo_medicamentos as $tm)
                        <option value="{{$tm->idtipomed}}">{{$tm->tipo}}</option>
                  @endforeach
                </select>
                    </div>
                </div>

                <div class="field item form-group">
                    <label class="col-form-label col-md-5 col-sm-5  label-align">Presentación:<span
                            class="required">*</span></label>
                    <div class="col-md-5 col-sm-5">
                        @if($errors->first('presentacion'))
                        <p class="text-danger"> {{$errors->first('presentacion')}} </p>
                        @endif
                        <input type="text" class="form-control" value="{{$consulta->presentacion}}" name="presentacion">
                    </div>
                </div>

                <div class="field item form-group">
                    <label class="col-form-label col-md-5 col-sm-5  label-align">Sustancia Activa:<span
                            class="required">*</span></label>
                    <div class="col-md-5 col-sm-5">
                        @if($errors->first('susta_activa'))
                        <p class="text-danger"> {{$errors->first('susta_activa')}} </p>
                        @endif
                        <input type="text" class="form-control" value="{{$consulta->susta_activa}}" name="susta_activa">
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
