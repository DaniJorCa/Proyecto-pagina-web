<?php

function consultar_art_mas_vendidos(){
    require '../php/models/articulos_model.php';
    $articulos = getArrayTopVentas();
    include '../php/views/top_ventas_listar.php';
}

?>