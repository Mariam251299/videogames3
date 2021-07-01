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
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">Usuarios de este ftp videogame</h5>
            <p class="card-text">
                <ul>
                    @foreach($ftpvideogame->users as $user)
                        <li>{{$user->name}}</li>
                    @endforeach
                </ul>

            </p>

        </div>
    </div>
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">Agregar usuarios</h5>
            <p class="card-text">
            <form action="{{route('ftpvideogame.agrega-usuario', $ftpvideogame)}}" method="POST">
            @csrf
                <select class="form-select" aria-label="Default select example" name="user_id[]" multiple>
                    @foreach($users as $user)
                        <option value="{{ $user->id}}" {{array_search($user->id, $ftpvideogame->users->pluck('id')->toArray()) !== false ? 'selected' : ''}}>{{ $user->name }}</option>
                    @endforeach
                </select>

                <button type="submit" class="btn btn-danger">Actualizar usuarios</button>
            </form>
            </p>

        </div>
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
