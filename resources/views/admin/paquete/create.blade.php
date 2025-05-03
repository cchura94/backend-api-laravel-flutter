


@extends('adminlte::page')

@section('content')
<div class="card">
    <div class="card-body">

        <form action="/paquete" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-4">
                    <label for="origen">TAMAÑO</label>
                    <input type="text" name="tamano" class="form-control">

                </div>
                <div class="col-md-4">
                    <label for="des">PESO</label>
                    <input type="number" name="peso" class="form-control">
                

                </div>
                <div class="col-md-4">
                    <label for="pr">FECHA ENTREGA ESTIMADA</label>
                    <input type="date" name="entrega_estimada" class="form-control">

                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <label for="origen">IMAGEN</label>
                    <input type="file" name="imagen" class="form-control">

                </div>
            </div>
        
            
            <button type="submit" class="btn btn-primary">Guardar Paquete</button>
        </form>
    </div>
</div>

@endsection