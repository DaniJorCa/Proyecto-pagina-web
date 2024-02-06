<?php

include_once('php/models/articulos_model.php');
include_once('php/models/categorias_model.php');
include_once('php/models/usuario_model.php');

$categorias = get_array_categorias();


foreach($categorias as $categoria){
    var_dump($categoria);
}
?>