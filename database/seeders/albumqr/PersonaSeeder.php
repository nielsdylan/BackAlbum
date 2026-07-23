<?php

namespace Database\Seeders\albumqr;

use App\Models\Albumqr\Persona;
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
        $data                   =   new Persona();
        $data->numero_documento =   '11111111';
        $data->nombres          =   'ADMINISTRADOR';
        $data->apellidos        =   'QR';
        $data->telefono         =   111111111;
        $data->estado           =   1;
        $data->created_at       =   date('Y-m-d H:i:s');
        $data->updated_at       =   date('Y-m-d H:i:s');
        $data->save();

        $data                   =   new Persona();
        $data->numero_documento =   '12121212';
        $data->nombres          =   'JUAN';
        $data->apellidos        =   'PEREZ';
        $data->telefono         =   123456789;
        $data->estado           =   1;
        $data->created_at       =   date('Y-m-d H:i:s');
        $data->updated_at       =   date('Y-m-d H:i:s');
        $data->save();

        $data                   =   new Persona();
        $data->numero_documento =   '13131313';
        $data->nombres          =   'PEDRO';
        $data->apellidos        =   'QUIÑONES';
        $data->telefono         =   987654321;
        $data->estado           =   1;
        $data->created_at       =   date('Y-m-d H:i:s');
        $data->updated_at       =   date('Y-m-d H:i:s');
        $data->save();
    }
}
