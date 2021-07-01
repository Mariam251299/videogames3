<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Play Station</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href=" {{ asset('plantilla/assets/icons8-play-station.svg') }}" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{ asset('plantilla/css/styles.css') }}" rel="stylesheet" />
    </head>
    <body id="page-top">

        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            @include('layouts.navegacion')
        </nav>

        <!-- Portada -->
        <header class="masthead" style="background-image: url('{{asset('plantilla/assets/img/bg.jpg')}}')">
            @include('layouts.portada')
        </header>

        <section class="page-section" id="services">
            @yield('contenido')
        </section>
        @guest
            <!-- Servicios-->
            <section class="page-section" id="services">
                @include('layouts.services')
            </section>
        @endguest
        <!-- Noticias-->
        <section class="page-section bg-light" id="portfolio">
            @include('layouts.portfolio')
        </section>

        @guest
            <!-- Conocenos-->
            <section class="page-section" id="about">
                @include('layouts.about')
            </section>
            <!-- Nuestro equipo -->
            <section class="page-section bg-light" id="team">
            @include('layouts.team')
            </section>
            <!-- Clients-->
            <div class="py-5">
                @include('layouts.clients')
            </div>
            <!-- Contact-->
            <section class="page-section" id="contact">
                @include('layouts.contact')
            </section>
        @endguest
        <!-- Footer-->
        <footer class="footer py-4">
            @include('layouts.footer')
        </footer>
        <!-- Portfolio Information-->
            @include('layouts.portfolioInformation')


        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{asset('plantilla/js/scripts.js')}}"></script>
    </body>
</html>
