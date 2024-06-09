<?php 
    $id_producto_get = $_GET['id'];
    $sql_productos = "SELECT 
                        *,
                        cat.nombre_categoria as nombre_categoria,
                        cat.id_categoria as id_categoria, 
                        cat.nombre_categoria as nombre_categoria,
                        u.id_usuario as id_usuario,
                        u.email as email,
                        u.nombres as nombres 
                      FROM `tb_almacen` as a 
                      INNER JOIN `tb_categorias` as cat 
                            ON a.id_categoria = cat.id_categoria
                      INNER JOIN `tb_usuarios` as u
                            ON a.id_usuario = u.id_usuario
                        WHERE a.id_producto = '$id_producto_get' ";
                            

  $query_productos = $pdo->prepare($sql_productos);
  $query_productos->execute();
  $productos_datos = $query_productos->fetchAll( PDO::FETCH_ASSOC );
  
 
?>