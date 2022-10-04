 <script src="<?php echo base_url(); ?>/assest/js/usuario.js"></script>
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
      <div class="card-header card-header text-white bg-info mb-3">
         <h3 class="card-title">USUARIOS CON ACCESO AL SISTEMA</h3>
      </div>
       <!-- /.card-header -->
       <div class="card-body p-0">
         <table id="dataTableUsuarios" class="table" role="grid" aria-describedby="example2_info">
           <thead class="table-info">
             <tr>
               <th style="width: 10px">id</th>
               <th>Login</th>
               <th>Tipo de Rol</th>
               <th>CI</th>
               <!-- <th>Telefono</th> -->
               <th style="width: 40px">
                 <a class="btn btn-block btn-primary" href="<?php echo base_url(); ?>/CUsuario/FRegUsuario">Nuevo</a>
               </th>
             </tr>
           </thead>
           <tbody id="resBusqueda">
             <?php foreach ($lista_usuarios as $usuario) {
                $idUsu = $usuario['id_user'];
                $loginUsu = $usuario['login_usu'];
                $rolUsu = $usuario['rol_usu'];
                $ciUsu = $usuario['ci_usu'];
              ?>
               <tr>
                 <td><?php echo $idUsu; ?></td>
                 <td><?php echo $loginUsu; ?></td>
                 <td><?php echo $rolUsu; ?></td>                 
                 <td><?php echo $ciUsu; ?></td>
                 <td>
                   <div class="btn-group">
                     <button class="btn btn-info btn-circle" onclick="MVerUsuario(<?php echo $idUsu; ?>);">
                       <i class="fas fa-eye"></i>
                     </button>
                     <button class="btn btn-secondary btn-circle" onclick="MEditUsuario(<?php echo $idUsu; ?>);">
                       <i class="fas fa-edit"></i>
                     </button>
                     <button class="btn btn-danger btn-circle" onclick="MEliUsuario(<?php echo $idUsu; ?>);">
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
   </section>
   <!-- /.content -->
 </div>
 <!-- /.content-wrapper -->