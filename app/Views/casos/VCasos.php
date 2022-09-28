<script src="<?php echo base_url(); ?>/assest/js/casos.js"></script>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">

    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="card">
      <div class="card-header card-header text-white bg-success mb-3">
        <h3 class="card-title">CASOS ATENDIDOS Y REGISTRADOS</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <table id="dataTableCasos" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>No</th>
              <th>FechaHecho</th>
              <th>Tipo de hecho</th>
              <th>Lugar del hecho</th>
              <th>Unidad</th>
              <th>
                <a class="btn btn-block btn-primary" href="<?php echo base_url(); ?>/CCasos/FRegCasos">Nuevo Caso</a>
              </th>
            </tr>
          </thead>
          <tbody>

            <?php foreach ($lista_casos as $casos) {

              $idCasos = $casos['id_casos'];

            ?>
              <tr>
                <td><?php echo $casos['id_casos']; ?></td>
                <td><?php echo $casos['fecha_hecho']; ?></td>
                <td><?php echo $casos['nat_hecho'], ' - ' . $casos['clave_pri'], ' ' . $casos['clave_sec'], ' ' . $casos['clave_ter']; ?>
                </td>
                <td><?php echo $casos['lug_hecho']; ?></td>
                <td><?php echo $casos['uni']; ?></td>
                <td>
                  <div class="btn-group">
                    <button class="btn btn-info btn-circle" onclick="MVerCasos(<?php echo $idCasos; ?>);">
                      <i class="fas fa-eye"></i>
                    </button>
                    <button class="btn btn-warning btn-circle" onclick="MEditCasos(<?php echo $idCasos; ?>);">
                      <i class="fas fa-edit"></i>
                    </button>
                    <button class="btn btn-danger btn-circle" onclick="MEliCasos(<?php echo $idCasos; ?>);">
                      <i class="fas fa-trash"></i>
                    </button>
                    <button class="btn btn-success btn-circle" onclick="MReporteCasos(<?php echo $idCasos; ?>);">
                      <i class="fas fa-print"></i>
                    </button>
                  </div>
                </td>
              </tr>
            <?php } ?>

          </tbody>

        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->