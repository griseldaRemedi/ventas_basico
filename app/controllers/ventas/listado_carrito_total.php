<?php 

    $sql_carrito = "SELECT  *,  
                        a.nombre as nombre_producto,
                        a.id_producto as id_producto, 
                        a.codigo as codigo, 
                        a.descripcion as descripcion, 
                        a.id_categoria as id_categoria, 
                        a.stock as stock, 
                        a.stock_minimo as stock_minimo, 
                        a.stock_maximo as stock_maximo, 
                        a.precio_compra as precio_compra_producto, 
                        a.precio_venta as precio_venta_producto, 
                        a.fecha_ingreso as fecha_ingreso, 
                        a.imagen as imagen 
                        FROM `tb_carrito` as ca 
                        INNER JOIN `tb_almacen` as a
                            ON a.id_producto = ca.id_producto
                        ";
                            
  $query_carrito = $pdo->prepare($sql_carrito);
  $query_carrito->execute();
  $carrito_datos_completos = $query_carrito->fetchAll( PDO::FETCH_ASSOC );

     
?>