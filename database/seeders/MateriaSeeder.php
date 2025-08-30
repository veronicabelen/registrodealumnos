<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Materia;

class MateriaSeeder extends Seeder
{
    public function run(): void
    {
        $materias = [
            'Programación',
            'Programacion II',
            'Programacion III',
            'Base de Datos',
            'Base de Datos II',
            'Metodología',
            'Metodología II',
            'Sistemas Operativos',
            'Redes',
            'Inglés I',
            'Inglés II',
            'Matemáticas',
            'Estadística',
            'Arquitectura de Software'
        ];

        foreach ($materias as $materia) {
            Materia::create(['nombre' => $materia]);
        }
    }
}