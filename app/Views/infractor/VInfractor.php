<script src="<?php echo base_url(); ?>/assest/js/infractor.js"></script>
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
      <div class="card-header text-white bg-danger mb-3">
        <h3 class="card-title">INFRACTORES REGISTRADOS</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <table id="dataTableInfractor" class="table table-bordered table-striped">
                    <thead>
                      <tr role="row">
                        <th style="width: 10px">No</th>
                        <th>Nombre Completo</th>
                        <th>CI</th>
                        <th>Sexo</th>
                        <th>Unidad</th>
                        <th>
                          <a class="btn btn-block btn-primary" href="<?php echo base_url(); ?>/CInfractor/FRegInfractor">NuevoInfractor</a>
                        </th>
                      </tr>
                    </thead>
                    <tbody id="resBusInfractor">
                      <?php foreach ($lista_infractor as $infractor) {
                        $idInfractor = $infractor['id_infractor'];
                        $fechaHecho = $infractor['completo_nom'];
                        $ciInfractor = $infractor['ci'];
                        $sexoInfractor = $infractor['sexo'];
                        $uniInfractor = $infractor['unidad'];
                      ?>
                        <tr>
                          <td><?php echo $infractor['id_infractor']; ?></td>
                          <td><?php echo $infractor['completo_nom']; ?></td>
                          <td><?php echo $infractor['ci']; ?></td>
                          <td><?php echo $infractor['sexo']; ?></td>
                          <td><?php echo $infractor['unidad']; ?></td>
                          <td>
                            <div class="btn-group">
                              <button class="btn btn-info btn-circle" onclick="MVerInfractor(<?php echo $infractor['id_infractor']; ?>);">
                                <i class="fas fa-eye"></i>
                              </button>
                              <button class="btn btn-warning btn-circle" onclick="MEditInfractor(<?php echo $infractor['id_infractor']; ?>);">
                                <i class="fas fa-edit"></i>
                              </button>
                              <button class="btn btn-success btn-circle" onclick="MPrintInfractor(<?php echo $infractor['id_infractor']; ?>);">
                                <i class="fas fa-print"></i>
                              </button>
                              <button class="btn btn-danger btn-circle" onclick="MEliInfractor(<?php echo $infractor['id_infractor']; ?>);">
                                <i class="fas fa-trash"></i>
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
            </div>
            <!-- /.col -->
          </div>
          <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>