<?php
include('../../config.php');

$id_ventas = $_GET['id_ventas'];
$nro_ventas = $_GET['nro_ventas'];
$nro_ventas = 2;

$pdo->beginTransaction();

  $sql_ventas = "DELETE FROM `tb_ventas` WHERE id_ventas=:id_ventas";
  $query_ventas = $pdo->prepare($sql_ventas);
  $query_ventas->bindParam( ':id_ventas', $id_ventas);
  
  if ($query_ventas->execute()){ 

            $sql_carrito_prod = "SELECT * FROM `tb_carrito` WHERE nro_venta=:nro_venta";
            $query_carrito = $pdo->prepare($sql_carrito_prod);
            $query_carrito->bindParam( ':nro_venta', $nro_ventas );
            $query_carrito->execute();
            
            $productos =  $query_carrito->fetchAll( PDO::FETCH_ASSOC );
            
            foreach($productos as $producto){
                //update stock de producto en tb_almacen
                $nueva_cantidad = $producto['cantidad'];
                $sql_actualizar_cantidad = "UPDATE `tb_almacen` SET stock = stock + $nueva_cantidad WHERE id_producto=:id_producto";
                $query_cantidad = $pdo->prepare($sql_actualizar_cantidad);
                $query_cantidad->bindParam( ':id_producto', $producto['id_producto']);

                $query_cantidad->execute();
            }

            //delete carritos 
            $sql_del_carrito = "DELETE FROM `tb_carrito` WHERE nro_venta=:nro_venta";
            $query_del_carrito = $pdo->prepare($sql_del_carrito);
            $query_del_carrito->bindParam( ':nro_venta', $nro_venta);

            $query_del_carrito->execute(); 
          
            $pdo->commit();

            session_start();
            $_SESSION['mensaje'] = "Se eliminó la venta";
            $_SESSION['icono'] = "success";

    } else {

        $pdo->rollBack();

        session_start();
        $_SESSION['mensaje'] = "No fue posible eliminar la venta";
        $_SESSION['icono'] = "error"; 
         ?>
            <script>
                location.href = "<?php echo $URL?>/ventas";
            </script>
        <?php

  }

?>