<script src="<?php echo base_url(); ?>/assest/js/casos.js"></script>
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>GENERAR CUADROS EN EXCEL</h1>
          </div>
          <div class="col-sm-6">
            
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
<section class="content">
<div class="container-fluid">
    <div class="row">
        <!-- left column -->
        <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">PARA CASOS</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="post" action="<?php echo base_url(); ?>/CExcel/ReporteExcelCasos">
                    <!-- DATOS DEL CASO -->
                    <div class="card-body">
                        <label>Seleccione se Unidad</label>
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
                            <option value="CMDO. DPTAL. SANTA CRUZ">CMDO. DPTAL. SANTA CRUZ</option>
                        </select>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success">GENERAR EXCEL DE CASOS</button>
                        <a class="btn btn-default" href="<?php echo base_url(); ?>/CCasos">Cancelar</a>
                    </div>
                </form>
            </div>
            <!-- /.card -->

        </div>
        <!--/.col (left) -->
        <!-- right column -->
        <div class="col-md-6">
            <!-- Form Element sizes -->
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">PARA ACTIVIDADES</h3>
                </div>
                <form method="post" action="<?php echo base_url(); ?>/CExcel/ReporteExcelActividades">
                    <!-- DATOS DEL CASO -->
                    <div class="card-body">
                        <label>Seleccione su Unidad</label>
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
                            <option value="CMDO. DPTAL. SANTA CRUZ">CMDO. DPTAL. SANTA CRUZ</option>
                        </select>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-info">GENERAR EXCEL DE ACTIVIDADES</button>
                        <a class="btn btn-default" href="<?php echo base_url(); ?>/CModulos">Cancelar</a>
                    </div>
                </form>
            </div>
            <!-- /.card -->
        </div>
        <!--/.col (right) -->
    </div>
</div>
</section>