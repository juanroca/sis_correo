<?php
$fechaActual = date('Y-m-d');
$horaActual = date('H:i:s');
$diassemana = array("Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sábado");

?>

<script src="<?php echo base_url(); ?>/assest/js/casos.js"></script>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="background-color:#F5DEB3">
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
  <form action="RegCasos" id="FRegCasos" methot="POST" enctype="multipart/form-data" onsubmit="return validar();">
    <h4>REGISTRO DE CASOS ATENDIDOS </h4>
    <!-- DATOS DEL CASO -->
    <div class="card-body">
      <h5>DATOS DEL CASO</h5>
      <div class="row">
        <div class="form-group col-sm-4">
          <label>Unidad</label>
          <select class="form-control form-control-sm" name="unidad" id="unidad">
            <option value="DP-1" selected>DP-1</option>
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
          <label>Módulo</label>
          <input type="text" style="text-transform:uppercase" class="form-control form-control-sm" id="mod" name="mod" placeholder="MAGISTERIO">
        </div>
        <div class="form-group col-sm-2">
          <label>Fecha del Hecho</label>
          <input type="date" class="form-control form-control-sm" id="fechaH" name="fechaH" value="<?php echo $fechaActual ?>">
        </div>
        <div class="form-group col-sm-2">
          <label>Hora del Hecho</label>
          <input type="time" class="form-control form-control-sm" id="horaH" name="horaH" value="<?php echo $horaActual ?>">
        </div>
      </div>
      <div class="row">
        <div class="form-group col-sm-4">
          <label>Lugar del hecho</label>
          <input type="text" style="text-transform:uppercase" class="form-control form-control-sm" id="lugarH" name="lugarH" placeholder="CALLE, AVENIDA">
        </div>
        <div class="form-group col-sm-4">
          <label>Barrio</label>
          <input type="text" style="text-transform:uppercase" class="form-control form-control-sm" id="barrioH" name="barrioH">
        </div>
        <div class="form-group col-sm-2">
          <label>Latitud</label>
          <input type="text" style="text-transform:uppercase" class="form-control form-control-sm" id="lat" name="lat" placeholder="-17.816204">
        </div>
        <div class="form-group col-sm-2">
          <label>Longitud</label>
          <input type="text" style="text-transform:uppercase" class="form-control form-control-sm" id="long" name="long" placeholder="-63.166392">
        </div>
      </div>
      <div class="row">
        <div class="form-group col-sm-3">
          <label>Naturaleza del Hecho</label>
          <input type="text" style="text-transform:uppercase" class="form-control form-control-sm" id="natH" name="natH">
        </div>
        <div class="form-group col-sm-2">
          <label>Clave 1ra</label>
          <input type="text" style="text-transform:uppercase" class="form-control form-control-sm" id="clave1" name="clave1" placeholder="DH-227">
        </div>
        <div class="form-group col-sm-2">
          <label>Clave 2da</label>
          <input type="text" style="text-transform:uppercase" class="form-control form-control-sm" id="clave2" name="clave2" placeholder="RP-03">
        </div>
        <div class="form-group col-sm-5">
          <label>Clasificación</label>
          <select class="form-control form-control-sm" name="clasif" id="clasif">
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
              <label>Nombres denunciante</label>
              <input type="text" style="text-transform:uppercase" class="form-control form-control-sm" id="nomD" name="nomD">
            </div>
            <div class="form-group col-sm-4">
              <label>Teléfono</label>
              <input type="text" style="text-transform:uppercase" class="form-control form-control-sm" id="telfD" name="telfD">
            </div>
          </div>
        </div>
        <div class="form-group col-sm-6">
          <h5>DATOS DEL PATRULLERO A CARGO</h5>
          <div class="row">
            <!-- <div class="form-group col-sm-2">
          <label>Zona o Cuadrante</label>
          <input type="text" style="text-transform:uppercase" class="form-control form-control-sm" id="zona" name="zona" placeholder="ZONA-3">
          </div> -->
            <div class="form-group col-sm-4">
              <label>Patrulla a cargo</label>
              <input type="text" style="text-transform:uppercase" class="form-control form-control-sm" id="patrullla" name="patrulla" placeholder="PL-10">
            </div>
            <div class="form-group col-sm-8">
              <label>Jefe de patrulla</label>
              <input type="text" style="text-transform:uppercase" class="form-control form-control-sm" id="jp" name="jp">
            </div>
          </div>
        </div>
      </div>
      <h5>DATOS DE FINALIZACIÓN DEL CASO</h5>
      <div class="row">
        <div class="form-group col-sm-3">
          <label>Remitido a:</label>
          <input type="text" style="text-transform:uppercase" class="form-control form-control-sm" id="unifin" name="unifin" placeholder="FELCC EPI-3">
        </div>
        <div class="form-group col-sm-4">
          <label>A cargo de:</label>
          <input type="text" style="text-transform:uppercase" class="form-control form-control-sm" id="nomfin" name="nomfin" placeholder="SGTO. MY. CARLOS PACHECO">
        </div>
        <div class="form-group col-sm-12">
          <label>Novedades registradas</label>
          <!-- <input type="text" style="text-transform:uppercase" class="form-control form-control-sm" id="nov" name="nov"> -->
          <textarea class="form-control form-control-sm" style="text-transform:uppercase" aria-label="With textarea" id="nov" name="nov"></textarea>
        </div>
        <div class="form-group col-sm-12">
          <label>Observaciones</label>
          <!-- <input type="text" style="text-transform:uppercase" class="form-control form-control-sm" id="obs" name="obs" value="NINGUNA"> -->
          <textarea class="form-control form-control-sm" style="text-transform:uppercase" aria-label="With textarea" id="obs" name="obs">NINGUNA</textarea>
        </div>
      </div>
      <div class="row">
        <div class="form-group col-sm-8">
          <label>Foto 1</label>
          <input type="file" class="form-control form-control-sm" id="foto1" name="foto1">
        </div>
        <!-- <div class="form-group col-sm-6">
          <label>Foto 2</label>
          <input type="file" class="form-control form-control-sm" id="foto2" name="foto2">
        </div> -->
      </div>
    </div>
    <!-- /.card-body -->
  </form>
  <div class="modal-footer justify-content-between">
    <input class="btn btn-primary" type="button" onclick="RegCasos();" value="Guardar">
    <a class="btn btn-default" href="<?php echo base_url(); ?>/CCasos">Cancelar</a>
  </div>
</div>
