<!DOCTYPE html>
<html>
    <head>
        <title>Registrate</title>
        <link href="styles/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="styles/header&footer.css">
        <link rel="stylesheet" href="styles/genericBody.css">
        <link rel="stylesheet" href="styles/bodyMain.css">
        <link rel="stylesheet" href="styles/aside.css">
        <link rel="stylesheet" href="styles/body_index.css">
        <link rel="stylesheet" href="styles/slideshowArea.css">
        <script type="text/javascript" src="script/jsMain.js"></script>
        <script type="text/javascript" src="script/index.js"></script>
        <script type="text/javascript" src="script/registro_articulos.js"></script>
        <script type="text/javascript" src="script/clases.js"></script>

        
    </head>
    <body>
<?php session_start();
        include_once('php/security/security.php');
        require('php/models/categorias_model.php');
        require('php/models/articulos_model.php');
        include_once('php/views/header.php');
        include_once('php/views/aside.php');
        include_once('php/views/form_registro_articulo.php'); 
        include_once('php/views/footer.html');
?>
        <script src="styles/js/bootstrap.bundle.min.js"></script>
        <script type="text/javascript" src="script/jsMain.js"></script>
    </body>
</html>

