<!DOCTYPE html>
<html>
<head>
    <link href="../styles/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../styles/header&footer.css">
    <link rel="stylesheet" href="../styles/genericBody.css">
    <link rel="stylesheet" href="../styles/bodyMain.css">
    <link rel="stylesheet" href="../styles/slideshowArea.css">
    <script type="text/javascript" src="../script/jsMain.js"></script>
</head>
<div class="capaBlur" id="capaBlur"></div>
<?php include ('../php/views/header.html') ?>

    <body>
        
        <div class="parallax">
            <img class="logo-parallax" src="../logo/logoparallax.svg">
        </div>
        <div class="principal-objetivo">
            <p>Tu satisfacción, nuestro principal objetivo</p>
            <div class="cards">
                <div class="card">
                    <a class="icon-carrito carrito" href="carrito.php"><i class="fa-solid fa-cart-shopping fa-cart" style="color: #f3e9d2;"></i></a>
                    <p>Introduce productos en su carrito y realiza la compra</p>
                </div>
                <div class="card">
                    <i class="fa-solid fa-truck-fast" style="color: #f3e9d2;"></i>
                    <p>Nosotros se lo haremos llegar</p>
                </div>
                <div class="card">
                    <i class="fa-solid fa-gift" style="color: #f3e9d2;"></i>
                    <div>
                        <p>Le haremos entrega de aquello que tanto desea en</p>
                        <p>24/48Hrs</p>
                    </div>
                </div>
            </div>
        </div>    
<?php 

include('../php/views/slideshowArea.html'); 

?>

        <div id="form-registro">
            <h2>LOGIN / REGISTRO </h2>
            <form class="row g-3" method="POST" action="index.php">
                <label for="email">Email</label>
                <input name="email" class="email" type="email" placeholder="Email" autofocus required>
                <label for="passwd">Contraseña</label>
                <input name="passwd" class="passwd" type="text" placeholder="Contraseña" required>
            </form>
            <h3>¿Todavia no eres usuario?</h3>
            <h3><a href="registro_usuario.php">Date de Alta</a></h3>
        </div>
        <script src="../styles/js/bootstrap.bundle.min.js"></script>
    </body>
    

<?php 
include ('../php/views/footer.html') 
?>
</html>