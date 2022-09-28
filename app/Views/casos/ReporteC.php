<?php
ob_start();
$fechaActual = date('Y-m-d');
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ReporteCaso</title>

    <link rel="shortcut icon" href="<?php echo base_url(); ?>/assest/dist/img/favicon.ico">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assest/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assest/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assest/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assest/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assest/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assest/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assest/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assest/plugins/summernote/summernote-bs4.min.css">
    <script src="<?php echo base_url(); ?>/assest/js/casos.js"></script>
</head>

<body class="hold-transition sidebar-mini layout-fixed" style="height: auto;">
    <p style="text-align: center;"><strong>REPORTE DE CASO ATENDIDO</strong></p>
    <p><strong>DATOS DEL CASO</p>
    <table border="0" style="height: 36px; width: 100%; border-collapse: collapse;">
        <tbody>
            <tr style="height: 18px;">
                <td style="width: 20%; height: 18px;">N° de caso</td>
                <td style="width: 20%; height: 18px;">Unidad</td>
                <td style="width: 40%; height: 18px;">Fecha y hora del hecho</td>

            </tr>
            <tr style="height: 18px;">
                <td style="width: 20%; height: 18px; vertical-align: top;"><em><?php echo $casos['id_casos']; ?></td>
                <td style="width: 20%; height: 18px; vertical-align: top;"><em><?php echo $casos['uni']; ?></td>
                <td style="width: 40%; height: 18px; vertical-align: top;"><em><?php echo $casos['fecha_hecho'] . " " . $casos['hora_hecho']; ?></td>

            </tr>
        </tbody>
    </table>
    <table border="0" style="height: 35px; width: 100%; border-collapse: collapse;">
        <tbody>
            <tr style="height: 18px;">
                <td style="width: 60%; height: 18px;">Lugar del hecho</td>
                <td style="width: 20%; height: 18px;">Latitud</td>
                <td style="width: 20%; height: 18px;">Longitud</td>
            </tr>
            <tr style="height: 18px;">
                <td style="width: 60%; height: 18px; vertical-align: top;"><em><?php echo $casos['lug_hecho']; ?></td>
                <td style="width: 20%; height: 18px; vertical-align: top;"><em><?php echo $casos['latitud']; ?></td>
                <td style="width: 20%; height: 18px; vertical-align: top;"><em><?php echo $casos['longitud']; ?></td>
        </tbody>
    </table>
    <table border="0" style="height: 35px; width: 100%; border-collapse: collapse;">
        <tbody>
            <tr style="height: 18px;">
                <td style="width: 50%; height: 18px;">Naturaleza del hecho</td>
                <td style="width: 50%; height: 18px;">Claves</td>
            </tr>
            <tr style="height: 18px;">
                <td style="width: 50%; height: 18px; vertical-align: top;"><em><?php echo $casos['nat_hecho']; ?></td>
                <td style="width: 50%; height: 18px; vertical-align: top;"><em><?php echo $casos['clave_pri'] . " " . $casos['clave_sec'] . " " . $casos['clave_ter']; ?></td>
            </tr>
        </tbody>
    </table>
    <br>
    <p><strong>DATOS DEL O LA DENUNCIANTE</p>
    <table border="0" style="height: 35px; width: 100%; border-collapse: collapse;">
        <tbody>
            <tr style="height: 18px;">
                <td style="width: 60%; height: 18px;">Nombre completo</td>
                <td style="width: 40%; height: 18px;">Telefono</td>
            </tr>
            <tr style="height: 16px;">
                <td style="width: 60%; height: 18px; vertical-align: top;"><em><?php echo $casos['denun']; ?></td>
                <td style="width: 40%; height: 18px; vertical-align: top;"><em><?php echo $casos['telf_d']; ?></td>
            </tr>
        </tbody>
    </table>
    <br>
    <p><strong>DATOS DEL PATRULLERO</p>
    <table border="0" style="height: 35px; width: 100%; border-collapse: collapse;">
        <tbody>
            <tr style="height: 18px;">
                <td style="width: 20%; height: 18px;">Módulo Pol.</td>
                <td style="width: 20%; height: 18px;">Zona/Cuadrante</td>
                <td style="width: 20%; height: 18px;">Patrulla</td>
                <td style="width: 40%; height: 18px;">Jefe de patrulla</td>
            </tr>
            <tr style="height: 16px;">
                <td style="width: 20%; height: 18px; vertical-align: top;"><em><?php echo $casos['modulo']; ?></td>
                <td style="width: 20%; height: 18px; vertical-align: top;"><em><?php echo $casos['zona_cpu']; ?></td>
                <td style="width: 20%; height: 18px; vertical-align: top;"><em><?php echo $casos['patru']; ?></td>
                <td style="width: 40%; height: 18px; vertical-align: top;"><em><?php echo $casos['jp']; ?></td>
            </tr>
        </tbody>
    </table>
    <br>
    <p><strong>FINALIZACIÓN DEL CASO</p>
    <table border="0" style="height: 35px; width: 100%; border-collapse: collapse;">
        <tbody>
            <tr style="height: 18px;">
                <td style="width: 30%; height: 18px;">Novedades registradas</td>
            </tr>
            <tr style="height: 16px;">
                <td style="width: 30%; height: 18px; vertical-align: top;"><em><?php echo $casos['novedad']; ?></td>
            </tr>
        </tbody>
    </table>
    <table border="0" style="height: 35px; width: 100%; border-collapse: collapse;">
        <tbody>
            <tr style="height: 18px;">
                <td style="width: 50%; height: 18px;">Remitido a:</td>
                <td style="width: 50%; height: 18px;">A cargo de:</td>
            </tr>
            <tr style="height: 16px;">
                <td style="width: 50%; height: 18px; vertical-align: top;"><em><?php echo $casos['uni_fin']; ?></td>
                <td style="width: 50%; height: 18px; vertical-align: top;"><em><?php echo $casos['nom_fin']; ?></td>
            </tr>
        </tbody>
    </table>
    <table border="0" style="height: 35px; width: 100%; border-collapse: collapse;">
        <tbody>
            <tr style="height: 18px;">
                <td style="width: 100%; height: 18px;">Observaciones</td>
            </tr>
            <tr style="height: 16px;">
                <td style="width: 100%; height: 18px; vertical-align: top;"><em><?php echo $casos['obs']; ?></td>
            </tr>
        </tbody>
    </table>
    <br>
    <table width="100%">
        <tbody>
            <tr>
                <td style="width: 70%;">Fotografía</td>
                <!-- <td style="width: 50%;">Fotografía 2</td> -->
            </tr>
            <tr>
                <td style="width: 50%;"><img src="<?php echo $_SERVER["DOCUMENT_ROOT"]."/sis_epi/assest/img/casos/" . $casos['foto1']; ?>" alt="" style="width:50%;"></td>
                <!-- <td style="width: 50%;"> <img src="<?php echo $_SERVER["DOCUMENT_ROOT"]."/sis_epi/assest/img/casos/" . $casos['foto2']; ?>" alt="" style="width:50%;"></td> -->
            </tr>
        </tbody>
    </table>
    <h6 style="text-align: right;">Registrado por: <?php echo $casos['autor']; ?> <?php echo $casos['fecha_reg']; ?>, Editado por: <?php echo $casos['editor']; ?> <?php echo $casos['fecha_edi']; ?></h6>
</body>

</html>