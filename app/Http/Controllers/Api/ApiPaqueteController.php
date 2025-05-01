<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Paquete;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApiPaqueteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $paquetes = Paquete::with(['user', 'orden'])->get();
        return response()->json($paquetes, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $paquete = new Paquete();
        $paquete->tamano = $request->tamano;
        $paquete->peso = $request->peso;
        $paquete->entrega_estimada = $request->entrega_estimada;
        $paquete->user_id = Auth::id();
        $paquete->save();

        return response()->json(["mensaje" => "Paquete registrado correctamente"]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
