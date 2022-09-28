<?php
$idCasos = $casos['id_casos'];
$fechaActual = date('Y-m-d');
$horaActual = date('H:i:s');
?>

<script src="<?php echo base_url(); ?>/assest/js/casos.js"></script>
<!-- Content Wrapper. Contains page content -->
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
<form action="EdiCasos" id="FEdiCasos" methot="POST" enctype="multipart/form-data" onsubmit="return validar();">
  <h4>FORMULARIO PARA EDITAR CASO N° <?php echo $casos['id_casos']; ?> </h4>
  <!-- DATOS DEL CASO -->
  <div class="card-body">
    <h5>DATOS DEL CASO</h5>

    <div class="row">
      <div class="form-group col-sm-4">
        <label class="form-control-sm">Unidad</label>
        <select class="form-control form-control-sm" name="unidadE" id="unidadE">
          <option value="<?php echo $casos['uni']; ?>" selected><?php echo $casos['uni']; ?></option>
          <option value="DP-1">DP-1</option>
          <option value="DP-2">DP-2</option>
            <option value="EPI-3">EPI-3</option>
            <option value="DP-4">DP-4</option>
            <option value="EPI-5">EPI-5</option>
            <option value="EPI-6">EPI-6</option>
            <option value="EPI-7">EPI-7</option>
            <option value="EPI-8">EPI-8</option>
            <option value="EPI-9">EPI-9</option>
            <option value="PAC">PAC</option>
            <option value="POL. TURISTICA">POL. TURISTICA</option>
            <option value="POL. CAMINERA">POL. CAMINERA</option>
            <option value="CMDO. POL. CHIQUITANIA">CMDO. POL. CHIQUITANIA</option>
            <option value="CMDO. RURAL Y FRONT.">CMDO. RURAL Y FRONT.</option>
        </select>
      </div>
      <div class="form-group col-sm-4">
        <label class="form-control-sm">Módulo</label>
        <input type="text" style="text-transform:uppercase" class="form-control form-control-sm" id="modE" name="modE" value="<?php echo $casos['modulo']; ?>">
      </div>
      <div class="form-group col-sm-2">
        <label class="form-control-sm">Fecha del Hecho</label>
        <input type="date" class="form-control form-control-sm" id="fechaHE" name="fechaHE" value="<?php echo $casos['fecha_hecho']; ?>">
      </div>
      <div class="form-group col-sm-2">
        <label class="form-control-sm">Hora del Hecho</label>
        <input type="time" class="form-control form-control-sm" id="horaHE" name="horaHE" value="<?php echo $casos['hora_hecho']; ?>">
      </div>
    </div>
    <div class="row">
      <div class="form-group col-sm-4">
        <label class="form-control-sm">Lugar del hecho</label>
        <input type="text" style="text-transform:uppercase" class="form-control form-control-sm" id="lugarHE" name="lugarHE" value="<?php echo $casos['lug_hecho']; ?>">
      </div>
      <div class="form-group col-sm-4">
        <label class="form-control-sm">Barrio</label>
        <input type="text" style="text-transform:uppercase" class="form-control form-control-sm" id="barrioHE" name="barrioHE" value="<?php echo $casos['barrio']; ?>">
      </div>
      <div class="form-group col-sm-2">
        <label class="form-control-sm">Latitud</label>
        <input type="text" style="text-transform:uppercase" class="form-control form-control-sm" id="latE" name="latE" value="<?php echo $casos['latitud']; ?>">
      </div>
      <div class="form-group col-sm-2">
        <label class="form-control-sm">Longitud</label>
        <input type="text" style="text-transform:uppercase" class="form-control form-control-sm" id="longE" name="longE" value="<?php echo $casos['longitud']; ?>">
      </div>
    </div>
    <div class="row">
      <div class="form-group col-sm-3">
        <label class="form-control-sm">Naturaleza del Hecho</label>
        <input type="text" style="text-transform:uppercase" class="form-control form-control-sm" id="natHE" name="natHE" value="<?php echo $casos['nat_hecho']; ?>">
      </div>
      <div class="form-group col-sm-2">
        <label class="form-control-sm">Clave 1ra</label>
        <input type="text" style="text-transform:uppercase" class="form-control form-control-sm" id="clave1E" name="clave1E" value="<?php echo $casos['clave_pri']; ?>">
      </div>
      <div class="form-group col-sm-2">
        <label class="form-control-sm">Clave 2da</label>
        <input type="text" style="text-transform:uppercase" class="form-control form-control-sm" id="clave2E" name="clave2E" value="<?php echo $casos['clave_sec']; ?>">
      </div>
      <div class="form-group col-sm-5">
        <label class="form-control-sm">Clasificación</label>
        <select class="form-control form-control-sm" name="clasifHE" id="clasifHE">
          <option value="<?php echo $casos['clasific']; ?>" selected><?php echo $casos['clasific']; ?></option>
          <option value="ESCANDALO EN VIA PUBLICA">ESCANDALO EN VIA PUBLICA</option>
          <option value="FALTAMIENTO A LA AUTORIDAD">FALTAMIENTO A LA AUTORIDAD</option>
          <option value="RIÑAS Y PELEAS">RIÑAS Y PELEAS</option>
          <option value="HURTO/ROBO">HURTO/ROBO</option>
          <option value="AUXILIO A PERSONA">AUXILIO A PERSONA</option>
          <option value="RECUPERACION DE ESPACIOS">RECUPERACION DE ESPACIOS PUBLICOS</option>
          <option value="SEGURIDAD EN INSTALACIONES VULNERABLES">SEGURIDAD EN INSTALACIONES VULNERABLES</option>
          <option value="SEGURIDAD CENTROS EDUCATIVOS">SEGURIDAD CENTROS EDUCATIVOS</option>
          <option value="EXTRAVIO DE PERSONAS">EXTRAVIO DE PERSONAS</option>
          <option value="HECHOS DE TRANSITO">HECHOS DE TRANSITO</option>
          <option value="HECHOS LEY 348">HECHOS LEY 348</option>
          <option value="HECHOS LEY 259">HECHOS LEY 259</option>
          <option value="OTROS DELITOS">OTROS DELITOS</option>
          <option value="OTRAS FALTAS Y CONTRAVENCIONES">OTRAS FALTAS Y CONTRAVENCIONES</option>
          <option value="COOPERACION A OTRAS UNIDADES POLICIALES E INSTITUCIONES DEL ESTADO">COOPERACION A OTRAS UNIDADES POLICIALES E INSTITUCIONES DEL ESTADO</option>
          <option value="INCENDIO">INCENDIOS</option>
          <option value="ACTOS OBSENOS">ACTOS OBSENOS</option>
          <option value="SUSTANCIAS CONTROLADAS (1008)">SUSTANCIAS CONTROLADAS LEY 1008</option>
        </select>
      </div>
    </div>
    <div class="row mb-2">
      <div class="form-group col-sm-6">
        <h5>DATOS DEL/LA DENUNCIANTE</h5>
        <div class="row">
          <div class="form-group col-sm-8">
            <label class="form-control-sm">Nombres denunciante</label>
            <input type="text" style="text-transform:uppercase" class="form-control form-control-sm" id="nomDE" name="nomDE" value="<?php echo $casos['denun']; ?>">
          </div>
          <div class="form-group col-sm-4">
            <label class="form-control-sm">Teléfono</label>
            <input type="text" style="text-transform:uppercase" class="form-control form-control-sm" id="telfDE" name="telfDE" value="<?php echo $casos['telf_d']; ?>">
          </div>
        </div>
      </div>
      <div class="form-group col-sm-6">
        <h5>DATOS DEL PATRULLERO A CARGO</h5>
        <div class="row">
          <div class="form-group col-sm-4">
            <label class="form-control-sm">Patrullero</label>
            <input type="text" style="text-transform:uppercase" class="form-control form-control-sm" id="patrulllaE" name="patrullaE" value="<?php echo $casos['patru']; ?>">
          </div>
          <div class="form-group col-sm-8">
            <label class="form-control-sm">Jefe de patrulla</label>
            <input type="text" style="text-transform:uppercase" class="form-control form-control-sm" id="jpE" name="jpE" value="<?php echo $casos['jp']; ?>">
          </div>
        </div>
      </div>
    </div>
    <h5>DATOS DE FINALIZACIÓN DEL CASO</h5>
    <div class="row">
      <div class="form-group col-sm-3">
        <label class="form-control-sm">Remitido a:</label>
        <input type="text" style="text-transform:uppercase" class="form-control form-control-sm" id="unifinE" name="unifinE" value="<?php echo $casos['uni_fin']; ?>">
      </div>
      <div class="form-group col-sm-4">
        <label class="form-control-sm">A cargo de:</label>
        <input type="text" style="text-transform:uppercase" class="form-control form-control-sm" id="nomfinE" name="nomfinE" value="<?php echo $casos['nom_fin']; ?>">
      </div>
      <div class="form-group col-sm-12">
        <label class="form-control-sm">Novedades registradas</label>
        <textarea class="form-control form-control-sm" style="text-transform:uppercase" aria-label="With textarea" id="novE" name="novE"><?php echo $casos['novedad']; ?></textarea>
        
      </div>
      
      <div class="form-group col-sm-12">
        <label class="form-control-sm">Observaciones</label>
        <textarea class="form-control form-control-sm" style="text-transform:uppercase" aria-label="With textarea" id="obsE" name="obsE"><?php echo $casos['obs']; ?></textarea>
        

      </div>
    </div>
    <div class="row">
      <div class="form-group col-sm-8">
        <label class="form-control-sm">Foto 1</label>
        <img src="<?php echo base_url() . "/assest/img/casos/" . $casos['foto1']; ?>" alt="" style="width:100%;">
        <!-- <input type="file" class="form-control form-control-sm" id="foto1" name="foto1"> -->
      </div>      
    </div>
  </div>
  <!-- /.card-body -->
</form>
<div class="modal-footer justify-content-between">
  <input class="btn btn-primary" type="button" onclick="EdiCasos(<?php echo $casos['id_casos']; ?>);" value="Guardar">
  <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
</div>