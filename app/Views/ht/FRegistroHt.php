<?php
date_default_timezone_set('America/La_Paz');
$fechaActual = date('Y-m-d h:i:s');
include 'conexion.php';
//$queryLE = mysqli_query($mysqliListaEstado, "SELECT id_est, list_estado FROM lista_estado");
$queryOfi = mysqli_query($mysqliBD, "SELECT id_oficina, oficina FROM oficina");
$queryInst = mysqli_query($mysqliBD, "SELECT id_instruccion, detalle FROM instruccion");
$queryDoc = mysqli_query($mysqliBD, "SELECT id_documento, origen FROM documento");
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
            <div class="form-group col-sm-3">
              <label>Fecha</label>
              <input type="datetime-local" class="form-control form-control-sm" id="fecha_ht" name="fecha_ht" value="<?php echo $fechaActual; ?>" max="<?php echo $fechaActual; ?>" />
            </div>

            <div class="form-group col-sm-5">
              <label>DOCUMENTO</label>
              <select class="form-control form-control-sm" name="id_doc" id="id_doc" required>
                <?php while ($datoDoc = mysqli_fetch_array($queryDoc)) {
                ?>
                  <option value="<?php echo $datoDoc['1'] ?>"> <?php echo $datoDoc['0'] . " - " . $datoDoc['1'] ?> </option>
                <?php }
                ?>
              </select>
            </div>
          </div>

          <div class="row">
            <!-- CHECKBOX DE OFICINAS -->
            <div class="form-group col-sm-8">
              <label>Oficina</label>
              <div class="row">
                <!-- PRIMERA COLUMNA -->
                <div class="col-sm-6">
                  <!-- checkbox -->
                  <div class="row">
                    <div class="icheck-info">
                      <label><input type="checkbox" value="SUB DIRECCIÓN" id="OfiOption[]">SUB DIRECCIÓN</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="icheck-info">
                      <label><input type="checkbox" value="STRIA. GENERAL" id="OfiOption[]">STRIA. GENERAL</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="icheck-info">
                      <label><input type="checkbox" value="PERSONAL" id="OfiOption[]">PERSONAL</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="icheck-info">
                      <label><input type="checkbox" value="INTELIGENCIA" id="OfiOption[]">INTELIGENCIA</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="icheck-info">
                      <label><input type="checkbox" value="PLANEAMIENTO" id="OfiOption[]">PLANEAMIENTO</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="icheck-info">
                      <label><input type="checkbox" value="ADMINISTRATIVA" id="OfiOption[]">ADMINISTRATIVA</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="icheck-info">
                      <label><input type="checkbox" value="FURRIELATO" id="OfiOption[]">FURRIELATO</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="icheck-info">
                      <label><input type="checkbox" value="ACTIVOS FIJOS" id="OfiOption[]">ACTIVOS FIJOS</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="icheck-info">
                      <label><input type="checkbox" value="DENUNCIAS" id="OfiOption[]">DENUNCIAS</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="icheck-info">
                      <label><input type="checkbox" value="ARCHIVOS" id="OfiOption[]">ARCHIVOS</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="icheck-info">
                      <label><input type="checkbox" value="TRASNPORTES" id="OfiOption[]">TRASNPORTES</label>
                    </div>
                  </div>
                </div>
                <!-- SEGUNDA COLUMNA -->
                <div class="col-sm-6">
                  <!-- checkbox -->
                  <div class="row">
                    <div class="icheck-info">
                      <label><input type="checkbox" value="GRUPO ALFA" id="OfiOption[]">GRUPO ALFA</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="icheck-info">
                      <label><input type="checkbox" value="GRUPO BETA" id="OfiOption[]">GRUPO BETA</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="icheck-info">
                      <label><input type="checkbox" value="GRUPO GAMA" id="OfiOption[]">GRUPO GAMA</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="icheck-info">
                      <label><input type="checkbox" value="GRUPO ESPECIAL" id="OfiOption[]">GRUPO ESPECIAL</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="icheck-info">
                      <label><input type="checkbox" value="DIVISIÓN TÉCNICA" id="OfiOption[]">DIVISIÓN TÉCNICA</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="icheck-info">
                      <label><input type="checkbox" value="MONTERO" id="OfiOption[]">MONTERO</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="icheck-info">
                      <label><input type="checkbox" value="PUERTO SUAREZ" id="OfiOption[]">PUERTO SUAREZ</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="icheck-info">
                      <label><input type="checkbox" value="SAN IGNACIO" id="OfiOption[]">SAN IGNACIO</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="icheck-info">
                      <label><input type="checkbox" value="SATELITE NORTE" id="OfiOption[]">SATELITE NORTE</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="icheck-info">
                      <label><input type="checkbox" value="LA GUARDIA" id="OfiOption[]">LA GUARDIA</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="icheck-info">
                      <label><input type="checkbox" value="ASESORÍA LEGAL" id="OfiOption[]">ASESORÍA LEGAL</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="icheck-info">
                      <label><input type="checkbox" value="SISTEMAS" id="OfiOption[]">SISTEMAS</label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <label>Otra Oficina</label>
                <textarea style="text-transform:uppercase" class="form-control form-control-sm" id="otraOfi" name="otraOfi" rows="2"></textarea>
              </div>
            </div>
          </div>
          <!-- /.CHECKBOX OFICINA -->

          <div class="row">
            <!-- CHECKBOX DE INSTRUCCION -->
            <div class="form-group col-sm-8">
              <label>Instrucciones</label>
              <div class="row">
                <!-- PRIMERA COLUMNA -->
                <div class="col-sm-6">
                  <!-- checkbox -->
                  <div class="row">
                    <div class="icheck-success d-inline">
                      <label><input type="checkbox" value="RECEPCIONAR DENUNCIA" id="InstOption[]">RECEPCIONAR DENUNCIA</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="icheck-success  d-inline">
                      <label><input type="checkbox" value="ASIGNAR INVESTIGADOR" id="InstOption[]">ASIGNAR INVESTIGADOR</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="icheck-success  d-inline">
                      <label><input type="checkbox" value="DAR CUMPLIMIENTO" id="InstOption[]">DAR CUMPLIMIENTO</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="icheck-success">
                      <label><input type="checkbox" value="INVESTIGAR" id="InstOption[]">INVESTIGAR</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="icheck-success">
                      <label><input type="checkbox" value="CERTIFICAR" id="InstOption[]">CERTIFICAR</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="icheck-success">
                      <label><input type="checkbox" value="ARCHIVAR" id="InstOption[]">ARCHIVAR</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="icheck-success">
                      <label><input type="checkbox" value="COMO CORRESPONDE" id="InstOption[]">COMO CORRESPONDE</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="icheck-success">
                      <label><input type="checkbox" value="DIFUNDIR A PERSONAL" id="InstOption[]">DIFUNDIR A PERSONAL</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="icheck-success">
                      <label><input type="checkbox" value="RECHAZAR" id="InstOption[]">RECHAZAR</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="icheck-success">
                      <label><input type="checkbox" value="AGENDAR" id="InstOption[]">AGENDAR</label>
                    </div>
                  </div>
                </div>
                <!-- SEGUNDA COLUMNA -->
                <div class="col-sm-6">
                  <!-- checkbox -->
                  <div class="row">
                    <div class="icheck-success">
                      <label><input type="checkbox" value="REALIZAR TRAB. TÉCNICO" id="InstOption[]">REALIZAR TRAB. TÉCNICO</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="  icheck-success">
                      <label><input type="checkbox" value="INFORMAR AL RESPECTO" id="InstOption[]">INFORMAR AL RESPECTO</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="icheck-success">
                      <label><input type="checkbox" value="DAR RESPUESTA" id="InstOption[]">DAR RESPUESTA</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="icheck-success">
                      <label><input type="checkbox" value="ASISTIR" id="InstOption[]">ASISTIR</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="icheck-success">
                      <label><input type="checkbox" value="TOMAR NOTA Y PREVISIONES" id="InstOption[]">TOMAR NOTA Y PREVISIONES</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="icheck-success">
                      <label><input type="checkbox" value="DAR CURSO" id="InstOption[]">DAR CURSO</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="icheck-success">
                      <label><input type="checkbox" value="PARA EL FIN SOLICITADO" id="InstOption[]">PARA EL FIN SOLICITADO</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="icheck-success">
                      <label><input type="checkbox" value="DE ACUERDO A LEY" id="InstOption[]">DE ACUERDO A LEY</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="icheck-success">
                      <label><input type="checkbox" value="REVISAR Y ANALIZAR" id="InstOption[]">REVISAR Y ANALIZAR</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="icheck-success">
                      <label><input type="checkbox" value="URGENTE" id="InstOption[]">URGENTE</label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <label>Otra instrucción</label>
                <textarea style="text-transform:uppercase" class="form-control form-control-sm" id="otraInst" name="otraInst" rows="2"></textarea>
              </div>
            </div>
          </div>
          <!-- /.CHECKBOX OFICINA -->
      </form>
      <br><br>
      <div class="container">
        <div class="row align-items-center">
          <div class="text-center col-6">
            <input class="btn-lg btn-primary" type="button" onclick="RegDocumento();" value="OFICIAR">
          </div>
          <div class="text-center col-6">
            <a class="btn-lg btn-secondary" href="<?php echo base_url(); ?>/CDocumento">Cancelar</a>
          </div>
        </div>
        <br><br><br><br><br>
      </div>
    </div>
    <div class="col-2"></div>
  </div>
</div>