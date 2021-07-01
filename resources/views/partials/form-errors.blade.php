@if ($errors->any())

<div class="alert alert-danger" role="alert">
    <p>Verifique los campos del formulario</p>
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
