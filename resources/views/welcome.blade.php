@extends('layouts.app')

@section('content')
<!-- Todo el contenido de tu página de bienvenida va aquí, dentro del 'main' de la plantilla principal -->
<div class="bg-gray-100 min-h-screen flex flex-col items-center">
    <!-- Contenido principal -->
    <div class="bg-white shadow-xl rounded-lg p-8 text-center max-w-lg w-full mt-20">
        <!-- Mensaje de bienvenida -->
        <div class="mb-8">
            <h2 class="text-2xl font-semibold mb-2 text-blue-900">Bienvenido al sistema de registro de alumnos</h2>
            <p class="text-gray-600 text-lg">Gestione su acceso y registro de manera rápida y segura.</p>
        </div>
        <!-- Logo -->
        <div class="relative w-full flex items-center justify-center mb-10 rounded-xl shadow-md p-4">
            <img src="{{ asset('images/UTN_FRRE.jpg') }}" class="w-72 h-48 object-contain rounded-lg mx-auto bg-white">
        </div>
        <!-- Botones de acceso y registro -->
        @if (Route::has('login'))
        <div class="flex items-center gap-6 mt-2 justify-center">
            <a
                href="{{ route('login') }}"
                class="inline-block px-8 py-3 bg-blue-700 text-white hover:bg-blue-800 rounded-lg text-lg font-semibold shadow transition-colors duration-200">
                Acceso
            </a>
            @if (Route::has('register'))
            <a
                href="{{ route('register') }}"
                class="inline-block px-8 py-3 bg-gray-200 text-blue-900 hover:bg-blue-100 rounded-lg text-lg font-semibold shadow transition-colors duration-200">
                Registro
            </a>
            @endif
        </div>
        @endif
    </div>
</div>
@endsection