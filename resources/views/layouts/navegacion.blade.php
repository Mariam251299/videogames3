<div class="container">
    <a class="navbar-brand" href="#page-top"><img src="{{asset('plantilla/assets/img/logoPlayStation.png')}}" alt="..." /></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars ms-1"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">



            @auth
            <li class="nav-item"><a class="nav-link" href="{{ route('videogame.index') }}">Videojuegos</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('ftpvideogame.index') }}">Free to Play Videojuegos</a></li>

            @if(auth()->user()->tipo=='Cliente')
                <li class="nav-item"><a class="nav-link" href="{{ route('file.index') }}">Agregar recomendaciones</a></li>
            @else
                <li class="nav-item"><a class="nav-link" href="{{ route('file.index') }}">Ver recomendaciones</a></li>
            @endif


            <li class="nav-item"><a class="nav-link" href="#portfolio">Noticias</a></li>
            <li class="nav-item">
                @csrf
                <form action="{{route('logout')}}" method="POST">
                    @csrf
                    <a class="nav-link" href="#" onclick="event.preventDefault(); this.closest('form').submit();">Log Out</a>
                </form>
            </li>
            @endauth

            @guest
                <li class="nav-item"><a class="nav-link" href="#services">Servicios</a></li>
                <li class="nav-item"><a class="nav-link" href="#portfolio">Noticias</a></li>
                <li class="nav-item"><a class="nav-link" href="#about">Conócenos</a></li>
                <li class="nav-item"><a class="nav-link" href="#team">Nuestro equipo</a></li>
                <li class="nav-item"><a class="nav-link" href="#contact">Contacto</a></li>
                <li class="nav-item"><a href="{{ route('login') }}" class="nav-link">Log in</a></li>
                <li class="nav-item"><a href="{{ route('register') }}" class="nav-link">Register</a></li>
            @endguest

        </ul>
    </div>
</div>
