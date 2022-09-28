<?php
$conexion = pg_connect("host=localhost dbname=sistema_alertas user=root password=mandis");
$unidades=$_POST['unidades'];
    
    $pg=$pg_query($conexion, "SELECT nombre_uni FROM unidad");

    $result=$pg_query($conexion,$pg);

    $cadena="<label>Unidad</label>
            <select name='listaUni' id='listaUni'>";

            while ($ver=pg_fetch_row($result)){
            $cadena=$cadena.'<option value='.$ver.'>'.utf8_encode($ver[0]).'</option>';
            }
            echo $cadena."</select>";
?>
