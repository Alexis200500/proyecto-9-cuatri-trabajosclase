@extends('plantilla')
@section('contenido')
 <div class="right_col" role="main">
            <nav class="navbar navbar-expand-lg navbar-dark ">
  <a class="navbar-brand" href="#"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor01">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">
          <span class="sr-only"></span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"></a>
      </li>

    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="text" placeholder="Buscar">
      <button class="btn btn-primary my-2 my-sm-0" type="submit">Buscar</button>
    </form>
  </div>
</nav>
                <div class="x_panel">
                    <h1>Reporte de consultas</h1>
                    <br>
                    <div align="left">
                    <a href="{{route('altaconsulta')}}"
                    <button type="button" class="btn btn-success" align="left">Nueva consulta</button>
                    </a>
                    </div>
                    <br>
                    @if(Session::has('mensaje'))
                    <div class="alert alert-success">{{Session::get('mensaje')}}</div>
                    @endif

                    <table class="table table-dark">
                      <thead>
                        <tr>
                              <th>Clave</th>
                              <th>Paciente</th>
                              <th>Odontólogo</th>
                              <th>Fecha de consulta</th>
                              <th>Hora de consulta</th>
                              <th>Costo</th>
                              <th>Operaciones</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($consulta as $c)
                          <tr>
                              <td >{{$c->idconsulta}}</td>
                              <td >{{$c->paci}} {{$c->apellidop}} {{$c->apellidom}}</td>
                              <td >{{$c->odo}} {{$c->appaterno}} {{$c->apmaterno}}</td>
                              <td >{{$c->fecha_consulta}}</td>
                              <td >{{$c->hora_consulta}}</td>
                              <td >{{$c->costo}}</td>
                              <td>

                              <a href="{{route('modificarconsulta',['idconsulta'=>$c->idconsulta])}}"
                              <button type="button" class="btn btn-info">Modificar</button>
                              </a>
                              @if($c->deleted_at)
                              <a href="{{route('activarconsulta',['idconsulta'=>$c->idconsulta])}}"
                              <button type="button" class="btn btn-warning">Activar</button>
                              <a href="{{route('borraconsulta',['idconsulta'=>$c->idconsulta])}}"
                              <button type="button" class="btn btn-secondary">Borrar</button>
                              </a>
                              @else
                              <a href="{{route('desactivaconsulta',['idconsulta'=>$c->idconsulta])}}"
                              <button type="button" class="btn btn-danger">Desactivar</button>
                              </a>
                              @endif

                          </tr>
                          @endforeach
                        </tbody>
                    </table>

                    <section class="paginacion">
                        <ul>
                            <li class="page-item ">
      <a class="page-link" href="#">&laquo;</a>
    </li>
    <li class="page-item active">
      <a class="page-link" href="#">1</a>
    </li>
    <li class="page-item">
      <a class="page-link" href="#">2</a>
    </li>
    <li class="page-item">
      <a class="page-link" href="#">3</a>
    </li>
    <li class="page-item">
      <a class="page-link" href="#">4</a>
    </li>
    <li class="page-item">
      <a class="page-link" href="#">5</a>
    </li>
    <li class="page-item">
      <a class="page-link" href="#">&raquo;</a>
    </li>
                        </ul>
                    </section>

                </div>

        </div>
@endsection
