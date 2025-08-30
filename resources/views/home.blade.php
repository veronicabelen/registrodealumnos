<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio - Sistema de Gestión</title>
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
        .card {
            background-color: white;
            padding: 2rem;
            border-radius: 0.5rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            text-align: center;
            max-width: 500px;
            margin: 2rem auto;
        }
        .profile-img {
            border-radius: 50%;
            width: 120px;
            height: 120px;
            object-fit: cover;
            margin-bottom: 1rem;
        }
        .button-group {
            display: flex;
            justify-content: center;
            gap: 2rem;
            margin-top: 1.5rem;
        }
        .button-group a {
            text-decoration: none;
        }
        .button-group button {
            min-width: 120px;
            padding: 0.75rem 1.5rem;
            border-radius: 0.5rem;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s;
            text-align: center;
        }
        .perfil-btn {
            background-color: #3b82f6;
            color: white;
        }
        .perfil-btn:hover {
            background-color: #2563eb;
        }
        .materias-btn {
            background-color: #10b981;
            color: white;
        }
        .materias-btn:hover {
            background-color: #059669;
        }
        .alumnos-btn {
            background-color: #9b59b6;
            color: white;
        }
        .alumnos-btn:hover {
            background-color: #8e44ad;
        }
        .logout-btn {
            min-width: 120px;
            background-color: #ef4444;
            color: white;
            padding: 0.75rem 1.5rem;
            border-radius: 0.5rem;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s;
            text-align: center;
        }
        .logout-btn:hover {
            background-color: #dc2626;
        }
    </style>
</head>
<body class="font-sans antialiased flex flex-col items-center justify-center min-h-screen">

    <div class="card">
        <h2 class="text-2xl font-semibold text-gray-700 mb-4">Inicio</h2>

        <img src="{{ asset('storage/' . Auth::user()->foto_perfil) }}" alt="Foto de Perfil" class="profile-img mx-auto">
        
        <p class="text-gray-700 text-lg mb-6">
            Bienvenido {{ Auth::user()->rol }}, {{ Auth::user()->name }}
        </p>

        <div class="button-group">
            <a href="{{ route('dashboard') }}">
                <button class="perfil-btn">Perfil</button>
            </a>
            
            {{-- Condición para mostrar los links del docente --}}
            @if(strtolower(Auth::user()->rol) === 'docente')
                <a href="{{ route('alumnos.index') }}">
                    <button class="alumnos-btn">Ver Lista de Alumnos</button>
                </a>
            @endif

            {{-- Condición para mostrar los links del alumno --}}
            @if(strtolower(Auth::user()->rol) === 'alumno')
                <a href="{{ route('materias.inscribir') }}">
                    <button class="materias-btn">Materias</button>
                </a>
            @endif
        </div>
        
        <form method="POST" action="{{ route('logout') }}" class="mt-4">
            @csrf
            <button type="submit" class="logout-btn">Cerrar sesión</button>
        </form>
    </div>

    <div class="w-full text-center mt-auto py-4 bg-blue-900 text-white">
        2025 © UTN - Todos los derechos reservados
    </div>

</body>
</html>
