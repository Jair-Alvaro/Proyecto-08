<?php include 'template/header.php' ?>

<?php
include_once "model/conexion.php";
$codigo = $_GET['codigo'];
$codigo_cliente = $_GET['codigo_cliente'];

$sentencia = $bd->prepare("select * from pedido where id_pedido = ?;");
$sentencia->execute([$codigo]);
$pedido = $sentencia->fetch(PDO::FETCH_OBJ);
//print_r($cliente);
$sentencia_comprobante = $bd->prepare("select * from comprobante where id_pedido = ?;");
$sentencia_comprobante->execute([$codigo]);
$comprobante = $sentencia_comprobante->fetchAll(PDO::FETCH_OBJ); 

$sentencia_cliente = $bd->prepare("select * from clientes where id_cliente = ?;");
$sentencia_cliente->execute([$codigo_cliente]);
$cliente = $sentencia_cliente->fetch(PDO::FETCH_OBJ);

?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-4">
            <div class="card">
                <div class="carta card-header">
                    Comprobante : <br><?php echo $cliente->nombres.' '.$cliente->apellido_paterno.' '.$cliente->apellido_materno; ?>
                </div>
                <form class="superior p-4" method="POST" action="registrarComprobante.php">
                    <div class="mb-3">
                        <label class="form-label">Reseña: </label>
                        <input type="text" class="form-control" name="txtReseña" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Imagen: </label>
                        <input type="text" class="form-control" name="txtImagen" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Total: </label>
                        <input type="number" class="form-control" name="txtTotal" autofocus required>
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="codigo" value="<?php echo $pedido->id_pedido; ?>"><P></P>
                        <input type="hidden" name="codigo_cliente" value="<?php echo $cliente->id_cliente; ?>"><P></P>
                        <input type="submit" class="submit btn btn-primary" value="Registrar">
                    </div>
                </form>
            </div>
        </div>
        <div class="col-8">
            <div class="card">
                <div class="carta card-header">
                    Lista de Reseñas
                </div>
                <div class="col-12">
                    <table class="table">
                        <thead>
                            <tr class="contenedor_datos">
                                <th scope="col">#</th>
                                <th scope="col">Reseña</th>
                                <th scope="col">Imagen</th>
                                <th scope="col">Total</th>
                                <th scope="col" colspan="3">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($comprobante as $dato) {
                            ?>
                                <tr>
                                    <td scope="row"><?php echo $dato->id_com; ?></td>
                                    <td><?php echo $dato->reseña; ?></td>
                                    <td><?php echo $dato->imagen; ?></td>
                                    <td><?php echo $dato->total; ?></td>
                                    <td><a class="text-primary" href="enviarComprobante.php?codigo=<?php echo $dato->id_com; ?>"><i class="bi bi-cursor"></i></a></td>
                                </tr>
                            <?php
                            }
                            ?>_

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'template/footer.php' ?>