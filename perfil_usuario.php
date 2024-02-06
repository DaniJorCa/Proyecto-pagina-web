<!DOCTYPE html>
<html>
    <head>
        <link href="styles/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="styles/header&footer.css">
        <link rel="stylesheet" href="styles/genericBody.css">
        <link rel="stylesheet" href="styles/bodyMain.css">
        <link rel="stylesheet" href="styles/aside.css">
        <link rel="stylesheet" href="styles/slideshowArea.css">
        <link rel="stylesheet" href="styles/showGoods.css">
        <link rel="stylesheet" href="styles/perfil_usuario.css">
        
        <script type="text/javascript" src="script/jsMain.js"></script>
        <script type="text/javascript" src="script/index.js"></script>
        <script type="text/javascript" src="script/perfil_usuario.js"></script>
    </head>
    <div class="capaBlur" id="capaBlur"></div>
    <body>
<?php
    include_once('php/security/security.php');        
     include ('php/views/header.php');
     include ('php/views/aside.php'); 
?>    

<main class="row">
<?php    
    include ('php/views/form_perfil_usuario.php');
?>
    </main>
<?php include ('php/views/footer.html') ?>

        <script src="styles/js/bootstrap.bundle.min.js"></script>
    </body>
</html>