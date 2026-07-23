<?php

namespace Database\Seeders\albumqr;

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
        DB::table('albumqr.usuarios')->truncate();
        DB::table('albumqr.albumes')->truncate();
        DB::table('albumqr.plantillas')->truncate();
        DB::table('albumqr.plantillas_usuarios')->truncate();
        DB::table('albumqr.clientes')->truncate();
        DB::table('albumqr.personas')->truncate();


        $this->call([
            UsuarioSeeder::class,
            AlbumSeeder::class,
            PlantillaSeeder::class,
            PlantillaUsarioSeeder::class,
            ClienteSeeder::class,
            PersonaSeeder::class,
        ]);
    }
}
