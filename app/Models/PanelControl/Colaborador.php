<?php

namespace App\Models\PanelControl;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Colaborador extends Model
{
    //
    use HasFactory, SoftDeletes;
    protected $table = 'paginaweb.colaboradores';
    protected $fillable = ['imagen','nombre','apellidos','descripcion','estado'];
    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];
}
