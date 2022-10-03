<?php

?>
<div>
    <h2>¿Desea eliminar al usuario <?php echo $usuario['login_usu'];?>?</h2>
</div>
    <div class="row">
        <div class="col-md-12">
            <div id="respuesta_sm">
                    
            </div>
        </div>
    </div>

    <div class="modal-footer justify-content-between">
            <input class="btn btn-danger" type="button" value="ELIMINAR" onclick="EliUsuario(<?php echo $usuario['id_usuario'];?>);">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
    </div>