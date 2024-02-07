<?php

function formulario_alta_categorias(){
    $err_log_form_registro_categoria = '';
    require_once 'php/models/categorias_model.php';
    $err_log_form_registro_categoria = cadena_err_check_campos_formulario_categorias($_POST);
    if($err_log_form_registro_categoria === '' && isset($_POST)){
        introducir_categorias_principal($_POST);
        array_datos_categorias_JSON();
    }else{
        header('Location: registro_categorias.php?' .  $err_log_form_registro_categoria);  
    }
}

?>