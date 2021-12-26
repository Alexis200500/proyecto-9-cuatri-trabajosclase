@extends('plantilla')
@section('contenido')

<div class="right_col" role="main">
    <div class="control">
        <h1>REPORTES MUNICIPIOS</h1>
        <br>
        <a href="{{route('alta_municipios')}}">
            <button type="button" class="btn btn-success">Agregar Municipio</button>
        </a> <br>
        
        @if(Session::has('mensaje'))
        <div class="alert alert-success">{{Session::get('mensaje')}}</div>
        @endif
        <div class="x_content">
            <table class="table table-striped table-dark">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Municipio</th>
                        <th scope="col">Operación</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($consulta as $c)
                    <tr>
                        <td data-titulo="ID" scope="row">{{$c->idmun}}</td >
                        <td data-titulo="Municipio">{{$c->nombre}}</td>
                        <td>
                            <a href="{{route('modifica_municipios',['idmun'=>$c->idmun])}}">
                                <button type="button" class="btn btn-info">Modificar</button>
                            </a>
                            @if($c->deleted_at)
                            <a href="{{route('activar_municipios',['idmun'=>$c->idmun])}}">
                                <button type="button" class="btn btn-warning">Activar</button>
                            </a>
                            <a href="{{route('eliminar_municipios',['idmun'=>$c->idmun])}}">
                                <button type="button" class="btn btn-secondary">Eliminar</button>
                            </a>
                            @else
                            <a href="{{route('desactivar_municipios',['idmun'=>$c->idmun])}}">
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
