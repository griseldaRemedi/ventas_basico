<?php
include('../../config.php');

$nombre_cliente = $_GET['nombre_cliente'];
$celular_cliente = $_GET['celular_cliente'];
$email_cliente = $_GET['email_cliente'];
$dni_cliente = $_GET['dni_cliente'];

    $sql = "INSERT INTO tb_clientes (nombre_cliente, celular_cliente, email_cliente, dni_cliente, fyh_creacion) 
                            VALUES ( :nombre_cliente, :celular_cliente, :email_cliente, :dni_cliente, :fyh_creacion)";
 
    $consulta_sql = $pdo->prepare($sql);
    $consulta_sql->bindParam( ':nombre_cliente', $nombre_cliente);
    $consulta_sql->bindParam( ':celular_cliente', $celular_cliente);
    $consulta_sql->bindParam( ':email_cliente', $email_cliente);
    $consulta_sql->bindParam( ':dni_cliente', $dni_cliente);
    $consulta_sql->bindParam( ':fyh_creacion', $fechaHora);



    if($consulta_sql->execute()){
        $id_cliente = $pdo->lastInsertId();

        $sql_cliente_nuevo = "SELECT * FROM `tb_clientes` WHERE id_cliente = '$id_cliente' ";
                            
        $query_cliente = $pdo->prepare($sql_cliente_nuevo);
        $query_cliente->execute();
        $cliente_datos = $query_cliente->fetchAll( PDO::FETCH_ASSOC );
        //var_dump($cliente_datos); die;
        echo json_encode($cliente_datos);
        
    } else {
        session_start();
        $_SESSION['mensaje'] = "Error al agregar nuevo cliente";
        $_SESSION['icono'] = "error";
 
    }
 

?>