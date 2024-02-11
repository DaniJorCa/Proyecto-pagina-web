
<?php

require_once 'php/models/categorias_model.php';
require_once 'php/models/pedidos_model.php';
$array_categorias = get_array_categorias();
$array_subcategorias = get_array_subcategorias();

?>
<header>
    <div class="header-left">
        <a href="#"><img src="logo/logo.svg" alt="Logo de la empresa things to buy"></a>
        <nav>
            <ul class="menu-nav">
                <li class="menu-item" id="hamburguer">    
                    <a href="#"><i class="fa-solid fa-bars" style="color: #f3e9d2;"></i></a>    
                </li>
                <li class="menu-item">    
                    <a href="index.php">Inicio</a>    
                </li>

<?php
    if(isset($array_categorias) && !empty($array_categorias)){
        foreach($array_categorias as $categoria){
            echo '<li class="menu-item item-show">';
            echo '<a href="index.php?view=_mostrar_art_por_categoria&select_cat=' . $categoria['codigo'] . '">'. $categoria['nombre'] . '<i class="fa-solid fa-angle-down" style="color: #e9f3d2;"></i></a>';
            if(!empty($array_subcategorias)){
                echo "<ul class='menu-dropdown'>";
                foreach($array_subcategorias as $subcategoria){
                    if($subcategoria['cod_cat_padre'] === $categoria['codigo']){
                        echo '<li class="menu-inside">';
                        echo '<a href="index.php?view=_mostrar_art_por_subcategoria&select_subcat='. $subcategoria['codigo'] .'">' . $subcategoria['nombre'].'</a>';
                        echo '</li>';
                    } 
            }
            echo "</ul>";
            
            }
            echo "</li>"; 
        }
    }else{
        echo "<ul><li>Sin categorias en la base de datos</li></ul>";
    }

?>
                <li class="menu-item">
                    <a href="#" class="aboutUs">¿Quien Somos?</a>
                </li>
                
            </ul>
        </nav>
    </div>
    <div class="header-right">
<?php 
if(!isset($_SESSION['dni_log'])){ 
?>
        <div class="acceso">
            <!-- <div class="registro reg-left">
                <a class="login" href="login.php">Login<i class="fa-solid fa-user" style="color: #f3e9d2;"></i></a>
            </div>
            <div class="registro reg-right">
                <a class="reg" href="registro.php">Registrarse<i class="fa-solid fa-user-plus" style="color: #f3e9d2;"></i></a>
            -->
            <a class="login" href="login.php"><i class="fa-solid fa-user" style="color: #f3e9d2;"></i></a>
            <a class="login" href="login.php"><p>Login | Registro</p></a>
<?php
} 
if(isset($_SESSION['dni_log'])){
    $pedido_pdte = buscar_id_pedidos_pendientes_de_pago_para_usuario_log($_SESSION['dni_log']);
    $lineas_pedido = get_count_lineas_pedido($_SESSION['dni_log']);
    if($lineas_pedido > 0){
?> 
    </div>
        <div class="box--carrito row mx-4">
            <a class="icon-carrito carrito" href="mis_pedidos.php?view=_linped&ped=<?php echo $pedido_pdte?>">
                <button type="button" class="btn btn-primary"><i class="fa-solid fa-cart-shopping fa-cart" style="color: #f3e9d2;"></i>
                Articulos <span class="badge bg-secondary"><?php  echo $lineas_pedido ?></span>
                </button>
            </a>
        </div>
    </div>
<?php
}else{
?>
    </div>
        <div class="box--carrito row">
            <a class="icon-carrito carrito" href="carrito.php"><i class="fa-solid fa-cart-shopping fa-cart" style="color: #f3e9d2;"></i></a>
        </div>
    </div>

<?php
    }
}
?>
</header>
