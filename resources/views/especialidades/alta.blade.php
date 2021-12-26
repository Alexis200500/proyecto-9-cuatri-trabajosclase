@extends('plantilla')
@section('contenido')

<div class="right_col" role="main">
    <div class="control">
        <h1>ALTA ESPECIALIDADES</h1>
        <div class="x_content">
            <form action="{{route('guarda_especialidades')}}" method="POST">
                {{csrf_field()}}
                <div class="field item form-group">
                    <label class="col-form-label col-md-5 col-sm-5  label-align">ID:<span
                            class="required">*</span></label>
                    <div class="col-md-5 col-sm-5">
                        @if($errors->first('idesp'))
                        <i class="text-danger"> {{$errors->first('idesp')}} </i>
                        @endif
                        <input type="text" class="form-control" value="{{$idesigue}}" readonly="readonly" name="idesp">
                    </div>
                </div>

                <div class="field item form-group">
                    <label class="col-form-label col-md-5 col-sm-5  label-align">Especialidad:<span
                            class="required">*</span></label>
                    <div class="col-md-5 col-sm-5">
                        @if($errors->first('especialidad'))
                        <p class="text-danger"> {{$errors->first('especialidad')}} </p>
                        @endif
                        <input type="text" class="form-control" value="{{old('especialidad')}}" name="especialidad">
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
