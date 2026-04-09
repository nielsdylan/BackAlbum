<?php

namespace Database\Seeders\hotel;

use App\Models\Hotel\EstadoHabitacion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EstadoHabitacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data = new EstadoHabitacion();
        $data->nombre = 'Disponible';
        $data->descripcion = 'Habitacion Disponible';
        $data->icon = 'fa fa-bed';
        $data->color = 'text-success';
        $data->color_exadecimal = '#1caf9f';
        $data->estado = 1;
        $data->hotel_id = 1;
        $data->save();
        $data = new EstadoHabitacion();
        $data->nombre = 'Reservado';
        $data->descripcion = 'Habitacion Reservado';
        $data->icon = 'fa fa-bed';
        $data->color = 'text-warning';
        $data->color_exadecimal = '#fc7303';
        $data->estado = 1;
        $data->hotel_id = 1;
        $data->save();
        $data = new EstadoHabitacion();
        $data->nombre = 'Ocupado';
        $data->descripcion = 'Habitacion Ocupada';
        $data->icon = 'fa fa-bed';
        $data->color = 'text-danger';
        $data->color_exadecimal = '#e73827';
        $data->estado = 1;
        $data->hotel_id = 1;
        $data->save();
        $data = new EstadoHabitacion();
        $data->nombre = 'Sucio';
        $data->descripcion = 'Habitacion Sucia';
        $data->icon = 'fa fa-bed';
        $data->color = 'text-dark';
        $data->color_exadecimal = '#343a40';
        $data->estado = 1;
        $data->hotel_id = 1;
        $data->save();
        $data = new EstadoHabitacion();
        $data->nombre = 'Limpio';
        $data->descripcion = 'Habitacion Limpio';
        $data->icon = 'fa fa-bed';
        $data->color = 'text-info';
        $data->color_exadecimal = '#45aaf2';
        $data->estado = 1;
        $data->hotel_id = 1;
        $data->save();
    }
}
