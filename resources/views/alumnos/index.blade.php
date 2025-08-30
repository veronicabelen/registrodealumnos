@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto mt-8 px-4">
    <div class="fixed bottom-12 left-1/2 -translate-x-1/2 flex gap-3 z-10">
        <a href="{{ route('home') }}" class="bg-blue-500 text-white px-4 py-2 rounded shadow-lg hover:bg-blue-600 transition-colors">
            Volver al Home
        </a>
    </div>

    <h1 class="text-2xl font-bold mb-4">Listado de Alumnos</h1>

    <div class="overflow-x-auto">
        <table class="w-full border-collapse table-auto">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border p-2">Foto</th>
                    <th class="border p-2">Nombre</th>
                    <th class="border p-2">DNI</th>
                    <th class="border p-2">Email</th>
                    <th class="border p-2">Teléfono</th>
                    <th class="border p-2">Universidad</th>
                    <th class="border p-2">Carrera</th>
                    <th class="border p-2">Comisión</th>
                    <th class="border p-2">GitHub</th>
                    <th class="border p-2">LinkedIn</th>
                    <th class="border p-2">WhatsApp</th>
                    <th class="border p-2">Materias</th>
                    <th class="border p-2">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($alumnos as $alumno)
                <tr class="hover:bg-gray-100">
                    <td class="border p-2 text-center">
                        @if($alumno->foto_perfil)
                        <img src="{{ asset('storage/' . $alumno->foto_perfil) }}"
                            alt="Foto de {{ $alumno->name }}"
                            class="w-14 h-14 rounded-full object-cover mx-auto cursor-pointer hover:scale-110 transition"
                            @click="modalOpen = true; modalImage = '{{ asset('storage/' . $alumno->foto_perfil) }}'">
                        @else
                        <img src="{{ asset('images/default.png') }}"
                            alt="Sin foto"
                            class="w-14 h-14 rounded-full object-cover mx-auto">
                        @endif
                    </td>
                    <td class="border p-2">{{ $alumno->name }}</td>
                    <td class="border p-2">{{ $alumno->dni }}</td>
                    <td class="border p-2 text-sm">{{ $alumno->email }}</td>
                    <td class="border p-2">{{ $alumno->telefono }}</td>
                    <td class="border p-2 text-xs">{{ $alumno->university }}</td>
                    <td class="border p-2 text-xs">{{ $alumno->career }}</td>
                    <td class="border p-2">{{ $alumno->commission }}</td>
                    <td class="border p-2 text-xs">
                        @if($alumno->github)
                        <a href="{{ $alumno->github }}" target="_blank" class="text-blue-500 hover:underline break-all">{{ $alumno->github }}</a>
                        @else
                        N/A
                        @endif
                    </td>
                    <td class="border p-2 text-xs">
                        @if($alumno->linkedin)
                        <a href="{{ $alumno->linkedin }}" target="_blank" class="text-blue-500 hover:underline break-all">{{ $alumno->linkedin }}</a>
                        @else
                        N/A
                        @endif
                    </td>

                    <!-- WhatsApp -->
                    <td class="px-4 py-3 text-center">
                        @if($alumno->telefono)
                        @php
                        // Normalizar número: eliminar caracteres no numéricos
                        $numeroWhatsapp = preg_replace('/\D/', '', $alumno->telefono);
                        // Si todos son de Argentina, anteponer 54 (ajustar según país)
                        $numeroWhatsapp = '54' . $numeroWhatsapp;
                        @endphp
                        <a href="https://wa.me/{{ $numeroWhatsapp }}"
                            target="_blank"
                            class="inline-block">
                            <!-- Ícono WhatsApp SVG -->
                            <svg xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor"
                                viewBox="0 0 24 24"
                                class="w-6 h-6 text-green-500 hover:text-green-600 transition">
                                <path d="M20.52 3.48A11.89 11.89 0 0 0 12.04 0C5.39 0 .01 5.37.01 12c0 2.12.56 4.2 1.63 6.04L0 24l6.18-1.63A11.94 11.94 0 0 0 12.04 24c6.63 0 12.01-5.38 12.01-12s-5.39-12-12.53-12zm.07 18.66a9.93 9.93 0 0 1-8.55 1.66l-.61-.2-3.66.96.97-3.57-.24-.63a9.93 9.93 0 0 1 1.61-9.46 9.94 9.94 0 0 1 7.62-3.55c5.5 0 9.96 4.45 9.96 9.95a9.94 9.94 0 0 1-3.1 7.84zM17.6 14.7c-.3-.15-1.77-.88-2.05-.98s-.48-.15-.68.15-.77.98-.95 1.18-.35.22-.65.07c-.3-.15-1.26-.46-2.4-1.46-.88-.78-1.48-1.74-1.65-2.04s-.02-.45.13-.6c.13-.13.3-.35.45-.52.15-.18.2-.3.3-.5.1-.2.05-.37-.02-.52s-.68-1.64-.93-2.24c-.25-.6-.5-.52-.68-.53h-.58c-.2 0-.52.08-.8.37s-1.05 1.03-1.05 2.5 1.08 2.88 1.23 3.08c.15.2 2.13 3.27 5.16 4.58.72.31 1.28.49 1.72.62.72.23 1.37.2 1.88.12.57-.08 1.77-.73 2.02-1.43.25-.7.25-1.3.18-1.43-.08-.12-.27-.2-.57-.35z" />
                            </svg>
                        </a>
                        @else
                        <span class="text-gray-400">No registrado</span>
                        @endif
                    </td>
                    <!-- Materias -->
                    <td class="border p-2 text-xs">
                        @if($alumno->materias->count() > 0)
                        <ol class="list-decimal list-inside">
                            @foreach($alumno->materias as $materia)
                            <li>{{ $materia->nombre }}</li>
                            @endforeach
                        </ol>
                        @else
                        No registradas
                        @endif
                    </td>
                    <!-- Acciones -->
                    <td class="px-4 py-3 text-center">
                        <form action="{{ route('alumnos.destroy', $alumno->id) }}" method="POST"
                            onsubmit="return confirm('¿Seguro que deseas eliminar este alumno?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded text-sm transition">
                                Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div id="imageModal" class="fixed inset-0 bg-black bg-opacity-75 hidden justify-center items-center z-50">
    <span class="absolute top-5 right-8 text-white text-3xl cursor-pointer" onclick="closeModal()">&times;</span>
    <img id="modalImage" src="" class="max-w-full max-h-full rounded shadow-lg">
</div>

<script>
    function openModal(src) {
        document.getElementById('modalImage').src = src;
        document.getElementById('imageModal').classList.remove('hidden');
        document.getElementById('imageModal').classList.add('flex');
    }

    function closeModal() {
        document.getElementById('imageModal').classList.add('hidden');
        document.getElementById('imageModal').classList.remove('flex');
    }
</script>
@endsection