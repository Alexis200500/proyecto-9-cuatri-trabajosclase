@extends('plantilla')

@section('css')
@endsection


@section('contenido')



<div class="right_col" role="main">
    <div class="control">
        <h1>REPORTES ODONTOLOGOS</h1>
        <br>
        <a href="javascript:void(0)" id="createNewCustomer">
            <button type="button" class="btn btn-success ">Crear nuevo Odontologo</button>
            @section('odontologos')
                
            @endsection
        </a>

        <a class="odo" id="odo" href="{{ url('pdfodontologos')}}">
        <button type="button" class="btn btn-danger">PDF-Odontologos</button>
        </a>

        <a class="odo" id="odo" href="{{ url('export')}}">
            <button type="button" class="btn btn-info">Excel-Odontologos</button>
        </a>

 
         <br>
        <br><br>
        @if(Session::has('mensaje'))
        <div class="alert alert-success">{{Session::get('mensaje')}}</div>
        @endif
        <div class="x_content">
            <table class="table table-bordered yajra-datatable" style="width:100%">
                <thead>
                    <tr>
                    <th>N°</th>
                    {{-- <th>Foto</th> --}}
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Telefono</th>
                    <th>E-mail </th>
                    <th>Dirección.</th>
                    <th>Otros</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>

            <br> <hr>
        <h3>Excel | Formulario de importación</h3>
        <form action="{{route('import')}}" method="POST" enctype="multipart/form-data" name="excelimport">
          @csrf
          <input type="file" name="file" class="form-control" required>
          <button class="btn btn-success">Importar archivo excel (.cvs)</button>
        </form>

        </div>
    </div>
</div>

@endsection

@section('js')
@endsection

