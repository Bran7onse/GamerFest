<x-guest-layout>
<style>
        body {
            background-image: url('http://127.0.0.1:8000/images/WELCOME.jpg');
            background-size: cover; /* Ajusta la imagen para cubrir todo el fondo */
            background-position: center; /* Centra la imagen en el fondo */
            background-repeat: no-repeat; /* Evita que la imagen se repita */
            height: 100vh; /* Establece la altura del cuerpo al 100% de la ventana del navegador */
            margin: 0; /* Elimina los márgenes por defecto */
            display: flex; /* Utiliza el modelo de caja flexible para centrar contenido verticalmente */
            justify-content: center; /* Centra el contenido horizontalmente */
            align-items: center; /* Centra el contenido verticalmente */
        }
    </style>

   
        <x-jet-authentication-card>
            <x-slot name="logo">
                <img src="https://cdn.pixabay.com/photo/2018/09/05/06/19/gamer-zone-3655575_960_720.png" alt="Nuevo Logo" class=" w-20 h-20 mb-4 mx-auto " />
                <span class="ml-4 text-lg font-semi"><b>GAMER</b>fest</span>
            </x-slot>

            <x-jet-validation-errors class="mb-4" />

            @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div>
                    <x-jet-label for="email" value="{{ __('Email') }}" />
                    <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                </div>

                <div class="mt-4">
                    <x-jet-label for="password" value="{{ __('Password') }}" />
                    <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                </div>

                <div class="block mt-4">
                    <label for="remember_me" class="flex items-center">
                        <x-jet-checkbox id="remember_me" name="remember" />
                        <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                    </label>
                </div>

                <div class="flex items-center justify-end mt-4">
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif

                    <x-jet-button class="ml-4">
                        {{ __('Iniciar Sesion') }}
                    </x-jet-button>
                </div>
            </form>
        </x-jet-authentication-card>
    </div>
</x-guest-layout>
