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
            @section('odontologosin')
                
            @endsection
        </a>
{{-- 
        <a class="odo" id="odo" href="{{ url('pdfodontologos')}}">
        <button type="button" class="btn btn-danger">PDF-Odontologos</button>
        </a>

        <a class="odo" id="odo" href="{{ url('export')}}">
            <button type="button" class="btn btn-info">Excel-Odontologos</button>
        </a> --}}

 
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
                    <th>Foto</th>
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


{{-- ---------------------------------------MODAL------------------------------ --}}
<div class="modal fade" id="ajaxModel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        
        <div class="modal-header"><h4 class="modal-title" id="modelHeading"></h4></div>
        
        <div class="modal-body">
          <img src="" id="img_logo" alt="" style="width: 50px">
          <form id="CustomerForm" name="CustomerForm" class="form-horizontal">
            <input type="text" name="Customer_id" id="Customer_id">
            
            <div class="form-group">
              <label for="nombre" class="col-sm-2 control-label">Nombre</label>
                <div class="col-sm-12">
                  <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Indica su nombre" value="" maslenght="30" required="">
                </div>
            </div>

            <div class="form-group">
              <label for="appaterno" class="col-sm-2 control-label">Apellido Paterno</label>
                <div class="col-sm-12">
                  <input type="text" name="appaterno" id="appaterno" class="form-control" placeholder="Indica su Apellido" value="" maslenght="30" required="">
                </div>
            </div>

            <div class="form-group">
              <label for="apmaterno" class="col-sm-2 control-label">Apellido Materno</label>
                <div class="col-sm-12">
                  <input type="text" name="apmaterno" id="apmaterno" class="form-control" placeholder="Indica su Apellido" value="" maslenght="30" required="">
                </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Genero</label>
                <div class="col-sm-12">
                  <div class="form-check">
                    <input type="radio" name="sexo" id="sexo" class="form-check-input" value="F" checked>
                    <label class="form-check-label" for="sexo">Femenino</label>
                  </div>
                  <div class="form-check">
                    <input type="radio" name="sexo" id="sexo" class="form-check-input" value="M">
                    <label class="form-check-label" for="sexo">Masculino</label>
                  </div>
                </div>
            </div>


              
            
            <div class="form-group">
              <label for="edad" class="col-sm-2 control-label">Edad</label>
                <div class="col-sm-12">
                  <input type="text" name="edad" id="edad" class="form-control" placeholder="Indique su edad" value="" maslenght="30" required="">
                </div>
            </div>

            <div class="form-group">
              <label for="telefono" class="col-sm-2 control-label">Telefono</label>
                <div class="col-sm-12">
                  <input type="text" name="telefono" id="telefono" class="form-control" placeholder="Indique su telefono" value="" maslenght="30" required="">
                </div>
            </div>

            
          {{-- -------------------------------IMAGEN------------------------------- --}}
          <div class="form-group">
            <label for="img" class="col-sm-2 control-label">Foto</label>
              <div class="col-sm-12">
                <input type="file" name="img1" id="img1" class="form-control" required="">
                <input type="text" name="img2" id="img2" class="form-control">
              </div>
          </div>
          {{-- -------------------------------IMAGEN------------------------------- --}}

            <div class="form-group">
              <label for="correo" class="col-sm-2 control-label">E-mail</label>
                <div class="col-sm-12">
                  <input type="text" name="correo" id="correo" class="form-control" placeholder="Intoduce un correo valido" value="" required="">
                </div>
            </div>

            <div class="form-group">
              <label for="password" class="col-sm-2 control-label">Contraseña</label>
                <div class="col-sm-12">
                  <input type="text" name="password" id="password" class="form-control" placeholder="Ingrese su contraseña" value="" required="">
                </div>
            </div>

            <div class="form-group">
              <label for="calle" class="col-sm-2 control-label">Calle</label>
                <div class="col-sm-12">
                  <input type="text" name="calle" id="calle" class="form-control"  value="" required="">
                </div>
            </div>

            <div class="form-group">
              <label for="numext" class="col-sm-2 control-label">Numero Exterior</label>
                <div class="col-sm-12">
                  <input type="text" name="numext" id="numext" class="form-control"  value="" required="">
                </div>
            </div>

            <div class="form-group">
              <label for="numint" class="col-sm-2 control-label">Numero Interior</label>
                <div class="col-sm-12">
                  <input type="text" name="numint" id="numint" class="form-control"  value="" required="">
                </div>
            </div>

            <div class="form-group">
              <label for="idmun" class="col-sm-2 control-label">Municipio</label>
                <div class="col-sm-12">
                  <input type="text" name="idmun" id="idmun" class="form-control"  placeholder="Toluca" value="1" required="">
                </div>
            </div>

            <div class="form-group">
              <label for="colonia" class="col-sm-2 control-label">Colonia</label>
                <div class="col-sm-12">
                  <input type="text" name="colonia" id="colonia" class="form-control"   required="">
                </div>
            </div>

{{--                   <div class="form-group">
              <label for="img" class="col-sm-2 control-label">Foto</label>
                <div class="col-sm-12">
                  <input type="file" name="img" id="img" class="form-control"   required="">
                </div>
            </div> --}}

            <div class="form-group">
              <label for="idesp" class="col-sm-2 control-label">Especialidad</label>
                <div class="col-sm-12">
                  <input type="text" name="idesp" id="idesp" class="form-control"  placeholder="" value="1" required="">
                </div>
            </div>

            <div class="form-group">
              <label for="hora_entrada" class="col-sm-2 control-label">Hora entrada</label>
                <div class="col-sm-12">
                  <input type="time" name="hora_entrada" id="hora_entrada" class="form-control"  required="">
                </div>
            </div>

            <div class="form-group">
              <label for="hora_salida" class="col-sm-2 control-label">Hora Salida</label>
                <div class="col-sm-12">
                  <input type="time" name="hora_salida" id="hora_salida" class="form-control"  required="">
                </div>
            </div>

            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Guardar Cambios</button>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>

@endsection

@section('js')
@endsection