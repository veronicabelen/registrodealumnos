<?php


namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;


class RegisteredUserController extends Controller
{


    public function create(): View
    {

        // Definir la lista de universidades para el desplegable
        $universidades = [
            'UTN Facultad Regional Resistencia',
            'UTN Facultad Regional Avellaneda',
            'UTN Facultad Regional Resistencia- Sede Formosa',
        ];


        // Definir la lista de carreras para el desplegable
        $carreras = [
            'Licenciatura en Bioimagen',
            'Tecnicatura Universitaria en Programación',
        ];


        // Definir la lista de comisiones para el desplegable
        $comisiones = [
            'Comision 1.1',
            'Comision 2.1',
            'Comision 2.2',
        ];


        // Pasar todas las listas a la vista 'auth.register'
        return view('auth.register', compact('universidades', 'carreras', 'comisiones'));
    }


    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'dni' => ['required', 'string', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users,email'],
            'telefono' => ['nullable', 'string', 'max:255'],
            'foto_perfil' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'github' => ['nullable', 'url', 'max:255'],
            'linkedin' => ['nullable', 'url', 'max:255'],
            'rol' => ['required', 'in:Alumno,Docente,Administrador'],
            'university' => ['required', 'string', 'max:255'],
            'career' => ['required', 'string', 'max:255'],
            'commission' => ['required', 'string', 'max:255'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'materias' => 'nullable|array',
            'materias.*' => 'string',
        ]);




        // Manejar la subida de la foto
        $photoPath = $request->file('foto_perfil')->store('photos', 'public');


        // Crear el usuario con el rol por defecto de 'alumno'
        $user = User::create([
            'name' => $request->name,
            'dni' => $request->dni,
            'email' => $request->email,
            'telefono' => $request->telefono,
            'github' => $request->github,
            'linkedin' => $request->linkedin,
            'foto_perfil' => $photoPath,
            'password' => Hash::make($request->password),
            'rol' => $request->rol,
            'university' => $request->university,
            'career' => $request->career,
            'commission' => $request->commission,
            'materias' => $request->materias, // Laravel lo convierte a JSON si está casteado
        ]);


        event(new Registered($user));


        Auth::login($user);


        return redirect(route('dashboard', absolute: false));
    }
}
