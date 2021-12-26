<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>My Dentiss | PDF</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- css estilos -->
    <style></style>
</head>

<body>
    <div class="container">
        <h2 class="mb-4"> My Dentiss | PDF-Odontologos </h2>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Telefono</th>
                        <th scope="col">Correo electronico</th>

                </tr>
            </thead>
            <tbody>
            @foreach ($consulta as $c)
                    <tr>
                        <td data-titulo="ID" scope="row">{{$c->idpaciente}}</td>
                        <td data-titulo="Nombre">{{$c->apellidop}} {{$c->apellidom}} {{$c->nombre}}</td>
                        <td data-titulo="Telefono">{{$c->telefono}}</td>
                        <td data-titulo="Correo electronico">{{$c->correo}}</td>
                    </tr>
                    @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>