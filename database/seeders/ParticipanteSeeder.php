<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ParticipanteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('participantes')->insert(['nombre'=>'juan lopez alcala','certificado_id'=>'1','ci'=>'1010','hash'=>Hash::make('1')]);
    }
}
