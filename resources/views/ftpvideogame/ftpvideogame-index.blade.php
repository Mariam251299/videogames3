@extends('home')
@section('contenido')

<!-- layouts.temp -->
<div class="container">
    <div class="text-center">
        <h2 class="section-heading text-uppercase">Listado de free to play videojuegos</h2>
    </div>

    @auth
        @if(auth()->user()->tipo=='Administrador')
            <p>
            <a href="{{ route('ftpvideogame.create') }}"  class="btn btn-dark" role="button">Agregar ftp videojuego</a>
            </p>
        @endif
    @endauth
    @if(session('info'))
        <div class="alert alert-success" role="alert">
            {{session('info')}}
        </div>
    @endif
    @if(session('delete'))
        <div class="alert alert-success" role="alert">
            {{session('delete')}}
        </div>
    @endif
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
            <th scope="col">Usuarios</th>
            <th scope="col">Acciones</th>
            </tr>
            </thead>
            <tbody>
                @foreach($ftpvideogames as $ftpvideogame)
                    <tr>
                        <td class="bg-primary">{{ $ftpvideogame->id }}</td>
                        <td>{{ $ftpvideogame->created_at}}</td>
                        <td>{{ $ftpvideogame->updated_at}}</td>
                        <td>{{ $ftpvideogame->nombre}}</a>
                        </td>
                        <td>{{ $ftpvideogame->categoria}}</td>
                        <td>{{ $ftpvideogame->descripcion}}</td>
                        <td><a href="{{ $ftpvideogame->juego }}">Juega</a></td>
                        <td></td>
                        <td>
                            <a href="{{ route('ftpvideogame.show', $ftpvideogame->id) }}" class="btn btn-primary" role="button"><i class="far fa-eye"></i></a>
                            @auth
                                @if(auth()->user()->tipo=='Administrador')
                                    <a href="{{ route('ftpvideogame.edit', $ftpvideogame) }} " role="button" class="btn btn-success"><i class="fas fa-edit"></i></a>
                                @endif
                            @endauth

                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
