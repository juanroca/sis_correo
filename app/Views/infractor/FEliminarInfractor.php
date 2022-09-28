
<div>
    <h3>(*) ¿ESTÁ SEGURO DE ELIMINAR EL REGISTRO N° <?php echo $infractor['id_infractor']. ' CON C.I. '. $infractor['ci'].'??';?></h3>
</div>
    <div class="row">
        <div class="col-md-12">
            <div id="respuesta_sm">

            </div>
        </div>
    </div>

    <div class="modal-footer justify-content-between">
            <input class="btn btn-danger" type="button" value="ELIMINAR" onclick="EliInfractor(<?php echo $infractor['id_infractor'];?>);">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
    </div>