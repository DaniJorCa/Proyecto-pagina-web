<?php

function modificar_usuario_controller(){
    require_once('php/models/usuario_model.php');

    if(!isset($_POST['submit_edit_passwd'])){
        $campos_en_blanco = boolean_check_empty_fields($_POST);
        if($campos_en_blanco){
            header('Location: perfil_usuario.php?info=empty_fields');
            exit;
        }
        $arrayUsuario = get_array_datos_usuario_or_string_if_is_not($_POST['dni_edit']);
        if(is_array($arrayUsuario) && $_SESSION['dni_log'] === $_POST['dni_edit']){
            check_edit_usuario($arrayUsuario, $_POST);
            modificar_datos_usuario_en_BD($_POST);
            header('Location: index.php');
            exit;
        }else{
            modificar_datos_usuario_en_BD($_POST);
            header('Location: index.php');
            exit;
        }
        
    }else{
        if(check_passwd_y_repasswd($_POST)){
            if(modificar_passwd($_POST)){
                header('Location: index.php?info=update_passwd');
            }
        }else{
            header('Location: index.php?info=not_same_passwd');
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
    $_SESSION['header'] = 'index.php?view=_mant-perm&';
    require_once('php/models/usuario_model.php');
    include 'php/pagination/artsXpag.php';
    if(isset($_GET['search']) && $_GET['search'] !== ""){
        $usuarios = get_array_usuarios_filtrados_por_texto($inicio, $artXpag, $_GET['search'], $_GET['type']);
    }else{
        $usuarios = get_array_todos_usuarios($inicio, $artXpag);
    }

    include('php/views/mantenimiento_permisos.php');
    include 'php/pagination/pagination_control.php';
}
?>