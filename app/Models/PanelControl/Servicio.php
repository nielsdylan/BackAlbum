<?php

namespace App\Models\PanelControl;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Servicio extends Model
{
    //
    use HasFactory, SoftDeletes;
    protected $table = 'paginaweb.servicios';
    protected $fillable = ['imagen','nombre','descripcion','estado'];
    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];
}
