<?php
if(!is_array($articulos)){
    echo '<p>No hay articulos que mostrar</p>';
}else{   
?>    

<table border="1">
<tr>
<th>ID</th>
<th>Nombre</th>
<th>Img</th>
<th>Descripcion</th>
<th>Precio Actual</th>
<th>Precios Anteriores</th>
<th>Precio Compra</th>
<th>Categoria</th>
<th>Subcategoria</th>
<th>Dto Venta</th>
<th>Dto Compra</th>
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
    echo "<td>{$fila["id"]}</td>"; 
    echo "<td>{$fila["nombre"]}</td>";
    echo "<td><img class='img-tabla'src='{$fila["img"]}'></img></td>";
    echo "<td class='td-wrap'>{$fila["descripcion"]}</td>";
    echo "<td>{$fila["precio"]}</td>";
    echo "<td>{$fila["preciosAnteriores"]}</td>";
    echo "<td>{$fila["precioCompra"]}</td>"; 
    echo "<td>{$fila["genero"]}</td>";
    echo "<td>{$fila["categoria"]}</td>";
    echo "<td>{$fila["subcategoria"]}</td>";
    echo "<td>{$fila["dtoVenta"]}</td>";
    echo "<td>{$fila["dtoCompra"]}</td>";
    echo "<td>{$fila["iva"]}</td>"; 
    echo "<td>{$fila["stock"]}</td>";
    echo "<td>{$fila["stockMinimo"]}</td>";
    echo "<td>{$fila["totalVentas"]}</td>";
    echo "<td>{$fila["esBaja"]}</td>";
    echo "<td><a href=?view=_edicion-art&id={$fila["id"]}></a></td>";
    echo "</tr>";
    }
}
?>
</table>