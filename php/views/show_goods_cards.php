<?php
if(!is_array($articulos)){
    echo '<p>No hay articulos que mostrar</p>';
}else{      
?>    


<h2 class="display-4 text-center">Top Ventas</h2>
<div class="container-fluid row justify-content-evenly">

<?php
    foreach ($articulos as $fila) {
    echo "<div class='card col-md-6 my-4' style='width: 18rem;'>";
    echo '<img src="' . $fila['img'] . '" class="card-img-top" alt="...">';
    echo '<div class="card-body">';
    echo '<h5 class="card-title text-center">' . $fila["nombre"] . '</h5>';
    echo  '<p class="card-text">' . $fila["descripcion"] . "</p>";
    echo '<a href="index.php?view=_add_cart&id=' . $fila['id_articulo'] . '" class="btn btn-primary">Comprar</a>';
    echo  '</div>';
    echo  '</div>';
    }
?>

</div>

<?php
}
?>