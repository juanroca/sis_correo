<!-- Datos del funcionario para ver en el modal -->
<div class="container-fluid">
    <table>
        <thead class="table-success">
            <tr>
                <th>ID</th>
                <td><?php echo $documento['id_documento']; ?></td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th>Fecha de Recepción</th>
                <td><?php echo $documento['fecha_recibido']; ?></td>
            </tr>
            <tr>
                <th>TIPO</th>
                <td><?php echo $documento['tipo']; ?></td>
            </tr>
            <tr>
                <th>ORIGEN</th>
                <td><?php echo $documento['origen']; ?></td>
            </tr>
            <tr>
                <th>REFERENCIA</th>
                <td><?php echo $documento['referencia']; ?></td>
            </tr>
            <tr>
                <th>FECHA DOCUMENTO</th>
                <td><?php echo $documento['fecha_doc']; ?></td>
            </tr>
            <tr>
                <th>PAGINAS</th>
                <td><?php echo $documento['cant_pag']; ?></td>
            </tr>
            <tr>
                <th>SITUACIÓN</th>
                <td><?php echo $documento['situa']; ?></td>
            </tr>
            <tr>
                <th>OBSERVACIONES</th>
                <td><?php echo $documento['obs']; ?></td>
            </tr>

        </tbody>

    </table>
</div>
<div class="container px-4">
    <div class="row gx-5">
        <div class="text-center col-6">
            <button type="button" class="btn btn-primary btn-lg" data-dismiss="modal">CERRAR</button>
        </div>
        <div class="text-center col-6">
            <button class="btn btn btn-warning btn-lg" onclick="MEliDocumento(<?php echo $documento['id_documento']; ?>);">OFICIAR</button>            
        </div>
    </div>
</div>
</div>