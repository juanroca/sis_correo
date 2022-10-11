<?php
date_default_timezone_set('America/La_Paz');
$fechaActual = date('m-d-Y h:i:s');
?>
<script src="<?php echo base_url(); ?>/assest/js/documento.js"></script>

<div class="container-fluid" style="background-color:#EFF9F7">
  <div class="p-2 mb-2 bg-info text-white" style="--bs-bg-opacity: .5;">
     <h1 class="text-center m-0">ACTUALIZAR DATOS DE DOCUMENTO <?php echo $documento['id_documento']; ?></h1>
  </div>
  <!-- form start -->
  <form action="EditDocumento" id="FEditDocumento" methot="POST" enctype="multipart/form-data" onsubmit="return validar();">
    <div class="card-body">
      <div class="row">
        <div class="form-group col-sm-3">
          <label>Fecha de Recepcion</label>
          <input type="datetime-local" class="form-control form-control-sm" id="fecha_recep" name="fecha_recep" value="<?php echo $documento['fecha_recibido']; ?>" max="<?php echo $fechaActual; ?>" />
        </div>
        <div class="form-group col-sm-4">
          <label>Tipo de Documento</label>
          <select class="form-control form-control-sm" name="tipo_doc" id="tipo_doc" required>
            <option value="<?php echo $documento['tipo']; ?>"selected><?php echo $documento['tipo']; ?></option>
            <option value="OFICIO">OFICIO</option>
            <option value="MEMORIAL">MEMORIAL</option>
            <option value="INVITACION">INVITACION</option>
            <option value="COMPARENDO">COMPARENDO</option>
            <option value="REQUERIMIENTO FISCAL">REQUERIMIENTO FISCAL</option>
            <option value="OTRO">OTRO</option>
          </select>
        </div>
        <div class="form-group col-sm-5">
          <label>Remitente/Origen</label>
          <input type="text" style="text-transform:uppercase" class="form-control form-control-sm" id="origen_doc" name="origen_doc" value="<?php echo $documento['origen']; ?>">
        </div>
      </div>
      <div class="row">
        <div class="form-group col-sm-7">
          <label>Referencia del Documento</label>
          <input type="text" style="text-transform:uppercase" class="form-control form-control-sm" id="ref_doc" name="ref_doc" value="<?php echo $documento['referencia']; ?>">
        </div>
        <div class="form-group col-sm-3">
          <label>Fecha del Documento</label>
          <input type="date" class="form-control form-control-sm" id="fecha_doc" name="fech_doc" value="<?php echo $documento['fecha_doc']; ?>">
        </div>
        <div class="form-group col-sm-2">
          <label>Cant. Páginas</label>
          <input type="number" class="form-control form-control-sm" id="pag" name="pag" value="1" value="<?php echo $documento['cant_pag']; ?>">
        </div>
      </div>
      <div class="row">
        <div class="form-group col-sm-9">
          <label>Observaciones</label>
          <textarea style="text-transform:uppercase" class="form-control form-control-sm" id="obs_doc" name="obs_doc" rows="2"> <?php echo $documento['obs']; ?></textarea>
        </div>
        <div class="form-group col-sm-3">
          <label>Situación</label>
          <select class="form-control form-control-sm" name="situa_doc" id="situa_doc" required>
            <option value="<?php echo $documento['situa']; ?>"selected><?php echo $documento['situa']; ?></option>
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
</div>
<div class="modal-footer justify-content-between">
  <input class="btn btn-primary" type="button" onclick="EditDocumento(<?php echo $documento['id_documento']; ?>);" value="Guardar">
  <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
</div>