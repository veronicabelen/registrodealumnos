@extends('layouts.app')

@section('content')
<div class="bg-gray-100 min-h-screen flex flex-col justify-center items-center">
    <!-- Contenedor del formulario de inicio de sesión -->
    <div class="bg-white shadow-xl rounded-lg p-8 text-center max-w-sm w-full">

        <!-- Título del formulario -->
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Iniciar Sesión</h2>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div class="mb-4">
                <x-input-label for="email" :value="__('Email')" class="text-left font-semibold text-gray-700" />
                <x-text-input id="email" class="block mt-1 w-full border-gray-300 rounded-lg shadow-sm" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-left" />
            </div>

            <!-- Password -->
            <div class="mb-4">
                <x-input-label for="password" :value="__('Password')" class="text-left font-semibold text-gray-700" />
                <x-text-input id="password" class="block mt-1 w-full border-gray-300 rounded-lg shadow-sm"
                    type="password"
                    name="password"
                    required autocomplete="current-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2 text-left" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center text-sm text-gray-600">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500" name="remember">
                    <span class="ms-2">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-between mt-6">
                @if (Route::has('password.request'))
                <a class="underline text-sm text-blue-600 hover:text-blue-900 rounded-md focus:outline-none" href="{{ route('password.request') }}">
                    {{ __('¿Olvidaste tu contaseña?') }}
                </a>
                @endif

                <button type="submit" class="ms-3 bg-blue-600 hover:bg-blue-700 text-white font-medium px-6 py-2 rounded-full shadow-lg transition transform hover:scale-105">
                    {{ __('Log in') }}
                </button>
            </div>
        </form>

        <p class="mt-6 text-sm text-gray-500">
            ¿No tienes una cuenta? <a href="{{ route('register') }}" class="text-blue-600 hover:underline">Regístrate</a>
        </p>
    </div>
</div>
@endsection