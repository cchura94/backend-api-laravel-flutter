<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Orden;
use App\Models\Paquete;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaqueteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $paquetes = Paquete::orderBy('id', 'desc')->paginate(10);

        return view("admin.paquete.index", compact('paquetes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.paquete.create");

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "tamano" => "required",
            "peso" => "required",
        ]);

        

        $paquete = new Paquete();
        $paquete->tamano = $request->tamano;
        $paquete->peso = $request->peso;
        $paquete->entrega_estimada = $request->entrega_estimada;
        $paquete->user_id = Auth::user()->id;

        if($file = $request->file("imagen")){
            $direccion_url = time() . "-" . $file->getClientOriginalName();
            $file->move("imagenes", $direccion_url);

            $paquete->imagen = "imagenes/".$direccion_url;
        } 

        $paquete->save();

        return redirect("/paquete");

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

    public function funNuevaOrden($id){

        return view("admin.paquete.orden_create", ["id" => $id]);
        
        
    }

    public function funguardarOrden($id, Request $request){
        $orden = new Orden();
        $orden->origen = $request->origen;
        $orden->destino = $request->destino;
        $orden->precio = $request->precio;
        $orden->paquete_id = $id;
        $orden->save();

        return redirect("/paquete");
    }
    
}
