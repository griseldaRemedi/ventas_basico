<?php 

  $sql_productos = "SELECT 
                        *,
                        cat.nombre_categoria as nombre_categoria,
                        cat.id_categoria as id_categoria, 
                        cat.nombre_categoria as nombre_categoria,
                        u.id_usuario as id_usuario,
                        u.email as email_producto,
                        u.nombres as nombres 
                      FROM `tb_almacen` as a 
                      INNER JOIN `tb_categorias` as cat 
                            ON a.id_categoria = cat.id_categoria
                      INNER JOIN `tb_usuarios` as u
                            ON a.id_usuario = u.id_usuario";
                            

  $query_productos = $pdo->prepare($sql_productos);
  $query_productos->execute();
  $productos_datos = $query_productos->fetchAll( PDO::FETCH_ASSOC );
  
  $sql_ultimo = $pdo->prepare("SELECT MAX(id_producto) AS id_producto FROM tb_almacen");;
  $sql_ultimo->execute();
  $ultimo_producto = $sql_ultimo->fetch();
  //var_dump( $productos_datos ); die;
?>