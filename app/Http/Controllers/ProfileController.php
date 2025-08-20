<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{

    public function edit()
    {
        $user = Auth::user();
        return view('profile.edit', compact('user'));
    }


    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'dni' => 'required|string|max:255|unique:users,dni,' . $user->id,
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'telefono' => 'nullable|string|max:255',
            'university' => 'nullable|string|max:255',
            'career' => 'nullable|string|max:255',
            'commission' => 'nullable|string|max:255',
            'github' => 'nullable|string|max:255',
            'linkedin' => 'nullable|string|max:255',
            'whatsapp' => 'nullable|string|max:255',
            'materias' => 'nullable|array',
            'materias.*' => 'string',
        ]);

        $user->update([
            'name' => $request->name,
            'dni' => $request->dni,
            'email' => $request->email,
            'telefono' => $request->telefono,
            'university' => $request->university,
            'career' => $request->career,
            'commission' => $request->commission,
            'github' => $request->github,
            'linkedin' => $request->linkedin,
            'whatsapp' => $request->whatsapp,
            'materias' => $request->materias,
        ]);

        return redirect()->route('dashboard')->with('status', 'Perfil actualizado');
    }


    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
