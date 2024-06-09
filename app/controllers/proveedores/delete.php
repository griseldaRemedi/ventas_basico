<?php
include('../../config.php');

  $id_proveedor = $_GET['id_proveedor'];
  $sql_proveedor = "DELETE FROM `tb_proveedores` WHERE id_proveedor=:id_proveedor";
  $query_proveedor = $pdo->prepare($sql_proveedor);
  $query_proveedor->bindParam( ':id_proveedor', $id_proveedor);
  
  if ($query_proveedor->execute()){ 
    session_start();
    $_SESSION['mensaje'] = "Se eliminó con éxito";
    $_SESSION['icono'] = "success"; 
    ?>
            <script>
                location.href = "<?php echo $URL?>/proveedores";
            </script>
        <?php

  } else {
    session_start();
    $_SESSION['mensaje'] = "Se eliminó con éxito";
    $_SESSION['icono'] = "error"; 
    ?>
            <script>
                location.href = "<?php echo $URL?>/proveedores";
            </script>
        <?php

  }

?>