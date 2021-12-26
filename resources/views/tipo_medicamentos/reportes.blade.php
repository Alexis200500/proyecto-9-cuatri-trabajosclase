@extends('plantilla')
@section('contenido')

<div class="right_col" role="main">
    <div class="control">
        <h1>TIPOS DE MEDICAMENTO</h1>
        <br>
        <a href="{{route('alta_tipomedicamentos')}}">
            <button type="button" class="btn btn-success">Agregar Tipo de Medicamento</button>
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
                        <th scope="col">Tipo del medicamento</th>
                        <th scope="col">Operación</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($consulta as $c)
                    <tr>
                        <td  data-titulo="ID"scope="row">{{$c->idtipomed}}</td>
                        <td data-titulo="Tipo del medicamento">{{$c->tipo}}</td>
                        <td>
                            <a href="{{route('modifica_tipomedicamentos',['idtipomed'=>$c->idtipomed])}}">
                                <button type="button" class="btn btn-info">Modificar</button>
                            </a>
                            @if($c->deleted_at)
                            <a href="{{route('activar_tipomedicamentos',['idtipomed'=>$c->idtipomed])}}">
                                <button type="button" class="btn btn-warning">Activar</button>
                            </a>
                            <a href="{{route('eliminar_tipomedicamentos',['idtipomed'=>$c->idtipomed])}}">
                                <button type="button" class="btn btn-secondary">Eliminar</button>
                            </a>
                            @else
                            <a href="{{route('desactivar_tipomedicamentos',['idtipomed'=>$c->idtipomed])}}">
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
