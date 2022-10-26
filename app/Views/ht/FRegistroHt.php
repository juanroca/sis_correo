<?php
date_default_timezone_set('America/La_Paz');
$fechaActual = date('Y-m-d h:i:s');
include 'conexion.php';
//$queryLE = mysqli_query($mysqliListaEstado, "SELECT id_est, list_estado FROM lista_estado");
$queryDoc = mysqli_query($mysqliBD, "SELECT id_documento, tipo, origen FROM documento");
$queryEst = mysqli_query($mysqliBD, "SELECT id_est, list_estado FROM lista_estado")
?>
<script src="<?php echo base_url(); ?>/assest/js/ht.js"></script>

<!-- Content PAGE BODY (Page header) -->

<div class="content-wrapper" style="min-height: 475px;">
  <div class="row">
    <div class="col-2"></div>
    <div class="col-8">
      <!-- Content Header (Page header) -->
      <div class="content-header bg-danger">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-12">
              <h1 class="text-center m-0">OFICIAR DOCUMENTO</h1>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- form start -->
      <form action="RegHt" id="FRegHt" methot="POST" enctype="multipart/form-data" onsubmit="return validar();">
        <div class="card-body">
          <div class="row">

            <!-- CAMPOS DEL FORMULARIO -->

            <div class="form-group col-sm-3">
              <label>Fecha</label>
              <input type="datetime-local" class="form-control form-control-sm" id="fecha_ht" name="fecha_ht" value="<?php echo $fechaActual; ?>" max="<?php echo $fechaActual; ?>" />
            </div>

            <div class="form-group col-sm-5">
              <label>DOCUMENTO</label>
              <select class="form-control form-control-sm" name="id_doc" id="id_doc" required>
                <?php while ($datoDoc = mysqli_fetch_array($queryDoc)) {
                ?>
                  <option value="<?php echo $datoDoc['0'] ?>"> <?php echo $datoDoc['0'] . " - " . $datoDoc['1'] . " - " . $datoDoc['2'] ?> </option>
                <?php }
                ?>
              </select>
            </div>
            <div class="form-group col-sm-2">
              <label>ESTADO ACTUAL</label>
              <select class="form-control form-control-sm" name="situa_ht" id="situa_ht" required>
                <?php while ($datoEst = mysqli_fetch_array($queryEst)) {
                ?>
                  <option value="<?php echo $datoEst['0'] ?>"> <?php echo $datoEst['1'] ?> </option>
                <?php }
                ?>
              </select>
            </div>
          </div>

          <div class="row">
            <!-- CHECKBOX DE OFICINAS -->
            <div class="form-group col-sm-12">
              <label>OFICINAS</label>
              <div class="row">
                <!-- PRIMERA COLUMNA -->
                <div class="col-sm-4">
                  <!-- checkbox -->
                  <div class="row">
                    <div class="icheck-info">
                      <label><input type="checkbox" value="1" name="OfiOption[]">SUB DIRECCIÓN</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="icheck-info">
                      <label><input type="checkbox" value="2" name="OfiOption[]">STRIA. GENERAL</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="icheck-info">
                      <label><input type="checkbox" value="3" name="OfiOption[]">PERSONAL</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="icheck-info">
                      <label><input type="checkbox" value="4" name="OfiOption[]">INTELIGENCIA</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="icheck-info">
                      <label><input type="checkbox" value="5" name="OfiOption[]">PLANEAMIENTO</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="icheck-info">
                      <label><input type="checkbox" value="6" name="OfiOption[]">ADMINISTRATIVA</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="icheck-info">
                      <label><input type="checkbox" value="7" name="OfiOption[]">FURRIELATO</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="icheck-info">
                      <label><input type="checkbox" value="8" name="OfiOption[]">ACTIVOS FIJOS</label>
                    </div>
                  </div>
                </div>
                <!-- SEGUNDA COLUMNA -->
                <div class="col-sm-4">
                  <!-- checkbox -->
                  <div class="row">
                    <div class="icheck-info">
                      <label><input type="checkbox" value="9" name="OfiOption[]">DENUNCIAS</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="icheck-info">
                      <label><input type="checkbox" value="10" name="OfiOption[]">ARCHIVOS</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="icheck-info">
                      <label><input type="checkbox" value="11" name="OfiOption[]">TRASNPORTES</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="icheck-info">
                      <label><input type="checkbox" value="12" name="OfiOption[]">GRUPO ALFA</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="icheck-info">
                      <label><input type="checkbox" value="13" name="OfiOption[]">GRUPO BETA</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="icheck-info">
                      <label><input type="checkbox" value="14" name="OfiOption[]">GRUPO GAMA</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="icheck-info">
                      <label><input type="checkbox" value="15" name="OfiOption[]">GRUPO ESPECIAL</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="icheck-info">
                      <label><input type="checkbox" value="16" name="OfiOption[]">DIVISIÓN TÉCNICA</label>
                    </div>
                  </div>

                </div>
                <!-- TERCERA COLUMNA -->
                <div class="col-sm-4">
                  <div class="row">
                    <div class="icheck-info">
                      <label><input type="checkbox" value="17" name="OfiOption[]">MONTERO</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="icheck-info">
                      <label><input type="checkbox" value="18" name="OfiOption[]">PUERTO SUAREZ</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="icheck-info">
                      <label><input type="checkbox" value="19" name="OfiOption[]">SAN IGNACIO</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="icheck-info">
                      <label><input type="checkbox" value="20" name="OfiOption[]">SATELITE NORTE</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="icheck-info">
                      <label><input type="checkbox" value="21" name="OfiOption[]">LA GUARDIA</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="icheck-info">
                      <label><input type="checkbox" value="22" name="OfiOption[]">ASESORÍA LEGAL</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="icheck-info">
                      <label><input type="checkbox" value="23" name="OfiOption[]">SISTEMAS</label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <label>Otra Oficina</label>
                <textarea style="text-transform:uppercase" class="form-control form-control-sm" id="otraOfi" name="otraOfi" rows="2">NN</textarea>
              </div>
            </div>
          </div>
          <!-- /.CHECKBOX OFICINA -->

          <div class="row">
            <!-- CHECKBOX DE INSTRUCCION -->
            <div class="form-group col-sm-12">
              <label>INSTRUCCIONES</label>
              <div class="row">
                <!-- PRIMERA COLUMNA -->
                <div class="col-sm-4">
                  <!-- checkbox -->
                  <div class="row">
                    <div class="icheck-success d-inline">
                      <label><input type="checkbox" value="RECEPCIONAR DENUNCIA" name="InstOption[]">RECEPCIONAR DENUNCIA</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="icheck-success  d-inline">
                      <label><input type="checkbox" value="ASIGNAR INVESTIGADOR" name="InstOption[]">ASIGNAR INVESTIGADOR</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="icheck-success  d-inline">
                      <label><input type="checkbox" value="DAR CUMPLIMIENTO" name="InstOption[]">DAR CUMPLIMIENTO</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="icheck-success">
                      <label><input type="checkbox" value="INVESTIGAR" name="InstOption[]">INVESTIGAR</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="icheck-success">
                      <label><input type="checkbox" value="CERTIFICAR" name="InstOption[]">CERTIFICAR</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="icheck-success">
                      <label><input type="checkbox" value="ARCHIVAR" name="InstOption[]">ARCHIVAR</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="icheck-success">
                      <label><input type="checkbox" value="COMO CORRESPONDE" name="InstOption[]">COMO CORRESPONDE</label>
                    </div>
                  </div>
                </div>
                <!-- SEGUNDA COLUMNA -->
                <div class="col-sm-4">
                  <!-- checkbox -->
                  <div class="row">
                    <div class="icheck-success">
                      <label><input type="checkbox" value="DIFUNDIR A PERSONAL" name="InstOption[]">DIFUNDIR A PERSONAL</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="icheck-success">
                      <label><input type="checkbox" value="RECHAZAR" name="InstOption[]">RECHAZAR</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="icheck-success">
                      <label><input type="checkbox" value="AGENDAR" name="InstOption[]">AGENDAR</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="icheck-success">
                      <label><input type="checkbox" value="REALIZAR TRAB. TÉCNICO" name="InstOption[]">REALIZAR TRAB. TÉCNICO</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="  icheck-success">
                      <label><input type="checkbox" value="INFORMAR AL RESPECTO" name="InstOption[]">INFORMAR AL RESPECTO</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="icheck-success">
                      <label><input type="checkbox" value="DAR RESPUESTA" name="InstOption[]">DAR RESPUESTA</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="icheck-success">
                      <label><input type="checkbox" value="ASISTIR" name="InstOption[]">ASISTIR</label>
                    </div>
                  </div>
                </div>
                <!-- TERCERA COLUMNA -->
                <div class="col-sm-4">
                  <div class="row">
                    <div class="icheck-success">
                      <label><input type="checkbox" value="TOMAR NOTA Y PREVISIONES" name="InstOption[]">TOMAR NOTA Y PREVISIONES</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="icheck-success">
                      <label><input type="checkbox" value="DAR CURSO" name="InstOption[]">DAR CURSO</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="icheck-success">
                      <label><input type="checkbox" value="PARA EL FIN SOLICITADO" name="InstOption[]">PARA EL FIN SOLICITADO</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="icheck-success">
                      <label><input type="checkbox" value="DE ACUERDO A LEY" name="InstOption[]">DE ACUERDO A LEY</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="icheck-success">
                      <label><input type="checkbox" value="REVISAR Y ANALIZAR" name="InstOption[]">REVISAR Y ANALIZAR</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="icheck-success">
                      <label><input type="checkbox" value="URGENTE" name="InstOption[]">URGENTE</label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <label>Otra instrucción</label>
                <textarea style="text-transform:uppercase" class="form-control form-control-sm" id="otraInst" name="otraInst" rows="2">NN</textarea>
              </div>
            </div>
          </div>
          <div class="row">
            <label>Observaciones</label>
            <textarea style="text-transform:uppercase" class="form-control form-control-sm" id="obsHt" name="obsHt" rows="2">NINGUNA</textarea>
          </div>
          <!-- /.CHECKBOX OFICINA -->
      </form>
      <br><br>
      <div class="container">
        <div class="row align-items-center">
          <div class="text-center col-6">
            <input class="btn-lg btn-primary" type="button" onclick="RegHt();" value="OFICIAR">
          </div>
          <div class="text-center col-6">
            <a class="btn-lg btn-secondary" href="<?php echo base_url(); ?>/CHt">Cancelar</a>
          </div>
        </div>
        <br><br><br><br><br>
      </div>
    </div>
    <div class="col-2"></div>
  </div>
</div>