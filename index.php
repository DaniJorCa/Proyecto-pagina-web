<!DOCTYPE html>
<html>
    <head>
        <link href="styles/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="styles/header&footer.css">
        <link rel="stylesheet" href="styles/genericBody.css">
        <link rel="stylesheet" href="styles/bodyMain.css">
        <link rel="stylesheet" href="styles/aside.css">
        <link rel="stylesheet" href="styles/body_index.css">
        <link rel="stylesheet" href="styles/slideshowArea.css">
        <script type="text/javascript" src="script/jsMain.js"></script>
        <script type="text/javascript" src="script/index.js"></script>
        <script type="text/javascript" src="script/perfil_usuario.js"></script>
        <script type="text/javascript" src="script/registro_articulos.js"></script>
        
    </head>
<div class="capaBlur" id="capaBlur"></div>    
<?php
ob_start();
session_start();
include_once('php/security/security.php');
include_once('php/views/header.php'); 
include_once('php/views/aside.php');
require "php/controllers/articulos_controller.php";
require "php/controllers/usuarios_controller.php";
require "php/controllers/categorias_controller.php";
require "php/controllers/generic_controller.php";

//mandar esto a algun aside
echo "<body>";
echo "<main>";

if(isset($_GET['info'])){
    show_messages($_GET);
}



$mostrar = isset($_GET['view']) ? $_GET['view'] : '_mas-vendidos';

            switch ($mostrar){

                case '_mas-vendidos':
                    consultar_art_mas_vendidos();
                    break;
                case '_mantenimiento-art':
                    consultar_mantenimiento_articulos();
                    break;
                case '_edicion-art':
                    edicion_informacion_articulo($_POST['id']);
                    break;
                case '_delete-art':
                    eliminar_articulo($_GET['id']);
                    break; 
                case '_alta-articulo':
                    formulario_alta();
                    consultar_art_mas_vendidos();
                    break;
                case '_mant-arts':
                    mostrar_articulos();
                    break;     
                case '_alta-categoria':
                    formulario_alta_categorias();
                    break;
                case '_mod_datos_usuario';
                    modificar_usuario_controller();           
                    break;
                case '_mod_datos_user_master';
                    mostrar_datos_edit_master();           
                    break;    
                case '_mostrar_art_por_categoria';
                    busqueda_selectiva_por_categoria();
                    break;
                case '_mant-perm';
                    despliegue_usuarios();
                    break;
            
                default:
                    consultar_art_mas_vendidos();
                    break;

            }

echo "</main>";
?>

    

<?php 
include ('php/views/footer.html');

?>
<script src="styles/js/bootstrap.bundle.min.js"></script>
    </body>
</html>