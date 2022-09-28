<script src="<?php echo base_url(); ?>/assest/js/conflicto.js"></script>
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
                        <h3 class="card-title">CONFLICTOS SOCIALES</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="post" action="<?php echo base_url(); ?>/CExcel/ReporteExcelConflictos">
                        <!-- DATOS DEL CASO -->
                        <div class="card-body">
                            <label>Seleccione su Departamento</label>
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
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-success">GENERAR EXCEL DE CONFLICTOS</button>
                            <a class="btn btn-default" href="<?php echo base_url(); ?>/CConflicto">Cancelar</a>
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
                        <h3 class="card-title">PERSONAS BUSCADAS</h3>
                    </div>
                    <form method="post" action="">
                        <!-- DATOS DEL CASO -->
                        <div class="card-body">
                            <label>Seleccione su Departamento</label>
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
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-info">GENERAR EXCEL DE BUSCADOS</button>
                            <a class="btn btn-default" href="<?php echo base_url(); ?>/CBuscados">Cancelar</a>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
            <!--/.col (right) -->
        </div>
    </div>
</section>