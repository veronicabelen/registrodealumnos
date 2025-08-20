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
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'phone' => ['nullable', 'string', 'max:255'],
            'university' => ['nullable', 'string', 'max:255'],
            'career' => ['nullable', 'string', 'max:255'],
            'commission' => ['nullable', 'string', 'max:255'],
            'photo' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'github_url' => ['nullable', 'url', 'max:255'],
            'linkedin_url' => ['nullable', 'url', 'max:255'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);


        // Manejar la subida de la foto
        $photoPath = $request->file('photo')->store('photos', 'public');


        // Crear el usuario con el rol por defecto de 'alumno'
        $user = User::create([
            'name' => $request->name,
            'dni' => $request->dni,
            'email' => $request->email,
            'telefono' => $request->telefono,
            'university' => $request->university,
            'career' => $request->career,
            'commission' => $request->commission,
            'github_url' => $request->github_url,
            'linkedin_url' => $request->linkedin_url,
            'photo' => $photoPath, // Aquí guardamos la ruta de la foto
            'password' => Hash::make($request->password),
            'rol' => $request->rol,
        ]);


        event(new Registered($user));


        Auth::login($user);


        return redirect(route('dashboard', absolute: false));
    }
}
