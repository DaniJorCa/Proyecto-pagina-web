<!DOCTYPE html>
<html>
    <head>
        <title>Registrate</title>
        <link href="../styles/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="../styles/header&footer.css">
        <link rel="stylesheet" href="../styles/genericBody.css">
        <link rel="stylesheet" href="../styles/bodyMain.css">
        <link rel="stylesheet" href="../styles/aside.css">
        <link rel="stylesheet" href="../styles/body_index.css">
        <link rel="stylesheet" href="../styles/slideshowArea.css">
        <script type="text/javascript" src="../script/jsMain.js"></script>
        <script type="text/javascript" src="../script/index.js"></script>
        <script type="text/javascript" src="../script/registro_categorias.js"></script>
        
    </head>
    <body>
<?php session_start();
        require('../php/models/categorias_model.php');
        include_once('../php/views/header.html');
        include_once('../php/views/aside.php');
        include_once('../php/views/form_registro_categorias.php'); 
        include_once('../php/views/footer.html');
?>
        <script src="../styles/js/bootstrap.bundle.min.js"></script>
        <script type="text/javascript" src="../script/jsMain.js"></script>
    </body>
</html>