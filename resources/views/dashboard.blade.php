@extends('layouts.app')

@section('title', 'Universidad Tecnologica Nacional - UTN')

@section('content')
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

<div class="max-w-full mx-auto my-8 px-8 py-10 bg-white rounded-xl shadow-lg">
    @if (session('status'))
    <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">
        {{ session('status') }}
    </div>
    @endif

    {{-- Encabezado centralizado --}}
    <div class="flex flex-col items-center mb-8">
        <h1 class="text-2xl font-bold text-center">Mi Perfil</h1>
        <div class="mt-4 flex flex-col items-center">
            @if(Auth::user()->foto_perfil)
            <img src="{{ asset('storage/' . Auth::user()->foto_perfil) }}" alt="Foto de perfil" class="w-24 h-24 object-cover rounded-full border-2 border-gray-300 mb-2">
            @endif
            <div class="text-center">
                @if (strtolower(Auth::user()->rol) == 'alumno')
                <p class="text-sm text-gray-700">Alumno, {{ Auth::user()->name }}</p>
                @elseif (strtolower(Auth::user()->rol) == 'docente')
                <p class="text-sm text-gray-700">Docente, {{ Auth::user()->name }}</p>

                @endif
            </div>
        </div>
    </div>

    <hr class="my-6 border-gray-300">

    {{-- Botón de "Tus datos" centrado --}}
    <div class="flex justify-center mt-4">
        <button id="datosBtn" class="bg-gray-200 text-gray-700 px-4 py-2 rounded shadow hover:bg-gray-300 transition duration-300">
            Tus datos
        </button>
    </div>

    <div id="datosDesplegables" class="hidden mt-4 p-4 bg-gray-100 rounded shadow">
        <ul class="list-disc ml-6 space-y-1">
            <li><strong>Nombre:</strong> {{ Auth::user()->name }}</li>
            <li><strong>DNI:</strong> {{ Auth::user()->dni }}</li>
            <li><strong>Email:</strong> {{ Auth::user()->email }}</li>
            <li><strong>Teléfono:</strong> {{ Auth::user()->telefono }}</li>
            <li><strong>Universidad:</strong> {{ Auth::user()->university }}</li>
            <li><strong>Carrera:</strong> {{ Auth::user()->career }}</li>
            <li><strong>Comisión:</strong> {{ Auth::user()->commission }}</li>
            <li>
                <strong>GitHub:</strong>
                @if(Auth::user()->github)
                <a href="{{ Auth::user()->github }}" target="_blank" class="text-blue-500 hover:underline break-all">{{ Auth::user()->github }}</a>
                @else
                N/A
                @endif
            </li>
            <li>
                <strong>LinkedIn:</strong>
                @if(Auth::user()->linkedin)
                <a href="{{ Auth::user()->linkedin }}" target="_blank" class="text-blue-500 hover:underline break-all">{{ Auth::user()->linkedin }}</a>
                @else
                N/A
                @endif
            </li>

            <li><strong>WhatsApp:</strong>
                @if(Auth::user()->telefono)
                @php
                $numeroWhatsapp = preg_replace('/\D/', '', Auth::user()->telefono);
                $numeroWhatsapp = '54' . $numeroWhatsapp;
                @endphp
                <a href="https://wa.me/{{ $numeroWhatsapp }}" target="_blank" class="inline-flex items-center text-green-600 hover:text-green-800 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        viewBox="0 0 24 24" class="w-6 h-6 mr-1">
                        <path d="M20.52 3.48A11.89 11.89 0 0 0 12.04 0C5.39 0 .01 5.37.01 12c0 2.12.56 4.2 1.63 6.04L0 24l6.18-1.63A11.94 11.94 0 0 0 12.04 24c6.63 0 12.01-5.38 12.01-12s-5.39-12-12.53-12zm.07 18.66a9.93 9.93 0 0 1-8.55 1.66l-.61-.2-3.66.96.97-3.57-.24-.63a9.93 9.93 0 0 1 1.61-9.46 9.94 9.94 0 0 1 7.62-3.55c5.5 0 9.96 4.45 9.96 9.95a9.94 9.94 0 0 1-3.1 7.84zM17.6 14.7c-.3-.15-1.77-.88-2.05-.98s-.48-.15-.68.15-.77.98-.95 1.18-.35.22-.65.07c-.3-.15-1.26-.46-2.4-1.46-.88-.78-1.48-1.74-1.65-2.04s-.02-.45.13-.6c.13-.13.3-.35.45-.52.15-.18.2-.3.3-.5.1-.2.05-.37-.02-.52s-.68-1.64-.93-2.24c-.25-.6-.5-.52-.68-.53h-.58c-.2 0-.52.08-.8.37s-1.05 1.03-1.05 2.5 1.08 2.88 1.23 3.08c.15.2 2.13 3.27 5.16 4.58.72.31 1.28.49 1.72.62.72.23 1.37.2 1.88.12.57-.08 1.77-.73 2.02-1.43.25-.7.25-1.3.18-1.43-.08-.12-.27-.2-.57-.35z" />
                    </svg>
                    Abrir WhatsApp
                </a>
                @else
                <span class="text-gray-400">No registrado</span>
                @endif
            </li>
        </ul>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const btn = document.getElementById('datosBtn');
            const content = document.getElementById('datosDesplegables');
            btn.addEventListener('click', function() {
                content.classList.toggle('hidden');
            });
        });
    </script>

    {{-- Sección de Materias --}}
    @if(Auth::user()->materias && count(Auth::user()->materias))
    <hr class="my-6 border-gray-300">
    {{-- Condición para cambiar el título --}}
    @if (strtolower(Auth::user()->rol) == 'docente')
    <h3 class="text-xl font-semibold text-gray-700 mb-2 text-center">Materias Dictadas</h3>
    @else
    <h3 class="text-xl font-semibold text-gray-700 mb-2 text-center">Materias en Curso</h3>
    @endif
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach(Auth::user()->materias as $materia)
        <div class="bg-white rounded-lg border border-gray-200 shadow-md p-4 transform hover:scale-105 transition-transform duration-300 ease-in-out hover:shadow-lg cursor-pointer">
            <h4 class="text-lg font-bold">
                {{-- Asegúrate de que $materia es un objeto y accede a su propiedad nombre --}}
                {{ $materia->nombre }}
            </h4>
            {{-- Si tu objeto materia tiene más propiedades, puedes agregarlas aquí --}}
        </div>
        @endforeach
    </div>
    @endif

    {{-- Botones al pie centrados --}}
    <div class="flex justify-center items-center mt-8 space-x-2">
        <a href="{{ route('home') }}" class="bg-red-500 text-white px-4 py-2 rounded">
            Volver al Home
        </a>
        <a href="{{ route('profile.edit') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Editar perfil</a>
    </div>
</div>

<footer class="w-full max-w-7xl mx-auto px-6 py-4 text-center text-base bg-gradient-to-r from-blue-900 to-blue-700 text-white shadow-inner">
    2025 &copy; UTN - Todos los derechos reservados
</footer>
@endsection