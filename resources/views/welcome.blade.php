<<<<<<< HEAD
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Universidad Tecnologica Nacional - UTN</title>

    <link rel="icon" href="/favicon.ico" sizes="any">
    <link rel="icon" href="/favicon.svg" type="image/svg+xml">
    <link rel="apple-touch-icon" href="/apple-touch-icon.png">

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>

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

<body class="text-[#212529] dark:text-[#E0E0E0] flex flex-col min-h-screen font-sans">
    <header class="w-full max-w-7xl mx-auto px-6 py-6 flex items-center justify-center bg-gradient-to-r from-blue-900 to-blue-700 shadow-lg fixed top-0 left-0 right-0 z-50 rounded-lg">
        <span class="text-3xl font-extrabold text-white tracking-wide drop-shadow-lg">Universidad Tecnologica Nacional UTN</span>
    </header>

    <main class="flex-1 flex flex-col items-center w-full pt-40 pb-12 px-6 lg:px-0">
        <div class="mb-8 text-center">
             <h2 class="text-2xl font-extrabold mb-2 text-black tracking-wide">Bienvenido al Sistema de Registro de Alumnos</h2>
            <p class="text-gray-600 dark:text-gray-300 text-lg">Gestione su acceso y registro de manera rápida y segura.</p>
        </div>
        <div class="relative w-full max-w-xl flex items-center justify-center mb-10">
            <img src="{{ asset('images/UTN_FRRE.jpg') }}" class="w-96 h-64 object-contain">
        </div>
        @if (Route::has('login'))
        <div class="flex items-center gap-6 mt-2">
            <a
                href="{{ route('login') }}"
                class="inline-block px-8 py-3 bg-blue-700 text-white hover:bg-blue-800 rounded-lg text-lg font-semibold shadow transition-colors duration-200">
                Acceso
            </a>
            <a
                href="{{ route('register') }}"
                class="inline-block px-8 py-3 bg-gray-200 text-blue-900 hover:bg-blue-100 rounded-lg text-lg font-semibold shadow transition-colors duration-200">
                Registro
            </a>
        </div>
        @endif
    </main>

    <footer class="w-full max-w-7xl mx-auto px-6 py-4 text-center text-base bg-gradient-to-r from-blue-900 to-blue-700 text-white shadow-inner rounded-lg">
        2025 &copy; UTN - Todos los derechos reservados
    </footer>
</body>

</html>
=======
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
>>>>>>> 0910c7836d4acf2b0211e539f0fffb3b6593cbe3
