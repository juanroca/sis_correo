<?php
ob_start();
$fechaActual = date('Y-m-d');
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ReporteInfractor</title>

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
    <script src="<?php echo base_url(); ?>/assest/js/infractor.js"></script>
</head>

<body class="hold-transition sidebar-mini layout-fixed" style="height: auto;">
    <p style="text-align: center;"><strong>REPORTE DEL INFRACTOR</strong></p>
    <p><strong>DATOS DEL INFRACTOR</p>
    <table border="0" style="height: 36px; width: 100%; border-collapse: collapse;">
        <tbody>
            <tr style="height: 18px;">
                <td style="width: 10%; height: 18px;">N° Reg</td>
                <td style="width: 30%; height: 18px;">Unidad</td>
                <td style="width: 20%; height: 18px;">Fecha Registro</td>
                <td style="width: 40%; height: 18px;">Nombre completo</td>
            </tr>
            <tr style="height: 18px;">
                <td style="width: 10%; height: 18px; vertical-align: top;"><em><?php echo $infractor['id_infractor']; ?></td>
                <td style="width: 30%; height: 18px; vertical-align: top;"><em><?php echo $infractor['unidad']; ?></td>
                <td style="width: 20%; height: 18px; vertical-align: top;"><em><?php echo $infractor['fecha_crea']; ?></td>
                <td style="width: 40%; height: 18px; vertical-align: top;"><em><?php echo $infractor['completo_nom']; ?></td>
            </tr>
        </tbody>
    </table>
    <table border="0" style="height: 35px; width: 100%; border-collapse: collapse;">
        <tbody>
            <tr style="height: 18px;">
                <td style="width: 20%; height: 18px;">C.I. / Pasp</td>
                <td style="width: 20%; height: 18px;">Fecha de Nacimiento</td>
                <td style="width: 20%; height: 18px;">Sexo</td>
                <td style="width: 20%; height: 18px;">Alias</td>
                <td style="width: 20%; height: 18px;">Especialidad</td>                
            </tr>
            <tr style="height: 18px;">
                <td style="width: 20%; height: 18px; vertical-align: top;"><em><?php echo $infractor['ci']; ?></td>
                <td style="width: 20%; height: 18px; vertical-align: top;"><em><?php echo $infractor['fecha_nac']; ?></td>
                <td style="width: 20%; height: 18px; vertical-align: top;"><em><?php echo $infractor['sexo']; ?></td>
                <td style="width: 20%; height: 18px; vertical-align: top;"><em><?php echo $infractor['alias']; ?></td>
                <td style="width: 20%; height: 18px; vertical-align: top;"><em><?php echo $infractor['especialidad']; ?></td>
        </tbody>
    </table>
    <table border="0" style="height: 35px; width: 100%; border-collapse: collapse;">
        <tbody>
            <tr style="height: 18px;">
                <td style="width: 33%; height: 18px;">Tatuajes</td>
                <td style="width: 33%; height: 18px;">Cicatrices</td>
                <td style="width: 33%; height: 18px;">Otros/Obs</td>
            </tr>
            <tr style="height: 18px;">
                <td style="width: 33%; height: 18px; vertical-align: top;"><em><?php echo $infractor['tatuajes']; ?></td>
                <td style="width: 33%; height: 18px; vertical-align: top;"><em><?php echo $infractor['cicatriz']; ?></td>
                <td style="width: 33%; height: 18px; vertical-align: top;"><em><?php echo $infractor['otros']; ?></td>
                
            </tr>
        </tbody>
    </table>
    <br>
    
    <table width="100%">
        <tbody>
            <tr>
                <td style="width: 50%;">Fotografía 1</td>
                <td style="width: 50%;">Fotografía 2</td>
            </tr>
            <tr>
                <td style="width: 50%;"><img src="<?php echo $_SERVER["DOCUMENT_ROOT"]."/sis_epi/assest/img/infractor/" . $infractor['foto1']; ?>" alt="" style="width:50%;"></td>
                <td style="width: 50%;"><img src="<?php echo $_SERVER["DOCUMENT_ROOT"]."/sis_epi/assest/img/infractor/" . $infractor['foto2']; ?>" alt="" style="width:50%;"></td>
            </tr>
        </tbody>
    </table>
    <h6 style="text-align: right;">Registrado por: <?php echo $infractor['usuario_crea'];?> <?php echo $infractor['fecha_crea'];?>, Editado por: <?php echo $infractor['editor']; ?> <?php echo $infractor['fecha_edi'];?></h6>
</body>

</html>