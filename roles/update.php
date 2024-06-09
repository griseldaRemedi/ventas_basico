<?php
include('../app/config.php');
include('../layout/sesion.php');
include('../layout/parte1.php');
include('../app/controllers/roles/update_roles.php');
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Registrar un nuevo Rol</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">

              <!-- Card de registro de roles -->
              <div class="row">
                  <div class="col-md-5">
                          <div class="card card-success">
                              <div class="card-header">
                              <h3 class="card-title"> Ingresar los datos requeridos</h3>
                                  <div class="card-tools">
                                      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                      </button>
                                  </div>
                              </div>
                              <div class="card-body">
                                 
                                  <div class="row">
                                    <div class="col-md-12">

                                        <form action="../app/controllers/roles/update.php" method="post">
                                            <input type="hidden" name="id_rol" value="<?php echo $id_rol_tabla; ?>">
                                            <div class="form-group">
                                                <label for="">Rol</label>
                                                <input type="text" name="rol" class="form-control" value="<?php echo $nombre_rol_tabla; ?>" required>
                                            </div>
                                            
                                            <a href="index.php" class="btn btn-default">Cancelar</a>
                                            <button class="btn btn-success" type="submit">Actualizar</button>
                                        </form>

                                    </div>
                                  </div>
                              </div>
                          </div>
                     </div>     
                </div>
              <!-- FIN Card de registro de roles -->

      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php
include('../layout/parte2.php');
include('../layout/mensajes.php');
?>
