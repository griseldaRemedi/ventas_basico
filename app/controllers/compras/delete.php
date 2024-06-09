<?php
include('../../config.php');

  $id_producto = $_GET['id_producto'];
  $id_compra = $_GET['id_compra'];
  $cantidad_compra = $_GET['cantidad_compra'];
  $stock = $_GET['stock'];
  $stock_nuevo = $stock - $cantidad_compra;

  $pdo->beginTransaction();

  $sql_compra = "DELETE FROM `tb_compras` WHERE id_compra=:id_compra";
  $query_compra = $pdo->prepare($sql_compra);
  $query_compra->bindParam( ':id_compra', $id_compra);
  
  if ($query_compra->execute()){ 

        $sql_producto = "UPDATE `tb_almacen`
                            SET stock=:stock
                            WHERE id_producto=:id_producto";
        $query_producto = $pdo->prepare($sql_producto);
        $query_producto->bindParam( ':id_producto', $id_producto);
        $query_producto->bindParam( ':stock',  $stock_nuevo);
        $query_producto->execute();

        $pdo->commit();

        session_start();
        $_SESSION['mensaje'] = "Se eliminó con éxito la compra";
        $_SESSION['icono'] = "success"; 
        ?>
            <script>
                location.href = "<?php echo $URL?>/compras/";
            </script>
        <?php

    } else {

        $pdo->rollBack();

        session_start();
        $_SESSION['mensaje'] = "No fue posible elimnar la compra";
        $_SESSION['icono'] = "error"; 
         ?>
            <script>
                location.href = "<?php echo $URL?>/compras/";
            </script>
        <?php

  }

?>