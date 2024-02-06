<?php
function alta_usuario_en_BD(){
    require_once('php/models/usuario_model.php');
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
            header('Location: index.php');
        }        
    }else{
        header('Location: registro_usuario.php?dni=already-exist');
        exit();
    }
    
}

function modificar_usuario_controller(){
    require_once('php/models/usuario_model.php');

    if(!isset($_POST['submit_edit_passwd'])){
        $campos_en_blanco = boolean_check_empty_fields($_POST);
        if($campos_en_blanco){
            header('Location: perfil_usuario.php?info=empty_fields');
            exit;
        }
        $arrayUsuario = get_array_datos_usuario_or_string_if_is_not($_POST['dni_edit']);
        if(is_array($arrayUsuario)){
            check_edit_usuario($arrayUsuario, $_POST);
            modificar_datos_usuario_en_BD($_POST);
            header('Location: index.php');
            exit;
        }
        
    }else{
        check_passwd_y_repasswd($_POST);
            if(modificar_passwd($_POST)){
                header('Location: index.php?info=update_passwd');
            }
        }

}

function mostrar_datos_edit_master(){
    require_once('php/models/usuario_model.php');
    if(isset($_SESSION['user-edit-master'])){
        $usuario_edit = get_usuario($_SESSION['user-edit-master']);
        user_edit_SESSION($usuario_edit);    
    }
    include('php/views/form_edicion_user_master.php');
}

function despliegue_usuarios(){
    require_once('php/models/usuario_model.php');
    $usuarios = get_array_todos_usuarios();
    include('php/views/mantenimiento_permisos.php');
}
?>