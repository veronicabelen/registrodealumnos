@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto mt-8">
    <h1 class="text-2xl font-bold mb-4">Editar Perfil</h1>

    @if (session('status'))
    <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">
        {{ session('status') }}
    </div>
    @endif

    <form method="POST" action="{{ route('profile.update') }}">
        @csrf
        @method('PATCH')

        <div class="mb-4">
            <label for="name" class="block font-semibold">Nombre</label>
            <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" class="w-full border rounded px-3 py-2">
            @error('name') <div class="text-red-600">{{ $message }}</div> @enderror
        </div>

        <div class="mb-4">
            <label for="dni" class="block font-semibold">DNI</label>
            <input type="text" name="dni" id="dni" value="{{ old('dni', $user->dni) }}" class="w-full border rounded px-3 py-2">
            @error('dni') <div class="text-red-600">{{ $message }}</div> @enderror
        </div>

        <div class="mb-4">
            <label for="email" class="block font-semibold">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" class="w-full border rounded px-3 py-2">
            @error('email') <div class="text-red-600">{{ $message }}</div> @enderror
        </div>

        <div class="mb-4">
            <label for="telefono" class="block font-semibold">Teléfono</label>
            <input type="text" name="telefono" id="telefono" value="{{ old('telefono', $user->telefono) }}" class="w-full border rounded px-3 py-2">
            @error('telefono') <div class="text-red-600">{{ $message }}</div> @enderror
        </div>

        <div class="mb-4">
            <label for="university" class="block font-semibold">Universidad</label>
            <input type="text" name="university" id="university" value="{{ old('university', $user->university) }}" class="w-full border rounded px-3 py-2">
            @error('university') <div class="text-red-600">{{ $message }}</div> @enderror
        </div>

        <div class="mb-4">
            <label for="career" class="block font-semibold">Carrera</label>
            <input type="text" name="career" id="career" value="{{ old('career', $user->career) }}" class="w-full border rounded px-3 py-2">
            @error('career') <div class="text-red-600">{{ $message }}</div> @enderror
        </div>

        <div class="mb-4">
            <label for="commission" class="block font-semibold">Comisión</label>
            <input type="text" name="commission" id="commission" value="{{ old('commission', $user->commission) }}" class="w-full border rounded px-3 py-2">
            @error('commission') <div class="text-red-600">{{ $message }}</div> @enderror
        </div>

        <div class="mb-4">
            <label for="github" class="block font-semibold">GitHub</label>
            <input type="text" name="github" id="github" value="{{ old('github', $user->github) }}" class="w-full border rounded px-3 py-2">
            @error('github') <div class="text-red-600">{{ $message }}</div> @enderror
        </div>

        <div class="mb-4">
            <label for="linkedin" class="block font-semibold">LinkedIn</label>
            <input type="text" name="linkedin" id="linkedin" value="{{ old('linkedin', $user->linkedin) }}" class="w-full border rounded px-3 py-2">
            @error('linkedin') <div class="text-red-600">{{ $message }}</div> @enderror
        </div>

        <div class="mb-4">
            <label for="whatsapp" class="block font-semibold">WhatsApp</label>
            <input type="text" name="whatsapp" id="whatsapp" value="{{ old('whatsapp', $user->whatsapp) }}" class="w-full border rounded px-3 py-2">
            @error('whatsapp') <div class="text-red-600">{{ $message }}</div> @enderror
        </div>

        <div class="flex gap-4 mt-6">
            <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">
                Guardar cambios
            </button>
            <a href="{{ route('dashboard') }}" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded text-center">
                Cancelar
            </a>
        </div>
    </form>
</div>
@endsection