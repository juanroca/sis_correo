<?php
$fechaActual = date('Y-m-d');
$horaActual = date('H:i:s');


?>

<script src="<?php echo base_url(); ?>/assest/js/tic.js"></script>

<script>
  function init() {
    var inputFile = document.getElementById('foto_1');
    inputFile.addEventListener('change', mostrarImagen1, false)
  }

  function mostrarImagen1(event) {
    var file = event.target.files[0];
    var leer = new FileReader();
    leer.onload = function(event) {
      var img = document.getElementById('img1');
      img.src = event.target.result;
    }
    leer.readAsDataURL(file);
  }
  window.addEventListener('load', init, false)
</script>

<script>
  function init() {
    var inputFile = document.getElementById('foto_2');
    inputFile.addEventListener('change', mostrarImagen2, false)
  }

  function mostrarImagen2(event) {
    var file = event.target.files[0];
    var leer = new FileReader();
    leer.onload = function(event) {
      var img = document.getElementById('img2');
      img.src = event.target.result;
    }
    leer.readAsDataURL(file);
  }
  window.addEventListener('load', init, false)
</script>

<!-- Content Wrapper. Contains page content -->
<section class="content-header">
  <div class="container-fluid">

  </div><!-- /.container-fluid -->
</section>

<section class="content">
  <div class="container-fluid">
    <form action="EditarTic" id="FEdiTic" methot="POST" enctype="multipart/form-data" onsubmit="return validar();">
      <section class="col-lg-12 connectedSortable ui-sortable">
        <div class="card-header card-header text-white bg-success mb-3">
          <h2 class="card-title">FORMULARIO DE EDICIÓN DE TIC</h2>
        </div>
        <!-- DATOS -->
        <div class="row">
          <div class="card card-succes col-sm-8">
            <!-- UNIDAD Y UBICACIÓN -->
            <div class="row">
              <div class="form-group col-sm-3">
                <label style:text-xs>Departameto</label>
                <select class="form-control form-control-sm" name="depa" id="depa">
                  <option value="SANTA CRUZ" <?php if ($tic['dpto'] == "SANTA CRUZ") : ?>selected<?php endif; ?>>SANTA CRUZ</option>
                  <option value="COCHABAMBA" <?php if ($tic['dpto'] == "COCHABAMBA") : ?>selected<?php endif; ?>>COCHABAMBA</option>
                  <option value="LA PAZ" <?php if ($tic['dpto'] == "LA PAZ") : ?>selected<?php endif; ?>>LA PAZ</option>
                  <option value="ORURO" <?php if ($tic['dpto'] == "ORURO") : ?>selected<?php endif; ?>>ORURO</option>
                  <option value="CHUQUISACA" <?php if ($tic['dpto'] == "CHUQUISACA") : ?>selected<?php endif; ?>>CHUQUISACA</option>
                  <option value="POTOSI" <?php if ($tic['dpto'] == "POTOSI") : ?>selected<?php endif; ?>>POTOSI</option>
                  <option value="TARIJA" <?php if ($tic['dpto'] == "TARIJA") : ?>selected<?php endif; ?>>TARIJA</option>
                  <option value="BENI" <?php if ($tic['dpto'] == "BENI") : ?>selected<?php endif; ?>>BENI</option>
                  <option value="PANDO" <?php if ($tic['dpto'] == "PANDO") : ?>selected<?php endif; ?>>PANDO</option>

                </select>
              </div>
              <div class="form-group col-sm-4">
                <label>Municipio</label>
                <input type="text" style="text-transform:uppercase" class="form-control form-control-sm" id="municipio" name="municipio" value="<?php echo $tic['munic'] ?>">
              </div>
              <div class="form-group col-sm-3">
                <label>Unidad</label>
                <input type="text" style="text-transform:uppercase" class="form-control form-control-sm" id="unidad" name="unidad" value="<?php echo $tic['uni'] ?>">
              </div>
              <div class="form-group col-sm-2">
                <label>N° TIC</label>
                <input type="text" style="text-transform:uppercase" class="form-control is-warning form-control-sm" id="tic" name="tic" value="<?php echo $tic['num_tic'] ?>">
              </div>
            </div>

            <!-- DATOS DEL CONDUCTOR -->
            <div class="row">
              <div class="form-group col-sm-4">
                <label>Nombres</label>
                <input type="text" style="text-transform:uppercase" class="form-control form-control-sm" id="nom" name="nom" value="<?php echo $tic['nombres'] ?>">
              </div>
              <div class="form-group col-sm-4">
                <label>Ap. Paterno</label>
                <input type="text" style="text-transform:uppercase" class="form-control form-control-sm" id="pat" name="pat" value="<?php echo $tic['paterno'] ?>">
              </div>
              <div class="form-group col-sm-4">
                <label>Ap. Materno</label>
                <input type="text" style="text-transform:uppercase" class="form-control form-control-sm" id="mat" name="mat" value="<?php echo $tic['materno'] ?>">
              </div>

              <!-- /////  -->
              <div class="form-group col-sm-2">
                <label>N° Licencia</label>
                <input type="text" style="text-transform:uppercase" class="form-control form-control-sm" id="lic" name="lic" value="<?php echo $tic['lic'] ?>">
              </div>
              <div class="form-group col-sm-2">
                <label>Cat</label>
                <select class="form-control form-control-sm" name="cat" id="cat">
                  <option value="P" <?php if ($tic['cat_lic'] == "P") : ?>selected<?php endif; ?>>P</option>
                  <option value="A" <?php if ($tic['cat_lic'] == "A") : ?>selected<?php endif; ?>>A</option>
                  <option value="B" <?php if ($tic['cat_lic'] == "B") : ?>selected<?php endif; ?>>B</option>
                  <option value="C" <?php if ($tic['cat_lic'] == "C") : ?>selected<?php endif; ?>>C</option>
                  <option value="M" <?php if ($tic['cat_lic'] == "M") : ?>selected<?php endif; ?>>M</option>
                </select>
              </div>
              <div class="form-group col-sm-4">
                <label>Lugar de Nac.</label>
                <input type="text" style="text-transform:uppercase" class="form-control form-control-sm" id="lug_nac" name="lug_nac" value="<?php echo $tic['lugarnac'] ?>">
              </div>
              <div class="form-group col-sm-3">
                <label>Fecha de Nac.</label>
                <input type="date" class="form-control form-control-sm" id="f_nac" name="f_nac" value="<?php echo $tic['fechanac'] ?>">
              </div>
              <div class="form-group col-sm-1">
                <label>Edad</label>
                <input type="num" style="text-transform:uppercase" class="form-control form-control-sm" id="edad" name="edad" value="<?php echo $tic['edad'] ?>">
              </div>
              <!-- /////  -->
              <div class="form-group col-sm-2">
                <label>Sexo</label>
                <select class="form-control form-control-sm" name="sexo" id="sexo">
                  <option value="MASCULINO" <?php if ($tic['sexo'] == "MASCULINO") : ?>selected<?php endif; ?>>MASCULINO</option>
                  <option value="FEMENINA" <?php if ($tic['sexo'] == "FEMENINA") : ?>selected<?php endif; ?>>FEMENINA</option>
                </select>
              </div>
              <div class="form-group col-sm-3">
                <label>Est. civil</label>
                <select class="form-control form-control-sm" name="civil" id="civil">
                  <option value="SOLTERO" <?php if ($tic['ecivil'] == "SOLTERO") : ?>selected<?php endif; ?>>SOLTERO</option>
                  <option value="CASADO" <?php if ($tic['ecivil'] == "CASADO") : ?>selected<?php endif; ?>>CASADO</option>
                  <option value="DIVORCIADO" <?php if ($tic['ecivil'] == "DIVORCIADO") : ?>selected<?php endif; ?>>DIVORCIADO</option>
                  <option value="VIUDO" <?php if ($tic['ecivil'] == "VIUDO") : ?>selected<?php endif; ?>>VIUDO</option>
                </select>
              </div>
              <div class="form-group col-sm-5">
                <label>Domicilio</label>
                <input type="text" style="text-transform:uppercase" class="form-control form-control-sm" id="dm" name="dm" value="<?php echo $tic['domicilio'] ?>">
              </div>
              <div class="form-group col-sm-2">
                <label>Telefono</label>
                <input type="text" class="form-control form-control-sm" id="telf" name="telf" value="<?php echo $tic['telf'] ?>">
              </div>

              <!-- /////  -->
              <div class="form-group col-sm-2">
                <label>Sangre</label>
                <select class="form-control form-control-sm" name="sangre" id="sangre">
                  <option value="O+" <?php if ($tic['t_sangre'] == "O+") : ?>selected<?php endif; ?>>O+</option>
                  <option value="O-" <?php if ($tic['t_sangre'] == "O-") : ?>selected<?php endif; ?>>O-</option>
                  <option value="A+" <?php if ($tic['t_sangre'] == "A+") : ?>selected<?php endif; ?>>A+</option>
                  <option value="A-" <?php if ($tic['t_sangre'] == "A-") : ?>selected<?php endif; ?>>A-</option>
                  <option value="B+" <?php if ($tic['t_sangre'] == "B+") : ?>selected<?php endif; ?>>B+</option>
                  <option value="B-" <?php if ($tic['t_sangre'] == "B-") : ?>selected<?php endif; ?>>B-</option>
                  <option value="AB+" <?php if ($tic['t_sangre'] == "AB+") : ?>selected<?php endif; ?>>AB+</option>
                  <option value="AB-" <?php if ($tic['t_sangre'] == "AB-") : ?>selected<?php endif; ?>>AB-</option>
                </select>
              </div>
              <div class="form-group col-sm-3">
                <label>Clase Vehículo</label>
                <input type="text" style="text-transform:uppercase" class="form-control form-control-sm" id="clase_v" name="clase_v" value="<?php echo $tic['clase_v'] ?>">
              </div>
              <div class="form-group col-sm-2">
                <label>Placa</label>
                <input type="text" style="text-transform:uppercase" class="form-control form-control-sm" id="placa_v" name="placa_v" value="<?php echo $tic['placa_v'] ?>">
              </div>
              <div class="form-group col-sm-3">
                <label>N° CRPVA</label>
                <input type="text" style="text-transform:uppercase" class="form-control form-control-sm" id="crpva" name="crpva" value="<?php echo $tic['crpva_v'] ?>">
              </div>

              <!-- /////  -->
              <div class="form-group col-sm-3">
                <label>Tipo de Servicio</label>
                <input type="text" style="text-transform:uppercase" class="form-control form-control-sm" id="servi" name="servi" value="<?php echo $tic['tipo'] ?>">
              </div>
              <div class="form-group col-sm-4">
                <label>Sindicato/Asociacion</label>
                <input type="text" style="text-transform:uppercase" class="form-control form-control-sm" id="sindicato" name="sindicato" value="<?php echo $tic['asociacion'] ?>">
              </div>
              <div class="form-group col-sm-2">
                <label>Interno</label>
                <input type="text" style="text-transform:uppercase" class="form-control form-control-sm" id="int_v" name="int_v" value="<?php echo $tic['interno'] ?>">
              </div>
              <div class="form-group col-sm-2">
                <label>Fecha Registro</label>
                <td><input type="date" class="form-control form-control-sm" name="f_reg" id="f_reg" value="<?php echo $tic['fecha_ini']; ?>" min="<?php echo $fechaActual; ?>" /></td>
              </div>
            </div>
            <!-- DATOS DEL  -->

          </div>
          <div class="card card-primary col-sm-4">
            <div class="row" height="50%">
              <div class="form-group col-sm-12" align="center">
                <img src="<?php echo base_url() . "/assest/img/tic/" . $tic['foto1']; ?>" alt="" width="200px"></td>
                <div class="input-group">
                  <div class="col-sm-12" align="center">
                    <label>Cambiar foto del conductor</label>
                  </div>
                  <div class="custom-file">
                    <input type="file" class="form-control" name="foto_1" id="foto_1">
                    <input type="hidden" name="foto1Actual" id="foto1Actual" value="<?php echo $tic['foto1'] ?>">

                  </div>
                </div>
              </div>
            </div>
            <div class="row" height="50%">
              <div class="form-group col-sm-12" align="center">
                <img src="<?php echo base_url() . "/assest/img/tic/" . $tic['foto2']; ?>" alt="" width="200px"> <br>
                <div class="input-group">
                  <div class="col-sm-12" align="center">
                    <label>Cambiar foto del vehiculo</label>
                  </div>
                  <div class="custom-file">
                    <input type="file" class="form-control" name="foto_2" id="foto_2">
                    <input type="hidden" name="foto2Actual" id="foto2Actual" value="<?php echo $tic['foto2'] ?>">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </form>
  </div>
</section>
<div class="modal-footer justify-content-between">
  <input class="btn btn-primary" type="button" onclick="EditarTic(<?php echo $tic['id_tic']; ?>);" value="ACTUALIZAR">
  <button type="button" class="btn btn-default" data-dismiss="modal">CANCELAR</button>
</div>
</div>