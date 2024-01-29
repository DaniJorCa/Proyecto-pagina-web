<?php

include_once('../php/models/articulos_model.php');

$letras = extraer_parte_alfabetica('AAAXXXXX');

echo $letras;


$numero = extraer_parte_numerica('aaa111111');

echo $numero;

$boolean = formato('prueba.jpg');


?>