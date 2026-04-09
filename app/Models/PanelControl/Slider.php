<?php

namespace App\Models\PanelControl;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Slider extends Model
{
    //
    use HasFactory, SoftDeletes;
    protected $table = 'paginaweb.sliders';
    protected $fillable = ['imagen','nombre','url','estado'];
    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];
}
