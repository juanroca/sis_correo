 <script src="<?php echo base_url(); ?>/assest/js/funcionario.js"></script>
<!-- Content PAGE BODY (Page header) -->
<div class="content-wrapper" style="min-height: 475px;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">LISTA DE FUNCIONARIOS REGISTRADOS</h1>
          </div><!-- /.col -->          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-PAGE BODY -->


   <!-- Main content -->
   <section class="content">
     <div class="card">      
       <!-- /.card-header -->
       <div class="card-body p-0">
         <table id="dataTableFuncionarios" class="table" role="grid" aria-describedby="example2_info">
               <thead class="table-success">
                 <tr class="table-success">
                   <th style="width: 10px">CI</th>
                   <th>Grado</th>
                   <th>Nombre completo</th>
                   <th>Unidad</th>
                   <th>Oficina</th>
                   <th>Telefono</th>
                   <th style="width: 40px">
                     <a class="btn btn-block btn-primary" href="<?php echo base_url(); ?>/CFuncionario/FRegFuncionario">Nuevo</a>
                   </th>
                 </tr>
               </thead>
               <tbody id="resBusqueda">
                 <?php foreach ($lista_funcionarios as $Funcionario) {
                  $idFun = $Funcionario['id_funcionario'];
                  ?>
                   <tr>
                     <td class="table-success"><?php echo $Funcionario['ci_fun']; ?></td>
                     <td><?php echo $Funcionario['grado']; ?></td>
                     <td><?php echo $Funcionario['nombre'], ' ' . $Funcionario['ap_paterno'], ' ' . $Funcionario['ap_materno']; ?>
                     </td>
                     <td><?php echo $Funcionario['unidad']; ?></td>
                     <td><?php echo $Funcionario['oficina']; ?></td>
                     <td><?php echo $Funcionario['telefono']; ?></td>                     
                     <td>
                       <div class="btn-group">
                         <button class="btn btn-info btn-circle" onclick="MVerFuncionario(<?php echo $idFun; ?>);">
                           <i class="fas fa-eye"></i>
                         </button>
                         <button class="btn btn-secondary btn-circle" onclick="MEditFuncionario(<?php echo $idFun; ?>);">
                           <i class="fas fa-edit"></i>
                         </button>
                         <button class="btn btn-danger btn-circle" onclick="MEliFuncionario(<?php echo $idFun; ?>);">
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