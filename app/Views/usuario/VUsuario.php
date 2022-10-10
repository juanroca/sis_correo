 <script src="<?php echo base_url(); ?>/assest/js/usuario.js"></script>
<!-- Content PAGE BODY (Page header) -->
<div class="content-wrapper" style="min-height: 475px;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">LISTA DE USUARIOS CON ACCESO</h1>
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
         <table id="dataTableUsuarios" class="table" role="grid" aria-describedby="example2_info">
           <thead class="table-info">
             <tr>
               <th style="width: 10px">ID</th>
               <th>Login</th>
               <th>Tipo de Rol</th> 
               <th>Grado y Nombre Completo</th>
               <th>CI</th>
               <th>Oficina</th>
               <!-- <th>Telefono</th> -->
               <th style="width: 40px">
                 <a class="btn btn-block btn-primary" href="<?php echo base_url(); ?>/CUsuario/FRegUsuario">Nuevo</a>
               </th>
             </tr>
           </thead>
           <tbody id="resBusqueda">
             <?php foreach ($lista_usuarios as $usuario) {
                $idUsu = $usuario['id_usuario'];
                $loginUsu = $usuario['login_usu'];
                $rolUsu = $usuario['rol_usu'];
                $grado = $usuario['grado'];
                $nombre = $usuario['nombre'];
                $paterno = $usuario['ap_paterno'];
                $materno = $usuario['ap_materno'];
                $ciUsu = $usuario['ci_fun'];
                $oficina = $usuario['oficina'];
              ?>
               <tr>
                 <td><?php echo $idUsu; ?></td>
                 <td><?php echo $loginUsu; ?></td>
                 <td><?php echo $rolUsu; ?></td>    
                 <td><?php echo $grado,' ',$nombre, ' ',$paterno,' ',$materno; ?></td>             
                 <td><?php echo $ciUsu; ?></td>
                 <td><?php echo $oficina; ?></td>
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