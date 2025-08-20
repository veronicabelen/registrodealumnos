@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto mt-8">
  <!-- Botones arriba de la tabla -->
  <div class="mb-4 flex gap-2">
    <a href="{{ route('dashboard') }}" class="bg-blue-500 text-white px-4 py-2 rounded mr-2">
      Volver al perfil
    </a>
    <form method="POST" action="{{ route('logout') }}" class="inline">
      @csrf
      <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">
        Cerrar sesión
      </button>
    </form>
  </div>

  <h1 class="text-2xl font-bold mb-4">Listado de Alumnos</h1>
  <table class="min-w-full border">
    <thead>
      <tr>
        <th class="border px-2 py-1">Nombre</th>
        <th class="border px-2 py-1">DNI</th>
        <th class="border px-2 py-1">Email</th>
        <th class="border px-2 py-1">Teléfono</th>
        <th class="border px-2 py-1">Universidad</th>
        <th class="border px-2 py-1">Carrera</th>
        <th class="border px-2 py-1">Comisión</th>
        <th class="border px-2 py-1">GitHub</th>
        <th class="border px-2 py-1">LinkedIn</th>
        <th class="border px-2 py-1">WhatsApp</th>
        <th class="border px-2 py-1">Materias</th> <!-- Nueva columna -->
        <th class="border px-2 py-1">Acciones</th>
      </tr>
    </thead>
    <tbody>
      @foreach($alumnos as $alumno)
      <tr>
        <td class="border px-2 py-1">{{ $alumno->name }}</td>
        <td class="border px-2 py-1">{{ $alumno->dni }}</td>
        <td class="border px-2 py-1">{{ $alumno->email }}</td>
        <td class="border px-2 py-1">{{ $alumno->telefono }}</td>
        <td class="border px-2 py-1">{{ $alumno->university }}</td>
        <td class="border px-2 py-1">{{ $alumno->career }}</td>
        <td class="border px-2 py-1">{{ $alumno->commission }}</td>
        <td class="border px-2 py-1">{{ $alumno->github }}</td>
        <td class="border px-2 py-1">{{ $alumno->linkedin }}</td>
        <td class="border px-2 py-1">{{ $alumno->whatsapp }}</td>
        <td class="border px-2 py-1">
          @if($alumno->materias && is_array($alumno->materias))
          <ul>
            @foreach($alumno->materias as $materia)
            <li>{{ $materia }}</li>
            @endforeach
          </ul>
          @else
          No registradas
          @endif
        </td>
        <td class="border px-2 py-1">
          <form action="{{ route('alumnos.destroy', $alumno->id) }}" method="POST" onsubmit="return confirm('¿Seguro que deseas eliminar este alumno?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-600 text-white px-2 py-1 rounded">Eliminar alumno</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection