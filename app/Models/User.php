<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'dni',
        'telefono',
        'rol',
        'linkedin',
        'github',
        'whatsapp',
        'foto_perfil',
        'university',
        'career',
        'commission',
        'materias',
    ];


    public function esAlumno()
    {
        return $this->rol === 'Alumno';
    }
    public function esDocente()
    {
        return $this->rol === 'Docente';
    }
    public function esAdmin()
    {
        return $this->rol === 'Administrador';
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Incluye el cast para materias como array
    protected $casts = [
        'materias' => 'array',
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];


    /**
     * Get the user's initials
     */
    public function initials(): string
    {
        return Str::of($this->name)
            ->explode(' ')
            ->take(2)
            ->map(fn($word) => Str::substr($word, 0, 1))
            ->implode('');
    }
}
