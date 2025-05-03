
@extends('adminlte::page')

@section('content')
<div class="card">
    <div class="card-body">
        <a href="/paquete/create" class="btn btn-primary">Nuevo Paquete</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>TAMAÑO/PESO</th>
                    <th>ESTADO</th>
                    <th>F.E. Estimada</th>
                    <th>Entregado en</th>
                    <th>Imagen</th>
                    <th>Usuario</th>
                    <th>Orden</th>
                    <th>ACCION</th>
                </tr>
            </thead>
            <tbody>
                @foreach($paquetes as $p)
                <tr>
                    <td>{{ $p->id }}</td>
                    <td>{{ $p->tamano }}/{{ $p->peso }} Kg</td>
                    <td>{{ $p->estado }}</td>
                    <td>{{ $p->entrega_estimada }}</td>
                    <td>{{ $p->entregado_en }}</td>
                    <td>
                        <img src="{{ $p->imagen }}" alt="" width="100px">
                    </td>
                    <td>{{ $p->user->name }} - {{ $p->user->email }}</td>
                    <td>
                        @if(isset($p->orden->id))
                        {{ $p->orden->origen }} -> {{ $p->orden->destino }}
                        @else
                        <a class="btn btn-primary" href="/paquete/{{$p->id}}/orden">Crear Orden</a>
                       <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $p->id }}">
                            Crear Orden
                        </button>
-->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Nueva Orden</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="/orden" method="post">
                                        @csrf
                                    <div class="modal-body">
                                        <label for="origen">ORIGEN</label>
                                        <input type="text" name="origen" class="form-control">
                                        
                                        <label for="des">Destino</label>
                                        <input type="text" name="destino" class="form-control">
                        
                                        <label for="pr">PRECIO</label>
                                        <input type="text" name="precio" class="form-control">
                                        <input type="hidden" value="{{ $p->id }}" name="paquete_id">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                        <button type="submit" class="btn btn-primary">Guardar Orden</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endif
                    </td>
                    <td><a href="/paquete/editar">editar</a></td>
        
                </tr>
                @endforeach
            </tbody>
        </table>

        {{ $paquetes->links() }}
    </div>

</div>


@endsection

