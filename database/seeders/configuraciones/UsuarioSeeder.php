<?php

namespace Database\Seeders\configuraciones;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data               =   new User();
        $data->name         =   'Admin';
        $data->email        =   'admin@admin.com';
        $data->password     =   Hash::make('123456789');
        $data->created_at   =   date('Y-m-d H:i:s');
        $data->updated_at   =   date('Y-m-d H:i:s');
        $data->save();
    }
}
