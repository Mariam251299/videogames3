<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Registro</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- MATERIAL DESIGN ICONIC FONT -->
		<link rel="stylesheet" href="{{asset('registerPlantilla/fonts/material-design-iconic-font/css/material-design-iconic-font.min.css')}}">

		<!-- STYLE CSS -->
		<link rel="stylesheet" href="{{asset('registerPlantilla/css/style.css')}}">

        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{ asset('plantilla/css/styles.css') }}" rel="stylesheet" />
	</head>

	<body>

		<div class="wrapper" style="background-image: url('{{asset('registerPlantilla/images/fondo.jpg')}}');">

			<div class="inner">
				<div class="image-holder">
					<img src="{{asset('registerPlantilla/images/image.jpg')}}" alt="">
				</div>

				<form method="POST" action="{{ route('register') }}">
                    @csrf

					<h3>Registro</h3>
                    @include('partials.form-errors')
					<div class="form-wrapper">
                        <label for="name"  value="{{ __('Name') }}"></label>
						<input type="text" placeholder="Nombre" class="form-control" id="name" name="name" value="{{old('name')}}" required autofocus autocomplete="name">
						<i class="zmdi zmdi-account"></i>
					</div>
					<div class="form-wrapper">
                        <label for="email"  value="{{ __('Email') }}"></label>
						<input type="email" placeholder="Email Address" class="form-control" id="email" name="email" value="{{old('email')}}" required>
						<i class="zmdi zmdi-email"></i>
					</div>
					<div class="form-wrapper">
                        <input class="form-check-input" type="radio" name="tipo" value="Administrador" id="tipo">
                        <label class="form-check-label" for="tipo">Administrador</label>

                        <input class="form-check-input" type="radio" name="tipo" value="Cliente" id="tipo">
                        <label class="form-check-label" for="tipo">Cliente</label>

					</div>
					<div class="form-wrapper">
                        <label for="password"  value="{{ __('Password') }}"></label>
						<input type="password" placeholder="Contraseña" class="form-control" id="password" name="password" required autocomplete="new-password>
						<i class="zmdi zmdi-lock"></i>
					</div>
					<div class="form-wrapper">
                        <label for="password_confirmation"  value="{{ __('Confirm Password') }}"></label>
						<input type="password" placeholder="Confirmar contraseña" class="form-control" id="password_confirmation" name="password_confirmation" required autocomplete="new-password">
						<i class="zmdi zmdi-lock"></i>
					</div>

                    <br>
					<button>{{ __('Register') }}
						<i class="zmdi zmdi-arrow-right"></i>
					</button>

                    <div>
                        <br>
                        <a href="{{ route('login') }}">{{ __('Already registered?') }}</a>
                    </div>

				</form>
			</div>
		</div>

	</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>
