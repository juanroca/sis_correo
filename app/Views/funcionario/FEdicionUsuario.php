<?php
$id_usuario = $usuario['id_usuario'];
$loginUsuario = $usuario['login_usu'];
$pass = $usuario['password'];
$rol = $usuario['rol_usu'];
$grado = $usuario['grado_usu'];
$nombres = $usuario['nombres_usu'];
$apPaterno = $usuario['paterno_usu'];
$apMaterno = $usuario['materno_usu'];
$ci = $usuario['ci_usu'];
$telefUsuario = $usuario['telefono_usu'];
$unidad = $usuario['unidad_usu'];

?>
<!-- form start -->
<form action="" id="FEditUsuario">
  <h4>Formulario para registro de usuario</h4>
  <div class="card-body">
    <div class="row">
      <div class="form-group col-sm-6">
        <label>Rol del Usuario</label>
        <select class="form-control form-control-sm" name="rol" id="rol" placeholder="SELECCIONE EL ROL" required>
          <option value="<?php echo $rol ?>" selected><?php echo $rol ?></option>
          <option value="ADMINISTRADOR">ADMINISTRADOR</option>
          <option value="ADMIN EPI">ADMIN EPI</option>
          <option value="ADMIN FELCC">ADMIN FELCC</option>
          <option value="ADMIN ICIA">ADMIN ICIA</option>
          <option value="CONSULTOR">CONSULTOR</option>
        </select>
      </div>
      <div class="form-group col-sm-6">
        <label>Login</label>
        <input type="text" class="form-control form-control-sm" id="login" name="login" value="<?php echo $loginUsuario ?>" readonly>
      </div>
    </div>
    <div class="row">
    <div class="form-group">
      <label>Password (Vuelva a escribir su contraseña)</label>
      <input type="password" class="form-control form-control-sm" id="password" name="password" placeholder="Ingrese su contraseña">
    </div>
    <!-- <div class="form-group">
                    <label>Repetir contraseña</label>
                    <input type="password" class="form-control form-control-sm" id="password2" name="password2"  placeholder="Repita contraseña">
                  </div> -->
    </div>
    <div class="row">
    <div class="form-group col-sm-3">
      <label>Grado</label>
      <select class="form-control form-control-sm" name="grado" id="grado">
        <option value="<?php echo $grado ?>" selected><?php echo $grado ?></option>
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
      <input type="text" class="form-control form-control-sm" id="nombres" name="nombres" value="<?php echo $nombres ?>">
    </div>
    <div class="form-group col-sm-3">
      <label>Apellido Paterno</label>
      <input type="text" class="form-control form-control-sm" id="apPaterno" name="apPaterno" value="<?php echo $apPaterno ?>">
    </div>
    <div class="form-group col-sm-3">
      <label>Apellido Materno</label>
      <input type="text" class="form-control form-control-sm" id="apMaterno" name="apMaterno" value="<?php echo $apMaterno ?>">
    </div>
    </div>
    <div class="row">
    <div class="form-group col-sm-3">
      <label>C.I.</label>
      <input type="text" class="form-control form-control-sm" id="ci" name="ci" value="<?php echo $ci ?>">
    </div>
    <div class="form-group col-sm-3">
      <label>Teléfono</label>
      <input type="text" class="form-control form-control-sm" id="telefono" name="telefono" value="<?php echo $telefUsuario ?>">
    </div>
    <div class="form-group col-sm-6">
      <label>Unidad Policial</label>
      <input type="text" class="form-control form-control-sm" id="unidad" name="unidad" value="<?php echo $unidad ?>">
    </div>
  </div>
  <!-- /.card-body -->
</form>
<div class="modal-footer justify-content-between">
  <input class="btn btn-primary" type="button" onclick="EditUsuario(<?php echo $id_usuario; ?>);" value="Guardar">
  <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
</div>