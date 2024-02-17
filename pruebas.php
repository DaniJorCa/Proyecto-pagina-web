<?php

include_once('php/models/articulos_model.php');
include_once('php/models/categorias_model.php');
include_once('php/models/usuario_model.php');
include_once('php/models/pedidos_model.php');

$nombre_cat = get_estado_pedido('3');

var_dump($nombre_cat);
?>