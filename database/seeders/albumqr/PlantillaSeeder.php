<?php

namespace Database\Seeders\albumqr;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlantillaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('albumqr.plantillas')->insert([
            'titulo'        => 'PLANTILLA 1',
            'descripcion'   => 'PLANTILLA 1',
            'estado'    => 1,
            'usuario_id'    => 1,
            'created_at'    => date('Y-m-d H:i:s'),
            'updated_at'    => date('Y-m-d H:i:s'),
        ]);
        DB::table('albumqr.plantillas')->insert([
            'titulo'        => 'PLANTILLA 2',
            'descripcion'   => 'PLANTILLA 2',
            'estado'    => 1,
            'usuario_id'    => 1,
            'created_at'    => date('Y-m-d H:i:s'),
            'updated_at'    => date('Y-m-d H:i:s'),
        ]);
        DB::table('albumqr.plantillas')->insert([
            'titulo'        => 'PLANTILLA 3',
            'descripcion'   => 'PLANTILLA 3',
            'estado'    => 1,
            'usuario_id'    => 1,
            'created_at'    => date('Y-m-d H:i:s'),
            'updated_at'    => date('Y-m-d H:i:s'),
        ]);
    }
}
