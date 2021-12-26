<table>
    <thead>
        <tr>
          
            <th>Nombre Completo</th>
            {{-- <th>appaterno</th>
            <th>apmaterno</th> --}}
            <th>Sexo</th>
            <th>Edad</th>
            <th>Telefono</th>
            <th>Correo</th>
            <th>Password</th>
            <th>Dirección</th>
            {{-- <th>numint</th>
            <th>numext</th>
            <th>idmun</th>
            <th>colonia</th> --}}
            {{-- <th>img</th> --}}
            <th>Especialidad</th>
            <th>Horario</th>
        </tr>
    </thead>
    <tbody>
        @foreach($odontologos as $odo)
            <tr>
                <td>{{ $odo->appaterno.' '.$odo->apmaterno.' '.$odo->nombre}}</td>
                <td>{{ $odo->sexo}}</td>
                <td>{{ $odo->edad}}</td>
                <td>{{ $odo->telefono}}</td>
                <td>{{ $odo->correo}}</td>
                <td>{{ $odo->password}}</td>

                <td>{{ $odo->calle.' num.ext '. $odo->numext.', num.int '. $odo->numint.', colonia '.$odo->colonia.', mun. '.$odo->idmun}}</td>

                <td>{{ $odo->idesp}}</td>
                <td>{{ $odo->hora_entrada .'-'. $odo->hora_salida}}</td>

            
            </tr>
        @endforeach
    </tbody>
</table>