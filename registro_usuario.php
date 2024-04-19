<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Registrate</title>
        <link href="styles/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="styles/header&footer.css">
        <link rel="stylesheet" href="styles/genericBody.css">
        <link rel="stylesheet" href="styles/bodyMain.css">
        <link rel="stylesheet" href="styles/aside.css">
        <link rel="stylesheet" href="styles/slideshowArea.css">
        <link rel="stylesheet" href="styles/mis_pedidos.css">
        
    </head>
    <body>
        <main class="row">
<?php
        include_once('php/views/header.php');
        include_once('php/controllers/registro_controller.php');
        session_start();

        $mostrar = isset($_GET['view']) ? $_GET['view'] : '_registro_usuario';

            switch ($mostrar){

                case '_add_cart':
                    registro_minimo();
                    break;
                case '_registro_faltante':
                    registro_faltante();
                    break;   
                default:
                    registro_completo();
                    break;

            }
         
        
?>
        <script src="styles/js/bootstrap.bundle.min.js"></script>
        <script type="text/javascript" src="script/jsMain.js"></script>
        </main>
<?php
        include_once('php/views/footer.html');
?>
    </body>
</html>

