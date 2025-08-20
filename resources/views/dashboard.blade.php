@if (session('status'))
<div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">
  {{ session('status') }}
</div>
@endif

<h1 class="text-2xl font-bold mb-4">Inicio</h1>

<p>Tu rol es: {{ Auth::user()->rol }}</p>

@if (Auth::user()->rol == 'Alumno')
<p>Bienvenido Alumno, {{ Auth::user()->name }}</p>
@elseif (Auth::user()->rol == 'Docente')
<p>Bienvenido Docente, {{ Auth::user()->name }}</p>
<a href="{{ route('alumnos.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Ver alumnos</a>
@elseif (Auth::user()->rol == 'Administrador')
<p>Bienvenido Administrador, {{ Auth::user()->name }}</p>
@endif

<form method="POST" action="{{ route('logout') }}" class="inline">
  @csrf
  <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Cerrar sesión</button>
</form>
<a href="{{ route('profile.edit') }}" class="bg-blue-500 text-white px-4 py-2 rounded ml-2">Editar perfil</a>

<h2 class="text-xl font-semibold mt-6 mb-2">Tus datos:</h2>
<ul class="list-disc ml-6">
  <li><strong>Nombre:</strong> {{ Auth::user()->name }}</li>
  <li><strong>DNI:</strong> {{ Auth::user()->dni }}</li>
  <li><strong>Email:</strong> {{ Auth::user()->email }}</li>
  <li><strong>Teléfono:</strong> {{ Auth::user()->telefono }}</li>
  <li><strong>Universidad:</strong> {{ Auth::user()->university }}</li>
  <li><strong>Carrera:</strong> {{ Auth::user()->career }}</li>
  <li><strong>Comisión:</strong> {{ Auth::user()->commission }}</li>
  <li><strong>GitHub:</strong> {{ Auth::user()->github }}</li>
  <li><strong>LinkedIn:</strong> {{ Auth::user()->linkedin }}</li>
  <li><strong>WhatsApp:</strong> {{ Auth::user()->whatsapp }}</li>
  <li><strong>Foto de perfil:</strong>
    @if(Auth::user()->foto_perfil)
    <img src="{{ asset('storage/' . Auth::user()->foto_perfil) }}" alt="Foto de perfil" width="100">
    @else
    No cargada
    @endif
  </li>
  <li><strong>Materias:</strong>
    @if(Auth::user()->materias)
    <ul>
      @foreach(Auth::user()->materias as $materia)
      <li>{{ $materia }}</li>
      @endforeach
    </ul>
    @else
    No registradas
    @endif
  </li>
</ul>