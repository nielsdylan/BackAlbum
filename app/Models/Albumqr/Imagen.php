<?php

namespace App\Models\Albumqr;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Imagen extends Model
{
    //
    use HasFactory, SoftDeletes;
    protected $table = 'albumqr.imagenes';
    protected $fillable = ['nombre','name_image','weight', 'path', 'extension', 'user_id', 'albumes_id'];
    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

    public function album(): BelongsTo
    {
        return $this->belongsTo(Album::class, 'albumes_id');
    }
}
