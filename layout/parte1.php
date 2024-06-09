<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sistema de Ventas</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?php echo $URL;?>/public/templates/AdminLTE-3.2.0/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo $URL;?>/public/templates/AdminLTE-3.2.0/dist/css/adminlte.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo $URL;?>/public/templates/AdminLTE-3.2.0/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo $URL;?>/public/templates/AdminLTE-3.2.0/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo $URL;?>/public/templates/AdminLTE-3.2.0/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- modal headers style ---->
  <link rel="stylesheet" href="<?php echo $URL;?>/public/css/modal_headers.css">
  <!-- favicon ---->
  <link rel="icon" type="image/jpg" href="<?php echo $URL;?>/public/images/ventas.png"/>

  <!-- jQuery -->
  <script src="<?php echo $URL;?>/public/templates/AdminLTE-3.2.0/plugins/jquery/jquery.min.js"></script>

  <!-- Sweetalert2 -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

<!-- Modal del bienvenida
<script>
  Swal.fire({
  position: "top-end",
  icon: "success",
  title: "Bienvenido a Sistema de Ventas <?php echo $nombre_sesion; ?>",
  showConfirmButton: false,
  timer: 1500
});
</script> 
 -->

<!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Sistema de Ventas</a>
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
    <a href="<?php echo $URL; ?>" class="brand-link">
      <img src="<?php echo $URL;?>/public/images/ventas.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Sistema de Ventas</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo $URL;?>/public/images/user.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $nombre_sesion; ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          
          <li class="nav-item"> <!---  usuarios --->
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Usuarios
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo$URL?>/usuarios" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listado de Usuarios</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo$URL?>/usuarios/create.php" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Creación de Ususario</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item"> <!---  Roles --->
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-address-card"></i>
              <p>
                Roles
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo$URL?>/roles" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listado de Roles</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo$URL?>/roles/create.php" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Creación de Roles</p>
                </a>
              </li>
            </ul>
          </li> <!---  fin Roles --->

          <li class="nav-item"> <!---  Categorías --->
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tags"></i>
              <p>
                Categorías
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo$URL?>/categorias" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listado de Categorías</p>
                </a>
              </li>
            </ul>
          </li> <!---  fin Categorías --->

          <li class="nav-item"> <!---  almacen --->
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-list"></i>
              <p>
                Almacen
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo$URL?>/almacen" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listado de Productos</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo$URL?>/almacen/create.php" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Creación de Productos</p>
                </a>
              </li>


            </ul>
          </li> <!---  fin almacen --->


          <li class="nav-item"> <!---  compra --->
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-cart-plus"></i>
              <p>
                Compras
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo$URL?>/compras" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listado de Compras</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo$URL?>/compras/create.php" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ingresar nueva compra</p>
                </a>
              </li>
            </ul>
          </li> <!---  fin compras --->

          <li class="nav-item"> <!---  ventas --->
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-shopping-basket"></i>
              <p>
                Ventas
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo$URL?>/ventas" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listado de ventas</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo$URL?>/ventas/create.php" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Realizar venta</p>
                </a>
              </li>
            </ul>
          </li> <!---  fin ventas --->



          <li class="nav-item"> <!---  Proveedores --->
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-car"></i>
              <p>
                Proveedores
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo$URL?>/proveedores" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listado de Proveedores</p>
                </a>
              </li>
            </ul>
          </li> <!---  fin Proveedores --->

          <li class="nav-item">
            <a href="<?php echo $URL?>/app/controllers/login/cerrar_sesion.php" class="nav-link" style="background-color: #dc3545;">
              <i class="nav-icon fas fa-door-closed"></i>
              <p>
                Cerrar Sesión
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>