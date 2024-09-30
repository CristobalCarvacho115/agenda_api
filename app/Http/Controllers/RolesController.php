<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Rol::orderBy('id_rol')->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rol = new Rol();
        $rol->id_rol = $request->id_rol;
        $rol->nombre_rol = $request->nombre_rol;
        $rol->save();
        return $rol;
    }

    /**
     * Display the specified resource.
     */
    public function show($id_rol)
    {
        $rol = Rol::where('id_rol', $id_rol)->first();

        if (!$rol) {
            return response()->json(['error' => 'Rol no encontrado'], 404);
        }

        return $rol;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id_rol)
    {
        $rol = Rol::where('id_rol', $id_rol)->first();

        if (!$rol) {
            return response()->json(['error' => 'Rol no encontrado'], 404);
        }

        $rol->nombre_rol = $request->nombre_rol;
        $rol->save();
        return $rol;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id_rol)
    {
        $rol = Rol::where('id_rol',$id_rol);
        if (!$rol) {
            return response()->json(['error' => 'Rol no encontrado.'], 404);
        }

        return $rol->delete();
    }
}
