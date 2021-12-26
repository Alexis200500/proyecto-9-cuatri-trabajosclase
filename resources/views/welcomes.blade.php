<!DOCTYPE html>
<html lang="es">
   <head>
        <meta charset="utf-8">
        <title>Laravel</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
               <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css"/>
               <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"/>
               <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css"/>
               <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css"/>
    </head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Laravel 8 | DataTables Ejemplo</h2>
        <!--<p style="display:flex; justify:flex-end">
          <a href="{{ url('pdfalumnos') }}">PDF-Alumnos</a>
          <a href="{{ url('export') }}">EXCEL-Alumnos</a>
        </p> -->
        <a href="javascript:void(0)" id="createNewCustomer" class="btn btn-success">Crear nuevo alumno</a>
        <hr>
        <table class="table table-bordered yajra-datatable2">
            <thead>
                <tr>
                    <th>N°</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Genero</th>
                    <th>Telefono</th>
                    <th>Correo</th>

                    <th >Otros</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
      
    </div>

    <!-- ----------------- Formulario: Modal ------------------------------- -->
      <div class="modal fade" id="ajaxModel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header"><h4 class="modal-title" id="modelHeading"></h4></div>
            <div class="modal-body">
              <form id="CustomerForm" name="CustomerForm" class="form-horizontal">
                <input type="text" name="Customer_id" id="Customer_id">

                <div class="form-group">
                  <label for="nombres" class="col-sm-2 control-label">Nombre</label>
                    <div class="col-sm-12">
                      <input type="text" name="nombres" id="nombres" class="form-control" placeholder="Indica su nombre" value="" maslenght="30" required="">
                    </div>
                </div>

                <div class="form-group">
                  <label for="apellidopa" class="col-sm-2 control-label">Apellidos</label>
                    <div class="col-sm-12">
                      <input type="text" name="apellidopa" id="apellidopa" class="form-control" placeholder="Indica su Apellido" value="" maslenght="30" required="">
                    </div>
                </div>

                <div class="form-group">
                  <label for="eda" class="col-sm-2 control-label">Edad</label>
                    <div class="col-sm-12">
                      <input type="text" name="eda" id="eda" class="form-control" value="" maslenght="2" required="">
                    </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Genero</label>
                    <div class="col-sm-12">
                      <div class="form-check">
                        <input type="radio" name="sex" id="sex" class="form-check-input" value="F" checked>
                        <label class="form-check-label" for="sex">Femenino</label>
                      </div>
                      <div class="form-check">
                        <input type="radio" name="sex" id="sex" class="form-check-input" value="M">
                        <label class="form-check-label" for="sex">Masculino</label>
                      </div>
                    </div>
                </div>

                <div class="form-group">
                  <label for="telefon" class="col-sm-2 control-label">Telefono</label>
                    <div class="col-sm-12">
                      <input type="text" name="telefon" id="telefon" class="form-control" placeholder="Intoduce un numero de telefono" value="" required="">
                    </div>
                </div>

                <div class="form-group">
                  <label for="emai" class="col-sm-2 control-label">E-mail</label>
                    <div class="col-sm-12">
                      <input type="text" name="emai" id="emai" class="form-control" placeholder="Intoduce un correo valido" value="" required="">
                    </div>
                </div>

                <div class="form-group">
                  <label for="pas" class="col-sm-2 control-label">Contraseña</label>
                    <div class="col-sm-12">
                      <input type="text" name="pas" id="pas" class="form-control" placeholder="Ingrese su contraseña" value="" required="">
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


</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
  <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>


          <script type="text/javascript">
            $(function(){
              $.ajaxSetup({
              headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
            });

              var table = $('.yajra-datatable2').DataTable({
                processing: true,
                serverSide: true,
                ajax: "",
                columns: [
                    { data: 'DT_RowIndex', name: 'DT_RowIndex' },
                    { data: 'nombres', name: 'nombres' },
                    { data: 'apellidopa', name: 'apellidopa' },
                    { data: 'sex', name: 'sex' },
                    { data: 'telefon', name: 'telefon' },
                    // { data: 'correo', name: 'correo' },
                    { data: 'emai', name: 'emai' },
                    { data: 'otros', name: 'otros', orderable: false, searchable: false },
                ]
              });
            // -----------Nuevo --
            $('#createNewCustomer').click(function(){
              $('#saveBtn').val("create-Customer");
              $('#Customer_id').val("");
              $('#CustomerForm').trigger("reset");
              $('#modelHeading').html("Crear Nuevo Registro");
              $('#ajaxModel').modal("show");
            });


            // ------------------ Modificar --------------
            $('body').on('click', '.editCustomer', function(){
                var id = $(this).data('id');
                // console.log(id);
                $.get("editarodo/" + id, function (data){
                    $('#modelHeading').html("Editar Sin foto");
                    $('#saveBtn').val("edit-user");
                    $('#ajaxModel').modal("show");
                    $('#Customer_id').val(data.id);
                    $('#nombres').val(data.nombres);
                    $('#apellidopa').val(data.apellidopa);
                    $('#sex').val(data.sex);
                    $('#eda').val(data.eda);
                    $('#telefon').val(data.telefon);
                    $('#emai').val(data.emai);
                    $('#pas').val(data.pas);
                })
            });
            // ---------------- Salvar --------------
                  $('#saveBtn').click(function(e){
                    e.preventDefault();
                  $(this).html('Enviando...');
                          $.ajax({
                            data: $('#CustomerForm').serialize(),
                            url: "{{ route('sin') }}",
                            type: "POST",
                            dataType: "json",
                            success: function(data){
                              $('#CustomerForm').trigger('reset');
                              $('#ajaxModel').modal('hide');
                              table.draw();
                            },
                            error: function(data){
                              console.log('Error: ', data);
                              $('#saveBtn').html('Guardar Cambios');
                            }
                          });
                  });

          // ----------------- Delete -------------
          $('body').on('click', '.deleteCustomer', function(){
              var id = $(this).data("id");
              if (confirm("Esta seguro de querer borrar el registro...?")) {
                $.ajax({
                  type: "DELETE",
                  url: "{{ url('destroyodo') }}"+"/"+id,
                  success: function(data){
                    table.draw();
                  },
                  error: function(data){
                    console.log("Error: ", data);
                  }
                });
              }
              else{}
            });

          });
        </script>
</html>
