<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Materia;
use Illuminate\Http\JsonResponse;

class MateriaController extends Controller
{
    /**
     * Muestra la página de inscripción a materias.
     */
    public function inscribir()
    {
        // Obtén todas las materias disponibles
        $materiasDisponibles = Materia::all();

        return view('materias.inscribir-dropdown', compact('materiasDisponibles'));
    }

    /**
     * Procesa la solicitud de inscripción.
     */
    // app/Http/Controllers/MateriaController.php

    public function inscribirStore(Request $request)
    {
        $request->validate([
            'materia_id' => 'required|exists:materias,id',
        ]);

        $user = Auth::user();

        // El método 'syncWithoutDetaching' añade la materia si no está inscrita.
        // 'attach' puede dar un error si se intenta inscribir en la misma materia dos veces.
        $user->materias()->syncWithoutDetaching([$request->input('materia_id')]);

        // Obtener la materia recién inscrita para enviarla en la respuesta
        $materiaInscrita = Materia::find($request->input('materia_id'));

        // Devolver una respuesta JSON con la materia y un mensaje de éxito
        return response()->json([
            'success' => true,
            'message' => 'Te has inscrito a la materia con éxito.',
            'materia' => $materiaInscrita,
        ]);
    }
    /**
     * Procesa la solicitud para eliminar una materia de un usuario.
     */
    public function eliminarMateria(Request $request): JsonResponse
    {
        // Valida que el ID de la materia sea requerido y exista
        $request->validate([
            'materia_id' => 'required|exists:materias,id',
        ]);

        // Obtiene el usuario autenticado
        $user = Auth::user();

        // Elimina la relación entre el usuario y la materia
        // El método 'detach' elimina el registro de la tabla pivote
        $user->materias()->detach($request->input('materia_id'));

        // Obtiene la materia eliminada para la respuesta
        $materiaEliminada = Materia::find($request->input('materia_id'));

        // Retorna una respuesta JSON para manejarla con JavaScript
        return response()->json([
            'success' => true,
            'message' => 'La materia ha sido eliminada con éxito.',
            'materia' => $materiaEliminada,
        ]);
    }
}
