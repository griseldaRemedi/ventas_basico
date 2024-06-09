<?php 

if ($_GET['id_venta']){

    $id_venta = $_GET['id_venta'];
    $sql_ventas = "SELECT  *,
                    cli.id_cliente as id_cliente,
                    cli.nombre_cliente as nombre_cliente,
                    cli.dni_cliente as dni_cliente,
                    cli.celular_cliente as celular_cliente,
                    cli.email_cliente as email_cliente
                        FROM `tb_ventas` as ven
                        INNER JOIN `tb_clientes` as cli
                            ON cli.id_cliente = ven.id_cliente
                        WHERE ven.id_ventas = $id_venta";
                                
                    $query_ventas = $pdo->prepare($sql_ventas);
                    $query_ventas->execute();
                    $ventas_datos = $query_ventas->fetchAll( PDO::FETCH_ASSOC );
                    //var_dump($ventas_datos[0]['nombre_cliente']); die;
                    $nro_venta = $ventas_datos[0]['nro_venta'];

    $sql_carrito = "SELECT  *,
                        al.id_producto as id_producto,
                        al.nombre as nombre_producto,
                        al.descripcion as descripcion_producto,
                        al.precio_venta as precio_unitario
                            FROM `tb_carrito` as ca
                            INNER JOIN `tb_almacen` as al
                                ON ca.id_producto = al.id_producto
                            WHERE ca.nro_venta = $nro_venta";

                    $query_carrito = $pdo->prepare($sql_carrito);
                    $query_carrito->execute();
                    $carrito_datos = $query_carrito->fetchAll( PDO::FETCH_ASSOC );
} else{
    echo "No se encontraron los datos solicitados.";
}
  
   
?>