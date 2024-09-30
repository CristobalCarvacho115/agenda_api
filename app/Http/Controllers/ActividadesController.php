<?php

namespace App\Http\Controllers;

use App\Models\Actividad;
use Illuminate\Http\Request;

class ActividadesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Actividad::orderBy('id_actividad')->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $actividad = new Actividad();
        $actividad->id_usuario = $request->id_usuario;
        $actividad->nombre_actividad = $request->nombre_actividad;
        $actividad->descripcion = $request->descripcion;
        $actividad->color = $request->color;
        $actividad->fecha_hora_inicio = $request->fecha_hora_inicio;
        $actividad->fecha_hora_termino = $request->fecha_hora_termino;
        $actividad->recordatorio= $request->recoradtorio;
        $actividad->save();
        return $actividad;
    }

    /**
     * Display the specified resource.
     */
    public function show($id_actividad)
    {
        $actividad = Actividad::where('id_actividad', $id_actividad)->first();

        if (!$actividad) {
            return response()->json(['error' => 'Actividad no encontrada'], 404);
        }

        return $actividad;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id_actividad)
    {
        $actividad = Actividad::where('id_actividad', $id_actividad)->first();

        if (!$actividad) {
            return response()->json(['error' => 'Actividad no encontrada'], 404);
        }

        $actividad->nombre_actividad = $request->nombre_actividad;
        $actividad->descripcion = $request->descripcion;
        $actividad->color = $request->color;
        $actividad->fecha_hora_inicio = $request->fecha_hora_inicio;
        $actividad->fecha_hora_termino = $request->fecha_hora_termino;
        $actividad->recordatorio= $request->recoradtorio;
        $actividad->save();
        return $actividad;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id_actividad)
    {
        $actividad = Actividad::where('id_actividad',$id_actividad);
        if (!$actividad) {
            return response()->json(['error' => 'Actividad no encontrada.'], 404);
        }

        $actividad->delete();
    }
}
