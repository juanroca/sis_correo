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
          <label>C.I.</label>
          <input type="text" class="form-control form-control-sm" id="ci" name="ci" placeholder="" required>
        </div>        
      </div>
      <!-- /.card-body -->
  </form>
  <div class="modal-footer justify-content-between">
    <input class="btn btn-primary" type="button" onclick="RegUsuario();" value="Guardar">
    <a class="btn btn-default" href="<?php echo base_url(); ?>/CUsuario">Cancelar</a>
  </div>
</div>