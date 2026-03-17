<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta</title>
</head>
<body>
    
    @extends('layouts.app')

    @section('content')

    <h1>VER LIBROS</h1>
    <br>

    <div class="d-flex  justify-content-end mb-2">
        <a href="{{ route('libros.create') }}" class="btn btn-success me-3 mb-3">
            <i class="fa-solid fa-plus"></i> Nuevo libro
        </a>
        <form action="{{ route('cerrar') }}" method="POST">
             @csrf
             <button class="btn btn-danger me-3"> Cerrar sesión </button>
        </form>
        <!-- Verificar si la sesión está activa  -->
        @if(auth()->user()->is_admin)
            <a href="{{ route('libros.create') }}" class="btn btn-secondary me-3 mb-3">
                <i class="fa-solid fa-shield"></i> Panel Admin
             </a>
        @endif
    </div>

    @include('partials.alerts')

    <table class="table table-striped table-hover">

        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>NOMBRE</th>
                <th>AUTOR</th>
                <th>EDITORIAL</th>
                <th>PRECIO</th>
                <th>ACCIONES</th>
            </tr>
        </thead>
        <tbody>

            <!-- Ciclo para recorrer los datos del modelo -->
            @foreach ($libros as $libro)

                <tr>
                    <td> {{ $libro->id }} </td>
                    <td> {{ $libro->nombre }} </td>
                    <td> {{ $libro->autor }} </td>
                    <td> {{ $libro->editorial }} </td>
                    <td> {{ $libro->precio }} </td>
                    <td>
                        <a href="{{ route('libros.edit', $libro) }}">
                            <button class="btn btn-warning"> <i class="fa-solid fa-pen-to-square"></i> </button>
                        </a>
                        <form action="{{ route('libros.destroy', $libro) }}" method="POST" class="d-inline">
                            @csrf
                            
                            <button 
                            class="btn btn-danger"
                            onclick="return confirm('¿Eliminar el registro?')"> 
                            <i class="fa-solid fa-trash"></i> </button>

                        </form>
                    </td>
                </tr>

            @endforeach

        </tbody>

    </table>

    @endsection
</body>
</html>