<!-- Datos del usuario para ver en el modal -->
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <td><?php echo $usuario['id_usuario'];?></td>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th>Fecha de Registro</th>
            <td><?php echo $usuario['fecha_usu'];?></td>
        </tr>
        <tr>
            <th>Login</th>
            <td><?php echo $usuario['login_usu'];?></td>
        </tr>
        <tr>
            <th>Rol del Usuario</th>
            <td><?php echo $usuario['rol_usu'];?></td>
        </tr>     
        <tr>
            <th>Grado</th>
            <td><?php echo $usuario['grado_usu'];?></td>
        </tr>
        <tr>
            <th>Nombres</th>
            <td><?php echo $usuario['nombres_usu'];?></td>
        </tr>
        <tr>
            <th>Ap. Paterno</th>
            <td><?php echo $usuario['paterno_usu'];?></td>
        </tr>
        <tr>
            <th>Ap. Materno</th>
            <td><?php echo $usuario['materno_usu'];?></td>
        </tr>
        <tr>
            <th>C.I.</th>
            <td><?php echo $usuario['ci_usu'];?></td>
        </tr>
        <tr>
            <th>Telefono</th>
            <td><?php echo $usuario['telefono_usu'];?></td>
        </tr>
        <tr>
            <th>Unidad</th>
            <td><?php echo $usuario['unidad_usu'];?></td>
        </tr>

    </tbody>

</table>
<div class="modal-footer justify-content-between">
       <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
    </div>