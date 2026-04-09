<?php

namespace Database\Seeders\hotel;

use App\Models\Hotel\Categoria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data = new Categoria();
        $data->nombre = 'SENCILLA';
        $data->hotel_id = 1;
        $data->save();
        $data = new Categoria();
        $data->nombre = 'DOBLE';
        $data->hotel_id = 1;
        $data->save();
        $data = new Categoria();
        $data->nombre = 'TRIPLE';
        $data->hotel_id = 1;
        $data->save();
        $data = new Categoria();
        $data->nombre = 'CUADRUPLE';
        $data->hotel_id = 1;
        $data->save();
    }
}
