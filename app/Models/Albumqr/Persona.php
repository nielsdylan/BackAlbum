<?php

namespace App\Models\Albumqr;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Persona extends Model
{
    //
    use HasFactory, SoftDeletes;
    protected $table = 'albumqr.personas';
    protected $fillable = ['numero_documento','nombres','apellidos', 'telefono', 'estado'];
    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];
}
