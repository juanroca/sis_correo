<?php
$fechaActual = date('Y-m-d');
$horaActual = date('H:i:s');
$diassemana = array("Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sábado");

?>

<script src="<?php echo base_url(); ?>/assest/js/infractor.js"></script>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="background-color:#CCD1D1">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">

        </div><!-- /.col -->
        <div class="col-sm-6">

        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- form start -->
  <form action="RegInfractor" id="FRegInfractor" methot="POST" enctype="multipart/form-data" onsubmit="return validar();">
    <h4>REGISTRO DE INFRACTOR </h4>
    <!-- DATOS DEL CASO -->
    <div class="card-body">
      <div class="row">
        <div class="form-group col-sm-2">
          <label>Unidad</label>
          <select class="form-control form-control-sm" name="unidad" id="unidad">
            <option value="DP-1" selected>DP-1</option>
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
          <input type="text" style="text-transform:uppercase" class="form-control form-control-sm" id="nom" name="nom">
        </div>
        <div class="form-group col-sm-3">
          <label>Apellido Paterno</label>
          <input type="text" style="text-transform:uppercase" class="form-control form-control-sm" id="pat" name="pat">
        </div>
        <div class="form-group col-sm-3">
          <label>Apellido Materno</label>
          <input type="text" style="text-transform:uppercase" class="form-control form-control-sm" id="mat" name="mat">
        </div>
        <div class="form-group col-sm-2">
          <label>C.I.</label>
          <input type="text" style="text-transform:uppercase" class="form-control form-control-sm" id="ci" name="ci">
        </div>
      </div>
      
      <div class="row">
        <div class="form-group col-sm-2">
          <label>Fecha de Nac.</label>
          <input type="date" class="form-control form-control-sm" id="f_nac" name="f_nac">
        </div>
        <div class="form-group col-sm-3">
          <label>Sexo</label>
          <select class="form-control form-control-sm" name="sex" id="sex">
            <option value="MASCULINO" selected>MASCULINO</option>
            <option value="FEMENINO">FEMENINO</option>
            <option value="TRANSGENERO M">TRANSGENERO M</option>
            <option value="TRANSGENERO F">TRANSGENERO F</option>
            <option value="TRANSEXUAL M">TRANSEXUAL M</option>
            <option value="TRANSEXUAL F">TRANSEXUAL F</option>
          </select>
        </div>
        <div class="form-group col-sm-3">
          <label>Alias</label>
          <input type="text" style="text-transform:uppercase" class="form-control form-control-sm" id="alias" name="alias">
        </div>
        <div class="form-group col-sm-4">
          <label>Especialidad</label>
          <input type="text" style="text-transform:uppercase" class="form-control form-control-sm" id="espec" name="espec">
        </div>
      </div>
        
      <div class="row">
        <div class="form-group col-sm-6">
          <label>Domicilio</label>
          <input type="text" style="text-transform:uppercase" class="form-control form-control-sm" id="dm" name="dm">
        </div>
        <div class="form-group col-sm-2">
          <label>Telefono</label>
          <input type="text" style="text-transform:uppercase" class="form-control form-control-sm" id="telf" name="telf">
        </div>
      </div>
      <div class="row">
        <div class="form-group col-sm-4">
          <label>Tatuajes</label>
          <textarea class="form-control form-control-sm" style="text-transform:uppercase" aria-label="With textarea" id="tatu" name="tatu"></textarea>
        </div>
        <div class="form-group col-sm-4">
          <label>Cicatrices</label>
          <textarea class="form-control form-control-sm" style="text-transform:uppercase" aria-label="With textarea" id="cica" name="cica"></textarea>
        </div>
        <div class="form-group col-sm-4">
          <label>Otros/Observaciones</label>
          <textarea class="form-control form-control-sm" style="text-transform:uppercase" aria-label="With textarea" id="obs" name="obs"></textarea>
        </div>
      </div>
        
      <div class="row">
        <div class="form-group col-sm-3">
          <label>Foto 1</label>
          <input type="file" class="form-control form-control-sm" id="foto1" name="foto1">
        </div>
        <div class="form-group col-sm-3">
          <label>Foto 2</label>
          <input type="file" class="form-control form-control-sm" id="foto2" name="foto2">
        </div>
      </div>
    </div>
    <!-- /.card-body -->
  </form>
  <div class="modal-footer justify-content-between">
    <input class="btn btn-primary" type="button" onclick="RegInfractor();" value="Guardar">
    <a class="btn btn-default" href="<?php echo base_url(); ?>/CInfractor">Cancelar</a>
  </div>
</div>