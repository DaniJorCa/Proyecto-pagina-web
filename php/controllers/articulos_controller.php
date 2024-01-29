<?php

function consultar_art_mas_vendidos(){
    require '../php/models/articulos_model.php';
    $articulos = getArrayTopVentasDesc();
    include '../php/views/top_ventas_listar.php';
}

function consultar_mantenimiento_articulos(){
    require '../php/models/articulos_model.php';
    $articulos = getArrayArtsPorCategoriaAsc();
    include '../php/views/mantenimiento_articulos.php';
}

function edicion_informacion_articulo($id){
    require '../php/models/articulos_model.php';
    $articulo = getArrayArtPorId($id);
    include '../php/views/edicion_articulo.php';
}

?>