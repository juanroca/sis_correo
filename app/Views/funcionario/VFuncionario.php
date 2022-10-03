 <script src="<?php echo base_url(); ?>/assest/js/funcionario.js"></script>
 <!-- Content Wrapper. Contains page content -->
 <!-- Main content -->
 <section class="content">
   <div class="container-fluid">
     <div class="row">
       <div class="col-md-12">
         <div class="card">
           <div class="card-header">
             <h3 class="card-title">LISTA FUNCIONARIOS</h3>
             <div class="card-tools">
               <div class="input-group input-group-sm" style="width: 200px;">
                 <input type="text" name="" id="" class="form-control float-right" placeholder="Carnet o nombre" onkeyup="BuscarUsuario(document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase());">

                 <div class="input-group-append">
                   <button type="submit" class="btn btn-default">
                     <i class="fas fa-search"></i>
                   </button>
                 </div>
               </div>
             </div>
           </div>
           <!-- /.card-header -->
           <div class="card-body">
             <table class="table table-bordered">
               <thead>
                 <tr>
                   <th style="width: 10px">CI</th>
                   <th>Grado</th>
                   <th>Nombre completo</th>
                   <th>Cargo</th>
                   <th>Oficina</th>
                   <th>Telefono</th>
                   <th style="width: 40px">
                     <a class="btn btn-block btn-primary" href="<?php echo base_url(); ?>/CFunionario/FRegFuncionario">Nuevo</a>
                   </th>
                 </tr>
               </thead>
               <tbody id="resBusqueda">
                 <?php foreach ($lista_funcionarios as $Funcionario) {
                  $ciFun = $Funcionario['ci_funcionario'];
                  ?>
                   <tr>
                     <td><?php echo $Funcionario['ci_funcionario']; ?></td>
                     <td><?php echo $Funcionario['grado']; ?></td>
                     <td><?php echo $Funcionario['nombre'], ' ' . $Funcionario['ap_paterno'], ' ' . $Funcionario['ap_materno']; ?>
                     </td>
                     <td><?php echo $Funcionario['cargo']; ?></td>
                     <td><?php echo $Funcionario['id_oficina']; ?></td>
                     <td><?php echo $Funcionario['telefono']; ?></td>                     
                     <td>
                       <div class="btn-group">
                         <button class="btn btn-info btn-circle" onclick="MVerFuncionario(<?php echo $ciFun; ?>);">
                           <i class="fas fa-eye"></i>
                         </button>
                         <button class="btn btn-secondary btn-circle" onclick="MEditFuncionario(<?php echo $ciFun; ?>);">
                           <i class="fas fa-edit"></i>
                         </button>
                         <button class="btn btn-danger btn-circle" onclick="MEliFuncionario(<?php echo $ciFun; ?>);">
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