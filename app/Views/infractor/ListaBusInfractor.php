<?php
foreach ($lista_infractor as $infractor) {
    $idInfractor = $infractor['id_infractor'];
    $fechaHecho = $infractor['completo_nom'];
    $ciInfractor = $infractor['ci'];
    $sexoInfractor = $infractor['sexo'];
    $uniInfractor = $infractor['unidad'];

?>
    <tr>
        <td><?php echo $infractor['id_infractor']; ?></td>
        <td><?php echo $infractor['completo_nom']; ?></td>
        <td><?php echo $infractor['ci']; ?></td>
        <td><?php echo $infractor['sexo']; ?></td>
        <td><?php echo $infractor['unidad']; ?></td>
        <td>
            <div class="btn-group">
                <button class="btn btn-info btn-circle" onclick="MVerInfractor(<?php echo $infractor['id_infractor']; ?>);">
                    <i class="fas fa-eye"></i>
                </button>
                <button class="btn btn-warning btn-circle" onclick="MEditInfractor(<?php echo $infractor['id_infractor']; ?>);">
                    <i class="fas fa-edit"></i>
                </button>
                <button class="btn btn-success btn-circle" onclick="MPrintInfractor(<?php echo $infractor['id_infractor']; ?>);">
                    <i class="fas fa-print"></i>
                </button>
                <button class="btn btn-danger btn-circle" onclick="MEliInfractor(<?php echo $infractor['id_infractor']; ?>);">
                    <i class="fas fa-trash"></i>
                </button>
            </div>
        </td>
    </tr>
<?php } ?>