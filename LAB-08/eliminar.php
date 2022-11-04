<?php 
    if(!isset($_GET['codigo'])){
        header('Location: raizIndex.php?mensaje=error');
        exit();
    }

    include 'model/conexion.php';
    $codigo = $_GET['codigo'];

    $sentencia = $bd->prepare("DELETE FROM clientes where id_cliente = ?;");
    $resultado = $sentencia->execute([$codigo]);

    if ($resultado === TRUE) {
        header('Location: raizIndex.php?mensaje=eliminado');
    } else {
        header('Location: raizIndex.php?mensaje=error');
    }
    
?>