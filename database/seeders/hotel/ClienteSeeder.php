<?php

namespace Database\Seeders\hotel;

use App\Models\Hotel\Cliente;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data = new Cliente();
        $data->persona_id = 2;
        $data->hotel_id = 1;
        $data->save();

        $data = new Cliente();
        $data->persona_id = 3;
        $data->hotel_id = 1;
        $data->save();

        $data = new Cliente();
        $data->persona_id = 4;
        $data->hotel_id = 1;
        $data->save();
    }
}
