<?php
include('../../config.php');

$id_cliente = $_GET['id_cliente'];
$nro_venta = $_GET['nro_venta'];
$total_pagado = $_GET['importe_pagado'];
$items_carrito =  $_GET['items_carrito'] ;

$pdo->beginTransaction();

    $sql = "INSERT INTO tb_ventas (id_cliente, nro_venta, total_pagado,  fyh_creacion) 
                            VALUES ( :id_cliente, :nro_venta, :total_pagado, :fyh_creacion)";
 
    $consulta_sql = $pdo->prepare($sql);
    $consulta_sql->bindParam( ':id_cliente', $id_cliente);
    $consulta_sql->bindParam( ':nro_venta', $nro_venta);
    $consulta_sql->bindParam( ':total_pagado', $total_pagado);
    $consulta_sql->bindParam( ':fyh_creacion', $fechaHora);

    if($consulta_sql->execute()){

        foreach( $items_carrito as $item){ // actualizar stock de productos vendidos
            $nueva_cantidad = $item['stock'] - $item['cantidad'];
            $sql_up = "UPDATE tb_almacen 
                            SET stock=:stock, fyh_actualizacion=:fyh_actualizacion 
                            WHERE id_producto=:id_producto";

                            $sql_update = $pdo->prepare($sql_up);
                            $sql_update->bindParam( ':stock', $nueva_cantidad);
                            $sql_update->bindParam( ':fyh_actualizacion', $fechaHora);
                            $sql_update->bindParam( ':id_producto', $item['id_producto']);
                            $sql_update->execute();
            } 

        $pdo->commit();

        session_start();
        $_SESSION['mensaje'] = "La venta se registró con éxito";
        $_SESSION['icono'] = "success";

        ?>
            <script>
                setTimeout(function(){document.location.href = "<?php echo $URL?>/ventas/"},500);
            </script>
        <?php
    } else {

        $pdo->rollBack();

        session_start();
        $_SESSION['mensaje'] = "Error al registrar venta";
        $_SESSION['icono'] = "error";
        ?>
            <script>
                location.href = "<?php echo $URL?>/ventas/";
            </script>
        <?php
    }


?>