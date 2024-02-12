<?php
$articulos = get_array_top_ventas_slideshow();
?>
<div class="slideshowArea--items">
    <p>Articulos Top</p>
    <div class="articulos-top">
        <button id="button-slideshow-left">
            <div class="button-slideshow">
                <i class="fa-solid fa-circle-arrow-left slideshow--arrow" style="color: #f3e9d2;"></i>
            </div>
        </button>
        <div class="articulos">
<?php
    foreach($articulos as $articulo){
        echo '<div class="articulo">';
        echo '<a href="articulo***************">'; 
        echo '<a href="articulo.php">';
        echo '<p>'.$articulo["nombre"].'</p>';
        echo '<img class="rounded" src="'.$articulo['img'].'">';
        echo '<p>'.$articulo['precio'].'€</p>';
        echo '</a>';
        echo '<div class="carrito-item--slideshow">';
        echo '<div class="cart-item-div action-butt-articulo">';
        echo '<a href="registro_usuario.php?view=_add_cart&id='.$articulo['id_articulo'].'" class="btn btn-add-cart"><button><i class="fa-solid fa-cart-shopping fa-cart" style="color: #f3e9d2;"></i></button></a>';
        echo '</div>';
        echo '<div class="heart-item-div action-butt-articulo">';
        echo '<button><i class="fa-solid fa-heart-circle-plus fa-heart" style="color: #f3e9d2;"></i></button>';
        echo '</div>';
        echo '</div>';
        echo '</a>';
        echo '</div>';
    }
    
?>

        </div>
        <button id="button-slideshow-right">
            <div class="button-slideshow">
                <i class="fa-solid fa-circle-arrow-right slideshow--arrow" style="color: #f3e9d2;"></i>
            </div>
        </button>
    </div>
    
</div>