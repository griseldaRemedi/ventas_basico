<?php 

$id_compra = $_GET['id'];

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
                        a.id_usuario as usuario_producto,
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
                        WHERE co.id_compra = '$id_compra'
                            ";
                            

  $query_compras = $pdo->prepare($sql_compras);
  $query_compras->execute();
  $compras_datos = $query_compras->fetchAll( PDO::FETCH_ASSOC );
 
foreach( $compras_datos as $compra ){ 
        //producto
        $id_producto = $compra['id_producto'];
        $codigo = trim($compra['codigo']);                                                                                                                                 
        $nombre_producto = trim($compra['nombre']);                                                                                                                              
        $nombre_categoria = trim($compra['nombre_categoria']);                                                                                                                                  
        $descripcion = trim($compra['descripcion']);                                                                                                                                
        $stock = trim($compra['stock']);                                                                                                                                  
        $stock_minimo = trim($compra['stock_minimo']);                                                                                                                                 
        $stock_maximo = trim($compra['stock_maximo']);                                                                                                                                  
        $precio_compra_producto = trim($compra['precio_compra_producto']);                                                                                                                                
        $precio_venta_producto =  trim($compra['precio_venta_producto']);                                                                                                                                 
        $fecha_ingreso = trim($compra['fecha_ingreso']);                                                                                                                                
        $email_compra = trim($compra['email_compra']);                                                                                                                                 
        $imagen = $URL.'/almacen/img_productos/'.trim($compra['imagen']);  

        //proveedor
        $id_proveedor = $compra['id_proveedor'];
        $nombre_proveedor = $compra['nombre_proveedor'];
        $celular = $compra['celular'];
        $telefono_empresa = $compra['telefono_empresa'];
        $empresa = $compra['empresa'];
        $email_empresa = $compra['email_empresa'];
        $direccion = $compra['direccion'];

        //compra
        $nro_compra = $compra['nro_compra'];
        $id_compra = $compra['id_compra'];
        $fecha_compra = $compra['fecha_compra'];
        $comprobante = $compra['comprobante'];
        $cantidad = $compra['cantidad'];
        $precio_compra = $compra['precio_compra'];
        $fecha_compra = $compra['fecha_compra'];


        } 



?>