<script src="<?php echo base_url(); ?>/assest/js/tic.js"></script>
<!-- Content Wrapper. Contains page content -->
<div class="container-fluid">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">

    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="card">
      <div class="card-header card-header text-white bg-success mb-3">
        <h3 class="card-title">CONDUCTORES REGISTRADOS</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <table id="dataTableActividades" class="table table-bordered table-striped">
          <thead>
            <tr role="row">
              <th style="width: 10px">No</th>
              <th>Municipio</th>
              <th>Nombre Completo</th>
              <th>Licencia</th>
              <th>Tipo de Vehículo</th>
              <th>Fecha Vigencia</th>
              <th>
                <a class="btn btn-block btn-primary" href="<?php echo base_url(); ?>/CTic/FRegTic">Nuevo TIC</a>
              </th>
            </tr>
          </thead>
          <tbody>

            <?php foreach ($lista_tic as $tic) {
            ?>
              <tr>
                <td><?php echo $tic['id_tic']; ?></td>
                <td><?php echo $tic['munic']; ?></td>
                <td><?php echo $tic['completo']; ?></td>
                <td><?php echo $tic['lic']; ?></td>
                <td><?php echo $tic['clase_v']; ?></td>
                <td><?php echo $tic['fecha_fin']; ?></td>
                <td>
                  <div class="btn-group">
                    <button class="btn btn-info btn-circle" onclick="MVerTic(<?php echo $tic['id_tic']; ?>);">
                      <i class="fas fa-eye"></i>
                    </button>
                    <button class="btn btn-warning btn-circle" onclick="MEditTic(<?php echo $tic['id_tic']; ?>);">
                      <i class="fas fa-edit"></i>
                    </button>
                    <button class="btn btn-danger btn-circle" onclick="MEliTic(<?php echo $tic['id_tic']; ?>);">
                      <i class="fas fa-trash"></i>
                    </button>
                    <button class="btn btn-success btn-circle" onclick="MPrintTic(<?php echo $tic['id_tic']; ?>);">
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
</div><!-- /.col -->