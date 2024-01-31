<?php
if(!is_array($articulos)){
    echo '<p>No hay articulos que mostrar</p>';
}else{      
?>    

<h2 class="">

<?php
echo "<table>";

    foreach ($articulos as $fila) {
    echo "<div class='card col-md-6' style='width: 18rem;'>";
    echo '<img src="' . $fila['img'] . '" class="card-img-top" alt="...">';
    echo '<div class="card-body">';
    echo '<h5 class="card-title">' . $fila["nombre"] . '</h5>';
    echo  '<p class="card-text">' . $fila["descripcion"] . "</p>";
    echo  '<a href="#" class="btn btn-primary">Comprar</a>';
    echo  '</div>';
    echo  '</div>';
    }

echo "</table>";
}
?>