<?php
date_default_timezone_set('America/La_Paz');
$fechaActual = date('Y-m-d h:i:s');
?>
<script src="<?php echo base_url(); ?>/assest/js/documento.js"></script>

<!-- Content PAGE BODY (Page header) -->

<div class="content-wrapper" style="min-height: 475px;">
  <div class="row">
    <div class="col-2"></div>
    <div class="col-8">
      <!-- Content Header (Page header) -->
      <div class="content-header bg-info">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-12">
              <h1 class="text-center m-0">FORMULARIO DE REGISTRO DE DOCUMENTO</h1>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-PAGE BODY -->

      <!-- form start -->
      <form action="RegDocumento" id="FRegDocumento" methot="POST" enctype="multipart/form-data" onsubmit="return validar();">
        <div class="card-body">
          <div class="row">
            <div class="form-group col-sm-3">
              <label>Fecha de Recepcion</label>
              <input type="datetime-local" class="form-control form-control-sm" id="fecha_recep" name="fecha_recep" value="<?php echo $fechaActual; ?>" max="<?php echo $fechaActual; ?>"/>
            </div>
            <div class="form-group col-sm-4">
              <label>Tipo de Documento</label>
              <select class="form-control form-control-sm" name="tipo_doc" id="tipo_doc" required>
                <option value="OFICIO" selected>OFICIO</option>
                <option value="MEMORIAL">MEMORIAL</option>
                <option value="INVITACION">INVITACION</option>
                <option value="COMPARENDO">COMPARENDO</option>
                <option value="REQUERIMIENTO FISCAL">REQUERIMIENTO FISCAL</option>
                <option value="OTRO">OTRO</option>
              </select>
            </div>
            <div class="form-group col-sm-5">
              <label>Remitente/Origen</label>
              <input type="text" style="text-transform:uppercase" class="form-control form-control-sm" id="origen_doc" name="origen_doc">
            </div>
          </div>
          <div class="row">
            <div class="form-group col-sm-7">
              <label>Referencia del Documento</label>
              <input type="text" style="text-transform:uppercase" class="form-control form-control-sm" id="ref_doc" name="ref_doc">
            </div>
            <div class="form-group col-sm-3">
              <label>Fecha del Documento</label>
              <input type="date" class="form-control form-control-sm" id="fecha_doc" name="fech_doc">
            </div>
            <div class="form-group col-sm-2">
              <label>Cant. Páginas</label>
              <input type="number" class="form-control form-control-sm" id="pag" name="pag" value="1">
            </div>
          </div>
          <div class="row">
            <div class="form-group col-sm-10">
              <label>Observaciones</label>
              <textarea style="text-transform:uppercase" class="form-control form-control-sm" id="obs_doc" name="obs_doc" rows="2"></textarea>
            </div>
            <div class="form-group col-sm-2">
              <label>Situación</label>
              <select class="form-control form-control-sm" name="situa_doc" id="situa_doc" required>
                <option value="RECIBIDO" selected>RECIBIDO</option>
                <option value="ARCHIVADO">ARCHIVADO</option>
                <option value="OFICIADO">OFICIADO</option>
                <option value="RESPONDIDO">RESPONDIDO</option>
                <option value="DEVULETO">DEVUELTO</option>
                <option value="OTRO">OTRO</option>
              </select>
            </div>
          </div>
          <!-- /.card-body -->
      </form>
      <br><br>
      <div class="container">
        <div class="row align-items-center">
          <div class="text-center col-6">
            <input class="btn-lg btn-primary" type="button" onclick="RegDocumento();" value="Guardar">
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
