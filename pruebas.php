<?php

include_once('php/models/articulos_model.php');
include_once('php/models/categorias_model.php');
include_once('php/models/usuario_model.php');
include_once('php/models/pedidos_model.php');

$articulos = get_array_usuarios_filtrados_por_texto(0, 9, 'da', 'nombre');

var_dump($articulos);
?>