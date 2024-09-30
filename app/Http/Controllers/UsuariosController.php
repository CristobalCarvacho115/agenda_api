<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Usuario::orderBy('id_usuario')->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $usuario = new Usuario();
        $usuario->nombre_usuario = $request->nombre_usuario;
        $usuario->correo = $request->correo;
        $usuario->password = Hash::make($request->password);
        $usuario->plus = false;
        $usuario->id_fondo = 1;
        $usuario->id_rol = 2;
        $usuario->save();
        return $usuario;
    }

    /**
     * Display the specified resource.
     */
    public function show(Usuario $usuario)
    {
        return $usuario;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Usuario $usuario)
    {
        $usuario->nombre_usuario = $request->nombre_usuario;
        $usuario->id_fondo = 1;
        $usuario->save();
        return $usuario;
    }
    //Cambiar contrasena
    public function password(Request $request, Usuario $usuario)
    {
        $usuario->password = Hash::make($request->password);
        return $usuario;
    }
    //Actualizar a version plus - Compra de plus
    public function plus(Request $request, Usuario $usuario)
    {
        $usuario->plus = true;
        return $usuario;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Usuario $usuario)
    {
        return $usuario->delete();
    }
}
