<!DOCTYPE html>
<html>
    <head>
        <title>Registrate</title>
        <link href="styles/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="styles/header&footer.css">
        <link rel="stylesheet" href="styles/genericBody.css">
        <link rel="stylesheet" href="styles/bodyMain.css">
        <link rel="stylesheet" href="styles/aside.css">
        <link rel="stylesheet" href="styles/slideshowArea.css">
        
    </head>
    <body>
        <main class="row">
<?php
        include_once('php/views/header.php');
        include_once('php/controllers/registro_controller.php');

        $mostrar = isset($_GET['view']) ? $_GET['view'] : '_registro_usuario';

            switch ($mostrar){

                case '_add_cart':
                    registro_minimo();
                    break;
                default:
                    registro_completo();
                    break;

            }
         
        include_once('php/views/footer.html');
?>
        <script src="styles/js/bootstrap.bundle.min.js"></script>
        <script type="text/javascript" src="script/jsMain.js"></script>
        </main>
    </body>
</html>

