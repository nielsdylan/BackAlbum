<?php

namespace Database\Seeders\albumqr;

use App\Models\Albumqr\Cliente;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data               =   new Cliente();
        $data->name         =   'JP';
        $data->email        =   'juan@gmail.com';
        $data->password     =   Hash::make('123456789');
        $data->persona_id   =   2;
        $data->created_at   =   date('Y-m-d H:i:s');
        $data->updated_at   =   date('Y-m-d H:i:s');
        $data->save();

        $data               =   new Cliente();
        $data->name         =   'PQ';
        $data->email        =   'pedro@gmail.com';
        $data->password     =   Hash::make('123456789');
        $data->persona_id   =   3;
        $data->created_at   =   date('Y-m-d H:i:s');
        $data->updated_at   =   date('Y-m-d H:i:s');
        $data->save();
    }
}
