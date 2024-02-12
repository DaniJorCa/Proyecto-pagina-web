<h3 class="display-4 text-center mb-3"><i class="fa-solid fa-heart" style="color: #ff0000;"></i>Lista de Deseos</h3>
<?php
if(empty($deseos) || !is_array($deseos)){
    echo '<img class="my-4" src="img/genioLampara.png" style="height: 400px; width: 370px;"></img>';
    echo '<p class="text-center my-3 fs-3">Seguro que no tienes ningun deseo?</p>';
    echo "<button class='btn btn-acceso-tienda'><a href='index.php'>Acceder a tienda</a></button>";
}else{   
?>  

<div class='d-flex justify-content-center my-4 row'>
<table class="table-hover table-striped col-9">
<tr>
<th>DNI</th>
<th>Deseo</th>
<th>Imagen</th>
<th>Borrar</th>
</tr>


<?php

    foreach($deseos as $fila) {
    $articulo = get_articulo_por_id($fila['id_articulo']);
    echo "<tr>";
    echo "<td>{$fila["dni_cliente"]}</td>"; 
    echo "<td>{$fila["id_articulo"]}</td>";
    echo "<td><img style='height: 120px; width: 120px;' src='".$articulo[0]['img']."'</td>";
    echo "<td><a href=index.php?view=_del-line-wishlist&id=".$fila['id_articulo']."><button class='btn btn-danger'>Eliminar</button></a></td>";
    echo "</tr>";   
    }
}
?>
</div>
</table>