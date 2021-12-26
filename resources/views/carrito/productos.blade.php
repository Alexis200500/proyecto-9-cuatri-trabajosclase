@extends('plantilla')
@section('css')
    
@endsection

@section('contenido')
    

<div class="right_col" role="main">
    <div class="control">
    <nav class="nav justify-content-end">
        @if(session('carrito'))
        <a class="nav-link" href="{{url('carrito')}}">
            El carrito contenido: {{ count(session('carrito'))}} Articulos
        </a>
        @else
        <a class="nav-link" href="#">
            El carrito contenido: 0 Articulos
        </a>
        @endif
    </nav>
    <style>
        .card {
            margin: 10px 5px 20px 5px;
        }
        nav {
            background-color: #eee;
        }
    </style>
    <br><br>

    <div class="container">
        @if($message = Session::get('success'))
        <div class="alert alert-sucess alert-block">
            <strong>{{$message}}</strong>
        </div>
        @endif
        <div class="row">
            @foreach ($productos as $producto)
                <div class="col-sm-4">
                    <div class="card" style="width: 18rem;">
                        <img src="{{ asset('archivos/'.$producto->img)  }}" class="card-img-top" alt="..." height="300">
                        <div class="card-body">
                            <h5 class="card-title"><b>N°.</b>{{ $producto->id }} - {{ $producto->nombre }}</h5>
                            <p class="card-text">
                                <b>Existencias: </b> {{ $producto->cantidad}} <br>
                                <b>Costo (c/u): </b> ${{$producto->costo}}
                            </p>
                            <a href="{{ url('agregar/'.$producto->id) }}" class="btn btn-primary" role="button">Agregar</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    {{-- <footer class="bd-footer bg-light">
        <div class="container ">
            <div class="row">
                <div>
                    <ul class="list-unstylec small text-muted">
                        <li class="mb-2">
                            Desarrollo para <a href="http://utvt.edomex.gob.mx/">UTVT</a>, Noveno cuatrimestre de IDGS-93, 2021. &#169;
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer> --}}
    </div>
</div>

    @endsection
