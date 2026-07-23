<?php

namespace App\Models\Albumqr;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Foundation\Auth\User as Authenticatable; // IMPORTANTE: Usar Authenticatable
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject; // Requerido si usas Tymon JWT-Auth

class Cliente extends Authenticatable implements JWTSubject
{
    //
    use HasFactory, SoftDeletes, Notifiable;
    protected $table = 'albumqr.clientes';
    protected $fillable = [
        'name',
        'email',
        'password',
        'estado',
        'persona_id'
    ];

    protected $hidden = [
        'password',
        'remember_token',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    // --- Métodos requeridos por JWT ---
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [
            'role' => 'cliente' // Etiqueta oculta dentro del token
        ];
    }
}
