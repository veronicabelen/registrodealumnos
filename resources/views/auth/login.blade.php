<x-guest-layout>
    <!-- 
        El estilo de la animación de fondo ya no se necesita aquí.
        Ahora debe estar en el archivo layouts/guest.blade.php.
    -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <div class="min-h-screen flex items-center justify-center">
        <div class="w-full max-w-md bg-white shadow-md border border-gray-300 rounded-md p-6">
            
            <div class="flex justify-center mb-4">
                <img src="{{ asset('images/utn.png') }}" alt="Logo" class="h-12">
            </div>

            <h2 class="text-center text-xl font-semibold text-gray-700 mb-6">Ingresá tus datos</h2>

            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-4">
                    <x-input-label for="email" :value="__('Email')" class="text-gray-600" />
                    <x-text-input id="email" 
                        class="block mt-1 w-full border border-gray-300 rounded-md shadow-sm p-2 focus:border-indigo-500 focus:ring focus:ring-indigo-200"
                        type="email" 
                        name="email" 
                        :value="old('email')" 
                        required 
                        autofocus 
                        autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm text-red-500" />
                </div>

                <div class="mt-4">
                    <x-input-label for="password" :value="__('Contraseña')" />
                    <x-text-input 
                        id="password" 
                        class="block mt-1 w-full" 
                        type="password" 
                        name="password" 
                        required 
                        autocomplete="current-password" 
                    />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <div class="flex items-center mb-4 mt-4">
                    <input id="remember_me" type="checkbox" name="remember" 
                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500">
                    <label for="remember_me" class="ml-2 text-sm text-gray-600">Recordar</label>
                </div>

                <div class="flex items-center justify-between">
                    @if (Route::has('password.request'))
                        <a class="text-sm text-indigo-600 hover:underline" href="{{ route('password.request') }}">
                            ¿Olvidaste tu contraseña?
                        </a>
                    @endif

                    <x-primary-button class="ml-3 bg-indigo-600 hover:bg-indigo-700">
                        Ingresar
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>