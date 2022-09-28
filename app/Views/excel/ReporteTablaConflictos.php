<?php
$fechaActual = date('Y-m-d');
$horaActual = date('H:i:s');

header("Content-type: application/xls");
header("Content-Disposition: attachment; filename=Conflictos_". date("Y-m-d H:i:s").".xls");
header("Pragma: no-cache");
header("Expires: 0");

?>
<meta charset="utf-8">
<h3>CONFLICTOS SOCIALES REGISTRADOS</h3>
<P>Hasta fecha: <?php echo $fechaActual. ' - ' .$horaActual; ?></P>
<table border="1" id="table_lg" class="table table-bordered table-hover dataTable dtr-inline" role="grid" aria-describedby="example2_info">
    <thead>
        <tr role="row">
            <th><strong>No</th>
            <th><strong>Unidad</th>
            <th><strong>Departamento</th>
            <th><strong>Municipio</th>
            <th><strong>Organización Social</th>
            <th><strong>Dirigente</th>
            <th><strong>Medida de Presión</th>
            <th><strong>Fecha Inicio</th>            
            <th><strong>Fecha Fin</th>
            <th><strong>Dias Duración</th>
            <th><strong>Situación Actual</th>
            <th><strong>Demanda</th>
            <th><strong>Heridos</th>
            <th><strong>Muertos</th>
            <th><strong>Intensidad</th>
            <th><strong>Cantidad Personas</th>
            <th><strong>Cantidad Policias</th>
            <th><strong>Daños materiales</th>                
            <th><strong>Daño económico</th>
            <th><strong>Observaciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($lista_conflicto as $conflicto) {
            $idConflicto = $conflicto['id_conflicto'];
        ?>
            <tr>
                <td><?php echo $conflicto['id_conflicto']; ?></td>
                <td><?php echo $conflicto['uni']; ?></td>
                <td><?php echo $conflicto['dpto']; ?></td>
                <td><?php echo $conflicto['munic']; ?></td>
                <td><?php echo $conflicto['orga_social']; ?></td>
                <td><?php echo $conflicto['dirigente']; ?></td>
                <td><?php echo $conflicto['medida']; ?></td>                
                <td><?php echo $conflicto['fecha_ini']; ?></td>
                <td><?php echo $conflicto['fecha_fin']; ?></td>
                <td><?php echo $conflicto['dias_dura']; ?></td>
                <td><?php echo $conflicto['situa']; ?></td>
                <td><?php echo $conflicto['demanda']; ?></td>
                <td><?php echo $conflicto['heridos']; ?></td>
                <td><?php echo $conflicto['muertos']; ?></td>
                <td><?php echo $conflicto['intensidad']; ?></td>
                <td><?php echo $conflicto['cant_perso']; ?></td>
                <td><?php echo $conflicto['cant_poli']; ?></td>
                <td><?php echo $conflicto['dano_mat']; ?></td>
                <td><?php echo $conflicto['dano_eco']; ?></td>
                <td><?php echo $conflicto['obs']; ?></td>                
            </tr>
        <?php } ?>

    </tbody>

</table>