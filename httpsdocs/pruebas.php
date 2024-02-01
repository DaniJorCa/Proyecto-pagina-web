<?php

include_once('../php/models/articulos_model.php');
include_once('../php/models/categorias_model.php');
include_once('../php/models/usuario_model.php');


$nuevo_array = [];

array_push($nuevo_array,"Daniel Jordan");

$array_explode_apellidos = extraer_apellidos($nuevo_array[0]);

var_dump($array_explode_apellidos);

?>