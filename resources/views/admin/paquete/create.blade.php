
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">

<form action="/paquete" method="post">
    @csrf
    <label for="origen">TAMAÑO</label>
    <input type="text" name="tamano" class="form-control">

    <label for="des">PESO</label>
    <input type="number" name="peso" class="form-control">

    <label for="pr">FECHA ENTREGA ESTIMADA</label>
    <input type="date" name="entrega_estimada" class="form-control">
    

    <button type="button" class="btn btn-secondary">Cerrar</button>
    <button type="submit" class="btn btn-primary">Guardar Paquete</button>
</form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>