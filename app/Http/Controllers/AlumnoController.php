<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AlumnoController extends Controller
{
    public function index()
    {
        // Solo permitir acceso a docentes
        if (Auth::user()->rol !== 'Docente') {
            abort(403, 'No autorizado');
        }

        $alumnos = User::where('rol', 'Alumno')->paginate(10); // 10 alumnos por página
        return view('alumnos.index', compact('alumnos'));
    }

    public function destroy($id)
    {
        $alumno = \App\Models\User::where('rol', 'Alumno')->findOrFail($id);
        $alumno->delete();
        return redirect()->route('alumnos.index')->with('status', 'Alumno eliminado correctamente');
    }
}
