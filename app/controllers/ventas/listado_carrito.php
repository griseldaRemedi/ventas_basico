<?php 
   
  if ($factura){
    $id_venta = $nro_venta;
  } else {
      $id_venta = $ultimo_nro_venta['max_nro_venta'] + 1 ; // viene de listado_de_ventas.php 
  }
  
  
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
                        WHERE ca.nro_venta = $id_venta";
                            
  $query_carrito = $pdo->prepare($sql_carrito);
  $query_carrito->execute();
  $carrito_datos = $query_carrito->fetchAll( PDO::FETCH_ASSOC );

     
?>