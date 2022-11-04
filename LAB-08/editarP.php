<?php include 'template/header.php' ?>

<?php
    if(!isset($_GET['codigo'])){
        header('Location: index.php?mensaje=error');
        exit();
    }

    include_once 'model/conexion.php';
    $codigo = $_GET['codigo'];

    $sentencia = $bd->prepare("select * from pedido where id_pedido = ?;");
    $sentencia->execute([$codigo]);
    $pedido = $sentencia->fetch(PDO::FETCH_OBJ);

?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class=" carta card-header">
                    Editar datos Pedido:
                </div>
                <form class="superior p-4" method="POST" action="editarPedido.php">
                    <div class="mb-3">
                        <label class="form-label">Arreglo: </label>
                        <input type="text" class="form-control" name="txtArreglo" autofocus required
                        value="<?php echo $pedido->nom_arreglo; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Cantidad: </label>
                        <input type="number" class="form-control" name="txtCantidad" autofocus required
                        value="<?php echo $pedido->cantidad; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Money: </label>
                        <input type="number" class="form-control" name="txtMoney" autofocus required
                        value="<?php echo $pedido->precio; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Fecha del pedido: </label>
                        <input type="date" class="form-control" name="txtFpedido" autofocus required
                        value="<?php echo $pedido->fec_pedido; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Fecha de entrega: </label>
                        <input type="date" class="form-control" name="txtFentrega" autofocus required
                        value="<?php echo $pedido->fec_entrega; ?>">
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="codigo" value="<?php echo $pedido->id_pedido; ?>">
                        <input type="hidden" name="codigo_cliente" value="<?php echo $pedido->id_cliente; ?>">
                        <input class="submit" type="submit" class="btn btn-primary" value="Editar">
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<?php include 'template/footer.php' ?>