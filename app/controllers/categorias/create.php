<?php
include("../../config.php");
$nombre_categoria = $_GET['nombre_categoria'];

    $sql = "INSERT INTO tb_categorias (nombre_categoria, fyh_creacion) 
                            VALUES (:nombre_categoria, :fyh_creacion)";

    $consulta_sql = $pdo->prepare($sql);
    $consulta_sql->bindParam( ':nombre_categoria', $nombre_categoria);
    $consulta_sql->bindParam( ':fyh_creacion', $fechaHora);

    if($consulta_sql->execute()){
        session_start();
        $_SESSION['mensaje'] = "Se registró con éxito nueva categoría";
        $_SESSION['icono'] = "success";
        //header('Location: '.$URL.'/categorias');
        ?>
            <script>
                location.href = "<?php echo $URL?>/categorias";
            </script>
        <?php
    } else {
        session_start();
        $_SESSION['mensaje'] = "Error al registrar nueva categoría";
        $_SESSION['icono'] = "error";
       //header('Location: '.$URL.'/categorias');

    }



?>