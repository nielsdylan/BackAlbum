<?php

namespace App\Models\Albumqr;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Plantilla extends Model
{
    //
    use HasFactory, SoftDeletes;
    protected $table = 'albumqr.plantillas';
    protected $fillable = ['titulo','descripcion','estado', 'user_id'];
    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];
}
