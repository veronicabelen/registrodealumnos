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

<body class="bg-gradient-to-br from-gray-100 to-blue-100 dark:from-[#1A1B2A] dark:to-[#23243a] text-[#212529] dark:text-[#E0E0E0] flex flex-col min-h-screen font-sans">
    <!-- Header solo con el título -->
    <header class="w-full max-w-7xl mx-auto px-6 py-6 flex items-center justify-center bg-gradient-to-r from-blue-900 to-blue-700 shadow-lg fixed top-0 left-0 right-0 z-50">
        <span class="text-3xl font-extrabold text-white tracking-wide drop-shadow-lg">Universidad Tecnologica Nacional UTN</span>
    </header>

    <!-- Contenido principal -->
    <main class="flex-1 flex flex-col items-center w-full pt-40 pb-12 px-6 lg:px-0">
        <!-- Mensaje de bienvenida -->
        <div class="mb-8 text-center">
            <h2 class="text-2xl font-semibold mb-2 text-blue-900 dark:text-blue-200">Bienvenido al sistema de registro de alumnos</h2>
            <p class="text-gray-600 dark:text-gray-300 text-lg">Gestione su acceso y registro de manera rápida y segura.</p>
        </div>
        <!-- Logo -->
        <div class="relative w-full max-w-xl flex items-center justify-center mb-10 rounded-xl shadow-2xl bg-white dark:bg-[#23243a] p-8">
            <img src="{{ asset('images/UTN_FRRE.jpg') }}" class="w-72 h-48 object-contain rounded-lg mx-auto shadow-md border border-gray-200 dark:border-gray-700 bg-white dark:bg-[#23243a]">
        </div>
        <!-- Botones de acceso y registro -->
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

    <!-- Footer -->
    <footer class="w-full max-w-7xl mx-auto px-6 py-4 text-center text-base bg-gradient-to-r from-blue-900 to-blue-700 text-white shadow-inner">
        2025 &copy; UTN - Todos los derechos reservados
    </footer>
</body>

</html>