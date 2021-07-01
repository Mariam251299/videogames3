@extends('home')
@section('contenido')

<!-- layouts.temp -->
<div class="container">
    <div class="text-center">
        <h2 class="section-heading text-uppercase">Listado de videojuegos</h2>
    </div>

    <!-- verificamos que la persona este registrada y que lo este haciendo desde una cuenta de adminsitrador -->
    @auth
        @if(auth()->user()->tipo=='Administrador')
            <p><a href= {{ route('videogame.create') }} class="btn btn-dark" role="button">Agregar Videojuego</a></p>
        @endif
    @endauth



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
            <th scope="col">Acciones</th>
            </tr>
            </thead>
            <tbody>
                @foreach($videogames as $videogame)
                    <tr>
                        <td class="bg-primary">{{ $videogame->id }}</td>
                        <td>{{ $videogame->created_at}}</td>
                        <td>{{ $videogame->updated_at}}</td>
                        <td>{{ $videogame->nombre}}</a>
                        </td>
                        <td>{{ $videogame->categoria}}</td>
                        <td>{{ $videogame->plataforma}}</td>
                        <td>${{ $videogame->precio}}</td>
                        <td><img src="{{ $videogame->portada}}" class="img-fluid" alt="Responsive image"></td>
                        <td>{{ $videogame->descripcion}}</td>
                        <td>{{ $videogame->user->name}}</td>
                        <td>
                            <a href="{{ route('videogame.show', $videogame->id) }}" class="btn btn-primary" role="button"><i class="far fa-eye"></i></a>
                            <!-- verificamos que la persona este registrada y que lo este haciendo desde una cuenta de adminsitrador -->
                            @auth
                                @if(auth()->user()->tipo=='Administrador')
                                    <a href="{{ route('videogame.edit', $videogame) }} " role="button" class="btn btn-success"><i class="fas fa-edit"></i></a>
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

