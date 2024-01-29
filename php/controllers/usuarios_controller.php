<?php
function alta_usuario_en_BD(){
    require '../php/models/usuario_model.php';
    $errores_formulario = comprobar_errores_formulario($_POST);
    if(!empty($errores_formulario)){
        header('Location: registro_usuario.php' . $errores_formulario);
        exit();
    }
    $arrayDatosUsuarioRegistrado = array_registros_formulario(); 
    $boolean_existe = existe_usuario_con_dni($arrayDatosUsuarioRegistrado['dni']);
    
    if(!$boolean_existe){
        insertar_usuario_completo_en_BD($arrayDatosUsuarioRegistrado);
        if(count($arrayDatosUsuarioRegistrado) > 0){
            check_log($arrayDatosUsuarioRegistrado);
        }        
    }else{
        header('Location: registro_usuario.php?dni=already-exist');
        exit();
    }
    
}
?>