
<div>
    <h3>(*) ¿ESTÁ SEGURO DE ELIMINAR EL CASO N° <?php echo $casos['id_casos']. ' - '. $casos['clave_pri'];?></h3>
</div>
    <div class="row">
        <div class="col-md-12">
            <div id="respuesta_sm">

            </div>
        </div>
    </div>

    <div class="modal-footer justify-content-between">
            <input class="btn btn-danger" type="button" value="ELIMINAR" onclick="EliCasos(<?php echo $casos['id_casos'];?>);">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
    </div>