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
ob_start();
session_start();
include_once('../php/views/header.html'); 
include_once('../php/views/aside.php');
require "../php/controllers/articulos_controller.php";
require "../php/controllers/usuarios_controller.php";
?>
    <main>
<?php
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
                case '_registro':
                    alta_usuario_en_BD();
                    break;
                case '_alta-articulo':
                    formulario_alta();
                    break; 
                       

                default:
                    consultar_art_mas_vendidos();
                    break;

            }
?>
        
    </main>
<?php 
include ('../php/views/footer.html');

?>
<script src="../styles/js/bootstrap.bundle.min.js"></script>
    </body>
</html>