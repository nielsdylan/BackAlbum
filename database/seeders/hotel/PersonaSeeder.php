<?php

namespace Database\Seeders\hotel;

use App\Models\Hotel\Persona;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PersonaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data = new Persona();
        $data->apellidos = 'ADMINISTRADOR';
        $data->nombres = 'ADMIN';
        $data->dni = '123456789';
        $data->telefono = 1234567998;
        $data->hotel_id = 1;
        $data->save();

        $data = new Persona();
        $data->apellidos = 'LLANOS';
        $data->nombres = 'RODRIGO';
        $data->dni = '99999';
        $data->telefono = 89898;
        $data->hotel_id = 1;
        $data->save();

        $data = new Persona();
        $data->apellidos = 'LOPEZ';
        $data->nombres = 'JUAN';
        $data->dni = '2332323';
        $data->telefono = 3232323;
        $data->hotel_id = 1;
        $data->save();


        $data = new Persona();
        $data->apellidos = 'CACEREZ';
        $data->nombres = 'ALEX';
        $data->dni = '2344444';
        $data->telefono = 2344444;
        $data->hotel_id = 1;
        $data->save();
        //----USUARIOS
        $data = new Persona();
        $data->apellidos = 'LUCAS';
        $data->nombres = 'ALBER';
        $data->dni = '454545';
        $data->telefono = 2344444;
        $data->hotel_id = 1;
        $data->save();

        $data = new Persona();
        $data->apellidos = 'ARMANDO';
        $data->nombres = 'JORGE';
        $data->dni = '454545';
        $data->telefono = 2344444;
        $data->hotel_id = 1;
        $data->save();

    }
}
