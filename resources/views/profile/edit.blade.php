@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <div class="max-w-xl mx-auto">
                <div class="flex justify-center mb-4">
                    <img src="{{ asset('images/utn.png') }}" alt="Logo" class="h-35">
                </div>

                <h1 class="text-2xl font-bold mb-4 text-center">Editar Perfil</h1>

                @if (session('status'))
                <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">
                    {{ session('status') }}
                </div>
                @endif
                
                {{-- Sección para actualizar la foto de perfil --}}
                <div class="border-b border-gray-200 pb-4 mb-4">
                    <h2 class="text-xl font-semibold mb-2">Cambiar Foto de Perfil</h2>
                    
                    {{-- Muestra la foto de perfil actual --}}
                    @if($user->foto_perfil)
                        <img src="{{ asset('storage/' . $user->foto_perfil) }}" alt="Foto de perfil actual" class="w-32 h-32 object-cover rounded-full mx-auto mb-4">
                    @else
                        {{-- O una imagen de placeholder si no hay foto --}}
                        <div class="w-32 h-32 bg-gray-200 rounded-full mx-auto flex items-center justify-center mb-4">
                            <span class="text-gray-500">Sin foto</span>
                        </div>
                    @endif

                    <form action="{{ route('profile.updatePhoto') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label for="foto_perfil" class="block font-semibold">Seleccionar nueva foto</label>
                            <input type="file" name="foto_perfil" id="foto_perfil" class="w-full border rounded px-3 py-2">
                            @error('foto_perfil') <div class="text-red-600">{{ $message }}</div> @enderror
                        </div>
                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                            Subir foto
                        </button>
                    </form>
                </div>
                {{-- Fin de la sección de actualización de foto --}}

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
        </div>
    </div>
</div>
@endsection