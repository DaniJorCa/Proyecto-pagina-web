<?php

include_once('php/models/articulos_model.php');
include_once('php/models/categorias_model.php');
include_once('php/models/usuario_model.php');
include_once('php/models/pedidos_model.php');

$nombre_cat = get_nombre_cat_por_numCat(3);

var_dump($nombre_cat);
?>