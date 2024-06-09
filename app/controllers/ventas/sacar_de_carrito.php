<?php
include('../../config.php');

  $id_carrito = $_POST['id_carrito'];
 
  $sql_carrito = "DELETE FROM `tb_carrito` WHERE id_carrito=:id_carrito";
  $query_carrito = $pdo->prepare($sql_carrito);
  $query_carrito->bindParam( ':id_carrito', $id_carrito);
  
  if ($query_carrito->execute()){ 

        ?>
            <script>
                location.href = "<?php echo $URL?>/ventas/create.php";
            </script>
        <?php

    } else {

        $pdo->rollBack();

        session_start();
        $_SESSION['mensaje'] = "No fue posible elimnar item de carrito";
        $_SESSION['icono'] = "error"; 
         ?>
            <script>
                location.href = "<?php echo $URL?>/ventas/create.php";
            </script>
        <?php

  }

?>