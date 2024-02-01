<?php
ob_start();
session_start();
include_once('../php/security/security.php');
include_once('../php/views/header.html'); 
include_once('../php/views/aside.php');
require "../php/controllers/articulos_controller.php";
require "../php/controllers/usuarios_controller.php";
require "../php/controllers/categorias_controller.php";
require "../php/controllers/generic_controller.php";

//mandar esto a algun aside
echo "<main>";

$mostrar_info = isset($_GET['info']) ? $_GET['info'] : '';

switch ($mostrar_info){

    case 'update_passwd':
        show_messages($_GET);
        break;
    default:
        echo "";
        break;

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
                    edicion_informacion_articulo($_GET['id']);
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
                default:
                    consultar_art_mas_vendidos();
                    break;

            }

echo "</main>";
?>
<!DOCTYPE html>
<html>
    <head>
        <link href="../styles/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="../styles/header&footer.css">
        <link rel="stylesheet" href="../styles/genericBody.css">
        <link rel="stylesheet" href="../styles/bodyMain.css">
        <link rel="stylesheet" href="../styles/aside.css">
        <link rel="stylesheet" href="../styles/body_index.css">
        <link rel="stylesheet" href="../styles/slideshowArea.css">
        <script type="text/javascript" src="../script/jsMain.js"></script>
        <script type="text/javascript" src="../script/index.js"></script>
        
    </head>
    <body>

<?php 
include ('../php/views/footer.html');

?>
<script src="../styles/js/bootstrap.bundle.min.js"></script>
    </body>
</html>