<?php

namespace Database\Seeders\hotel;

use App\Models\Hotel\Habitacion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HabitacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data = new Habitacion();
        $data->nombre = '101';
        $data->descripcion= 'Habitacion sencilla';
        $data->precio = 55;
        $data->nivel_id = 1;
        $data->tarifa_id = 1;
        $data->categoria_id = 1;
        $data->hotel_id = 1;
        $data->save();

        $data = new Habitacion();
        $data->nombre = '102';
        $data->descripcion= 'Habitacion sencilla';
        $data->precio = 80;
        $data->nivel_id = 1;
        $data->tarifa_id = 1;
        $data->categoria_id = 2;
        $data->hotel_id = 1;
        $data->save();

        $data = new Habitacion();
        $data->nombre = '201';
        $data->descripcion= 'Habitacion sencilla';
        $data->precio = 55;
        $data->nivel_id = 2;
        $data->tarifa_id = 1;
        $data->categoria_id = 1;
        $data->hotel_id = 1;
        $data->save();

        $data = new Habitacion();
        $data->nombre = '202';
        $data->descripcion= 'Habitacion sencilla';
        $data->precio = 80;
        $data->nivel_id = 2;
        $data->tarifa_id = 1;
        $data->categoria_id = 2;
        $data->hotel_id = 1;
        $data->save();

        $data = new Habitacion();
        $data->nombre = '301';
        $data->descripcion= 'Habitacion sencilla';
        $data->precio = 55;
        $data->nivel_id = 1;
        $data->tarifa_id = 1;
        $data->categoria_id = 1;
        $data->hotel_id = 1;
        $data->save();

        $data = new Habitacion();
        $data->nombre = '302';
        $data->descripcion= 'Habitacion sencilla';
        $data->precio = 80;
        $data->nivel_id = 3;
        $data->tarifa_id = 1;
        $data->categoria_id = 2;
        $data->hotel_id = 1;
        $data->save();
    }
}
