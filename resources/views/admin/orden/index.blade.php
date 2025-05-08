@extends('adminlte::page')

@section('content')
<div class="card">
    <div class="card-body">
        <a href="/paquete/create" class="btn btn-primary">Ordenes</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>ORIGEN</th>
                    <th>DESTINO</th>
                    <th>PRECIO</th>
                    <th>TAMAÑO/PESO</th>
                    <th>ESTADO</th>
                    <th>F.E. Estimada</th>
                    <th>Entregado en</th>
                    <th>Imagen</th>
                    <th>Usuario</th>
                    <th>ACCION</th>
                </tr>
            </thead>
            <tbody>
                @foreach($ordenes as $p)
                <tr>
                    <td>{{ $p->id }}</td>
                    <td>{{ $p->origen }}</td>
                    <td>{{ $p->destino }}</td>
                    <td>{{ $p->precio }}</td>
                    <td>{{ $p->paquete->tamano }}/{{ $p->paquete->peso }} Kg</td>
                    <td>{{ $p->paquete->estado }}</td>
                    <td>{{ $p->paquete->entrega_estimada }}</td>
                    <td>{{ $p->paquete->entregado_en }}</td>
                    <td>
                        <img src="{{ $p->paquete->imagen }}" alt="" width="100px">
                    </td>
                    <td>{{ $p->paquete->user->name }} - {{ $p->paquete->user->email }}</td>
                    <td>
                        @if(isset($p->orden->id))
                        {{ $p->orden->origen }} -> {{ $p->orden->destino }}
                        @else

                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#paquete{{ $p->id }}">
                            Mostrar Paquete
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="paquete{{ $p->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Paquete: COD-{{$p->id}}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <h5>PESO: {{$p->paquete->peso}} Kg</h5>
                                        <h5>TAMAÑO: {{$p->paquete->tamano}} </h5>
                                        <h3>SEGUIMIENTOS</h3>
                                        <div class="table-responsive">
                                            
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">ESTADO</th>
                                                        <th scope="col">FECHA y HORA</th>
                                                        <th scope="col">UBICACIÓN</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($p->seguimientos as $seg)
                                                    <tr>
                                                        <th scope="row">{{ $seg->id }}</th>
                                                        <td>{{ $seg->estado }}</td>
                                                        <td>{{ $seg->fecha_hora }}</td>
                                                        <td>
                                                            {{ $seg->ubicacion->direccion }} <br>
                                                            {{ $seg->ubicacion->ciudad }}/{{ $seg->ubicacion->pais }} <br>
                                                            {{ $seg->ubicacion->latitud }}/{{ $seg->ubicacion->longitud }} <br>
                                                            
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>

                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @endif
                    </td>
                    <td>
                        <!-- Button trigger modal -->
<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#reg-seg{{$p->id}}">
  Registrar Seguimiento
</button>

<!-- Modal -->
<div class="modal fade" id="reg-seg{{$p->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Registrar Seguimiento</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="/seguimiento" method="post">
        @csrf
        <input type="hidden" value="{{ $p->id }}" name="orden_id">
      <div class="modal-body">
        <label for="">ESTADO</label>
        <select name="estado" id="" class="form-control" name="estado" required>
            <option value="RECOGIDO">RECOGIDO</option>
            <option value="EN TRANSITO">EN TRANSITO</option>
            <option value="RETRAZADO">RETRAZADO</option>
            <option value="CANCELADO">CANCELADO</option>
            <option value="ENTREGADO">ENTREGADO</option>
        </select>
        <label for="">FECHA/HORA</label>
        <input type="datetime-local" name="fecha_hora" class="form-control" required>
      
        <label for="">DIRECCION</label>
        <input type="text" name="direccion" class="form-control" required>
        <label for="">ciudad</label>
        <input type="text" name="ciudad" class="form-control" required>
        <label for="">pais</label>
        <input type="text" name="pais" class="form-control" required>
        <label for="">latitud</label>
        <input type="text" name="latitud" class="form-control" required>
        <label for="">longitud</label>
        <input type="text" name="longitud" class="form-control" required>
                            
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
      </div>
      </form>
    </div>
  </div>
</div>
                        
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>

        {{ $ordenes->links() }}
    </div>

</div>


@endsection