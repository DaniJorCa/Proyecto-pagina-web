<?php

include_once('../php/models/articulos_model.php');
include_once('../php/models/categorias_model.php');



$codigo_padre = get_cod_categoria_padre('Hogar');

echo $codigo_padre;

echo extraer_parte_alfabetica('AAA345434');

echo extraer_parte_numerica('BBB888888');
   

?>