<?php

?>
<div>
    <h2>¿Desea eliminar al Funcionario <?php echo $Funcionario['grado'], ' ' . $Funcionario['nombre'], ' ' . $Funcionario['ap_paterno'], ' ' . $Funcionario['ap_materno'];?>?</h2>
</div>
    <div class="row">
        <div class="col-md-12">
            <div id="respuesta_sm">
                    
            </div>
        </div>
    </div>

    <div class="modal-footer justify-content-between">
            <input class="btn btn-danger" type="button" value="ELIMINAR" onclick="EliFuncionario(<?php echo $Funcionario['id_funcionario'];?>);">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
    </div>