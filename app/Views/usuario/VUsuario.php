 <script src="<?php echo base_url(); ?>/assest/js/usuario.js"></script>
 <!-- Content Wrapper. Contains page content -->
 <!-- Main content -->
 <section class="content">
   <div class="container-fluid">
     <div class="row">
       <div class="col-md-12">
         <div class="card">
           <div class="card-header">
             <h3 class="card-title">LISTA USUARIOS</h3>
             <div class="card-tools">
               <div class="input-group input-group-sm" style="width: 200px;">
                 <input type="text" name="usuario_search" id="usuario_search" class="form-control float-right" placeholder="Carnet o nombre" onkeyup="BuscarUsuario(document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase());">

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
                   <th style="width: 10px">id</th>
                   <th>Usuario</th>
                   <th>Tipo de Rol</th>
                   <th>Grado</th>
                   <th>Nombres Completo</th>
                   <th>CI</th>
                   <!-- <th>Telefono</th> -->
                   <th>Unidad</th>
                   <th style="width: 40px">
                     <button class="btn btn-block btn-primary" onclick="MNuevoUsuario();">Nuevo</button>
                   </th>
                 </tr>
               </thead>
               <tbody id="resBusqueda">
                 <?php foreach ($lista_usuarios as $usuario) {
                    $idUsu = $usuario['id_usuario'];
                    $loginUsu = $usuario['login_usu'];
                    $rolUsu = $usuario['rol_usu'];
                    $gradoUsu = $usuario['grado_usu'];
                    $nombreUsu = $usuario['nombres_usu'];
                    $paternoUsu = $usuario['paterno_usu'];
                    $maternoUsu = $usuario['materno_usu'];
                    $ciUsu = $usuario['ci_usu'];
                    $telefUsu = $usuario['telefono_usu'];
                    $unidadUsu = $usuario['unidad_usu'];
                  ?>
                   <tr>
                     <td><?php echo $idUsu; ?></td>
                     <td><?php echo $loginUsu; ?></td>
                     <td><?php echo $rolUsu; ?></td>
                     <td><?php echo $gradoUsu; ?></td>
                     <td><?php echo $nombreUsu . " " . $paternoUsu . " " . $maternoUsu; ?></td>
                     <td><?php echo $ciUsu; ?></td>
                     <!-- <td><?php echo $telefUsu; ?></td> -->
                     <td><?php echo $unidadUsu; ?></td>
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
       </div>
       <!-- /.col -->

     </div>
     <!-- /.row -->
   </div><!-- /.container-fluid -->
 </section>
 <!-- /.content -->