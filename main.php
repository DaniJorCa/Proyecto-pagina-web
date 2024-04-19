<?php 

session_start();
$_SESSION = array();
session_destroy();

require_once("php/controllers/usuarios_controller.php");
require_once("php/controllers/registro_controller.php");

$mostrar = isset($_GET['view']) ? $_GET['view'] : '_mas-vendidos';

switch ($mostrar){

    case '_registro':
        alta_usuario_en_BD();
        break;    
    case '_registro_min':
        alta_min_usuario_en_BD();
        break;
    default:
        break;
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link href="styles/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles/header&footer.css">
    <link rel="stylesheet" href="styles/genericBody.css">
    <link rel="stylesheet" href="styles/slideshowArea.css">
    <link rel="stylesheet" href="styles/bodyMain.css">
    <script type="text/javascript" src="script/jsMain.js"></script>
</head>
<div class="capaBlur" id="capaBlur"></div>
<?php 

include ('php/views/header.php');
include ('php/models/articulos_model.php');
?>

    <body>
        
        <div class="parallax">
            <img class="logo-parallax" src="logo/logoparallax.svg">
        </div>
        <div class="principal-objetivo">
            <p>Tu satisfacción, nuestro principal objetivo</p>
            <div class="cards">
                <div class="card-main">
                    <i class="fa-solid fa-cart-shopping fa-cart" style=" color:#114b5f;"></i>
                    <p>Introduce productos en su carrito y realiza la compra</p>
                </div>
                <div class="card-main">
                    <i class="fa-solid fa-truck-fast" style=" color:#114b5f;"></i>
                    <p>Nosotros se lo haremos llegar</p>
                </div>
                <div class="card-main" >
                    <i class="fa-solid fa-gift" style=" color:#114b5f;"></i>
                    <div>
                        <p>Le haremos entrega de aquello que tanto desea en</p>
                        <p>24/48Hrs</p>
                    </div>
                </div>
            </div>
        </div>    
<?php 

include('php/views/slideshowArea.php'); 

?>



        <div id="form-registro">
            <h2>LOGIN / REGISTRO </h2>
            <form class="row g-3" method="POST" action="conexion.php">
                <label for="email">Email</label>
                <input name="email" class="email" type="email" placeholder="Email" autofocus required>
                <label for="passwd">Contraseña</label>
                <input name="passwd" class="passwd" type="password" placeholder="Contraseña" required>
                <button id="btn-alta_articulo" class="btn btn-success">Entrar</button>
            </form>
            <h3>¿Todavia no eres usuario?</h3>
            <h3><a href="registro_usuario.php">Date de Alta</a></h3>
        </div>
        <script src="styles/js/bootstrap.bundle.min.js"></script>
    </body>
    

<?php 
include ('php/views/footer.html') 
?>
</html>