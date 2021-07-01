<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Recuperar contraseña</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- MATERIAL DESIGN ICONIC FONT -->
		<link rel="stylesheet" href="{{asset('registerPlantilla/fonts/material-design-iconic-font/css/material-design-iconic-font.min.css')}}">

		<!-- STYLE CSS -->
		<link rel="stylesheet" href="{{asset('registerPlantilla/css/style.css')}}">

        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{ asset('plantilla/css/styles.css') }}" rel="stylesheet" />
	</head>

	<body>

		<div class="wrapper" style="background-image: url('{{asset('registerPlantilla/images/backPink.jpg')}}');">

			<div class="inner">
				<div class="image-holder">
					<img src="{{asset('registerPlantilla/images/image.jpg')}}" alt="">
				</div>

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

					<h3>¿Olvidaste la contraseña?</h3>
                    @include('partials.form-errors')
					<div class="form-wrapper">
                        <label for="email"  value="{{ __('Email') }}"></label>
						<input type="email" placeholder="Email Address" class="form-control" id="email" name="email" value="{{old('email')}}" required autofocus>
						<i class="zmdi zmdi-email"></i>
					</div>

                    <br>

                    <button class="btn btn-dark">
                        {{ __('Email Password Reset Link') }}
					</button>
                    </div>

				</form>
			</div>
		</div>

	</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>

<!-- <x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="block">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-jet-button>
                    {{ __('Email Password Reset Link') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout> -->
