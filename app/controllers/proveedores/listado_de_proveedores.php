<?php 

  $sql_proveedores = "SELECT 
                            id_proveedor as id_proveedor,
                            nombre_proveedor as nombre_proveedor,
                            celular as celular,
                            empresa as empresa,
                            email as email_proveedor,
                            direccion as direccion,
                            telefono_empresa as telefono_empresa
                         FROM `tb_proveedores`";
  //$sql_proveedores = "SELECT * FROM `tb_proveedores` ORDER BY `id_proveedor` DESC";
  $query_proveedores = $pdo->prepare($sql_proveedores);
  $query_proveedores->execute();
  $proveedores_datos = $query_proveedores->fetchAll( PDO::FETCH_ASSOC );
  