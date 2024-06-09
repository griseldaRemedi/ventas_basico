<?php
include('../../config.php');


$id_compra = $_GET['id_compra'];
$id_proveedor = $_GET['id_proveedor'];
$nro_compra = $_GET['nro_compra'];
$fecha_compra = $_GET['fecha_compra'];
$comprobante = $_GET['comprobante'];
$stock_nuevo = $_GET['stock_nuevo'];
$stock = $_GET['stock'];
$id_usuario_compra = $_GET['id_usuario_compra'];
$precio_compra = $_GET['precio_compra_compra'];

$id_producto = $_GET['id_producto'];
$id_producto_anterior = $_GET['id_producto_anterior'];
$cantidad_compra = $_GET['cantidad_compra'];
$cantidad_compra_anterior = $_GET['cantidad_compra_anterior'];


    $pdo->beginTransaction();


    $sql_update_compra = " UPDATE tb_compras 
                                    SET 
                                        id_producto =:id_producto, 
                                        fecha_compra =:fecha_compra, 
                                        id_proveedor =:id_proveedor, 
                                        id_usuario =:id_usuario, 
                                        comprobante =:comprobante, 
                                        precio_compra =:precio_compra,
                                        cantidad =:cantidad, 
                                        fyh_actualizacion =:fyh_actualizacion 
                                    WHERE id_compra =:id_compra ";

    $consulta_sql = $pdo->prepare($sql_update_compra);
    $consulta_sql->bindParam( ':id_producto', $id_producto);
    $consulta_sql->bindParam( ':fecha_compra', $fecha_compra);
    $consulta_sql->bindParam( ':id_proveedor', $id_proveedor);
    $consulta_sql->bindParam( ':id_usuario', $id_usuario_compra);
    $consulta_sql->bindParam( ':comprobante', $comprobante);
    $consulta_sql->bindParam( ':precio_compra', $precio_compra);
    $consulta_sql->bindParam( ':cantidad', $cantidad_compra);
    $consulta_sql->bindParam( ':fyh_actualizacion', $fechaHora);
    $consulta_sql->bindParam( ':id_compra', $id_compra);
        
    //var_dump($consulta_sql); die;
    echo 'cantidad '.$cantidad_compra.' id_compra'. $id_compra;

    if($consulta_sql->execute()){

            if($id_producto <> $id_producto_anterior){ // productos distintos => actualizo dos registros en tabla almacen
                
                // producto anterior
                            $stock_producto_anterior = ( $stock -  $cantidad_compra_anterior );
                            $sql_update_anterior = "UPDATE tb_almacen 
                                                                SET stock =:stock 
                                                                WHERE id_producto =:id_producto";

                            $update_anterior_sql = $pdo->prepare($sql_update_anterior);
                            $update_anterior_sql->bindParam( ':stock', $stock);
                            $update_anterior_sql->bindParam( ':id_producto', $id_producto_anterior);
                            $update_anterior_sql->execute();

                // producto nuevo
                            $stock_producto_nuevo =  $stock  +  $cantidad_compra;
                            $sql_update_nuevo = "UPDATE tb_almacen 
                                                                SET stock =:stock 
                                                                WHERE id_producto =:id_producto";

                            $update_nuevo_sql = $pdo->prepare($sql_update_nuevo);
                            $update_nuevo_sql->bindParam( ':stock', $stock_producto_nuevo);
                            $update_nuevo_sql->bindParam( ':id_producto', $id_producto);
                            $update_nuevo_sql->execute();
    
   
                } else { // igual producto => un solo update almacen
                    
                    if ($cantidad_compra <> $cantidad_compra_anterior){
                            $stock_actualizado = ( $stock -  $cantidad_compra_anterior )  +  $cantidad_compra;
                            $sql_update_almacen = "UPDATE tb_almacen 
                                                                SET stock =:stock 
                                                                WHERE id_producto =:id_producto";

                            $update_almacen_sql = $pdo->prepare($sql_update_almacen);
                            $update_almacen_sql->bindParam( ':stock', $stock_actualizado);
                            $update_almacen_sql->bindParam( ':id_producto', $id_producto);
                            $update_almacen_sql->execute();
                    }
            
                }
                        
            
            
            
            $pdo->commit();

            //actualizar datos de sesión
            session_start();
            $_SESSION['mensaje'] = "Se registró con éxito actualización de compra";
            $_SESSION['icono'] = "success";

        ?>
            <script>
                location.href = "<?php echo $URL?>/compras/";
            </script>
        <?php
    } else {

        //si hay error deja sin efecto updaate
        $pdo->rollBack();

        //actuliza datos de sesión
        session_start();
        $_SESSION['mensaje'] = "Error al registrar actualización de compra";
        $_SESSION['icono'] = "error";
        ?>
            <script>
                location.href = "<?php echo $URL?>/compras/";
            </script>
        <?php

    }

   


?>