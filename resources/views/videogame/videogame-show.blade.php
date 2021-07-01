@extends('home')
@section('contenido')

<div class="container">
    <div class="text-center">
        <h2 class="section-heading text-uppercase">Detalle del videojuego</h2>
    </div>


    <p>
        <a href="{{ route('videogame.index') }}"  class="btn btn-dark" role="button">Listado de videojuegos</a>
    </p>
    <div class="table-responsive table-responsive-xl">
        <table class="table">
            <thead class="thead-dark">
            <tr>
            <th scope="col">ID</th>
            <th scope="col">Created at</th>
            <th scope="col">Updated at</th>
            <th scope="col">Nombre</th>
            <th scope="col">Categoría</th>
            <th scope="col">Plataforma</th>
            <th scope="col">Precio</th>
            <th scope="col">Portada</th>
            <th scope="col">Descripción</th>
            <th scope="col">Usuario</th>
            </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="bg-primary">{{ $videogame->id }}</td>
                    <td>{{ $videogame->created_at}}</td>
                    <td>{{ $videogame->updated_at}}</td>
                    <td>{{ $videogame->nombre}}</td>
                    <td>{{ $videogame->categoria}}</td>
                    <td>{{ $videogame->plataforma}}</td>
                    <td>${{ $videogame->precio}}</td>
                    <td><img src="{{ $videogame->portada}}" class="img-fluid" alt="Responsive image"></td>
                    <td>{{ $videogame->descripcion}}</td>
                    <td>{{ $videogame->user->name}}</td>
                </tr>
            </tbody>
        </table>
    </div>

    @can('delete', $videogame)
        <form action="{{ route('videogame.destroy', $videogame) }}" method="POST">
            @csrf
            @method('DELETE')
            <!-- <input type="submit" value="Eliminar videojuego"> -->
            <button type="submit" class="btn btn-danger"><i class="far fa-trash-alt"></i> Eliminar videojuego</button>
        </form>
    @endcan


    @auth
        @if(auth()->user()->tipo=='Cliente')
            <form action="" method="">
                @csrf
                <button type="submit" class="btn btn-success"><i class="fas fa-shopping-cart"></i> Comprar videojuego</button>
            </form>
        @endif
    @endauth
</div>
@endsection
