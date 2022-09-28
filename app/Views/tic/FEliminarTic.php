
<div>
    <h3>(*) ¿Desea eliminar el Registro <?php echo $tic['id_tic']. ' del señor '. $tic['completo']. ' del sindicato '. $tic['asociacion'];?>?</h3>
</div>
    <div class="row">
        <div class="col-md-12">
            <div id="respuesta_lg">

            </div>
        </div>
    </div>

    <div class="modal-footer justify-content-between">
            <input class="btn btn-danger" type="button" value="ELIMINAR" onclick="EliTic(<?php echo $tic['id_tic'];?>);">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
    </div>