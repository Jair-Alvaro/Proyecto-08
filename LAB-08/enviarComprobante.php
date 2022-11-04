<?php
if (!isset($_GET['codigo'])) {
    header('Location: agregarPedido.php?mensaje=error');
    exit();
}

include 'model/conexion.php';
$codigo = $_GET['codigo'];

$sentencia = $bd->prepare("SELECT clientes.id_cliente,nombres, apellido_paterno, apellido_materno,celular,reseña,imagen,total
    FROM comprobante 
    INNER JOIN pedido ON comprobante.id_pedido=pedido.id_pedido
    INNER JOIN clientes ON pedido.id_cliente=clientes.id_cliente
     WHERE id_com=?;");

$sentencia->execute([$codigo]);
$comprobante = $sentencia->fetch(PDO::FETCH_OBJ);

    $url = 'https://whapi.io/api/send';
    $data = [
        "app" => [
            "id" => '51963768928',
            "time" => '1654728819',
            "data" => [
                "recipient" => [
                    "id" => '51'.$comprobante->celular
                ],
                "message" => [[
                    "time" => '1654728819',
                    "type" => 'text',
                    "value" => 'Estimado(a) *'.strtoupper($comprobante->nombres).' '.strtoupper($comprobante->apellido_paterno).' '.strtoupper($comprobante->apellido_materno).'------> *'.strtoupper($comprobante->reseña).'*'
                ]]
            ]
        ]
    ];
    $options = array(
        'http' => array(
            'method'  => 'POST',
            'content' => json_encode($data),
            'header' =>  "Content-Type: application/json\r\n" .
                "Accept: application/json\r\n"
        )
    );

    $context  = stream_context_create($options);
    $result = file_get_contents($url, false, $context);
    $response = json_decode($result);

    $data_imagen = [
        "app" => [
            "id" => '51963768928',
            "time" => '1654728819',
            "data" => [
                "recipient" => [
                    "id" => '51'.$comprobante->celular
                ],
                "message" => [[
                    "time" => '1654728819',
                    "type" => 'image',
                    "value" =>$comprobante->imagen
                ]]
            ]
        ]
    ];
    $options_imagen = array(
        'http' => array(
            'method'  => 'POST',
            'content' => json_encode($data_imagen),
            'header' =>  "Content-Type: application/json\r\n" .
                "Accept: application/json\r\n"
        )
    );

    $context_imagen  = stream_context_create($options_imagen);
    $result_imagen = file_get_contents($url, false, $context_imagen);
    $response_imagen = json_decode($result_imagen);

    $data_total = [
        "app" => [
            "id" => '51963768928',
            "time" => '1654728819',
            "data" => [
                "recipient" => [
                    "id" => '51'.$comprobante->celular
                ],
                "message" => [[
                    "time" => '1654728819',
                    "type" => 'text',
                    "value" => 'SU MONTO TOTAL ES DE: *'.strtoupper($comprobante->total).' SOLES'
                ]]
            ]
        ]
    ];
    $options_total = array(
        'http' => array(
            'method'  => 'POST',
            'content' => json_encode($data_total),
            'header' =>  "Content-Type: application/json\r\n" .
                "Accept: application/json\r\n"
        )
    );

    $context_total  = stream_context_create($options_total);
    $result_total = file_get_contents($url, false, $context_total);
    $response_total = json_decode($result_total);
    header('Location: agregarPedido.php?codigo='.$comprobante->id_cliente);
?>