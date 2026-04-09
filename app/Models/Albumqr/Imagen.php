<?php

namespace App\Models\Albumqr;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Imagen extends Model
{
    //
    use HasFactory, SoftDeletes;
    protected $table = 'albumqr.imagenes';
    protected $fillable = ['nombre','name_image','weight', 'path', 'extension', 'user_id'];
    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];
}
