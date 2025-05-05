<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Orden;
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
        $paquetes = Paquete::with(['user', 'orden.seguimientos.ubicacion'])->orderBy('id', 'desc')->get();
        return response()->json($paquetes, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "tamano" => "required",
            "peso" => "required",
            "origen" => "required",
            "destino" => "required",
            "precio" => "required",
        ]);

        $paquete = new Paquete();
        $paquete->tamano = $request->tamano;
        $paquete->peso = $request->peso;
        $paquete->entrega_estimada = $request->entrega_estimada;
        $paquete->user_id = $request->user()->id;

        // imagen
        if($file = $request->file("imagen")){
            $direccion_url = time() . "-" . $file->getClientOriginalName();
            $file->move("imagenes", $direccion_url);

            $paquete->imagen = "imagenes/".$direccion_url;
        } 

        $paquete->save();

        $orden = new Orden();
        $orden->origen = $request->origen;
        $orden->destino = $request->destino;
        $orden->precio = $request->precio;
        $orden->paquete_id = $paquete->id;
        $orden->save();

        return response()->json(["mensaje" => "Paquete y orden creado registrado correctamente"]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $paquete = Paquete::with(['user', 'orden.seguimientos.ubicacion'])->find($id);

        return response()->json($paquete, 200);
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
