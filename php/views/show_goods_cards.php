<?php
if(!is_array($articulos)){
    echo '<p>No hay articulos que mostrar</p>';
}else{      
?>    


<h2 class="display-4 text-center">Top Ventas</h2>
<div class="container-fluid row justify-content-evenly">

<?php

foreach ($articulos as $fila) {
    echo "<div class='card col-md-6 my-4 justify-content-around' style='width: 18rem;'>";
    echo "<a class='btn-show-good-card' href='index.php?view=_good-card&id=".$fila['id_articulo']."'>";
    echo '<img src="' . $fila['img'] . '" class="card-img-top" alt="...">';
    echo '<div class="card-body">';
    echo '<h5 class="card-title text-center">' . $fila["nombre"] . '</h5>';
    echo '<p class="card-text">' . $fila["descripcion"] . "</p>";
    echo '</div>';
    echo '</a>';
    echo '<a href="index.php?view=_add_cart&id=' . $fila['id_articulo'] . '" class="btn btn-add-cart"><i class="fa-solid fa-cart-shopping cart-card"></i>Comprar ' .$fila['precio'] - ($fila['precio'] * 0.1). '€</a>';
    echo '</div>';
}
?>

</div>

<?php
}
?>
