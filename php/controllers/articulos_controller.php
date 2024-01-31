<?php

function consultar_art_mas_vendidos(){
    require_once '../php/models/articulos_model.php';
    $articulos = getArrayTopVentasDesc();
    include '../php/views/top_ventas_listar.php';
}

function consultar_mantenimiento_articulos(){
    require_once '../php/models/articulos_model.php';
    $articulos = getArrayArtsPorCategoriaAsc();
    include '../php/views/mantenimiento_articulos.php';
}

function edicion_informacion_articulo($id){
    require_once '../php/models/articulos_model.php';
    $articulo = getArrayArtPorId($id);
    include '../php/views/edicion_articulo.php';
}

function formulario_alta(){
    require_once '../php/models/articulos_model.php';
    $err_log_form_registro_articulo = comprobar_datos_registro($_POST);
    if(!empty($err_log_form_registro_articulo)){
        header('Location: registro_articulo.php?' . $err_log_form_registro_articulo);
    }elseif(boolean_img_is_too_size($_FILES)){
        header('Location: registro_articulo.php?img=too_size');
    }else{
        subirImg($_FILES['img']);
        insertar_articulo_en_BD($_POST);
    }

}

function mostrar_articulos(){
    require_once '../php/models/articulos_model.php';
    $articulos = getArrayArtsPorCategoriaAsc();
    include '../php/views/mantenimiento_articulos.php';
}



?>