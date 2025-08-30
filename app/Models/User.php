<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

// Agrega esta línea
use App\Models\Materia;

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
        'whatsapp', // Elimina esta línea si no tienes la columna en la base de datos
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

<<<<<<< HEAD
    public function esAdmin()
    {
        return $this->rol === 'Administrador';
    }
=======
>>>>>>> 0910c7836d4acf2b0211e539f0fffb3b6593cbe3

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

<<<<<<< HEAD
    // Tu cast para 'email_verified_at' y 'password'
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
=======
    // Incluye el cast para materias como array
    protected $casts = [
        'materias' => 'array',
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

>>>>>>> 0910c7836d4acf2b0211e539f0fffb3b6593cbe3

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

    // Esta relación ya está correcta
    public function materias()
    {
        return $this->belongsToMany(Materia::class);
    }
}
