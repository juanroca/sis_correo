 <script src="<?php echo base_url(); ?>/assest/js/ht.js"></script>
 <!-- Content PAGE BODY (Page header) -->
 <div class="content-wrapper" style="min-height: 475px;">
   <!-- Content Header (Page header) -->
   <div class="p-3 mb-2 bg-info text-white" style="--bs-bg-opacity: .5;">
     <h1 class="text-center m-0">DOCUMENTOS OFICIADOS</h1>
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
               <th style="width: 10px">HT</th>
               <th>De fecha</th>
               <th>Destinatario</th>
               <th>Instrucción</th>
               <th>Situación</th>
               <th style="width: 40px">
                 <a class="btn btn-block btn-primary" href="<?php echo base_url(); ?>/CHt/FRegHt">Nuevo</a>
               </th>
             </tr>
           </thead>
           <tbody id="resBusqueda">
             <?php foreach ($lista_hts as $ht) {
                $idHt = $ht['id_ht'];
                $fechaOficiado = $ht['fecha'];
                $destino = $ht['destinatario'];
                $instruc = $ht['instruccion'];
                $situacion = $ht['situa'];

              ?>
               <tr>
                 <td class="table-info"><?php echo $idHt; ?></td>
                 <td><?php echo $fechaOficiado; ?></td>
                 <td><?php echo $destino; ?></td>
                 <td><?php echo $instruc; ?></td>
                 <td><?php echo $situacion; ?></td>
                 <td>
                   <div class="btn-group">
                     <button class="btn btn-info btn-circle" onclick="MVerHt(<?php echo $idHt; ?>);">
                       <i class="fas fa-eye"></i>
                     </button>
                     <button class="btn btn-secondary btn-circle" onclick="MEditHt(<?php echo $idHt; ?>);">
                       <i class="fas fa-edit"></i>
                     </button>                     
                     <a class="btn-lg btn-warning btn-circle" href="<?php echo base_url(); ?>/CHt">
                       <i class="fas fa-file-export"></i></a>
                     </button>
                     <button class="btn btn-danger btn-circle" onclick="MEliHt(<?php echo $idHt; ?>);">
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