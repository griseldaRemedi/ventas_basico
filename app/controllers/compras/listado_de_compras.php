<?php 

  $sql_compras = "SELECT 
                        *,
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
                        a.imagen as imagen, 
                        u.id_usuario as id_usuario,
                        u.email as email_compra,
                        u.nombres as nombre_usuario,
                        prov.id_proveedor as id_proveedor,
                        prov.nombre_proveedor as nombre_proveedor,
                        prov.celular as celular,
                        prov.empresa as empresa,
                        prov.email as email_empresa,
                        prov.telefono_empresa as telefono_empresa,
                        prov.direccion as direccion, 
                        cat.nombre_categoria as nombre_categoria
                        FROM `tb_compras` as co 
                        INNER JOIN `tb_almacen` as a 
                              ON a.id_producto = co.id_producto
                        INNER JOIN `tb_usuarios` as u
                              ON u.id_usuario = co.id_usuario
                        INNER JOIN `tb_proveedores` as prov
                              ON prov.id_proveedor = co.id_proveedor  
                        INNER JOIN `tb_categorias` as cat
                              ON cat.id_categoria = a.id_categoria
                            ";
                            

  $query_compras = $pdo->prepare($sql_compras);
  $query_compras->execute();
  $compras_datos = $query_compras->fetchAll( PDO::FETCH_ASSOC );
 
  $sql_ultimo = $pdo->prepare("SELECT MAX(nro_compra) AS max_nro_compra FROM tb_compras");;
  $sql_ultimo->execute();
  $ultimo_compra = $sql_ultimo->fetch();
 
?>