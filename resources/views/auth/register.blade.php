<<<<<<< HEAD
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            background: linear-gradient(135deg, #f3e5f5, #e1f5fe, #e8f5e9, #fffde7);
            background-size: 400% 400%;
            animation: gradientAnimation 15s ease infinite;
        }

        @keyframes gradientAnimation {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }
    </style>
</head>

<body class="font-sans text-gray-900 antialiased">
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
        <div>
            <a href="/">
                <img src="{{ asset('images/utn.png') }}" class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </div>

        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <h2 class="text-center text-xl font-semibold text-gray-700 mb-6">Formulario de Registración</h2>

            <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                @csrf

                {{-- Nombre y apellido --}}
                <div>
                    <x-input-label for="name" value="{{ __('Nombre y apellido') }}" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                        :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                {{-- DNI --}}
                <div class="mt-4">
                    <x-input-label for="dni" value="{{ __('DNI') }}" />
                    <x-text-input id="dni" class="block mt-1 w-full" type="text" name="dni"
                        :value="old('dni')" required autocomplete="dni" />
                    <x-input-error :messages="$errors->get('dni')" class="mt-2" />
                </div>

                {{-- E-mail --}}
                <div class="mt-4">
                    <x-input-label for="email" value="{{ __('E-mail') }}" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                        :value="old('email')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                {{-- Teléfono --}}
                <div class="mt-4">
                    <x-input-label for="telefono" value="Teléfono" />
                    <x-text-input id="telefono" class="block mt-1 w-full" type="text" name="telefono"
                        :value="old('telefono')" autocomplete="tel" />
                    <x-input-error :messages="$errors->get('telefono')" class="mt-2" />
                </div>

                {{-- Rol --}}

                <div class="mt-4">
                    <x-input-label for="university" value="Universidad" />
                    <select id="university" name="university" required class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                        <option value="">Seleccione una universidad</option>
                        @foreach ($universidades as $universidad)
                        <option value="{{ $universidad }}">{{ $universidad }}</option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('university')" class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-input-label for="career" value="Carrera" />
                    <select id="career" name="career" required class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                        <option value="">Seleccione una carrera</option>
                        @foreach ($carreras as $carrera)
                        <option value="{{ $carrera }}">{{ $carrera }}</option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('career')" class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-input-label for="commission" value="Comisión" />
                    <select id="commission" name="commission" required class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                        <option value="">Seleccione una comisión</option>
                        @foreach ($comisiones as $comision)
                        <option value="{{ $comision }}">{{ $comision }}</option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('commission')" class="mt-2" />
                </div>

                {{-- GitHub --}}
                <div class="mt-4">
                    <x-input-label for="github" value="GitHub (URL)" />
                    <x-text-input id="github" class="block mt-1 w-full" type="url" name="github"
                        :value="old('github')" placeholder="https://github.com/usuario" />
                    <x-input-error :messages="$errors->get('github')" class="mt-2" />
                </div>

                {{-- LinkedIn --}}
                <div class="mt-4">
                    <x-input-label for="linkedin" value="LinkedIn (URL)" />
                    <x-text-input id="linkedin" class="block mt-1 w-full" type="url" name="linkedin"
                        :value="old('linkedin')" placeholder="https://www.linkedin.com/in/usuario" />
                    <x-input-error :messages="$errors->get('linkedin')" class="mt-2" />
                </div>

                {{-- Foto (obligatoria) --}}
                <div class="mt-4">
                    <x-input-label for="foto_perfil" value="Foto (obligatoria)" />
                    <input id="foto_perfil" name="foto_perfil" type="file" accept="image/*" class="block mt-1 w-full text-gray-700 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100" required />
                    <x-input-error :messages="$errors->get('foto_perfil')" class="mt-2" />
                </div>

                {{-- Contraseña --}}
                <div class="mt-4">
                    <x-input-label for="password" value="{{ __('Contraseña') }}" />
                    <x-text-input id="password" class="block mt-1 w-full" type="password" name="password"
                        required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                {{-- Confirmar contraseña --}}
                <div class="mt-4">
                    <x-input-label for="password_confirmation" value="{{ __('Confirmar contraseña') }}" />
                    <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                        name="password_confirmation" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                        {{ __('¿Ya estás registrado?') }}
                    </a>

                    <x-primary-button class="ms-4">
                        {{ __('Registrarme') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
=======
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
>>>>>>> 0910c7836d4acf2b0211e539f0fffb3b6593cbe3
