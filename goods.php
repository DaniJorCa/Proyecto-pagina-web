<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="styles/header&footer.css">
        <link rel="stylesheet" href="styles/genericBody.css">
        <link rel="stylesheet" href="styles/bodyMain.css">
        <link rel="stylesheet" href="styles/aside.css">
        <link rel="stylesheet" href="styles/slideshowArea.css">
        <link rel="stylesheet" href="styles/showGoods.css">
        <script type="text/javascript" src="script/jsMain.js"></script>
        <script type="text/javascript" src="script/index.js"></script>
    </head>
    <body>
<?php
    include_once('php/security/security.php');        
     include ('php/views/header.php');
     include ('php/views/aside.php'); 
?>    

<main>
        <?php include ('php/views/showGoods.html') ?>
    </main>
    <?php include ('php/views/footer.html') ?>
    </body>
</html>