<?php
foreach ($lista_casos as $casos) {

    $idCasos = $casos['id_casos'];
    $fechaHecho = $casos['fecha_hecho'];
    $natHecho = $casos['nat_hecho'];
    $lugHecho = $casos['lug_hecho'];
    $unidad = $casos['uni'];
    $modu = $casos['modulo'];
    $patrulla = $casos['patru'];

?>
    <tr>
        <td><?php echo $casos['id_casos']; ?></td>
        <td><?php echo $casos['fecha_hecho']; ?></td>
        <td><?php echo $casos['nat_hecho'], ' - '. $casos['clave_pri'], ' '. $casos['clave_sec'], ' '. $casos['clave_ter']; ?></td>
        <td><?php echo $casos['lug_hecho']; ?></td>
        <td><?php echo $casos['uni']; ?></td>
        <td>
            <div class="btn-group">
                <button class="btn btn-info btn-circle" onclick="MVerCasos(<?php echo $idCasos; ?>);">
                    <i class="fas fa-eye"></i>
                </button>
                <button class="btn btn-warning btn-circle" onclick="MEditCasos(<?php echo $idCasos; ?>);">
                    <i class="fas fa-edit"></i>
                </button>
                <button class="btn btn-danger btn-circle" onclick="MEliCasos(<?php echo $idCasos; ?>);">
                    <i class="fas fa-trash"></i>
                </button>
                <button class="btn btn-success btn-circle" onclick="MReporteCasos(<?php echo $idCasos; ?>);">
                    <i class="fas fa-print"></i>
                </button>
            </div>
        </td>
    </tr>
<?php } ?>