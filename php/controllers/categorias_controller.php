<?php

function formulario_alta_categorias(){
    $err_log_form_registro_categoria = '';
    require_once 'php/models/categorias_model.php';
    $err_log_form_registro_categoria = cadena_err_check_campos_formulario_categorias($_POST);
    if($err_log_form_registro_categoria === '' && isset($_POST)){
        introducir_categorias_principal($_POST);
        array_datos_categorias_JSON();
        header('Location: index.php?view=_mant-arts'); 
        exit(); 
    }else{
        header('Location: registro_categorias.php?' .  $err_log_form_registro_categoria);  
        exit();
    }
}

function despliegue_categorias(){
    require_once 'php/models/categorias_model.php';
    require_once 'php/models/articulos_model.php';
    $categorias = get_array_categorias();
    $subcategorias = get_array_subcategorias();
    $articulos = get_array_articulos();
    include ('php/views/mantenimiento_categorias.php');
}

function eliminar_subcategoria(){
    require_once 'php/models/categorias_model.php';
    require_once 'php/models/articulos_model.php';
    if(delete_subcategoria($_GET)){
       array_datos_categorias_JSON(); 
    }else{
        echo "Datos no eliminados";
    }
    $categorias = get_array_categorias();
    $subcategorias = get_array_subcategorias();
    $articulos = get_array_articulos();
    include('php/views/mantenimiento_categorias.php');
    
}

?>