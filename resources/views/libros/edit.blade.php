<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
</head>
<body>

@extends('layouts.app')
@section('content')

    <h1>EDITAR LIBRO: {{ $libro->nombre }}</h1>

    <form action="{{ route('libros.update', $libro) }}" method="POST">

        <!-- USO OBLIGATORIO PARA LA ACTUALIZACIÓN -->
        @csrf
        @method('PUT')

        <input required type="text" name="nombre" placeholder="Nombre" value="{{ $libro->nombre }}" class="form-control">
        <br>
        <input required type="text" name="autor" placeholder="Autor" value="{{ $libro->autor }}" class="form-control">
        <br>
        <input required type="text" name="editorial" placeholder="Editorial" value="{{ $libro->editorial }}" class="form-control">
        <br>
        <input required type="number" name="precio" placeholder="Precio" value="{{ $libro->precio }}" class="form-control">
        <br>
        <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> Guardar</button>

    </form>

    <div class="d-flex justify-content-end mb-2">
        <a href="{{ route('libros.index') }}" class="btn btn-danger">
            <i class="fa-solid fa-arrow-left"></i> Regresar
        </a>
    </div>

@endsection
</body>
</html>