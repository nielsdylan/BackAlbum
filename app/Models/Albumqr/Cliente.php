<?php

namespace App\Models\Albumqr;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cliente extends Model
{
    //
    use HasFactory, SoftDeletes;
    protected $table = 'albumqr.clientes';
    protected $fillable = ['numero_documento','nombres','apellidos', 'email', 'telefono', 'estado'];
    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];
}
