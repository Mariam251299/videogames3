@extends('home')
@section('contenido')
<!-- layouts.temp -->
<div class="container">
    <div class="text-center">
        <h2 class="section-heading text-uppercase">Formulario de Free to play videogames</h2>
    </div>

    <p>
        <a href="{{ route('ftpvideogame.index') }}"  class="btn btn-dark" role="button">Listado de Free to play videojuegos</a>
    </p>

    <!-- Nos devuelve el recuadro con los errores -->
    @include('partials.form-errors')

    <!-- Este formulario es llamado desde el metodo edit y desde el create. Cuando lo llamamos desde edit mandamos como parametros a un videojuego (que es el que vamos a editar), pero cuando lo llamamos desde create no le mandamos nada. En dependencia de donde lo estemos llamando es hacia donde  lo vamos a mandar. Entonces, para definir desde donde lo estamos llamando, hacemos el siguiente if -->
    @if(isset($ftpvideogame))
        <form action="{{ route('ftpvideogame.update', $ftpvideogame) }}" method="POST">
            @method('PATCH')
    @else
        <form action="{{ route('ftpvideogame.store') }}" method="POST">
    @endif
    <!-- La siguiente linea nos crea un token, imprescindible para que nos permita enviar el formulario (ya que la hace seguro)  -->
        @csrf
        <!-- Si lo llamamos desde edit nos apareceran los datos del videojuego -->
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre:</label>
            <input class="form-control" type="text" name="nombre" id="nombre" value="{{ old('nombre') ?? $ftpvideogame->nombre ?? ''}}">

        </div>
        <div class="mb-3">
            <label for="categoria" class="form-label">Categoría:</label>
            <input class="form-control" type="text" name="categoria" id="categoria" value="{{ old('categoria') ?? $ftpvideogame->categoria ?? ''}}">
        </div>
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción:</label>
            <input class="form-control" type="text" name="descripcion" id="descripcion" value="{{ old('descripcion') ?? $ftpvideogame->descripcion ?? ''}}">
        </div>
        <div class="mb-3">
            <label for="juego" class="form-label">Link del juego:</label>
            <input class="form-control"  type="url" name="juego" id="juego" aria-describedby="linkHelp" value="{{ old('juego') ?? $ftpvideogame->juego ?? ''}}">
            <div id="linkHelp" class="form-text">Se debe introducir la URL completa del juego.</div>
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-warning">Guardar videojuego</button>
        </div>
    </form>
</div>
@endsection
