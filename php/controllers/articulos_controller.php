<?php

function busqueda_selectiva_por_categoria(){
    require_once 'php/models/articulos_model.php';
    if(isset($_GET['select_cat'])){
        $articulos = getArrayArticulosPorCategoria($_GET);
    }
    include 'php/views/show_goods_cards.php';
}

function busqueda_selectiva_por_subcategoria(){
    require_once 'php/models/articulos_model.php';
    if(isset($_GET['select_subcat'])){
        $articulos = getArrayArticulosPorSubCategoria($_GET);
    }
    include 'php/views/show_goods_cards.php';
}


function consultar_art_mas_vendidos(){
    require_once 'php/models/articulos_model.php';
    include 'php/pagination/artsXpag.php';
    $articulos = getArrayTopVentasDesc($inicio, $artXpag);
    include 'php/views/show_goods_cards.php';
    include 'php/pagination/pagination_control.php';
    
}

function consultar_mantenimiento_articulos(){
    require_once 'php/models/articulos_model.php';
    $articulos = getArrayArtsPorCategoriaAsc();
    include 'php/views/mantenimiento_articulos.php';
}

function edicion_informacion_articulo($id){
    require_once 'php/models/articulos_model.php';
    $articulo_editar = getArrayArtPorId($id);
    include 'php/views/edicion_articulo.php';
}

function check_and_edit_good(){
    require_once 'php/models/articulos_model.php';
    $array_articulo_a_editar = getArrayArtPorId($_POST['id_articulo']);
    $headerCotejarCampos = cotejar_campos_editados($array_articulo_a_editar, $_POST);
    $cadena_campos_vacios = comprobar_datos_registro($_POST);
    if(empty($cadena_campos_vacios)){
        if(!empty($headerCotejarCampos)){
            subirImg($_FILES['img']);
            modificar_articulo($_POST);
            array_datos_articulos_JSON();
            header('Location: index.php'. $headerCotejarCampos);
        }else{
            header('Location: index.php?same-edit-fields');
        }  
    }else{
        echo "Campos vacios en el formulario de edicion";
    }
    
    
}

function formulario_alta(){
    require_once 'php/models/articulos_model.php';
    $err_log_form_registro_articulo = comprobar_datos_registro($_POST);
    if(!empty($err_log_form_registro_articulo)){
        header('Location: registro_articulo.php' . $err_log_form_registro_articulo);
    }elseif(boolean_img_is_too_size($_FILES)){
        header('Location: registro_articulo.php?img=too_size');
    }else{
        subirImg($_FILES['img']);
        insertar_articulo_en_BD($_POST);
        array_datos_articulos_JSON();
    }
}

function mostrar_articulos(){
    require_once 'php/models/articulos_model.php';
    $articulos = getArrayArtsPorCategoriaAsc();
    include 'php/views/mantenimiento_articulos.php';
}

function eliminar_articulo(){
    require_once 'php/models/articulos_model.php';
    if(delete_art($_POST['id'])){
       header('Location index.php?info=del_art'); 
       array_datos_articulos_JSON();
    }else{
        header('Location index.php?info=del_art_err');
    }
    
}

function show_good_card(){
    require_once 'php/models/articulos_model.php';
    $articulo = get_articulo_por_id($_GET['id']);
    include 'php/views/showGoods.php';
}

?>