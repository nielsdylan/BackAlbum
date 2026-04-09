<?php

namespace App\Models\Albumqr;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PlantillaUsuario extends Model
{
    //
    use HasFactory, SoftDeletes;
    protected $table = 'albumqr.plantillas_users';
    protected $fillable = ['usuario_id','plantilla_id','estado'];
    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];
}
