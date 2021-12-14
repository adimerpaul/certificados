<?php

namespace App\Imports;

use App\Participante;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;

class UsersImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public $id=0;
    public function __construct($id)
    {
        $this->id=$id;
    }

    public function model(array $row)
    {
        return new \App\Models\Participante([
            'nombre'     => $row[0],
            'ci'    => $row[1],
            'hash' => '',
            'certificado_id' => $this->id
        ]);
    }
}
