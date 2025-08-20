<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
        @csrf


        {{-- Nombre y apellido --}}
        <div>
            <x-input-label for="name" value="{{ __('Nombre y apellido') }}" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>


        {{-- DNI --}}
        <div>
            <label for="dni">DNI</label>
            <input id="dni" type="text" name="dni" required>
        </div>



        {{-- E-mail --}}
        <div class="mt-4">
            <x-input-label for="email" value="{{ __('E-mail') }}" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Rol -->
        <div>
            <label for="rol">Rol</label>
            <select id="rol" name="rol" required>
                <option value="Alumno">Alumno</option>
                <option value="Docente">Docente</option>
                <option value="Administrador">Administrador</option>
            </select>
        </div>





        {{-- Teléfono --}}
        <div class="mt-4">
            <x-input-label for="phone" value="{{ __('Teléfono') }}" />
            <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone"
                :value="old('phone')" autocomplete="tel" />
            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
        </div>


        {{-- Universidad --}}
        <div class="form-group row">
            <label for="universidad" class="col-md-4 col-form-label text-md-right">{{ __('Universidad') }}</label>


            <div class="col-md-6">
                <select id="universidad" class="form-control @error('universidad') is-invalid @enderror" name="universidad" required>
                    <option value="">Seleccione una universidad</option>
                    @foreach ($universidades as $universidad)
                    <option value="{{ $universidad }}">{{ $universidad }}</option>
                    @endforeach
                </select>
                @error('universidad')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>



        <!-- Campo de Carrera -->
        <div class="form-group row">
            <label for="career" class="col-md-4 col-form-label text-md-right">{{ __('Carrera') }}</label>
            <div class="col-md-6">
                <select id="career" class="form-control" name="career">
                    <option value="">Seleccione una carrera</option>
                    @foreach ($carreras as $carrera)
                    <option value="{{ $carrera }}">{{ $carrera }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <!-- Campo de Comisión -->
        <div class="form-group row">
            <label for="commission" class="col-md-4 col-form-label text-md-right">{{ __('Comisión') }}</label>
            <div class="col-md-6">
                <select id="commission" class="form-control" name="commission">
                    <option value="">Seleccione una comisión</option>
                    @foreach ($comisiones as $comision)
                    <option value="{{ $comision }}">{{ $comision }}</option>
                    @endforeach
                </select>
            </div>
        </div>


        {{-- GitHub --}}
        <div class="mt-4">
            <x-input-label for="github_url" value="{{ __('GitHub (URL)') }}" />
            <x-text-input id="github_url" class="block mt-1 w-full" type="url" name="github_url"
                :value="old('github_url')" placeholder="https://github.com/usuario" />
            <x-input-error :messages="$errors->get('github_url')" class="mt-2" />
        </div>


        {{-- LinkedIn --}}
        <div class="mt-4">
            <x-input-label for="linkedin_url" value="{{ __('LinkedIn (URL)') }}" />
            <x-text-input id="linkedin_url" class="block mt-1 w-full" type="url" name="linkedin_url"
                :value="old('linkedin_url')" placeholder="https://www.linkedin.com/in/usuario" />
            <x-input-error :messages="$errors->get('linkedin_url')" class="mt-2" />
        </div>


        {{-- Foto (obligatoria) --}}
        <div class="mt-4">
            <x-input-label for="photo" value="{{ __('Foto (obligatoria)') }}" />
            <input id="photo" name="photo" type="file" accept="image/*" class="block mt-1 w-full" required />
            <x-input-error :messages="$errors->get('photo')" class="mt-2" />
        </div>


        {{-- Contraseña --}}
        <div class="mt-4">
            <x-input-label for="password" value="{{ __('Contraseña') }}" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password"
                required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>


        {{-- Confirmar contraseña --}}
        <div class="mt-4">
            <x-input-label for="password_confirmation" value="{{ __('Confirmar contraseña') }}" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>


        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                {{ __('¿Ya estás registrado?') }}
            </a>


            <x-primary-button class="ms-4">
                {{ __('Registrarme') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>