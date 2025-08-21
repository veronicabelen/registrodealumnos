@extends('layouts.app')

@section('content')
<div class="bg-gray-100 min-h-screen flex flex-col justify-center items-center py-12">
    <!-- Contenedor del formulario de registro -->
    <div class="bg-white shadow-xl rounded-lg p-8 text-center max-w-2xl w-full">

        <!-- Título del formulario -->
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Registro de Usuario</h2>

        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
            @csrf

            <!-- Nombre y apellido -->
            <div class="mt-4 text-left">
                <x-input-label for="name" :value="__('Nombre y apellido')" class="font-semibold text-gray-700" />
                <x-text-input id="name" class="block mt-1 w-full border-gray-300 rounded-lg shadow-sm" type="text" name="name"
                    :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- DNI -->
            <div class="mt-4 text-left">
                <x-input-label for="dni" :value="__('DNI')" class="font-semibold text-gray-700" />
                <x-text-input id="dni" class="block mt-1 w-full border-gray-300 rounded-lg shadow-sm" type="text" name="dni"
                    :value="old('dni')" required />
                <x-input-error :messages="$errors->get('dni')" class="mt-2" />
            </div>

            <!-- E-mail -->
            <div class="mt-4 text-left">
                <x-input-label for="email" :value="__('E-mail')" class="font-semibold text-gray-700" />
                <x-text-input id="email" class="block mt-1 w-full border-gray-300 rounded-lg shadow-sm" type="email" name="email"
                    :value="old('email')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Rol -->
            <div class="mt-4 text-left">
                <x-input-label for="rol" :value="__('Rol')" class="font-semibold text-gray-700" />
                <select id="rol" name="rol" required class="block mt-1 w-full border-gray-300 rounded-lg shadow-sm">
                    <option value="Alumno" {{ old('rol') == 'Alumno' ? 'selected' : '' }}>Alumno</option>
                    <option value="Docente" {{ old('rol') == 'Docente' ? 'selected' : '' }}>Docente</option>

                </select>
                <x-input-error :messages="$errors->get('rol')" class="mt-2" />
            </div>

            <!-- Teléfono -->
            <div class="mt-4 text-left">
                <x-input-label for="telefono" :value="__('Teléfono')" class="font-semibold text-gray-700" />
                <x-text-input id="telefono" class="block mt-1 w-full border-gray-300 rounded-lg shadow-sm" type="text" name="telefono"
                    :value="old('telefono')" autocomplete="tel" />
                <x-input-error :messages="$errors->get('telefono')" class="mt-2" />
            </div>

            <!-- Universidad -->
            <div class="mt-4 text-left">
                <x-input-label for="university" :value="__('Universidad')" class="font-semibold text-gray-700" />
                <select id="university" name="university" required class="block mt-1 w-full border-gray-300 rounded-lg shadow-sm">
                    <option value="">Seleccione una universidad</option>
                    @foreach ($universidades as $universidad)
                    <option value="{{ $universidad }}" {{ old('university') == $universidad ? 'selected' : '' }}>{{ $universidad }}</option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('university')" class="mt-2" />
            </div>

            <!-- Carrera -->
            <div class="mt-4 text-left">
                <x-input-label for="career" :value="__('Carrera')" class="font-semibold text-gray-700" />
                <select id="career" name="career" required class="block mt-1 w-full border-gray-300 rounded-lg shadow-sm">
                    <option value="">Seleccione una carrera</option>
                    @foreach ($carreras as $carrera)
                    <option value="{{ $carrera }}" {{ old('career') == $carrera ? 'selected' : '' }}>{{ $carrera }}</option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('career')" class="mt-2" />
            </div>

            <!-- Comisión -->
            <div class="mt-4 text-left">
                <x-input-label for="commission" :value="__('Comisión')" class="font-semibold text-gray-700" />
                <select id="commission" name="commission" required class="block mt-1 w-full border-gray-300 rounded-lg shadow-sm">
                    <option value="">Seleccione una comisión</option>
                    @foreach ($comisiones as $comision)
                    <option value="{{ $comision }}" {{ old('commission') == $comision ? 'selected' : '' }}>{{ $comision }}</option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('commission')" class="mt-2" />
            </div>

            <!-- Materias -->
            <div class="mt-4 text-left">
                <x-input-label :value="__('Materias')" class="font-semibold text-gray-700 mb-2" />
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-2">
                    @php
                    $materiasDisponibles = ['Programación', 'Programacion II', 'Programacion III', 'Base de Datos', 'Base de Datos II', 'Metodologia', 'Metodologia II', 'Sistemas Operativos', 'Redes', 'Ingles I', 'Ingles II', 'Matematicas', 'Estatistica', 'Arquitectura de Software'];
                    @endphp
                    @foreach($materiasDisponibles as $materia)
                    <label class="inline-flex items-center">
                        <input type="checkbox" name="materias[]" value="{{ $materia }}"
                            class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500"
                            {{ (is_array(old('materias')) && in_array($materia, old('materias'))) ? 'checked' : '' }}>
                        <span class="ms-2 text-gray-600">{{ $materia }}</span>
                    </label>
                    @endforeach
                </div>
                <x-input-error :messages="$errors->get('materias')" class="mt-2" />
            </div>

            <!-- GitHub -->
            <div class="mt-4 text-left">
                <x-input-label for="github" :value="__('GitHub (URL)')" class="font-semibold text-gray-700" />
                <x-text-input id="github" class="block mt-1 w-full border-gray-300 rounded-lg shadow-sm" type="url" name="github"
                    :value="old('github')" placeholder="https://github.com/usuario" />
                <x-input-error :messages="$errors->get('github')" class="mt-2" />
            </div>

            <!-- LinkedIn -->
            <div class="mt-4 text-left">
                <x-input-label for="linkedin" :value="__('LinkedIn (URL)')" class="font-semibold text-gray-700" />
                <x-text-input id="linkedin" class="block mt-1 w-full border-gray-300 rounded-lg shadow-sm" type="url" name="linkedin"
                    :value="old('linkedin')" placeholder="https://www.linkedin.com/in/usuario" />
                <x-input-error :messages="$errors->get('linkedin')" class="mt-2" />
            </div>

            <!-- Foto (obligatoria) -->
            <div class="mt-4 text-left">
                <x-input-label for="foto_perfil" :value="__('Foto (obligatoria)')" class="font-semibold text-gray-700" />
                <input id="foto_perfil" name="foto_perfil" type="file" accept="image/*" class="block mt-1 w-full border-gray-300 rounded-lg shadow-sm" required />
                <x-input-error :messages="$errors->get('foto_perfil')" class="mt-2" />
            </div>

            <!-- Contraseña -->
            <div class="mt-4 text-left">
                <x-input-label for="password" :value="__('Contraseña')" class="font-semibold text-gray-700" />
                <x-text-input id="password" class="block mt-1 w-full border-gray-300 rounded-lg shadow-sm" type="password" name="password"
                    required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirmar contraseña -->
            <div class="mt-4 text-left">
                <x-input-label for="password_confirmation" :value="__('Confirmar contraseña')" class="font-semibold text-gray-700" />
                <x-text-input id="password_confirmation" class="block mt-1 w-full border-gray-300 rounded-lg shadow-sm" type="password"
                    name="password_confirmation" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <!-- Botones de acción -->
            <div class="flex items-center justify-end mt-6">
                <a class="underline text-sm text-blue-600 hover:text-blue-900" href="{{ route('login') }}">
                    {{ __('¿Ya estás registrado?') }}
                </a>

                <button type="submit" class="ms-4 bg-blue-600 hover:bg-blue-700 text-white font-medium px-6 py-2 rounded-full shadow-lg transition transform hover:scale-105">
                    {{ __('Registrarme') }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection