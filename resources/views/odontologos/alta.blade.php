@extends('plantilla')
@section('contenido')

<div class="right_col" role="main">
    <div class="control">
        <h1>ALTA DE ODONTOLOGO</h1>
        <div class="x_content">
            <form action="{{route('guardar_odontologos')}}" method="POST" enctype = 'multipart/form-data'>
                {{csrf_field()}}
                <div class="field item form-group">
                    <label class="col-form-label col-md-5 col-sm-5  label-align">ID<span
                            class="required">*</span></label>
                    <div class="col-md-5 col-sm-5">
                        @if($errors->first('idodo'))
                        <i class="text-danger"> {{$errors->first('idodo')}} </i>
                        @endif
                        <input type="text" class="form-control" value="{{$idesigue}}" readonly="readonly" name="idodo">
                    </div>
                </div>

                <div class="field item form-group">
                    <label class="col-form-label col-md-5 col-sm-5  label-align">Nombre<span
                            class="required">*</span></label>
                    <div class="col-md-5 col-sm-5">
                        @if($errors->first('nombre'))
                        <p class="text-danger"> {{$errors->first('nombre')}} </p>
                        @endif
                        <input type="text" class="form-control" value="{{old('nombre')}}" name="nombre">
                    </div>
                </div>

                <div class="field item form-group">
                    <label class="col-form-label col-md-5 col-sm-5  label-align">Apellido Paterno<span
                            class="required">*</span></label>
                    <div class="col-md-5 col-sm-5">
                        @if($errors->first('appaterno'))
                        <p class="text-danger"> {{$errors->first('appaterno')}} </p>
                        @endif
                        <input type="text" class="form-control" value="{{old('appaterno')}}" name="appaterno">
                    </div>
                </div>

                <div class="field item form-group">
                    <label class="col-form-label col-md-5 col-sm-5  label-align">Apellido Materno<span
                            class="required">*</span></label>
                    <div class="col-md-5 col-sm-5">
                        @if($errors->first('apmaterno'))
                        <p class="text-danger"> {{$errors->first('apmaterno')}} </p>
                        @endif
                        <input type="text" class="form-control" value="{{old('apmaterno')}}" name="apmaterno">
                    </div>
                </div>

                <div class="item form-group"><label class="col-form-label col-md-5 col-sm-5 label-align">Sexo</label>
                    <div class="col-md-5 col-sm-5 ">
                        <div id="gender" class="btn-group" data-toggle="buttons">
                            <p>Masculino:
                                <input type="radio" class="flat" name="sexo" id="genderM" value="M" checked=""
                                    required />
                                Femenino:<input type="radio" class="flat" name="sexo" id="genderF" value="F" />
                            </p>
                        </div>
                    </div>
                </div>

                <div class="field item form-group">
                    <label class="col-form-label col-md-5 col-sm-5  label-align">Edad<span
                            class="required">*</span></label>
                    <div class="col-md-5 col-sm-5">
                        @if($errors->first('edad'))
                        <p class="text-danger"> {{$errors->first('edad')}} </p>
                        @endif
                        <input type="text" class="form-control" value="{{old('edad')}}" name="edad">
                    </div>
                </div>

                <div class="field item form-group">
                    <label class="col-form-label col-md-5 col-sm-5  label-align">Telefono<span
                            class="required">*</span></label>
                    <div class="col-md-5 col-sm-5">
                        @if($errors->first('telefono'))
                        <p class="text-danger"> {{$errors->first('telefono')}} </p>
                        @endif
                        <input type="text" class="form-control" value="{{old('telefono')}}" name="telefono">
                    </div>
                </div>

                <div class="field item form-group">
                    <label class="col-form-label col-md-5 col-sm-5  label-align">Correo electronico<span
                            class="required">*</span></label>
                    <div class="col-md-5 col-sm-5">
                        @if($errors->first('correo'))
                        <p class="text-danger"> {{$errors->first('correo')}} </p>
                        @endif
                        <input class="form-control" name="correo" value="{{old('correo')}}" type="email">
                    </div>
                </div>

                <div class="field item form-group">
                    <label class="col-form-label col-md-5 col-sm-5  label-align">Contraseña<span
                            class="required">*</span></label>
                    <div class="col-md-5 col-sm-5">
                        @if($errors->first('password'))
                        <p class="text-danger"> {{$errors->first('password')}} </p>
                        @endif
                        <input class="form-control" name="password" type="password">
                    </div>
                </div>

                <div class="field item form-group">
                    <label class="col-form-label col-md-5 col-sm-5  label-align">Calle<span
                            class="required">*</span></label>
                    <div class="col-md-5 col-sm-5">
                        @if($errors->first('calle'))
                        <p class="text-danger"> {{$errors->first('calle')}} </p>
                        @endif
                        <input type="text" class="form-control" value="{{old('calle')}}" name="calle">
                    </div>
                </div>

                <div class="field item form-group">
                    <label class="col-form-label col-md-5 col-sm-5  label-align">Numero Exterior<span
                            class="required">*</span></label>
                    <div class="col-md-5 col-sm-5">
                        @if($errors->first('numext'))
                        <p class="text-danger"> {{$errors->first('numext')}} </p>
                        @endif
                        <input type="text" class="form-control" value="{{old('numext')}}" name="numext">
                    </div>
                </div>

                <div class="field item form-group">
                    <label class="col-form-label col-md-5 col-sm-5  label-align">Numero Interior<span
                            class="required">*</span></label>
                    <div class="col-md-5 col-sm-5">
                        @if($errors->first('numint'))
                        <p class="text-danger"> {{$errors->first('numint')}} </p>
                        @endif
                        <input type="text" class="form-control" value="{{old('numint')}}" name="numint">
                    </div>
                </div>

                <div class="field item form-group">
                    <label class="col-form-label col-md-5 col-sm-5 label-align">Municipio:</label>
                    <div class="col-md-5 col-sm-5 ">
                        <select name="idmun" class="select2_group form-control">
                            <option value="">Selecciona un municipio</option>
                            @foreach ($municipios as $mun)
                            <option value="{{$mun->idmun}}">{{$mun->nombre}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="field item form-group">
                    <label class="col-form-label col-md-5 col-sm-5  label-align">Colonia<span
                            class="required">*</span></label>
                    <div class="col-md-5 col-sm-5">
                        @if($errors->first('colonia'))
                        <p class="text-danger"> {{$errors->first('colonia')}} </p>
                        @endif
                        <input type="text" class="form-control" value="{{old('colonia')}}" name="colonia">
                    </div>
                </div>

                <div class="field item form-group">
                    <label class="col-form-label col-md-5 col-sm-5 label-align">Especialidad:</label>
                    <div class="col-md-5 col-sm-5 ">
                        <select name="idesp" class="select2_group form-control">
                            <option value="">Selecciona una especialidad</option>
                            @foreach ($especialidades as $esp)
                            <option value="{{$esp->idesp}}">{{$esp->especialidad}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="field item form-group">
                    <label class="col-form-label col-md-5 col-sm-5  label-align">Hora de entrada:<span
                            class="required">*</span></label>
                    <div class="col-md-5 col-sm-5">
                        @if($errors->first('hora_entrada'))
                        <p class="text-danger"> {{$errors->first('hora_entrada')}} </p>
                        @endif
                        <input class="form-control" name="hora_entrada" type="time" value="{{old('hora_entrada')}}">
                    </div>
                </div>

                <div class="field item form-group">
                    <label class="col-form-label col-md-5 col-sm-5  label-align">Hora de salida:<span
                            class="required">*</span></label>
                    <div class="col-md-5 col-sm-5">
                        @if($errors->first('hora_salida'))
                        <p class="text-danger"> {{$errors->first('hora_salida')}} </p>
                        @endif
                        <input class="form-control" name="hora_salida" type="time" value="{{old('hora_salida')}}">
                    </div>
                </div>

                <div class="field item form-group">
                    <label class="col-form-label col-md-5 col-sm-5  label-align">Foto de perfil:<span
                            class="required">*</span></label>
                    <div class="col-md-5 col-sm-5">
                        @if($errors->first('img'))
                        <p class="text-danger"> {{$errors->first('img')}} </p>
                        @endif
                        <input type="file" name="img" id="img"  tabindex="6">
                    </div>
                </div>


                <!-- <div class="item form-group">
                    <label class="col-form-label col-md-5 col-sm-5 label-align">Activo:</label>
                    <div class="col-md-5 col-sm-5 ">
                        <div id="gender" class="btn-group" data-toggle="buttons">
                            <p>Si:<input type="radio" class="flat" name="activo" id="activosi" value="Si" checked=""
                                    required />
                                No:<input type="radio" class="flat" name="activo" id="activono" value="No" />
                            </p>
                        </div>
                    </div>
                </div> -->

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
