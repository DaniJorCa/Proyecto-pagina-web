<?php
if(!is_array($articulos)){
    echo '<p>No hay articulos que mostrar</p>';
}else{   
?>  

<div class="my-4">
    <button id="btn-alta_articulo" class="btn btn-success">Alta Articulos</button>
    <button id="btn-alta_categorias" class="btn btn-warning">Alta Categorias</button>
</div>
<div>
<table class="table-hover table-striped">
<tr>
<th>ID</th>
<th>Nombre</th>
<th>Img</th>
<th>Descripcion</th>
<th>Precio</th>
<th>Genero</th>
<th>Categoria</th>
<th>Subcategoria</th>
<th>Neto Compra</th>
<th>Iva</th>
<th>Stock</th>
<th>Stock Mínimo</th>
<th>Total Ventas</th>
<th>Esta de Baja?</th>
<th>Modificar Articulo</th>
</tr>
<?php

    foreach ($articulos as $fila) {
    echo "<tr>";
    echo "<td>{$fila["id_articulod"]}</td>"; 
    echo "<td>{$fila["nombre"]}</td>";
    echo "<td><img class='img-tabla'src='{$fila["img"]}'></img></td>";
    echo "<td class='td-wrap'>{$fila["descripcion"]}</td>";
    echo "<td>{$fila["precio"]}</td>";
    echo "<td>{$fila["genero"]}</td>";
    echo "<td>{$fila["categoria"]}</td>";
    echo "<td>{$fila["subcategoria"]}</td>";
    echo "<td>{$fila["neto_compra"]}</td>";
    echo "<td>{$fila["iva"]}</td>"; 
    echo "<td>{$fila["stock"]}</td>";
    echo "<td>{$fila["stock_minimo"]}</td>";
    echo "<td>{$fila["total_ventas"]}</td>";
    echo "<td>{$fila["esBaja"]}</td>";
    echo "<td><a href=?view=_edicion-art&id={$fila["id"]}></a></td>";
    echo "</tr>";
    }
}
?>
</div>
</table>