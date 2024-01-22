<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="../styles/header&footer.css">
        <link rel="stylesheet" href="../styles/genericBody.css">
        <link rel="stylesheet" href="../styles/bodyMain.css">
        <link rel="stylesheet" href="../styles/aside.css">
        <link rel="stylesheet" href="../styles/slideshowArea.css">
        <script type="text/javascript" src="../script/jsMain.js"></script>
        <script type="text/javascript" src="../script/index.js"></script>
    </head>
    <body>
    <?php include ('includes/header.html') ?>
    <?php include ('includes/aside.html') ?>
    <main>
        <?php
            require "../php/controllers/articulos_controller.php";

            $mostrar = isset($_GET['view']) ? $_GET['view'] : '_mas-vendidos';

            switch ($mostrar){

                case '_mas-vendidos':
                    consultar_art_mas_vendidos();
                    break;
                
                case '_mantenimiento-art':
                    consultar_mantenimiento_articulos();

                    default:
                    consultar_art_mas_vendidos();
                    break;

            }
        ?>
        
    </main>
    <?php include ('includes/footer.html') ?>
    </body>
</html>