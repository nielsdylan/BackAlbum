<?php

namespace App\Models\Albumqr;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Album extends Model
{
    //
    use HasFactory, SoftDeletes;
    protected $table = 'albumqr.albumes';
    protected $fillable = ['titulo','descripcion','usuario_id', 'plantilla_id'];
    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

    // public function imagenes(): HasMany
    // {
    //     return $this->hasMany(Imagen::class, 'albumes_id');
    // }
    public function plantilla():BelongsTo {
        // Asegúrate de usar la llave foránea correcta aquí
        return $this->belongsTo(Plantilla::class, 'plantilla_id');
    }
}
