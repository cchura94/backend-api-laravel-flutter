@extends('adminlte::page')

@section('content')

<form action="/paquete/{{ $id }}/orden" method="post">
    @csrf
    <div class="modal-body">
        <label for="origen">ORIGEN</label>
        <input type="text" name="origen" class="form-control">

        <label for="des">Destino</label>
        <input type="text" name="destino" class="form-control">

        <label for="pr">PRECIO</label>
        <input type="text" name="precio" class="form-control">
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar Orden</button>
    </div>
</form>

@endsection