<?php 
forEach($lista_usuarios as $usuario){

$id_usuario=$usuario['id_usuario'];
$loginUsuario=$usuario['login_usu'];
$tipoRol=$usuario['rol_usu'];
$pass=$usuario['password'];
$grado=$usuario['grado_usu'];
$nombres=$usuario['nombres_usu'];
$apPaterno=$usuario['paterno_usu'];
$apMaterno=$usuario['materno_usu'];
$ci=$usuario['ci_usu'];
$telefUsuario=$usuario['telefono_usu'];
$unidad=$usuario['unidad_usu'];

?>
<tr>
        <td><?php echo $id_usuario;?></td>
        <td><?php echo $loginUsuario;?></td>
        <td><?php echo $tipoRol;?></td>
        <td><?php echo $grado;?></td>
        <td><?php echo $nombres." ".$apPaterno." ".$apMaterno;?></td>
        <td><?php echo $ci;?></td>
        <td><?php echo $unidad;?></td>
    
    <td>
        <div class="btn-group">
            <button class="btn btn-info btn-circle" onclick="MVerusuario(<?php echo $id_usuario;?>);">
                <i class="fas fa-eye"></i>
            </button>
            <button class="btn btn-secondary btn-circle" onclick="MEditusuario(<?php echo $id_usuario;?>);">
                <i class="fas fa-edit"></i>
            </button>
            <button class="btn btn-danger btn-circle" onclick="MEliusuario(<?php echo $id_usuario;?>);">
                <i class="fas fa-trash"></i>
            </button>
        </div>
    </td>          
</tr>
<?php }?>