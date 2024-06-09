<?php
include('app/config.php');
include('layout/sesion.php');
include('layout/parte1.php');
include('app/controllers/usuarios/listado_de_usuarios.php');
include('app/controllers/roles/listado_de_roles.php');
include('app/controllers/categorias/listado_de_categorias.php');
include('app/controllers/almacen/listado_de_productos.php');
include('app/controllers/proveedores/listado_de_proveedores.php');
include('app/controllers/compras/listado_de_compras.php');

//if (isset($_SESSION['nombre_sesion'])){ $nombre_sesion = $_SESSION['nombre_sesion']; }
//if (isset($_SESSION['rol_sesion'])){ $rol_sesion = $_SESSION['rol_sesion']; }

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><?php echo $rol_sesion; ?> Bienvenido al Sistema de Ventas </h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
       Contenido del sistema

          <div class="row">

                <!-- Cuadro Resumen USUARIOS -->
                <div class="col-lg-3 col-4">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3><?php echo count( $usuarios_datos); ?></h3>
                            <p>Usuarios Registrados</p>
                        </div>
                        <a href="<?php echo $URL?>/usuarios/create.php">
                            <div class="icon">
                                <i class="fas fa-user-plus"></i>
                            </div>
                        </a>
                        <a href="<?php echo $URL;?>/usuarios" class="small-box-footer">
                              Más detalles <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div> <!-- FIN Cuadro Resumen USUARIOS -->

                <!-- Cuadro Resumen ROLES -->
                <div class="col-lg-3 col-4">
                    <div class="small-box bg-info">
                          <div class="inner">
                              <h3><?php echo count( $roles_datos ); ?></h3>
                              <p>Roles Registrados</p>
                          </div>
                          <a href="<?php echo $URL?>/roles/create.php">
                              <div class="icon">
                              <i class="fas fa-address-card"></i>
                              </div>
                          </a>
                          <a href="<?php echo $URL?>/roles" class="small-box-footer">
                                Más detalles <i class="fas fa-arrow-circle-right"></i>
                          </a>
                    </div>
                </div>  <!-- FIN Cuadro Resumen ROLES -->

                <!-- Cuadro Resumen CATEGORIAS -->
                <div class="col-lg-3 col-4">
                    <div class="small-box bg-success">
                          <div class="inner">
                              <h3><?php echo count( $categorias_datos ); ?></h3>
                              <p>Categorías Registradas</p>
                          </div>
                          <a href="<?php echo $URL?>/categorias">
                              <div class="icon">
                              <i class="fas fa-tags"></i>
                              </div>
                          </a>
                          <a href="<?php echo $URL?>/categorias" class="small-box-footer">
                                Más detalles <i class="fas fa-arrow-circle-right"></i>
                          </a>
                    </div>
                </div>  <!-- FIN Cuadro Resumen CATEGORIAS -->

                <!-- Cuadro Resumen PRODUCTOS -->
                <div class="col-lg-3 col-4">
                    <div class="small-box bg-primary">
                          <div class="inner">
                              <h3><?php echo count( $productos_datos ); ?></h3>
                              <p>Productos Registrados</p>
                          </div>
                          <a href="<?php echo $URL?>/almacen/create.php">
                              <div class="icon">
                              <i class="fa fa-list"></i>
                              </div>
                          </a>
                          <a href="<?php echo $URL?>/almacen" class="small-box-footer">
                                Más detalles <i class="fas fa-arrow-circle-right"></i>
                          </a>
                    </div>
                </div>  <!-- FIN Cuadro Resumen PRODUCTOS -->

                <!-- Cuadro Resumen PROVEEDORES -->
                <div class="col-lg-3 col-4">
                    <div class="small-box bg-dark">
                          <div class="inner">
                              <h3><?php echo count( $proveedores_datos ); ?></h3>
                              <p>Proveedores Registrados</p>
                          </div>
                          <a href="<?php echo $URL?>/proveedores">
                              <div class="icon">
                              <i class="fa fa-car"></i>
                              </div>
                          </a>
                          <a href="<?php echo $URL?>/proveedores" class="small-box-footer">
                                Más detalles <i class="fas fa-arrow-circle-right"></i>
                          </a>
                    </div>
                </div>  <!-- FIN Cuadro Resumen PROVEEDORES -->


                <!-- Cuadro Resumen COMPRAS -->
                <div class="col-lg-3 col-4">
                    <div class="small-box bg-danger">
                          <div class="inner">
                              <h3><?php echo count( $compras_datos ); ?></h3>
                              <p>Compras Registradas</p>
                          </div>
                          <a href="<?php echo $URL?>/compras">
                              <div class="icon">
                              <i class="fa fa-cart-plus"></i>
                              </div>
                          </a>
                          <a href="<?php echo $URL?>/compras" class="small-box-footer">
                                Más detalles <i class="fas fa-arrow-circle-right"></i>
                          </a>
                    </div>
                </div>  <!-- FIN Cuadro Resumen COMPRAS -->


                <!-- Cuadro Resumen VENTAS -->
                <div class="col-lg-3 col-4">
                    <div class="small-box bg-orange">
                          <div class="inner">
                              <h3><?php echo count( $compras_datos ); ?></h3>
                              <p>Compras Registradas</p>
                          </div>
                          <a href="<?php echo $URL?>/compras">
                              <div class="icon">
                              <i class="fa fa-shopping-basket"></i>
                              </div>
                          </a>
                          <a href="<?php echo $URL?>/compras" class="small-box-footer">
                                Más detalles <i class="fas fa-arrow-circle-right"></i>
                          </a>
                    </div>
                </div>  <!-- FIN Cuadro Resumen VENTAS -->


        </div>

      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php
include('layout/parte2.php');
?>

