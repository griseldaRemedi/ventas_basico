<?php
include('../app/config.php');
include('../layout/sesion.php');
include('../layout/parte1.php');
include('../app/controllers/usuarios/update_usuario.php');
include('../app/controllers/roles/listado_de_roles.php');

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Actualizar datos de Usuario</h1>
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
                          <div class="card card-success">
                              <div class="card-header">
                                    <h3 class="card-title"> Ingrese los datos requeridos</h3>
                              </div>
                              <div class="card-body">
                                 
                                  <div class="row">
                                    <div class="col-md-12">
                                        <form action="../app/controllers/usuarios/update.php" method="post">
                                            <input type="text" name="id_usuario" value="<?php echo $id_usuario_get; ?>" hidden>
                                            <div class="form-group">
                                                <label for="">Nombre</label>
                                                <input type="text" name="nombres" class="form-control" value="<?php echo $nombre_usuario_tabla; ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="">E-mail</label>
                                                <input type="mail" name="email" class="form-control" value="<?php echo $email_usuario_tabla; ?>" required>
                                            </div>
                                            <div class="form-group">
                                              <label for="">Rol</label>
                                              <select name="id_rol" id="id_rol" class="form-control">
                                                  <?php foreach( $roles_datos as $roles_dato){  ?>
                                                            <option value="<?php echo $roles_dato['id_rol']; ?>"
                                                            <?php
                                                            echo $roles_dato['id_rol'].' - '.$rol_usuario_tabla;
                                                            if ($roles_dato['rol'] ==  $rol_usuario_tabla) {?>
                                                                        selected = "selected"
                                                            <?php } ?>
                                                            ><?php echo $roles_dato['rol']; ?>  </option>
                                                  <?php } ?>
                                              </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Contraseña</label>
                                                <input type="text" name="password_user" class="form-control" placeholder="">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Repita la contraseña</label>
                                                <input type="text" name="password_user2" class="form-control" placeholder="">
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
