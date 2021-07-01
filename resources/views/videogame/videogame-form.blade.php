@extends('home')
@section('contenido')
<!-- layouts.temp -->
<div class="container">
    <div class="text-center">
        <h2 class="section-heading text-uppercase">Formulario de videojuegos</h2>
    </div>

    <p>
        <a href="{{ route('videogame.index') }}"  class="btn btn-dark" role="button">Listado de videojuegos</a>
    </p>

    <!-- Nos devuelve el recuadro con los errores -->
    @include('partials.form-errors')
    
    <!-- Este formulario es llamado desde el metodo edit y desde el create. Cuando lo llamamos desde edit mandamos como parametros a un videojuego (que es el que vamos a editar), pero cuando lo llamamos desde create no le mandamos nada. En dependencia de donde lo estemos llamando es hacia donde  lo vamos a mandar. Entonces, para definir desde donde lo estamos llamando, hacemos el siguiente if -->
    @if(isset($videogame))
        <form action="{{ route('videogame.update', $videogame) }}" method="POST">
            @method('PATCH')
    @else
        <form action="{{ route('videogame.store') }}" method="POST">
    @endif
    <!-- La siguiente linea nos crea un token, imprescindible para que nos permita enviar el formulario (ya que la hace seguro)  -->
        @csrf
        <!-- Si lo llamamos desde edit nos apareceran los datos del videojuego -->
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre:</label>
            <input class="form-control" type="text" name="nombre" id="nombre" value="{{ old('nombre') ?? $videogame->nombre ?? ''}}">

        </div>
        <div class="mb-3">
            <label for="categoria" class="form-label">Categoría:</label>
            <input class="form-control" type="text" name="categoria" id="categoria" value="{{ old('categoria') ?? $videogame->categoria ?? ''}}">
        </div>
        <div class="mb-3">
            <label for="plataforma" class="form-label">Plataforma:</label>
            <input class="form-control" type="text" name="plataforma" id="plataforma" value="{{ old('plataforma') ?? $videogame->plataforma ?? ''}}">
        </div>
        <div class="mb-3">
            <label for="precio" class="form-label">Precio:</label>
            <input class="form-control" type="number" name="precio" id="precio" aria-describedby="precioHelp" value="{{ old('precio') ?? $videogame->precio ?? ''}}">
            <div id="precioHelp" class="form-text">La cantidad debe ser numérica.</div>
        </div>
        <div class="mb-3">
            <label for="portada" class="form-label">Portada:</label>
            <input class="form-control" type="url" name="portada" id="portada" aria-describedby="portadaHelp" value="{{ old('portada') ?? $videogame->portada ?? ''}}">
            <div id="portadaHelp" class="form-text">Se debe introducir la URL completa de la imagen de portada.</div>
        </div>
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción:</label>
            <input class="form-control" type="text" name="descripcion" id="descripcion" value="{{ old('descripcion') ?? $videogame->descripcion ?? ''}}">
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-warning">Guardar videojuego</button>
        </div>
    </form>
</div>
@endsection
