<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="{{route('flamenco.index')}}">
                <img src="{{ asset('img/cab-450.png') }}" class="fill-current text-gray-500"/>
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

             <!-- Tipo -->
             <div>
                <x-label for="tipo" :value="__('Tipo de cuenta')" />

                {{-- <x-input id="tipo" class="block mt-1 w-full" type="text" name="tipo" :value="old('tipo')" required autofocus /> --}}
                
                <select name="tipo" id="tipo" class="form-select appearance-none
                    block
                    w-full
                    px-3
                    py-1.5
                    text-base
                    font-normal
                    text-gray-700
                    bg-white bg-clip-padding bg-no-repeat
                    border border-solid border-gray-300
                    rounded
                    transition
                    ease-in-out
                    m-0
                    focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Default select example">
                    <option value="Usuario" selected>--Selecciona</option>
                    <option value="Administrador">Administrador</option>
                    <option value="Usuario">Usuario</option>
                </select>
            </div>

            <!-- Name --><br>
            <div>
                <x-label for="name" :value="__('Nombre')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>
           
            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Contraseña')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirmar contraseña')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Ya estás registrado?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Registrar') }}
                </x-button>
            </div>
        </form>

        <div style="text-align: end; margin-top: 10px;"><a class="mr-4" href="{{ route('flamenco.index') }}"><small>Volver atrás</small></a></div>
        
    </x-auth-card>
    
</x-guest-layout>
