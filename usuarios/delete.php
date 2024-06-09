<?php
include('../app/config.php');
include('../layout/sesion.php');
include('../layout/parte1.php');
include('../app/controllers/usuarios/show_usuario.php');

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Datos de Usuario a eliminar</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">

              <!-- Card de registro de usuario -->
              <div class="row">
                  <div class="col-md-5">
                          <div class="card card-danger">
                              <div class="card-header">
                                    <h3 class="card-title">Verifique los datos del usuario a eliminar</h3>
                              </div>
                              <div class="card-body">
                                 
                                  <div class="row">
                                    <div class="col-md-12">
                                        <form action="../app/controllers/usuarios/delete_usuario.php" method="post">
                                            <input type="text" name="id_usuario" value="<?php echo $id_usuario_get; ?>" hidden>
                                            <div class="form-group">
                                                <label for="">Nombre</label>
                                                <input type="text" name="nombres" class="form-control" value="<?php echo $nombre_usuario_tabla; ?>" disabled >
                                            </div>
                                            <div class="form-group">
                                                <label for="">E-mail</label>
                                                <input type="mail" name="email" class="form-control" value="<?php echo $email_usuario_tabla; ?>" disabled>
                                            </div>
                                            <div class="form-group">
                                              <label for="">Rol</label>
                                              <input type="rol" name="rol" class="form-control" value="<?php echo $rol_usuario_tabla; ?>" disabled>
                                            </div>
                                            <a href="index.php" class="btn btn-default">Volver</a>
                                            <button class="btn btn-danger" type="submit">Eliminar</button>
                                        </form>

                                    </div>
                                  </div>
                              </div>
                          </div>
                     </div>     
                </div>
              <!-- FIN Card de registro de usuario -->

      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php
include('../layout/parte2.php');
include('../layout/mensajes.php');
?>
