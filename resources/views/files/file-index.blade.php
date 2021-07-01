@extends('home')
@section('contenido')

<!-- layouts.temp -->
<div class="container">
    <div class="text-center">
        <h2 class="section-heading text-uppercase">Listado archivos</h2>
    </div>
    <div class="container">
        <!-- Nos devuelve el recuadro con los errores -->
        @include('partials.form-errors')

        <form action="{{ route('file.store') }}" method="POST" enctype="multipart/form-data">
        <!-- La siguiente linea nos crea un token, imprescindible para que nos permita enviar el formulario (ya que la hace seguro)  -->
            @csrf
            <div class="mb-3">
                <label for="file" class="form-label">Seleccione el archivo a cargar:</label>
                <input class="form-control" type="file" name="file" id="file">
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-warning">Cargar</button>
            </div>
        </form>
    </div>

    <div class="table-responsive table-responsive-xl">
        <table class="table">
            <thead class="thead-dark">
            <tr>
            <th scope="col">Nombre del archivo</th>
            <th scope="col">Acciones</th>
            </tr>
            </thead>
            <tbody>
                @foreach($files as $file)
                    <tr>
                        <td>{{ $file->nombre_original}}</td>
                        <td>
                            <a href="{{ route('file.download', $file) }} " role="button" class="btn btn-success"><i class="fas fa-file-download"></i>Descargar</a>
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

