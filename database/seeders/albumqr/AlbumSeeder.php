<?php

namespace Database\Seeders\albumqr;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AlbumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('albumqr.albumes')->insert([
            'titulo'        => 'GRADUCIÓN',
            'descripcion'   => 'El momento mas importe de mi linea de estudiante.',
            'estado'    => 1,
            'cliente_id'    => 1,
            'plantilla_id'    => 1,
            'palabras'      => "ePSON ePSON",
            'created_at'    => date('Y-m-d H:i:s'),
            'updated_at'    => date('Y-m-d H:i:s'),
        ]);
        DB::table('albumqr.albumes')->insert([
            'titulo'        => 'VACACIONES EN LIMA',
            'descripcion'   => 'Disfrutando de mis vacaciones en Lima.',
            'estado'    => 1,
            'cliente_id'    => 1,
            'plantilla_id'    => 1,
            'palabras'      => "ePSON ePSON",
            'created_at'    => date('Y-m-d H:i:s'),
            'updated_at'    => date('Y-m-d H:i:s'),
        ]);
        DB::table('albumqr.albumes')->insert([
            'titulo'        => 'PASANTIA',
            'descripcion'   => 'Disfrutando de mi pasantia.',
            'estado'    => 1,
            'cliente_id'    => 1,
            'plantilla_id'    => 1,
            'palabras'      => "ePSON ePSON",
            'created_at'    => date('Y-m-d H:i:s'),
            'updated_at'    => date('Y-m-d H:i:s'),
        ]);
    }

}
