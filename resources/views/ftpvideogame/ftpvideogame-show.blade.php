@extends('home')
@section('contenido')

<div class="container">
    <div class="text-center">
        <h2 class="section-heading text-uppercase">Detalle del ftp videojuego</h2>
    </div>


    <p>
        <a href="{{ route('ftpvideogame.index') }}"  class="btn btn-dark" role="button">Listado de ftp videojuegos</a>
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
            <th scope="col">Descripción</th>
            <th scope="col">Juego</th>
            </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="bg-primary">{{ $ftpvideogame->id }}</td>
                    <td>{{ $ftpvideogame->created_at}}</td>
                    <td>{{ $ftpvideogame->updated_at}}</td>
                    <td>{{ $ftpvideogame->nombre}}</a>
                    </td>
                    <td>{{ $ftpvideogame->categoria}}</td>
                    <td>{{ $ftpvideogame->descripcion}}</td>
                    <td>{{ $ftpvideogame->juego}}</td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>

    @auth
        @if(auth()->user()->tipo=='Administrador')
        <form action="{{ route('ftpvideogame.destroy', $ftpvideogame) }}" method="POST">
            @csrf
            @method('DELETE')
            <!-- <input type="submit" value="Eliminar videojuego"> -->
            <button type="submit" class="btn btn-danger"><i class="far fa-trash-alt"></i> Eliminar ftp videojuego</button>
        </form>
        @endif
    @endauth

</div>
@endsection
