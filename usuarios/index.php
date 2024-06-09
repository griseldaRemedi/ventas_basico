<?php
include('../app/config.php');
include('../layout/sesion.php');
include('../layout/parte1.php');
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-8">
            <h1 class="m-0">Usuarios registrados</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">

            <!-- div row -->
            <div class="row">
                <div class="col-md-8">

                    <!-- Card de listado de usuario -->
                        <div class="card card-outline card-primary">
                            <div class="card-header">
                            <h3 class="card-title">Usuarios registrados</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                  <table id="example1" class="table table-bordered table-striped table-responsive">
                                        <thead>
                                              <tr>
                                                <th>Nro</th>
                                                <th>Nombre</th>
                                                <th>Email</th>
                                                <th>Rol</th>
                                                <th>Acciones</th>
                                              </tr>
                                        </thead>
                                        <tbody>

                                          <?php 
                                              include('../app/controllers/usuarios/listado_de_usuarios.php');
                                              $contador_usr = 0;
                                              foreach( $usuarios_datos as $usuario ){ 
                                                  $id_usuario = $usuario['id_usuario'];
                                                  $contador_usr++;
                                                ?>
                                                    <tr>
                                                          <td> <?php echo $contador_usr; ?> </td>
                                                          <td> <?php echo $usuario['nombres']; ?> </td>
                                                          <td> <?php echo $usuario['email']; ?> </td>
                                                          <td> <?php echo $usuario['rol']; ?> </td>
                                                          <td> 
                                                            <center>
                                                                <div class="btn-group">
                                                                  <a href="show.php?id=<?php echo $id_usuario; ?>" type="button" class="btn btn-info"><i class="fa fa-eye"></i>Mostrar</a>
                                                                  <a href="update.php?id=<?php echo $id_usuario; ?>" type="button" class="btn btn-success"><i class="fa fa-pen"></i>Editar</a>
                                                                  <a href="delete.php?id=<?php echo $id_usuario; ?>" type="button" class="btn btn-danger"><i class="fa fa-trash"></i>Borrar</a>
                                                                </div>
                                                            </center>
                                                          </td>
                                                    </tr>

                                         <?php } ?>

                                        </tbody>
                                        <tfoot>
                                              <tr>
                                                <th>Nro</th>
                                                <th>Nombre</th>
                                                <th>Email</th>
                                                <th>Acciones</th>
                                              </tr>
                                        </tfoot>
                                    </table>
                            </div>
                        </div>
                    <!-- FIN Card de listado de usuario -->

                </div>
            </div> <!-- FIN div row -->


    </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


<?php
include('../layout/parte2.php');
include('../layout/mensajes.php');
?>

<script>
  $(function () {
    $("#example1").DataTable({    
     
       language: {
              "emptyTable": "No hay información",
              "decimal": "",
              "info": "Mostrando _START_ a _END_ de _TOTAL_ Usuarios",
              "infoEmpty": "Mostrando 0 to 0 of 0 Usuarios",
              "infoFiltered": "(Filtrado de MAX total Usuarios)",
              "infoPostFix": "",
              "thousands": ",",
              "lengthMenu": "Mostrar _MENU_ Usuarios",
              "loadingRecords": "Cargando...",
              "processing": "Procesando...",
              "search": "Buscador:",
              "zeroRecords": "Sin resultados encontrados",
              "paginate": {
                  "first": "Primero",
                  "last": "Ultimo",
                  "next": "Siguiente",
                  "previous": "Anterior"
              }
             },
      "responsive": true, "lengthChange": true, "autoWidth": false,
   "pageLength": 5, 
      buttons: [{
                        extend: 'collection',
                        text: 'Reportes',
                        orientation: 'landscape',
                        buttons: [{
                            text: 'Copiar',
                            extend: 'copy'
                        }, {
                            extend: 'pdf',
                        }, {
                            extend: 'csv',
                        }, {
                            extend: 'excel',
                        }, {
                            text: 'Imprimir',
                            extend: 'print'
                        }
                        ]
                    },
                        {
                            extend: 'colvis',
                            text: 'Visor de columnas'
                        }
                    ],
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
</script>