<?php

namespace App\Http\Controllers;

use App\Models\Pago;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PagosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Pago::orderBy('id_pago')->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $pago = new Pago();
        $pago->id_usuario = $request->id_usuario;
        $pago->fecha_compra = $Carbon::now()->format('Y-m-d H:i:s');
        $pago->save();
        return $pago;
    }

    /**
     * Display the specified resource.
     */
    public function show(Pago $pago)
    {
        return $pago;
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, Pago $pago)
    // {
    //     //
    // }

    /**
     * Remove the specified resource from storage.
     */
//     public function destroy($id_pago)
//     {
//         $pago = Pago::where('id_pago',$id_pago);
//         if (!$pago) {
//             return response()->json(['error' => 'Pago no encontrada.'], 404);
//         }

//         return $pago->delete();
//     }
}
