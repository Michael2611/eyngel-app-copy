<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = "users";

    protected $fillable = [
        'id',
        'u_nombre',
        'u_apellido',
        'u_nombre_usuario',
        'u_descripcion_perfil',
        'email',
        'password',
        'u_sexo',
        'u_ciudad_residencia',
        'u_fecha_nacimiento',
        'u_tokens',
        'u_role',
        'u_profesion',
        'u_session_id',
        'u_ultima_conexion',
        'u_img_profile',
        'u_estado',
        'u_term_con',
        'confirmed',
        'auth_token',
        'confirmation_code',
        'cuenta_verificada',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function posts()
    {
        return $this->hasMany(PostUser::class, 'id');
    }

    public function persistent_sessions()
    {
        return $this->hasMany(PersistentSession::class);
    }

    public function followers()
    {
        return $this->belongsToMany(User::class, 'seguidores', 'seguidor_id_users', 'seguido_id_users')
            ->withTimestamps();
    }

    public function following()
    {
        return $this->belongsToMany(User::class, 'seguidores', 'seguido_id_users', 'seguidor_id_users')->withTimestamps();
    }

    public function mentions()
    {
        return $this->hasMany(Mentions::class);
    }
}
