<?php 

  $sql_ventas = "SELECT  *,
                  cli.id_cliente as id_cliente,
                  cli.nombre_cliente as nombre_cliente,
                  cli.dni_cliente as dni_cliente,
                  cli.celular_cliente as celular_cliente,
                  cli.email_cliente as email_cliente
                     FROM `tb_ventas` as ven
                     INNER JOIN `tb_clientes` as cli
                        ON cli.id_cliente = ven.id_cliente";
                            
  $query_ventas = $pdo->prepare($sql_ventas);
  $query_ventas->execute();
  $ventas_datos = $query_ventas->fetchAll( PDO::FETCH_ASSOC );

  $sql_ultimo_nro_venta = $pdo->prepare("SELECT MAX(nro_venta) AS max_nro_venta FROM tb_ventas");;
  $sql_ultimo_nro_venta->execute();
  $ultimo_nro_venta = $sql_ultimo_nro_venta->fetch();
  //var_dump();
   
?>