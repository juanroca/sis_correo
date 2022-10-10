<?php
date_default_timezone_set('America/La_Paz');
$fechaActual = date('m-d-Y h:i:s');
?>
<script src="<?php echo base_url(); ?>/assest/js/funcionario.js"></script>

<div class="container-fluid" style="background-color:#EFF9F7">
  <div class="content-header">
    <h4>FORMULARIO PARA ACTUALIZAR DATOS DEL FUNCIONARIO</h4>
  </div>
  <!-- form start -->
  <form action="EditFuncionario" id="FEditFuncionario" methot="POST" enctype="multipart/form-data" onsubmit="return validar();">  
    <div class="card-body">
    <div class="row">
        <div class="form-group col-sm-6">
          <label>Unidad</label>
          <select class="form-control form-control-sm" name="unidad" id="unidad" required>
            <option value="<?php echo $Funcionario['unidad'] ?>" selected><?php echo $Funcionario['unidad'] ?></option>
            <option value="DIPROVE" >DIPROVE</option>
            <option value="FELCC">FELCC</option>
          </select>
        </div>
        <div class="form-group col-sm-6">
          <label>Cédula de Identidad *</label>
          <input type="text" style="text-transform:uppercase" class="form-control form-control-sm" id="ci_fun" name="ci_fun" value="<?php echo $Funcionario['ci_fun'] ?>" required>
        </div>
      </div>      
      <div class="row">
        <div class="form-group col-sm-2">
          <label>Grado</label>
          <select class="form-control form-control-sm" name="grado" id="grado" required>
            <option value="<?php echo $Funcionario['grado'] ?>" selected><?php echo $Funcionario['grado'] ?></option>
            <option value="CNL.">CNL.</option>
            <option value="TCNL.">TCNL.</option>
            <option value="MY.">MY.</option>
            <option value="CAP.">CAP.</option>
            <option value="TTE.">TTE.</option>
            <option value="SBTTE.">SBTTE.</option>
            <option value="SOF.SUP.">SOF.SUP.</option>
            <option value="SOF.MY.">SOF.MY.</option>
            <option value="SOF.1RO.">SOF.2DO.</option>
            <option value="SOF.1RO.">SOF.1RO.</option>
            <option value="SGTO.MY.">SGTO.MY.</option>
            <option value="SGTO.1RO.">SGTO.1RO.</option>
            <option value="SGTO.2DO.">SGTO.2DO.</option>
            <option value="SGTO.">SGTO.</option>
          </select>
        </div>
        <div class="form-group col-sm-4">
          <label>Nombres</label>
          <input type="text" style="text-transform:uppercase" class="form-control form-control-sm" id="nombres" name="nombres" value="<?php echo $Funcionario['nombre'] ?>">
        </div>
        <div class="form-group col-sm-3">
          <label>Apellido Paterno</label>
          <input type="text" style="text-transform:uppercase" class="form-control form-control-sm" id="apPaterno" name="apPaterno" value="<?php echo $Funcionario['ap_paterno'] ?>">
        </div>
        <div class="form-group col-sm-3">
          <label>Apellido Materno</label>
          <input type="text" style="text-transform:uppercase" class="form-control form-control-sm" id="apMaterno" name="apMaterno" value="<?php echo $Funcionario['ap_materno'] ?>">
        </div>
      </div>
      <div class="row">
        <div class="form-group col-sm-3">
          <label>N° de Escalafón *</label>
          <input type="text" tyle="text-transform:uppercase" class="form-control form-control-sm" id="escalafon" name="escalafon" value="<?php echo $Funcionario['nro_escalafon'] ?>" required>
        </div>
        <div class="form-group col-sm-3">
          <label>Teléfono</label>
          <input type="text" class="form-control form-control-sm" id="telefono" name="telefono" value="<?php echo $Funcionario['telefono'] ?>">
        </div>
        <div class="form-group col-sm-6">
          <label>Oficina *</label>
          <input type="text" style="text-transform:uppercase" class="form-control form-control-sm" id="oficina" name="oficina" value="<?php echo $Funcionario['oficina'] ?>" required>
        </div>
      </div>
    </div>
      <!-- /.card-body -->
  </form>
</div>
<div class="modal-footer justify-content-between">
  <input class="btn btn-primary" type="button" onclick="EditFuncionario(<?php echo $Funcionario['id_funcionario']; ?>);" value="Guardar">
  <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
</div>