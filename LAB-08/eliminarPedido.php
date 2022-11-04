<?php 
    if(!isset($_GET['codigo'])){
        header('Location: agregarPedido.php?mensaje=error');
        exit();
    }

    include 'model/conexion.php';
    $codigo = $_GET['codigo'];
    $codigo_cliente = $_GET['codigo_cliente'];

    $sentencia = $bd->prepare("DELETE FROM pedido where id_pedido = ?;");
    $resultado = $sentencia->execute([$codigo]);

    if ($resultado === TRUE) {
        header('Location: AgregarPedido.php?codigo='.$codigo_cliente);
    } else {
        header('Location: AgregarPedido.php?mensaje=error');
    }
    
?>