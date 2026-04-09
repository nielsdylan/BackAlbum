<?php

namespace Database\Seeders\hotel;

use App\Models\Hotel\Nivel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NivelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data = new Nivel();
        $data->nombre = 'PRIMER NIVEL';
        $data->hotel_id = 1;
        $data->save();
        $data = new Nivel();
        $data->nombre = 'SEGUNDO NIVEL';
        $data->hotel_id = 1;
        $data->save();
        $data = new Nivel();
        $data->nombre = 'TERCER NIVEL';
        $data->hotel_id = 1;
        $data->save();

    }
}
