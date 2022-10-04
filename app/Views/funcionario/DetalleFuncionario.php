<!-- Datos del funcionario para ver en el modal -->
<div class="container-fluid">
    <table>
        <thead class="table-success">
            <tr>
                <th>C.I.</th>
                <td><?php echo $Funcionario['ci_fun']; ?></td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th>Fecha de Registro</th>
                <td><?php echo $Funcionario['fecha_crea']; ?></td>
            </tr>
            <tr>
                <th>Grado</th>
                <td><?php echo $Funcionario['grado']; ?></td>
            </tr>
            <tr>
                <th>Nombres</th>
                <td><?php echo $Funcionario['nombre']; ?></td>
            </tr>
            <tr>
                <th>Ap. Paterno</th>
                <td><?php echo $Funcionario['ap_paterno']; ?></td>
            </tr>
            <tr>
                <th>Ap. Materno</th>
                <td><?php echo $Funcionario['ap_materno']; ?></td>
            </tr>
            <tr>
                <th>N° de Escalafon</th>
                <td><?php echo $Funcionario['nro_escalafon']; ?></td>
            </tr>
            <tr>
                <th>Telefono</th>
                <td><?php echo $Funcionario['telefono']; ?></td>
            </tr>
            <tr>
                <th>Oficina</th>
                <td><?php echo $Funcionario['oficina']; ?></td>
            </tr>

        </tbody>

    </table>
</div>
<div class="modal-footer justify-content-between">
    <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
</div>