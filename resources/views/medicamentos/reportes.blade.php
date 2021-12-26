@extends('plantilla')
@section('contenido')

<div class="right_col" role="main">
    <div class="control">
        <h1>REPORTES MEDICAMENTOS</h1>
        <br>
        <a href="{{route('alta_medicamentos')}}">
            <button type="button" class="btn btn-success">Agregar Medicamentos</button>
        </a> <br>
        <br><br>
        @if(Session::has('mensaje'))
        <div class="alert alert-success">{{Session::get('mensaje')}}</div>
        @endif
        <div class="x_content">
            <table class="table table-striped table-dark">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Medicamento</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Presentación</th>
                        <th scope="col">Sustancia Activa</th>
                        <th scope="col">Operación</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($consulta as $c)
                    <tr>
                        <td data-titulo="ID" scope="row">{{$c->idmed}}</td>
                        <td data-titulo="Medicamento">{{$c->nombre}}</td>
                        <td data-titulo="Tipo de medicamento">{{$c->tip}}</td>
                        <td data-titulo="Presentación">{{$c->presentacion}}</td>
                        <td data-titulo="Sustancia activa">{{$c->susta_activa}}</td>
                        <td>
                            <a href="{{route('modifica_medicamentos',['idmed'=>$c->idmed])}}">
                                <button type="button" class="btn btn-info">Modificar</button>
                            </a>
                            @if($c->deleted_at)
                            <a href="{{route('activar_medicamentos',['idmed'=>$c->idmed])}}">
                                <button type="button" class="btn btn-warning">Activar</button>
                            </a>
                            <a href="{{route('eliminar_medicamentos',['idmed'=>$c->idmed])}}">
                                <button type="button" class="btn btn-secondary">Eliminar</button>
                            </a>
                            @else
                            <a href="{{route('desactivar_medicamentos',['idmed'=>$c->idmed])}}">
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
