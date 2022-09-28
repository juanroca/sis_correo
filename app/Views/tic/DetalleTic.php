<!DOCTYPE html>
<html lang="es">

    <head>
        <title>DETALLE DEL CONFLICTO</title>		
    </head>

	<body>
		
        <!-- <img src="<?php echo $_SERVER["DOCUMENT_ROOT"] . "/sis_epi/assest/img/logo_kl4.png"; ?>" alt="" width="60px" height="60px" /> -->
		<img src="<?php echo base_url(). "/assest/img/logo_kl4.png"; ?>" alt="" width="60px" height="60px" />
		<p style="text-align: center;">
			<strong>TARJETA DE IDENTIFICACION DEL CONDUCTOR</strong></p>
		<hr />
		<table align="center" border="1" cellpadding="1" cellspacing="1" style="width: 700px">
			<tbody>
				<tr style="background-color: rgb(204, 204, 204);">
					<td>
						Departamento</td>
					<td>
						Municipio</td>
					<td>
						Unidad</td>
					<td colspan="2" rowspan="1">
						N° TIC</td>
				</tr>
				<tr>
					<td>
                        <?php echo $tic['dpto']; ?></td>
					<td>
                        <?php echo $tic['munic']; ?></td>
					<td>
                        <?php echo $tic['uni']; ?></td>
					<td colspan="2" rowspan="1">
                        <?php echo $tic['num_tic']; ?></td>
				</tr>
				<tr style="background-color: rgb(204, 204, 204);">
					<td>
						Nombres</td>
					<td>
						Ap. Paterno</td>
					<td>
						Ap. Materno</td>
					<td>
						Licencia</td>
					<td>
						Cat.</td>
				</tr>
				<tr>
					<td>
                        <?php echo $tic['nombres']; ?></td>
					<td>
                        <?php echo $tic['paterno']; ?></td>
					<td>
                        <?php echo $tic['materno']; ?></td>
					<td>
                        <?php echo $tic['lic']; ?></td>
					<td>
                        <?php echo $tic['cat_lic']; ?></td>
				</tr>
			</tbody>
		</table>
		<table align="center" border="1" cellpadding="1" cellspacing="1" style="width: 700px;">
			<tbody>
				<tr style="background-color: rgb(204, 204, 204);">
					<td>
						Lugar de Nac.</td>
					<td>
						Fecha de Nac.</td>
					<td>
						Sexo</td>
					<td>
						Edad</td>
					<td>
						Est. Civil.</td>
				</tr>
				<tr>
					<td>
                    <?php echo $tic['lugarnac']; ?></td>
					<td>
                    <?php echo $tic['fechanac']; ?></td>
					<td>
                    <?php echo $tic['sexo']; ?></td>
					<td>
                    <?php echo $tic['edad']; ?></td>
					<td>
                    <?php echo $tic['ecivil']; ?></td>
				</tr>
			</tbody>
		</table>
		<table align="center" border="1" cellpadding="1" cellspacing="1" style="width: 700px;">
			<tbody>
				<tr style="background-color: rgb(204, 204, 204);">
					<td>
						Domicilio</td>
					<td>
						Telefono</td>
					<td>
						Tipo de Sangre</td>
					<td>
						Clase de Vehiculo</td>
				</tr>
				<tr>
					<td>
                    <?php echo $tic['domicilio']; ?></td>
					<td>
                    <?php echo $tic['telf']; ?></td>
					<td>
                    <?php echo $tic['t_sangre']; ?></td>
					<td>
                    <?php echo $tic['clase_v']; ?></td>
				</tr>
			</tbody>
		</table>
		<table align="center" border="1" cellpadding="1" cellspacing="1" style="width: 700px;">
			<tbody>
				<tr style="background-color: rgb(204, 204, 204);">
					<td>
						Placa</td>
					<td>
						CRPVA</td>
					<td>
						Sindicato</td>
					<td>
						Interno</td>
					<td>
						Tipo de Servicio</td>
					<td>
						Fecha Registro</td>
					<td>
						Fin</td>
				</tr>
				<tr>
					<td>
                    <?php echo $tic['placa_v']; ?></td>
					<td>
                    <?php echo $tic['crpva_v']; ?></td>
					<td>
                    <?php echo $tic['asociacion']; ?></td>
					<td>
                    <?php echo $tic['interno']; ?></td>
					<td>
                    <?php echo $tic['tipo']; ?></td>
					<td>
                    <?php echo $tic['fecha_ini']; ?></td>
					<td>
                    <?php echo $tic['fecha_fin']; ?></td>
				</tr>
			</tbody>
		</table>
		<table align="center" border="1" cellpadding="1" cellspacing="1" style="width: 700px;">
			<tbody>
				<tr style="background-color: rgb(204, 204, 204);">
					<td style="text-align: center;">
						Foto1</td>
					<td style="text-align: center;">
						Foto2</td>
				</tr>
				<tr>
					<td style="width: 50%; text-align: center;">
					<img src="<?php echo base_url(). "/assest/img/tic/" . $tic['foto1']; ?>" alt="" style="width:80%;"></td>
					<td style="width: 50%; text-align: center;">
					<img src="<?php echo base_url(). "/assest/img/tic/" . $tic['foto2']; ?>" alt="" style="width:80%;"></td>
				</tr>
			</tbody>
		</table>
		
	</body>
    <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
    </div>
</html>