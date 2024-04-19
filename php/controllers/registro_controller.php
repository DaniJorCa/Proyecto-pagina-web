<?php
function registro_minimo(){
    require_once('php/models/registro_model.php');
    include('php/views/form_registro_usuario_min.php');
}

function registro_faltante(){
    require_once('php/models/registro_model.php');
    require_once('php/models/usuario_model.php');
    $errores_formulario = comprobar_errores_formulario($_POST);
    if(!empty($errores_formulario)){
        header('Location: registro_usuario.php?' . $errores_formulario);
        exit();
    }
    $arrayDatosUsuarioRegistrado = array_registros_faltantes_formulario();
    insertar_usuario_faltante_en_BD($arrayDatosUsuarioRegistrado);
    checkLogMin($_POST['dni']);
    header('Location: mis_pedidos.php');
    exit();
}

function registro_completo(){
    require_once('php/models/registro_model.php');
    include('php/views/form_registro_usuario.php');
}

function alta_usuario_en_BD(){
    require_once('php/models/registro_model.php');
    require_once('php/models/usuario_model.php');
    $errores_formulario = comprobar_errores_formulario($_POST);
    if(!empty($errores_formulario)){
        header('Location: registro_usuario.php?' . $errores_formulario);
        exit();
    }
    $arrayDatosUsuarioRegistrado = array_registros_formulario(); 
    $boolean_existe = existe_usuario_con_dni($arrayDatosUsuarioRegistrado['dni']);
    
    if(!$boolean_existe){
        insertar_usuario_completo_en_BD($arrayDatosUsuarioRegistrado);
        if(count($arrayDatosUsuarioRegistrado) > 0){
            header('Location: index.php');
        }        
    }else{
        header('Location: registro_usuario.php?dni=already-exist');
        exit();
    } 
}

function alta_min_usuario_en_BD(){
    require_once('php/models/usuario_model.php');
    require_once('php/models/registro_model.php');
    if(isset($_GET['id'])){
        session_start();
        $_SESSION['first_buy'] = $_GET['id'];
    }
    if(isset($_GET['id'])){
        session_start();
        $_SESSION['first_wl'] = $_GET['wl'];
    }
    $errores_formulario = comprobar_errores_formulario($_POST);
    if(!empty($errores_formulario)){
        header('Location: registro_usuario.php?view=_add_cart&' . $errores_formulario);
        exit();
    }
    $arrayDatosUsuarioRegistrado = array_registros_min_formulario(); 
    $boolean_existe = existe_usuario_con_dni($arrayDatosUsuarioRegistrado['dni']);
    
    if(!$boolean_existe){
        insertar_usuario_min_en_BD($arrayDatosUsuarioRegistrado);
        if(count($arrayDatosUsuarioRegistrado) > 0){
            header('Location: index.php');
        }        
    }else{
        header('Location: registro_usuario.php?view=_add_cart&dni=already-exist');
        exit();
    } 
}

?>