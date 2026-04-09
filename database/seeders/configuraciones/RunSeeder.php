<?php

namespace Database\Seeders\configuraciones;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
         DB::table('configuraciones.usuarios')->truncate();


        $this->call([
            UsuarioSeeder::class,
        ]);
    }
}
