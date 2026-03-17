<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
</head>
<body>

    <!-- Usar todos los elementos del layout -->
    @extends('layouts.app')

    @section('content')

    <h1>REGISTRAR LIBRO</h1>
    <br>

    <form action="{{ route('libros.store') }}" method="POST">
        <!-- USO obligatorio para enviar info en formularios-->
        @csrf

        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-book"></i></span>
            <input type="text" name="nombre" placeholder="Nombre" class="form-control">
        </div>
        
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-user"></i></span>
            <input type="text" name="autor" placeholder="Autor" class="form-control">
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-pen"></i></span>
            <input type="text" name="editorial" placeholder="Editorial" class="form-control">
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-dollar-sign"></i></span>
            <input type="number" name="precio" placeholder="Precio" class="form-control">
        </div>
        
        <br><br>

        <button type="submit" class="btn btn-outline-primary"><i class="fa-solid fa-floppy-disk"></i> Guardar</button>

    </form>
    @endsection
</body>
</html>