<?php
$IdInfractor = $infractor['id_infractor'];
$fechaActual = date('Y-m-d');
$horaActual = date('H:i:s');
?>

<script src="<?php echo base_url(); ?>/assest/js/infractor.js"></script>
<!-- Content Wrapper. Contains page content -->
<div class="content-header">
  <div class="container-fluid">
  <h4>EDICION DE INFRACTOR </h4>
    <div class="row mb-2">
      <div class="col-sm-6">

      </div><!-- /.col -->
      <div class="col-sm-6">

      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- form start -->
<form action="EdiInfractor" id="FEdiInfractor" methot="POST" enctype="multipart/form-data" onsubmit="return validar();">
  <!-- DATOS DEL CASO -->
  <div class="card-body">
    <div class="row">
      <div class="form-group col-sm-2">
        <label>Unidad</label>
        <select class="form-control form-control-sm" name="unidadE" id="unidadE">
          <option value="<?php echo $infractor['unidad']; ?>" selected><?php echo $infractor['unidad']; ?></option>
          <option value="DP-1">DP-1</option>
          <option value="DP-2">DP-2</option>
            <option value="EPI-3">EPI-3</option>
            <option value="DP-4">DP-4</option>
            <option value="EPI-5">EPI-5</option>
            <option value="EPI-6">EPI-6</option>
            <option value="EPI-7">EPI-7</option>
            <option value="EPI-8">EPI-8</option>
            <option value="EPI-9">EPI-9</option>
            <option value="PAC">PAC</option>
            <option value="POL. TURISTICA">POL. TURISTICA</option>
            <option value="POL. CAMINERA">POL. CAMINERA</option>
            <option value="CMDO. POL. CHIQUITANIA">CMDO. POL. CHIQUITANIA</option>
            <option value="CMDO. RURAL Y FRONT.">CMDO. RURAL Y FRONT.</option>
        </select>
      </div>
      <div class="form-group col-sm-2">
        <label>Nombres</label>
        <input type="text" style="text-transform:uppercase" class="form-control form-control-sm" id="nomE" name="nomE" value="<?php echo $infractor['nombres']; ?>">
      </div>
      <div class="form-group col-sm-3">
        <label>Apellido Paterno</label>
        <input type="text" style="text-transform:uppercase" class="form-control form-control-sm" id="patE" name="patE" value="<?php echo $infractor['ap_paterno']; ?>">
      </div>
      <div class="form-group col-sm-3">
        <label>Apellido Materno</label>
        <input type="text" style="text-transform:uppercase" class="form-control form-control-sm" id="matE" name="matE" value="<?php echo $infractor['ap_materno']; ?>">
      </div>
      <div class="form-group col-sm-2">
        <label>C.I.</label>
        <input type="text" style="text-transform:uppercase" class="form-control form-control-sm" id="ciE" name="ciE" value="<?php echo $infractor['ci']; ?>">
      </div>
    </div>

    <div class="row">
      <div class="form-group col-sm-2">
        <label>Fecha de Nac.</label>
        <input type="date" class="form-control form-control-sm" id="f_nacE" name="f_nacE" value="<?php echo $infractor['fecha_nac']; ?>">
      </div>
      <div class="form-group col-sm-3">
        <label>Sexo</label>
        <select class="form-control form-control-sm" name="sexE" id="sexE">
          <option value="<?php echo $infractor['sexo']; ?>" selected><?php echo $infractor['sexo']; ?></option>
          <option value="MASCULINO">MASCULINO</option>
          <option value="FEMENINO">FEMENINO</option>
          <option value="TRANSGENERO M">TRANSGENERO M</option>
          <option value="TRANSGENERO F">TRANSGENERO F</option>
          <option value="TRANSEXUAL M">TRANSEXUAL M</option>
          <option value="TRANSEXUAL F">TRANSEXUAL F</option>
        </select>
      </div>
      <div class="form-group col-sm-3">
        <label>Alias</label>
        <input type="text" style="text-transform:uppercase" class="form-control form-control-sm" id="aliasE" name="aliasE" value="<?php echo $infractor['alias']; ?>">
      </div>
      <div class="form-group col-sm-4">
        <label>Especialidad</label>
        <input type="text" style="text-transform:uppercase" class="form-control form-control-sm" id="especE" name="especE" value="<?php echo $infractor['especialidad']; ?>">
      </div>
    </div>

    <div class="row">
      <div class="form-group col-sm-6">
        <label>Domicilio</label>
        <input type="text" style="text-transform:uppercase" class="form-control form-control-sm" id="dmE" name="dmE" value="<?php echo $infractor['domicilio']; ?>">
      </div>
      <div class="form-group col-sm-2">
        <label>Telefono</label>
        <input type="text" style="text-transform:uppercase" class="form-control form-control-sm" id="telfE" name="telfE" value="<?php echo $infractor['telf']; ?>">
      </div>
    </div>
    <div class="row">
      <div class="form-group col-sm-4">
        <label>Tatuajes</label>
        <textarea class="form-control form-control-sm" style="text-transform:uppercase" aria-label="With textarea" id="tatuE" name="tatuE"><?php echo $infractor['tatuajes']; ?></textarea>
      </div>
      <div class="form-group col-sm-4">
        <label>Cicatrices</label>
        <textarea class="form-control form-control-sm" style="text-transform:uppercase" aria-label="With textarea" id="cicaE" name="cicaE"><?php echo $infractor['cicatriz']; ?></textarea>
      </div>
      <div class="form-group col-sm-4">
        <label>Otros/Observaciones</label>
        <textarea class="form-control form-control-sm" style="text-transform:uppercase" aria-label="With textarea" id="obsE" name="obsE"><?php echo $infractor['otros']; ?></textarea>
      </div>
    </div>

    <div class="row">
      <div class="form-group col-sm-3">
        <label>Foto 1</label>
        <p>
        <img src="<?php echo base_url() . "/assest/img/infractor/" . $infractor['foto1']; ?>" alt="" style="width:50%;">
      </div>
      <div class="form-group col-sm-3">
        <label>Foto 2</label>
        <p>
        <img src="<?php echo base_url() . "/assest/img/infractor/" . $infractor['foto2']; ?>" alt="" style="width:50%;">
      </div>
    </div>
  </div>
  <!-- /.card-body -->
</form>
<div class="modal-footer justify-content-between">
  <input class="btn btn-primary" type="button" onclick="EdiInfractor(<?php echo $IdInfractor; ?>);" value="Guardar">
  <a class="btn btn-default" href="<?php echo base_url(); ?>/CInfractor">Cancelar</a>
</div>
</div>