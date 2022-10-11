<body class="hold-transition sidebar-mini">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>

      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index3.html" class="brand-link">
        <img src="<?php echo base_url(). "/assest/dist/img/logo_correo.png";?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="<?php echo base_url(). "/assest/dist/img/avatar.png";?>" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block">Bienvenido </a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <!-- FUNCIONARIOS -->
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
                <p>
                  FUNCIONARIOS
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?php echo base_url(); ?>/CFuncionario" class="nav-link">
                    <i class="far fa-circle nav-icon"> </i>
                    <p>Lista de Funcionarios</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url(); ?>/CUsuario" class="nav-link">
                    <i class="far fa-circle nav-icon"> </i>
                    <p>Lista de Usuarios</p>
                  </a>
                </li>
              </ul>
            </li>
            <!-- DOCUMENTOS -->
            <li class="nav-item">
              <a href="" class="nav-link">
                <i class="nav-icon fas fa-file"></i>
                <p>
                  DOCUMENTOS
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?php echo base_url(); ?>/CDocumento" class="nav-link">
                    <i class="far fa-circle nav-icon"> </i>
                    <p>Documentos Recibidos</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url(); ?>/CHt" class="nav-link">
                    <i class="far fa-circle nav-icon"> </i>
                    <p>Documentos Oficiados</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="FNuevoPaciente" class="nav-link">
                    <i class="far fa-circle nav-icon"> </i>
                    <p>Documentos Respondidos</p>
                  </a>
                </li>
              </ul>
            </li>
            <!-- PRODUCTOS -->
            <li class="nav-item">
              <a href="" class="nav-link">
                <i class="nav-icon fas fa-book-medical"></i>
                <p>
                  Consultas
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="" class="nav-link">
                    <i class="far fa-circle nav-icon"> </i>
                    <p>Lista de consultas</p>
                  </a>
                </li>
              </ul>
            </li>
            <!-- VENTAS -->
            <li class="nav-item">
              <a href="" class="nav-link">
                <i class="nav-icon fas fa-credit-card"></i>
                <p>
                  Ventas
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="ventas" class="nav-link">
                    <i class="far fa-circle nav-icon"> </i>
                    <p>Lista de ventas</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="salir" class="nav-link">
                <i class="fas fa-door-open"></i>
                <p>
                  Salir
                </p>
              </a>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>