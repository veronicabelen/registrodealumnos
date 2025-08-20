<h1 class="text-2xl font-bold mb-4">Inicio</h1>

<p>Tu rol es: {{ Auth::user()->rol }}</p>

@if (Auth::user()->rol == 'Alumno')
<p>Bienvenido Alumno</p>
@elseif (Auth::user()->rol == 'Docente')
<p>Bienvenido Docente</p>
@elseif (Auth::user()->rol == 'Administrador')
<p>Bienvenido Administrador</p>
@endif