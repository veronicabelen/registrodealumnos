<section>
    <div class="flex justify-center mb-4">
        <img src="{{ asset('images/utn.png') }}" alt="Logo" class="h-12">
    </div>

    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Editar Perfil') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Actualiza los datos de tu perfil.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        {{-- Nombre --}}
        <div>
            <x-input-label for="name" :value="__('Nombre y Apellido')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        {{-- DNI --}}
        <div>
            <x-input-label for="dni" :value="__('DNI')" />
            <x-text-input id="dni" name="dni" type="text" class="mt-1 block w-full" :value="old('dni', $user->dni)" required autocomplete="dni" />
            <x-input-error class="mt-2" :messages="$errors->get('dni')" />
        </div>

        {{-- Email --}}
        <div>
            <x-input-label for="email" :value="__('E-mail')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Your email address is unverified.') }}
                        <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>
                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        {{-- Teléfono --}}
        <div>
            <x-input-label for="telefono" :value="__('Teléfono')" />
            <x-text-input id="telefono" name="telefono" type="text" class="mt-1 block w-full" :value="old('telefono', $user->telefono)" required autocomplete="telefono" />
            <x-input-error class="mt-2" :messages="$errors->get('telefono')" />
        </div>
        
        {{-- Universidad --}}
        <div>
            <x-input-label for="university" :value="__('Universidad')" />
            <x-text-input id="university" name="university" type="text" class="mt-1 block w-full" :value="old('university', $user->university)" required autocomplete="university" />
            <x-input-error class="mt-2" :messages="$errors->get('university')" />
        </div>

        {{-- Carrera --}}
        <div>
            <x-input-label for="career" :value="__('Carrera')" />
            <x-text-input id="career" name="career" type="text" class="mt-1 block w-full" :value="old('career', $user->career)" required autocomplete="career" />
            <x-input-error class="mt-2" :messages="$errors->get('career')" />
        </div>

        {{-- Comisión --}}
        <div>
            <x-input-label for="commission" :value="__('Comisión')" />
            <x-text-input id="commission" name="commission" type="text" class="mt-1 block w-full" :value="old('commission', $user->commission)" required autocomplete="commission" />
            <x-input-error class="mt-2" :messages="$errors->get('commission')" />
        </div>

        {{-- GitHub --}}
        <div>
            <x-input-label for="github" :value="__('GitHub (URL)')" />
            <x-text-input id="github" name="github" type="url" class="mt-1 block w-full" :value="old('github', $user->github)" autocomplete="github" />
            <x-input-error class="mt-2" :messages="$errors->get('github')" />
        </div>

        {{-- LinkedIn --}}
        <div>
            <x-input-label for="linkedin" :value="__('LinkedIn (URL)')" />
            <x-text-input id="linkedin" name="linkedin" type="url" class="mt-1 block w-full" :value="old('linkedin', $user->linkedin)" autocomplete="linkedin" />
            <x-input-error class="mt-2" :messages="$errors->get('linkedin')" />
        </div>

        {{-- WhatsApp --}}
        <div>
            <x-input-label for="whatsapp" :value="__('WhatsApp')" />
            <x-text-input id="whatsapp" name="whatsapp" type="text" class="mt-1 block w-full" :value="old('whatsapp', $user->whatsapp)" autocomplete="whatsapp" />
            <x-input-error class="mt-2" :messages="$errors->get('whatsapp')" />
        </div>

        {{-- Materias --}}
        @if($user->rol == 'Alumno')
            <div>
                <x-input-label :value="__('Materias:')" class="mb-2" />
                <div class="grid grid-cols-2 sm:grid-cols-3 gap-y-1">
                    @php
                        $materias = [
                            'Programacion', 'Programacion II', 'Programacion III',
                            'Base de Datos', 'Base de Datos II', 'Metodologia',
                            'Metodologia II', 'Sistemas Operativos', 'Redes',
                            'Ingles I', 'Ingles II', 'Matematicas',
                            'Estadistica', 'Arquitectura de Software'
                        ];
                    @endphp
                    @foreach($materias as $materia)
                        <div class="flex items-center">
                            <input type="checkbox" id="materia-{{ Str::slug($materia) }}" name="materias[]" value="{{ $materia }}" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                                @if(in_array($materia, old('materias', $user->materias ?? []))) checked @endif>
                            <label for="materia-{{ Str::slug($materia) }}" class="ml-2 text-sm text-gray-600">{{ $materia }}</label>
                        </div>
                    @endforeach
                </div>
                <x-input-error class="mt-2" :messages="$errors->get('materias')" />
            </div>
        @endif

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Guardar cambios') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Guardado.') }}</p>
            @endif
        </div>
    </form>
</section>