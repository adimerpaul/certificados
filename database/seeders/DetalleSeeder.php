<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DetalleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('detalles')->insert(['descripcion'=>'UN curso que contiene muchas coasas','icono'=>'fa-user','certificado_id'=>'1']);
        DB::table('detalles')->insert(['descripcion'=>'Sacado de m8ucho libros','icono'=>'fa-book','certificado_id'=>'1']);
    }
}
