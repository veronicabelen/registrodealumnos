<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;


class DashboardController extends Controller
{

  public function index(): View
  {
    // Obtén el usuario autenticado
    $user = Auth::user();


    // Obtén el rol del usuario (asumiendo que tienes una columna 'rol')
    $rol = $user ? $user->rol : 'Invitado';


    // Pasa todas las variables a la vista
    return view('dashboard', compact('rol'));
  }
}
