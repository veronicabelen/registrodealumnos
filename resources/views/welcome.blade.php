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
</head>


<body class="bg-[#F8F9FA] dark:bg-[#1A1B2A] text-[#212529] dark:text-[#E0E0E0] flex flex-col min-h-screen font-sans">
    {{-- Header con logo y navegación actualizada --}}
    <header class="w-full max-w-7xl mx-auto px-6 py-4 flex items-center justify-between bg-gray-800 bg-opacity-80 shadow-md backdrop-blur fixed top-0 left-0 right-0 z-50">
        {{-- Logo y Nombre de la Clínica --}}
        <a href="/" class="flex items-center gap-2 text-2xl font-bold text-white tracking-wide">
            <span class="text-white"> Universidad Tecnologica Nacional</span> UTN
        </a>


        @if (Route::has('login'))
        {{-- Navegación con Acceso y Ayuda --}}
        <nav class="flex items-center gap-4 text-sm">
            @auth
            <a
                href="{{ url('/dashboard') }}"
                class="inline-block px-5 py-1.5 bg-white text-sky-700 hover:bg-gray-200 rounded-md text-sm leading-normal transition-colors duration-200">
                Inicio
            </a>
            @else
            {{-- Enlace de Acceso --}}
            <a
                href="{{ route('login') }}"
                class="inline-block px-5 py-1.5 bg-white text-gray-800 hover:bg-gray-200 rounded-md text-sm leading-normal transition-colors duration-200">
                Acceso
            </a>

            {{-- Enlace de Registro --}}
            <a
                href="/register" {{-- Puedes cambiar esta URL --}}
                class="inline-block px-5 py-1.5 bg-white text-gray-800 hover:bg-gray-200 rounded-md text-sm leading-normal transition-colors duration-200">
                Registro
            </a>
            @endauth
        </nav>
        @endif
    </header>


    {{-- Contenido principal de la página --}}
    <main class="flex-1 flex flex-col items-center w-full pt-20 pb-8 px-6 lg:px-0 bg-gray-100">
        {{-- Sección de imagen destacada (Hero) --}}
        <div class="relative w-full h-96 flex items-center justify-center mb-8 rounded-lg shadow-lg overflow-hidden">
            <img src="{{ asset('images/UTN_FRRE.jpg') }}" class="w-1/2 h-full object-contain rounded-lg mx-auto">
        </div>

    </main>


    {{-- Footer --}}
    <footer class="w-full max-w-7xl mx-auto px-6 py-4 text-center text-sm bg-gray-800 bg-opacity-90 text-white">
        2025 - UTN
    </footer>
</body>

</html>