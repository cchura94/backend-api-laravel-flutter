<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Orden;
use App\Models\Seguimiento;
use App\Models\Ubicacion;
use Illuminate\Http\Request;

class SeguimientoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $ubicacion = new Ubicacion();
        $ubicacion->direccion = $request->direccion;
        $ubicacion->ciudad = $request->ciudad;
        $ubicacion->pais = $request->pais;
        $ubicacion->latitud = $request->latitud;
        $ubicacion->longitud = $request->longitud;
        $ubicacion->save();

        $seg = new Seguimiento();
        $seg->ubicacion_id = $ubicacion->id;
        $seg->orden_id = $request->orden_id;
        $seg->estado = $request->estado;
        $seg->fecha_hora = $request->fecha_hora;
        $seg->save();

        $orden = Orden::find($request->orden_id);
        $paquete = $orden->paquete;
        $paquete->estado = $request->estado;
        $paquete->save();

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
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
