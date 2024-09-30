<?php

namespace App\Http\Controllers;

use App\Models\Fondo;
use Illuminate\Http\Request;

class FondosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Fondo::orderBy('id_fondo')->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fondo = new Fondo();
        $fondo->imagen = $request->imagen;
        $fondo->fondo_plus = $request->fondo_plus;
        $fondo->save();
        return $fondo;
    }

    /**
     * Display the specified resource.
     */
    public function show(Fondo $fondo)
    {
        return $fondo;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Fondo $fondo)
    {
        $fondo->imagen = $request->imagen;
        $fondo->fondo_plus = $request->fondo_plus;
        $fondo->save();
        return $fondo;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id_fondo)
    {
        $fondo = Fondo::where('id_fondo',$id_fondo);
        if (!$fondo) {
            return response()->json(['error' => 'Fondo no encontrada.'], 404);
        }

        return $fondo->delete();
    }
}
