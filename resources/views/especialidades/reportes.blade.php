@extends('plantilla')
@section('contenido')

<div class="right_col" role="main">
    <div class="control">
        <h1>REPORTES ESPECIALIDADES</h1>
        <br>
        <a href="{{route('alta_especialidades')}}">
            <button type="button" class="btn btn-success">Agregar Especialidad</button>
        </a> <br>
        
        @if(Session::has('mensaje'))
        <div class="alert alert-success">{{Session::get('mensaje')}}</div>
        @endif
        <div class="x_content">
            <table class="table table-striped table-dark">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Especialidad</th>
                        <th scope="col">Operación</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($consulta as $c)
                    <tr>
                        <td data-titulo="ID" scope="row">{{$c->idesp}}</td >
                        <td data-titulo="Especialidad">{{$c->especialidad}}</td>
                        <td>
                            <a href="{{route('modifica_especialidades',['idesp'=>$c->idesp])}}">
                                <button type="button" class="btn btn-info">Modificar</button>
                            </a>
                            @if($c->deleted_at)
                            <a href="{{route('activar_especialidades',['idesp'=>$c->idesp])}}">
                                <button type="button" class="btn btn-warning">Activar</button>
                            </a>
                            <a href="{{route('eliminar_especialidades',['idesp'=>$c->idesp])}}">
                                <button type="button" class="btn btn-secondary">Eliminar</button>
                            </a>
                            @else
                            <a href="{{route('desactivar_especialidades',['idesp'=>$c->idesp])}}">
                                <button type="button" class="btn btn-danger">Desactivar</button>
                            </a>
                            @endif

                        </td>
                    </tr>
                    <tr>
                        @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@stop
