<?php

namespace App\Models\Albumqr;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Album extends Model
{
    //
    use HasFactory, SoftDeletes;
    protected $table = 'albumqr.albumes';
    protected $fillable = ['titulo','descripcion','usuario_id'];
    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];
}
