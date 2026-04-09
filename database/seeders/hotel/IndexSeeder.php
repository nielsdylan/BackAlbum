<?php

namespace Database\Seeders\hotel;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IndexSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('hotel.categorias')->truncate();
        DB::table('hotel.clientes')->truncate();
        DB::table('hotel.habitaciones_estados')->truncate();
        DB::table('hotel.habitaciones')->truncate();
        DB::table('hotel.hoteles')->truncate();
        DB::table('hotel.niveles')->truncate();
        DB::table('hotel.personas')->truncate();
        DB::table('hotel.tarifas')->truncate();


        $this->call([
            CategoriaSeeder::class,
            ClienteSeeder::class,
            EstadoHabitacionSeeder::class,
            HabitacionSeeder::class,
            HotelSeeder::class,
            NivelSeeder::class,
            PersonaSeeder::class,
            TarifaSeeder::class,
        ]);
    }
}
