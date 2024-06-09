<?php
include('../app/config.php');
include('../layout/sesion.php');
include('../layout/parte1.php');
include('../app/controllers/roles/listado_de_roles.php');


?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Registrar un nuevo Usuario</h1>
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
                          <div class="card card-primary">
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

                                        <form action="../app/controllers/usuarios/create.php" method="post">

                                          <div class="form-group">
                                            <label for="">Nombre</label>
                                            <input type="text" name="nombres" class="form-control" placeholder="Nombre del nuevo usuario" required>
                                          </div>
                                          <div class="form-group">
                                            <label for="">E-mail</label>
                                            <input type="mail" name="email" class="form-control" placeholder="e-mail" required>
                                          </div>
                                          <div class="form-group">
                                            <label for="">Rol</label>
                                            <select name="id_rol" id="id_rol" class="form-control">
                                                <?php foreach( $roles_datos as $roles_dato){ ?>
                                                  <option value="<?php echo $roles_dato['id_rol']; ?>"><?php echo $roles_dato['rol']; ?>  </option>
                                                <?php }?>
                                            </select>
                                          </div>
                                          <div class="form-group">
                                            <label for="">Contraseña</label>
                                            <input type="text" name="password_user" class="form-control" placeholder="" required>
                                          </div>
                                          <div class="form-group">
                                            <label for="">Repita la contraseña</label>
                                            <input type="text" name="password_user2" class="form-control" placeholder="" required>
                                          </div>
                                            <a href="index.php" class="btn btn-default">Cancelar</a>
                                            <button class="btn btn-primary" type="submit">Guardar</button>
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
