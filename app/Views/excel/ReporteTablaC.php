<?php
$fechaActual = date('Y-m-d');
$horaActual = date('H:i:s');
$unidad = $casos['uni'];

header("Content-type: application/xls");
header("Content-Disposition: attachment; filename=Casos_". date("Y-m-d H:i:s").".xls");
header("Pragma: no-cache");
header("Expires: 0");

?>
<meta charset="utf-8">
<h3>CASOS ATENDIDOS Y REGISTRADOS</h3>


<P>Hasta fecha: <?php echo $fechaActual. ' - ' .$horaActual; ?></P>
<table id="table_lg" border="1" class="table table-bordered table-hover dataTable dtr-inline" role="grid" aria-describedby="example2_info">
    <thead>
        <tr role="row">
            <th><strong>No</th>
            <th><strong>Tipo de Registro</th>
            <th><strong>Unidad</th>
            <th><strong>FechaHora_Hecho</th>
            <th><strong>Lugar_Hecho</th>
            <th><strong>Latitud</th>
            <th><strong>Longitud</th>
            <th><strong>Naturaleza_Hecho</th>
            <th><strong>Clasificacion</th>
            <th><strong>Denunciante</th>
            <th><strong>Telefono_Den</th>
            <th><strong>Modulo_Policial</th>
            <th><strong>Patrullero</th>
            <th><strong>Zona_patrullaje</th>
            <th><strong>Operador_patrulla</th>
            <th><strong>Remitido_a</th>
            <th><strong>A_cargo_de</th>
            
        </tr>
    </thead>
    <tbody id="resRepExcel">
        <?php foreach ($lista_casos as $casos):?>
            <tr>
                <td><?php echo $casos['id_casos']; ?></td>
                <td><?php echo $casos['clase']; ?></td>
                <td><?php echo $casos['uni']; ?></td>
                <td><?php echo $casos['fecha_hecho'], ' - ' .$casos['hora_hecho']; ?></td>
                <td><?php echo $casos['lug_hecho']; ?></td>
                <td><?php echo $casos['latitud']; ?></td>
                <td><?php echo $casos['longitud']; ?></td>
                <td><?php echo $casos['clave_pri'], ' - ' . $casos['clave_sec'], ' - ' . $casos['nat_hecho']; ?></td>
                <td><?php echo $casos['clasific']; ?></td>
                <td><?php echo $casos['denun']; ?></td>
                <td><?php echo $casos['telf_d']; ?></td>
                <td><?php echo $casos['modulo']; ?></td>
                <td><?php echo $casos['patru']; ?></td>
                <td><?php echo $casos['zona_cpu']; ?></td>
                <td><?php echo $casos['jp']; ?></td>
                <td><?php echo $casos['uni_fin']; ?></td>
                <td><?php echo $casos['nom_fin']; ?></td>
            </tr>
        <?php endforeach; ?>

    </tbody>

</table>