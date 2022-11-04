<?php

if (empty($_POST["txtReseña"]) || empty($_POST["txtImagen"])|| empty($_POST["txtTotal"])) {
    header('Location: index.php');
    exit();
}

include_once 'model/conexion.php';
$reseña = $_POST["txtReseña"];
$imagen = $_POST["txtImagen"];
$total = $_POST["txtTotal"];
$codigo = $_POST["codigo"];
$codigo_cliente =$_POST["codigo_cliente"];


$sentencia = $bd->prepare("INSERT INTO comprobante(reseña,imagen,total,id_pedido) VALUES (?,?,?,?);");
$resultado = $sentencia->execute([$reseña,$imagen, $total,$codigo ]);

if ($resultado === TRUE) {
    header('Location: agregarComprobante.php?codigo='.$codigo.'&codigo_cliente='.$codigo_cliente );
} 