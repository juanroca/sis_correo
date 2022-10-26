 <script src="<?php echo base_url(); ?>/assest/js/documento.js"></script>
 <!-- Content PAGE BODY (Page header) -->
 <div class="content-wrapper" style="min-height: 475px;">
   <!-- Content Header (Page header) -->
   <div class="p-3 mb-2 bg-info text-white" style="--bs-bg-opacity: .5;">
     <h1 class="text-center m-0">DOCUMENTOS REGISTRADOS</h1>
   </div>
   <!-- /.content-PAGE BODY -->


   <!-- Main content -->
   <section class="content">
     <div class="card">
       <!-- /.card-header -->
       <div class="card-body p-0">
         <table id="dataTableDoc" class="table" role="grid" aria-describedby="example2_info">
           <thead class="table-info">
             <tr class="table-info">
               <th style="width: 10px">ID</th>
               <th>Fecha Recibido</th>
               <th>Tipo</th>
               <th>Origen</th>
               <th>Ref.</th>
               <th>Situación</th>
               <th style="width: 40px">
                 <a class="btn btn-block btn-primary" href="<?php echo base_url(); ?>/CDocumento/FRegDocumento">Nuevo</a>
               </th>
             </tr>
           </thead>
           <tbody id="resBusqueda">
             <?php foreach ($lista_documentos as $documento) {
                $idDoc = $documento['id_documento'];
                $fechaRecibido = $documento['fecha_recibido'];
                $tipo = $documento['tipo'];
                $origen = $documento['origen'];
                $ref = $documento['referencia'];
                $situacion = $documento['situa'];

              ?>
               <tr>
                 <td class="table-info"><?php echo $idDoc; ?></td>
                 <td><?php echo $fechaRecibido; ?></td>
                 <td><?php echo $tipo; ?></td>
                 <td><?php echo $origen; ?></td>
                 <td><?php echo $ref; ?></td>
                 <td><?php echo $situacion; ?></td>
                 <td>
                   <div class="btn-group">
                     <button class="btn btn-info btn-circle" onclick="MVerDocumento(<?php echo $idDoc; ?>);">
                       <i class="fas fa-eye"></i>
                     </button>
                     <button class="btn btn-secondary btn-circle" onclick="MEditDocumento(<?php echo $idDoc; ?>);">
                       <i class="fas fa-edit"></i>
                     </button>     
                     <a class="btn-lg btn-warning btn-circle" onclick="<?php echo base_url(); ?>/CHt/FRegHtID">
                       <i class="fas fa-file-export"></i></a>
                     </button>
                     <button class="btn btn-danger btn-circle" onclick="MEliDocumento(<?php echo $idDoc; ?>);">
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
 <!-- /.row -->
 </div><!-- /.container-fluid -->
 </section>
 <!-- /.content -->