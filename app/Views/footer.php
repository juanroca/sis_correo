<!-- Footer -->
<footer class="page-footer font-small blue">

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">© 2021 Copyright:
    <a href="/"> tego.com</a>
    <div class="float-right d-none d-sm-inline-block">
    <b>Version</b> 2.0
  </div>
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->

<!-- Control Sidebar -->

</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?php echo base_url();?>/assest/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?php echo base_url();?>/assest/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?php echo base_url();?>/assest/dist/js/adminlte.min.js"></script>
  <!-- DataTables  & Plugins -->
  <script src="<?php echo base_url();?>/assest/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url();?>/assest/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="<?php echo base_url();?>/assest/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="<?php echo base_url();?>/assest/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="<?php echo base_url();?>/assest/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script src="<?php echo base_url();?>/assest/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
  <script src="<?php echo base_url();?>/assest/plugins/jszip/jszip.min.js"></script>
  <script src="<?php echo base_url();?>/assest/plugins/pdfmake/pdfmake.min.js"></script>
  <script src="<?php echo base_url();?>/assest/plugins/pdfmake/vfs_fonts.js"></script>
  <script src="<?php echo base_url();?>/assest/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
  <script src="<?php echo base_url();?>/assest/plugins/datatables-buttons/js/buttons.print.min.js"></script>
  <script src="<?php echo base_url();?>/assest/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
  <!-- SweetAlert2 -->
  <script src="<?php echo base_url();?>/assest/plugins/sweetalert2/sweetalert2.min.js"></script>
  <!-- Script para el Data table-->

  <script>
    $(function() {
      //PARA LA TABLA USUARIOS
      $("#dataTableUsuarios").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": true,
        "buttons": ["copy", "excel", "pdf", "print"],
        //Traducir subtitulos al español
        language: {
          "decimal": "",
          "emptyTable": "No hay informació",
          "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
          "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
          "infoFiltered": "(Filtrado de _MAX_ total entradas)",
          "infoPostFix": "",
          "thousands": ",",
          "lengthMenu": "Mostrar _MENU_ Entradas",
          "loadingRecords": "Cargando...",
          "processing": "Procesando...",
          "search": "Buscar",
          "zeroRecords": "Sin resultados encontrados",
          "paginate": {
            "first": "Primero",
            "last": "Ultimo",
            "next": "Siguiente",
            "previous": "Anterior",
          }
        }
      }).buttons().container().appendTo('#dataTableUsuarios_wrapper .col-md-6:eq(0)');

      //PARA LA TABLA FUNCIONARIOS
      $("#dataTableFuncionarios").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": true,
        "buttons": ["copy", "excel", "pdf", "print"],
        //Traducir subtitulos al español
        language: {
          "decimal": "",
          "emptyTable": "No hay informació",
          "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
          "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
          "infoFiltered": "(Filtrado de _MAX_ total entradas)",
          "infoPostFix": "",
          "thousands": ",",
          "lengthMenu": "Mostrar _MENU_ Entradas",
          "loadingRecords": "Cargando...",
          "processing": "Procesando...",
          "search": "Buscar",
          "zeroRecords": "Sin resultados encontrados",
          "paginate": {
            "first": "Primero",
            "last": "Ultimo",
            "next": "Siguiente",
            "previous": "Anterior",
          }
        }
      }).buttons().container().appendTo('#dataTableFuncionarios_wrapper .col-md-6:eq(0)');

      //PARA LA VISTA DOCUMENTOS
      $("#dataTableDoc").DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
        //"buttons": ["copy", "excel", "pdf", "print"],
        //Traducir subtitulos al español
        language: {
          "decimal": "",
          "emptyTable": "No hay informació",
          "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
          "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
          "infoFiltered": "(Filtrado de _MAX_ total entradas)",
          "infoPostFix": "",
          "thousands": ",",
          "lengthMenu": "Mostrar _MENU_ Entradas",
          "loadingRecords": "Cargando...",
          "processing": "Procesando...",
          "search": "Buscar",
          "zeroRecords": "Sin resultados encontrados",
          "paginate": {
            "first": "Primero",
            "last": "Ultimo",
            "next": "Siguiente",
            "previous": "Anterior",
          }
        }
      }).buttons().container().appendTo('#dataTableDoc_wrapper .col-md-6:eq(0)');
      /*
      //PARA LA VISTA ..............
      $("#dataTable...").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
        //Traducir subtitulos al español
        language: {
          "decimal": "",
          "emptyTable": "No hay informació",
          "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
          "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
          "infoFiltered": "(Filtrado de _MAX_ total entradas)",
          "infoPostFix": "",
          "thousands": ",",
          "lengthMenu": "Mostrar _MENU_ Entradas",
          "loadingRecords": "Cargando...",
          "processing": "Procesando...",
          "search": "Buscar",
          "zeroRecords": "Sin resultados encontrados",
          "paginate": {
            "first": "Primero",
            "last": "Ultimo",
            "next": "Siguiente",
            "previous": "Anterior",
          }
        }
      }).buttons().container().appendTo('#dataTable...._wrapper .col-md-6:eq(0)');*/
    });
  </script>

<!-- Sección de Modals -->
<!--modal PEQUEÑO-->
<div class="modal fade" id="modal-df">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <div id="contenido-default">

        </div>
        <div id="formulario-df">

        </div>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- MODAL MEDIANO -->
<div class="modal fade" id="modal-sm">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-body" id="formulario">
        <div id=formulario-sm>
          <!-- Aqui va el contenido -->
        </div>
      </div>
      <div id="mensaje-sm" style="display:flex; justify-content:center;">
        <!-- Aqui va el mensaje de confirmación -->

      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- MODAL GRANDE -->
<div class="modal fade" id="modal-lg">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"></span>
        </button>
      </div>
      <div class="modal-body" id="formulario-lg">
        <!-- Aqui va el contenido -->
      </div>
      <div id="mensaje-lg" style="display:flex; justify-content:center;">
        <!-- Aqui va el mensaje de confirmación -->
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- MODAL PANTALLA COMPLETA -->
<div class="modal fade" id="modal-xl">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header" id="mensaje-xl-title" style="display:flex; justify-content:center;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"></span>
        </button>
      </div>
      <div class="modal-body" id="formulario-xl">

      </div>
      <div id="mensaje-xl" style="display:flex; justify-content:center;">
        <!-- Aqui va el mensaje de confirmación -->
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
</body>

</html>