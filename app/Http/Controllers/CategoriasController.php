<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Categoria::orderBy('nombre_categoria')->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $categoria= new Categoria();
        $categoria->nombre_categoria = $request->nombre_categoria;
        $categoria->color = $request->color;
        $categoria->save();
        return $categoria;
    }

    /**
     * Display the specified resource.
     */
    public function show($id_categoria)
    {
        $categoria = Categoria::where('id_categoria', $id_categoria)->first();

        if (!$categoria) {
            return response()->json(['error' => 'Categoria no encontrada'], 404);
        }

        return $categoria;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $categoria)
    {
        $categoria = Categoria::where('id_categoria', $id_categoria)->first();

        if (!$categoria) {
            return response()->json(['error' => 'Categoria no encontrada'], 404);
        }

        $categoria->nombre_categoria = $request->nombre_categoria;
        $categoria->color = $request->color;
        $categoria->save();
        return $categoria;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id_categoria)
    {
        $categoria = Categoria::where('id_categoria',$id_categoria);
        if (!$categoria) {
            return response()->json(['error' => 'Categoria no encontrada.'], 404);
        }

        return $categoria->delete();
    }
}
