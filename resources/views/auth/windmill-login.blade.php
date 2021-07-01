<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Ingresar</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- MATERIAL DESIGN ICONIC FONT -->
		<link rel="stylesheet" href="{{asset('registerPlantilla/fonts/material-design-iconic-font/css/material-design-iconic-font.min.css')}}">

		<!-- STYLE CSS -->
		<link rel="stylesheet" href="{{asset('registerPlantilla/css/style.css')}}">

        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{ asset('plantilla/css/styles.css') }}" rel="stylesheet" />
	</head>

	<body>

		<div class="wrapper" style="background-image: url('{{asset('registerPlantilla/images/backBlack.jpg')}}');">

			<div class="inner">
				<div class="image-holder">
					<img src="{{asset('registerPlantilla/images/image.jpg')}}" alt="">
				</div>

				<form method="POST" action="{{ route('login') }}">
                    @csrf

					<h3>Ingresar</h3>
                    @include('partials.form-errors')
					<div class="form-wrapper">
                        <label for="email"  value="{{ __('Email') }}"></label>
						<input type="email" placeholder="Email Address" class="form-control" id="email" name="email" value="{{old('email')}}" required autofocus>
						<i class="zmdi zmdi-email"></i>
					</div>
					<div class="form-wrapper">
                        <label for="password"  value="{{ __('Password') }}"></label>
						<input type="password" placeholder="Contraseña" class="form-control" id="password" name="password" required autocomplete="current-password>
						<i class="zmdi zmdi-lock"></i>
					</div>
                    <div class="form-wrapper">
                        <label for="remember_me">
                            <input class="form-check-input" type="checkbox" id="remember_me" name="remember_me">
                            <span>{{ __('Remember me') }}</span>
                        </label>
                    </div>
                    <br>
                    <div class="form-wrapper">
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif
                    <br>
                    <br>
                    <button>
                        {{ __('Log in') }}
					</button>
                    </div>

				</form>
			</div>
		</div>

	</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>
