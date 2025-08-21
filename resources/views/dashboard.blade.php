@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto mt-10 px-6">
  <!-- Mensaje de estado -->
  @if (session('status'))
  <div class="bg-green-100 text-green-800 px-4 py-2 rounded-lg mb-6 shadow">
    {{ session('status') }}
  </div>
  @endif

  <!-- Título -->
  <h1 class="text-3xl font-extrabold text-gray-900 mb-4 text-center">Bienvenido al Panel de Control</h1>

  <!-- Rol y saludo -->
  <div class="bg-white rounded-lg shadow-xl p-6 mb-6">
    <p class="text-gray-700 text-lg mb-2 text-center">
      Tu rol es:
      <span class="font-bold text-blue-600">{{ Auth::user()->rol }}</span>
    </p>
    <div class="text-center">
      @if (Auth::user()->rol == 'Alumno')
      <p class="text-gray-800 text-xl font-semibold">👨‍🎓 Bienvenido Alumno, <span class="font-bold text-blue-700">{{ Auth::user()->name }}</span></p>
      @elseif (Auth::user()->rol == 'Docente')
      <p class="text-gray-800 text-xl font-semibold">👨‍🏫 Bienvenido Docente, <span class="font-bold text-blue-700">{{ Auth::user()->name }}</span></p>
      <a href="{{ route('alumnos.index') }}"
        class="inline-block mt-4 bg-blue-600 hover:bg-blue-700 text-white font-medium px-6 py-2 rounded-full shadow-lg transition transform hover:scale-105">
        Ver alumnos
      </a>
      @endif
    </div>
  </div>

  <!-- Datos del usuario -->
  <div class="bg-white shadow-xl rounded-lg p-8">
    <h2 class="text-2xl font-bold text-gray-800 mb-6 flex items-center">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
      </svg>
      Tus datos
    </h2>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
      <ul class="space-y-4 text-gray-700 text-base">
        <li><strong>Nombre:</strong> {{ Auth::user()->name }}</li>
        <li><strong>DNI:</strong> {{ Auth::user()->dni }}</li>
        <li><strong>Email:</strong> {{ Auth::user()->email }}</li>
        <li><strong>Teléfono:</strong> {{ Auth::user()->telefono }}</li>
        <li><strong>Universidad:</strong> {{ Auth::user()->university }}</li>
        <li><strong>Carrera:</strong> {{ Auth::user()->career }}</li>
        <li><strong>Comisión:</strong> {{ Auth::user()->commission }}</li>
      </ul>
      <ul class="space-y-4 text-gray-700 text-base">
        <li><strong>GitHub:</strong>
          @if(Auth::user()->github)
          <a href="{{ Auth::user()->github }}" target="_blank" class="text-blue-600 underline hover:text-blue-800 transition">
            {{ Auth::user()->github }}
          </a>
          @else
          <span class="text-gray-400">No registrado</span>
          @endif
        </li>
        <li><strong>LinkedIn:</strong>
          @if(Auth::user()->linkedin)
          <a href="{{ Auth::user()->linkedin }}" target="_blank" class="text-blue-600 underline hover:text-blue-800 transition">
            {{ Auth::user()->linkedin }}
          </a>
          @else
          <span class="text-gray-400">No registrado</span>
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
        <li><strong>Foto de perfil:</strong>
          @if(Auth::user()->foto_perfil)
          <div class="mt-2">
            <img src="{{ asset('storage/' . Auth::user()->foto_perfil) }}"
              alt="Foto de perfil" class="w-24 h-24 rounded-full object-cover shadow-lg border-2 border-blue-500 p-1">
          </div>
          @else
          <span class="text-gray-400">No cargada</span>
          @endif
        </li>
        <li><strong>Materias:</strong>
          @if(Auth::user()->materias)
          <ul class="list-disc list-inside mt-2 text-gray-600">
            @foreach(Auth::user()->materias as $materia)
            <li>{{ $materia }}</li>
            @endforeach
          </ul>
          @else
          <span class="text-gray-400">No registradas</span>
          @endif
        </li>
      </ul>
    </div>
  </div>

  <!-- Botones de acción (reubicados) -->
  <div class="flex justify-center gap-4 mt-6">
    <a href="{{ route('profile.edit') }}"
      class="bg-blue-600 hover:bg-blue-700 text-white font-medium px-6 py-2 rounded-full shadow-lg transition transform hover:scale-105">
      Editar perfil
    </a>
    <form method="POST" action="{{ route('logout') }}">
      @csrf
      <button type="submit"
        class="bg-red-600 hover:bg-red-700 text-white font-medium px-6 py-2 rounded-full shadow-lg transition transform hover:scale-105">
        Cerrar sesión
      </button>
    </form>
  </div>
</div>
@endsection