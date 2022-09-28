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
      var img = document.getElementById('img_1');
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
      var img = document.getElementById('img_2');
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
    <form action="RegTic" id="FRegTic" methot="POST" enctype="multipart/form-data" onsubmit="return validar();">
      <section class="col-lg-12 connectedSortable ui-sortable">
        <div class="card-header card-header text-white bg-success mb-3">
          <h2 class="card-title">NUEVO REGISTRO DE CONDUCTOR</h2>
        </div>
        <!-- DATOS -->
        <div class="row">
          <div class="card card-succes col-sm-8">
            <!-- UNIDAD Y UBICACIÓN -->
            <div class="row">
              <div class="form-group col-sm-2">
                <label>Departameto</label>
                <select class="form-control form-control-sm" name="dpto" id="dpto">
                  <option value="SANTA CRUZ" selected>SANTA CRUZ</option>
                  <option value="COCHABAMBA">COCHABAMBA</option>
                  <option value="LA PAZ">LA PAZ</option>
                  <option value="ORURO">ORURO</option>
                  <option value="CHUQUISACA">CHUQUISACA</option>
                  <option value="POTOSI">POTOSI</option>
                  <option value="TARILA">TARIJA</option>
                  <option value="BENI">BENI</option>
                  <option value="PANDO">PANDO</option>
                </select>
              </div>
              <div class="form-group col-sm-3">
                <label>Municipio</label>
                <input type="text" style="text-transform:uppercase" class="form-control form-control-sm" id="municipio" name="municipio">
              </div>
              <div class="form-group col-sm-3">
                <label>Unidad</label>
                <input type="text" style="text-transform:uppercase" class="form-control form-control-sm" id="unidad" name="unidad">
              </div>
              <div class="form-group col-sm-2">
                <label>N° TIC</label>
                <input type="text" style="text-transform:uppercase" class="form-control is-warning form-control-sm" id="tic" name="tic">
              </div>
            </div>
            <br>

            <!-- DATOS DEL CONDUCTOR -->
            <div class="row">
              <div class="form-group col-sm-3">
                <label>Nombres</label>
                <input type="text" style="text-transform:uppercase" class="form-control form-control-sm" id="nom" name="nom">
              </div>
              <div class="form-group col-sm-3">
                <label>Ap. Paterno</label>
                <input type="text" style="text-transform:uppercase" class="form-control form-control-sm" id="pat" name="pat">
              </div>
              <div class="form-group col-sm-3">
                <label>Ap. Materno</label>
                <input type="text" style="text-transform:uppercase" class="form-control form-control-sm" id="mat" name="mat">
              </div>
              <div class="form-group col-sm-2">
                <label>N° Licencia</label>
                <input type="text" style="text-transform:uppercase" class="form-control form-control-sm" id="lic" name="lic">
              </div>
              <div class="form-group col-sm-1">
                <label>Cat</label>
                <select class="form-control form-control-sm" name="cat" id="cat">
                  <option value="P" selected>P</option>
                  <option value="A">A</option>
                  <option value="B">B</option>
                  <option value="C">C</option>
                  <option value="M">M</option>
                </select>
              </div>
              <!-- /////  -->
              <div class="form-group col-sm-5">
                <label>Lugar de Nac.</label>
                <input type="text" style="text-transform:uppercase" class="form-control form-control-sm" id="lug_nac" name="lug_nac">
              </div>
              <div class="form-group col-sm-2">
                <label>Fecha de Nac.</label>
                <input type="date" class="form-control form-control-sm" id="f_nac" name="f_nac">
              </div>
              <div class="form-group col-sm-2">
                <label>Sexo</label>
                <select class="form-control form-control-sm" name="sexo" id="sexo">
                  <option value="MASCULINO" selected>MASCULINO</option>
                  <option value="FEMENINO">FEMENINO</option>
                </select>
              </div>
              <div class="form-group col-sm-1">
                <label>Edad</label>
                <input type="num" style="text-transform:uppercase" class="form-control form-control-sm" id="edad" name="edad">
              </div>
              <div class="form-group col-sm-2">
                <label>Est. civil</label>
                <select class="form-control form-control-sm" name="civil" id="civil">
                  <option value="SOLTERO" selected>SOLTERO</option>
                  <option value="CASADO">CASADO</option>
                  <option value="DIVORCIADO">DIVORCIADO</option>
                  <option value="VIUDO">VIUDO</option>
                </select>
              </div>
              <!-- /////  -->
              <div class="form-group col-sm-5">
                <label>Domicilio</label>
                <input type="text" style="text-transform:uppercase" class="form-control form-control-sm" id="dm" name="dm">
              </div>
              <div class="form-group col-sm-3">
                <label>Telefono</label>
                <input type="text" class="form-control form-control-sm" id="telf" name="telf">
              </div>
              <div class="form-group col-sm-2">
                <label>Tipo de sangre</label>
                <select class="form-control form-control-sm" name="sangre" id="sangre">
                  <option value="O+" selected>O+</option>
                  <option value="O-">O-</option>
                  <option value="A+">A+</option>
                  <option value="A-">A-</option>
                  <option value="B+">B+</option>
                  <option value="B-">B-</option>
                  <option value="AB+">AB+</option>
                  <option value="AB-">AB-</option>
                </select>
              </div>

              <!-- /////  -->
              <div class="form-group col-sm-2">
                <label>Clase de Vehículo</label>
                <input type="text" style="text-transform:uppercase" class="form-control form-control-sm" id="clase_v" name="clase_v">
              </div>
              <div class="form-group col-sm-2">
                <label>Placa</label>
                <input type="text" style="text-transform:uppercase" class="form-control form-control-sm" id="placa_v" name="placa_v">
              </div>
              <div class="form-group col-sm-2">
                <label>N° CRPVA RUAT</label>
                <input type="text" style="text-transform:uppercase" class="form-control form-control-sm" id="crpva" name="crpva">
              </div>
              <div class="form-group col-sm-3">
                <label>Sindicato/Asociacion</label>
                <input type="text" style="text-transform:uppercase" class="form-control form-control-sm" id="sindicato" name="sindicato">
              </div>
              <div class="form-group col-sm-1">
                <label>Interno</label>
                <input type="text" style="text-transform:uppercase" class="form-control form-control-sm" id="int_v" name="int_v">
              </div>
              <div class="form-group col-sm-2">
                <label>Tipo de Servicio</label>
                <input type="text" style="text-transform:uppercase" class="form-control form-control-sm" id="servi" name="servi">
              </div>
              <div class="form-group col-sm-2">
                <label>Fecha Registro</label>
                <td><input type="date" class="form-control form-control-sm" name="f_reg" id="f_reg" value="<?php echo date('Y-m-d'); ?>" min="<?php echo date('Y-m-d'); ?>" /></td>
              </div>
            </div>
            <!-- DATOS DEL  -->

          </div>
          <div class="card card-primary col-sm-4">
            <div class="row" height="50%">
              <div class="form-group col-sm-12">
                <img id="img_1" width="280" height="180" /> <br>
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="foto_1" name="foto_1">
                    <label class="custom-file-label" for="foto_1">Fotografía del Conductor</label>
                  </div>
                </div>
              </div>
            </div>
            <div class="row" height="50%">
              <div class="form-group col-sm-12">
                <img id="img_2" width="280" height="180" /> <br>
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="foto_2" name="foto_2">
                    <label class="custom-file-label" for="foto_2">Fotografía del Conductor</label>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </form>
  </div>
  <!-- /.card-body -->

  <div class="modal-footer justify-content-between">
    <input class="btn btn-primary" type="button" onclick="RegTic();" value="Guardar">
    <a class="btn btn-default" href="<?php echo base_url(); ?>/CTic">Cancelar</a>
  </div>

</section>