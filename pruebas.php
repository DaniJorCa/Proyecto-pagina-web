<?php

include_once('php/models/articulos_model.php');
include_once('php/models/categorias_model.php');
include_once('php/models/usuario_model.php');
include_once('php/models/pedidos_model.php');

$categorias = get_array_categorias();
$id_pedido_pdte = buscar_id_pedidos_pendientes_de_pago_para_usuario_log('21972749K');

echo $id_pedido_pdte;

$lineas = get_count_lineas_pedido('21972749K');

echo $lineas;
?>