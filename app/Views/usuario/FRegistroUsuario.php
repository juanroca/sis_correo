<?php
date_default_timezone_set('America/La_Paz');
$fechaActual = date('m-d-Y h:i:s');
?>
<script src="<?php echo base_url(); ?>/assest/js/usuario.js"></script>

<div class="container" style="background-color:#EFF9F7" > 
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
  <form action="RegUsuario" id="FRegUsuario" methot="POST" enctype="multipart/form-data" onsubmit="return validar();">
    <h4>FORMULARIO PARA REGISTRO DE USUARIOS</h4>
    <div class="card-body">
      <div class="row">
        <div class="form-group col-sm-6">
          <label>Rol del Usuario</label>
          <select class="form-control form-control-sm" name="rol" id="rol" placeholder="SELECCIONE EL ROL" required>
            <option value="ADMINISTRADOR">ADMINISTRADOR</option>
            <option value="ADMIN EPI">ADMIN EPI</option>
            <option value="ADMIN FELCC">ADMIN FELCC</option>
            <option value="ADMIN ICIA">ADMIN ICIA</option>
            <option value="CONSULTOR">CONSULTOR</option>
          </select>
        </div>
        <div class="form-group col-sm-6">
          <label>Login</label>
          <input type="text" class="form-control form-control-sm" id="login" name="login" placeholder="Insertar Login" required>
        </div>
      </div>
      <div class="row">
        <div class="form-group col-sm-6">
          <label>Password</label>
          <input type="password" class="form-control form-control-sm" id="password" name="password" placeholder="Nueva contraseña" required>
        </div>
        <div class="form-group col-sm-6">
          <label>Repetir contraseña</label>
          <input type="password" class="form-control form-control-sm" id="password2" name="password2" placeholder="Repita contraseña" required>
        </div>
      </div>
      <div class="row">
        <div class="form-group col-sm-3">
          <label>Grado</label>
          <select class="form-control form-control-sm" name="grado" id="grado" placeholder="SELECCIONE EL GRADO" required>
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
        <div class="form-group col-sm-3">
          <label>Nombres</label>
          <input type="text" style="text-transform:uppercase" class="form-control form-control-sm" id="nombres" name="nombres" placeholder="Nombres">
        </div>
        <div class="form-group col-sm-3">
          <label>Apellido Paterno</label>
          <input type="text" style="text-transform:uppercase" class="form-control form-control-sm" id="apPaterno" name="apPaterno" placeholder="Apellido paterno">
        </div>
        <div class="form-group col-sm-3">
          <label>Apellido Materno</label>
          <input type="text" style="text-transform:uppercase" class="form-control form-control-sm" id="apMaterno" name="apMaterno" placeholder="Apellido materno">
        </div>
      </div>
      <div class="row">
        <div class="form-group col-sm-3">
          <label>C.I.</label>
          <input type="text" class="form-control form-control-sm" id="ci" name="ci" placeholder="" required>
        </div>
        <div class="form-group col-sm-3">
          <label>Teléfono</label>
          <input type="text" class="form-control form-control-sm" id="telefono" name="telefono" placeholder="Número de Teléfono">
        </div>
        <div class="form-group col-sm-6">
          <label>Unidad Policial</label>
          <input type="text" style="text-transform:uppercase" class="form-control form-control-sm" id="unidad" name="unidad" placeholder="" required>
        </div>
      </div>
      <!-- /.card-body -->
  </form>
  <div class="modal-footer justify-content-between">
    <input class="btn btn-primary" type="button" onclick="RegUsuario();" value="Guardar">
    <a class="btn btn-default" href="<?php echo base_url(); ?>/CUsuario">Cancelar</a>
  </div>
</div>