<?php
    print_r($_POST);
    if(!isset($_POST['codigo'])){
        header('Location: index.php?mensaje=error');
    }

    include 'model/conexion.php';
    $codigo = $_POST["codigo"];
    $codigo_cliente = $_POST["codigo_cliente"];
    $nom_arreglo = $_POST["txtArreglo"];
    $cantidad = $_POST["txtCantidad"];
    $precio = $_POST["txtMoney"];
    $fec_pedido = $_POST["txtFpedido"];
    $fec_entrega = $_POST["txtFentrega"];
    

    $sentencia = $bd->prepare("UPDATE pedido SET nom_arreglo = ?, cantidad = ?, precio = ?, fec_pedido=?, fec_entrega=? where id_pedido = ?;");
    $resultado = $sentencia->execute([$nom_arreglo, $cantidad,$precio,$fec_pedido, $fec_entrega,$codigo]);

    if ($resultado === TRUE) {
        header('Location: AgregarPedido.php?codigo='.$codigo_cliente);
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }