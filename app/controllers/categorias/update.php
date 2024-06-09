<?php
 
  $nombre_categoria_get = $_GET['nombre_categoria'];
  $sql_categorias = "SELECT * FROM tb_categorias WHERE categoria = '$nombre_categoria_get'";
  $query_categorias = $pdo->prepare($sql_categorias);
  $query_categorias->execute();
  $categorias_datos = $query_categorias->fetchAll( PDO::FETCH_ASSOC );

    foreach($categorias_datos as $categoria_dato){
            $nombre_categoria_tabla = $categoria_dato['categoria'];
            $id_categoria_tabla = $categoria_dato['id_categoria'];
    }

?>