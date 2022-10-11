<?php

?>
<div>
    <h2>¿Desea eliminar el Documento <?php echo $documento['id_documento'], ' de ' . $documento['origen'];?>?</h2>
</div>
    <div class="row">
        <div class="col-md-12">
            <div id="respuesta_sm">
                    
            </div>
        </div>
    </div>

    <div class="modal-footer justify-content-between">
            <input class="btn btn-danger" type="button" value="ELIMINAR" onclick="EliDocumento(<?php echo $documento['id_documento'];?>);">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
    </div>