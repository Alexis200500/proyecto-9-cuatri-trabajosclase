

<div class="right_col" role="main">
    <div class="control">
        <h1>REPORTES PACIENTES</h1>
        <br>
        <a href="javascript:void(0)" id="createNewCustomer">
            <button type="button" class="btn btn-success ">Crear nuevo Paciente</button>
            @section('pacientes')
                
            @endsection
        </a>

        <br>
        <br><br>
        @if(Session::has('mensaje'))
        <div class="alert alert-success">{{Session::get('mensaje')}}</div>
        @endif
        <div class="x_content">
            <table class="table table-bordered yajra-datatable2" style="width:100%">
                <thead>
                    <tr>
                    <th>N°</th>
                    {{-- <th>Foto</th> --}}
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Telefono</th>
                    <th>E-mail </th>
                    <th>Edad.</th>
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

