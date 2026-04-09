<?php

namespace Database\Seeders\hotel;

use App\Models\Hotel\Hotel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HotelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data = new Hotel();
        $data->razon_social = 'EL CIELO';
        $data->ruc = '96969696';
        $data->direccion = 'AV. SN/ CALLE 3';
        $data->telefono = '784512124';
        $data->whatsapp = '9625854';
        $data->logo = 'logo';
        $data->instagram = 'instagram';
        $data->facebook = 'facebook';
        $data->propietario_id = 1;
        $data->save();

        $data = new Hotel();
        $data->razon_social = 'EL ESCONDITE';
        $data->ruc = '96969696';
        $data->direccion = 'AV. SN/ CALLE 3';
        $data->telefono = '784512124';
        $data->whatsapp = '9625854';
        $data->logo = 'logo';
        $data->instagram = 'instagram';
        $data->facebook = 'facebook';
        $data->propietario_id = 1;
        $data->save();
    }
}
