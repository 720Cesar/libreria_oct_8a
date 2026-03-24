<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

use App\Models\Libro;

class LibroController extends Controller
{
    /**
     * CONSULTA DE INFORMACIÓN
     */
    public function index()
    {
        // Obtener todos los datos de la BD
        $libros = Libro::all();

        // Regresar vista y enviar los datos
        return view('libros.index', compact('libros'));
    }

    /**
     * Mostrar vista para el registro
     */
    public function create()
    {
        return view('libros.create');
    }

    /**
     * GUARDAR INFORMACIÓN EN LA BD
     */
    public function store(Request $request)
    {
        Libro::create([
            'nombre' => $request->nombre,
            'autor' => $request->autor,
            'editorial' => $request->editorial,
            'precio' => $request->precio,
        ]);

        // Enviar al usuario al formulario cuando se han guardado los datos
        return redirect()->route('libros.create');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * CONSULTA POR ID
     */
    public function edit(Libro $libro)
    {
        // Retornar vista con la información del libro
        return view('libros.edit', compact('libro'));   
    }

    /**
     * ACTUALIZAR LIBRO
     */
    public function update(Request $request, Libro $libro)
    {
        // Validar la información que viene del formulario
        $request->validate([
            'nombre' => 'required',
            'autor' => 'required',
            'editorial' => 'required',
            'precio' => 'required',
        ]);

        // Indicar la actualización
        $libro->update($request->all());

        // Regresar al usuario a la consulta con un mensaje
        return redirect()->route('libros.index')
        ->with('success', 'Registro actualizado');
    }

    /**
     * ELIMINAR
     */
    public function destroy(Libro $libro)
    {
        $libro -> delete();

        return redirect()->route('libros.index')
        ->with('success', 'Registro eliminado :D');
    }

    // MÉTODO PARA HOME
    public function home(){

        //* LIBROS DE HISTORIA

        $history = Http::get('https://www.googleapis.com/books/v1/volumes', [
            // Incluir parámetros del manejo de API
            'q' => 'subject:history',
            'maxResults' => 12,
            'key' => config('services.google_books.key'),
        ])->json()['items'] ?? [];
        
        //* LIBROS DE FANTASÍA

        $fantasy = Http::get('https://www.googleapis.com/books/v1/volumes', [
            // Incluir parámetros del manejo de API
            'q' => 'subject:fantasy',
            'maxResults' => 12,
            'key' => config('services.google_books.key'),
        ])->json()['items'] ?? [];

        return view('libros.home', compact('history', 'fantasy'));

    }
}
