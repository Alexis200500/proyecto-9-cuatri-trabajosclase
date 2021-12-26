<?php

namespace App\Imports;

use App\Models\odontologos;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;
HeadingRowFormatter::default('none');

class OdontologosImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new odontologos([
            // 'idodo' => $row['idodo']?? null,
            'nombre' => $row['nombre'],
            'appaterno' => $row['appaterno'],
            'apmaterno' => $row['apmaterno'],
            'sexo' => $row['sexo'],
            'edad' => $row['edad'],
            'telefono' => $row['telefono'],
            'correo' => $row['correo'],
            'password' => $row['password'],
            'calle' => $row['calle'],
            'numint' => $row['numint'],
            'numext' => $row['numext'],
            'idmun' => $row['idmun'],
            'colonia' => $row['colonia'],
            'idesp' => $row['idesp'],
            'hora_entrada' => $row['hora_entrada'],
            'hora_salida' => $row['hora_salida'],
            'img' => $row['img'],
            ]);
    }
}
