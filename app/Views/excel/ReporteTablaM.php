<?php
$fechaActual = date('Y-m-d');
$horaActual = date('H:i:s');

header("Content-type: application/xls");
header("Content-Disposition: attachment; filename=Actividades_". date("Y-m-d H:i:s").".xls");
header("Pragma: no-cache");
header("Expires: 0");

?>
<meta charset="utf-8">
<h3>ACTIVIDADES PREVENTIVAS REGISTRADAS</h3>
<P>Hasta fecha: <?php echo $fechaActual. ' - ' .$horaActual; ?></P>
<table border="1" id="table_lg" class="table table-bordered table-hover dataTable dtr-inline" role="grid" aria-describedby="example2_info">
    <thead>
        <tr role="row">
            <th><strong>No</th>
            <th><strong>Tipo de Registro</th>
            <th><strong>Fecha y Hora</th>
            <th><strong>Unidad</th>
            <th><strong>Modulo_Policial</th>
            <th><strong>Patrullero</th>
            <th><strong>Actividad</th>            
            <th><strong>Clasificacion</th>
            <th><strong>Lugar</th>
            <th><strong>Barrio</th>                       
        </tr>
    </thead>
    <tbody>
        <?php foreach ($lista_casos as $casos) {
            $idCasos = $casos['id_casos'];
        ?>
            <tr>
                <td><?php echo $casos['id_casos']; ?></td>
                <td><?php echo $casos['clase']; ?></td>
                <td><?php echo $casos['fecha_hecho'], ' - ' .$casos['hora_hecho']; ?></td>
                <td><?php echo $casos['uni']; ?></td>
                <td><?php echo $casos['modulo']; ?></td>
                <td><?php echo $casos['patru']; ?></td>                
                <td><?php echo $casos['nat_hecho']; ?></td>
                <td><?php echo $casos['clasific']; ?></td>
                <td><?php echo $casos['lug_hecho']; ?></td>
                <td><?php echo $casos['barrio']; ?></td>
            </tr>
        <?php } ?>

    </tbody>

</table>