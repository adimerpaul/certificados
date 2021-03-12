<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CertificadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('certificados')->insert(['nombre'=>'CURSO APLICACIONES WEB','descripcion'=>'El curso contiene aplicaciones web','fecha'=>'2021-01-01','user_id'=>1]);
//        $table->string('nombre');
//        $table->string('descripcion');
//        $table->date('fecha');
//        $table->unsignedBigInteger('user_id');
    }
}
