<?php
if(!is_array($articulos)){
    echo '<p>No hay articulos que mostrar</p>';
}else{   
?>    

<table border="1">
<tr>
<td>ID</td>
<td>Nombre</td>
<td>Descripcion</td>
<td>Precio Actual</td>
<td>Precios Anteriores</td>
<td>Precio Compra</td>
<td>Categoria</td>
<td>Subcategoria</td>
<td>Dto Venta</td>
<td>Dto Compra</td>
<td>Iva</td>
<td>Stock</td>
<td>Stock Mínimo</td>
<td>Total Ventas</td>
<td>Esta de Baja?</td>
</tr>
<?php

    foreach ($articulos as $fila) {
    echo "<tr>";
    echo "<td>{$fila["id"]}</td>"; 
    echo "<td>{$fila["nombre"]}</td>";
    echo "<td>{$fila["descripcion"]}</td>";
    echo "<td>{$fila["precio"]}</td>";
    echo "<td>{$fila["preciosAnteriores"]}</td>";
    echo "<td>{$fila["precioCompra"]}</td>"; 
    echo "<td>{$fila["categoria"]}</td>";
    echo "<td>{$fila["subcategoria"]}</td>";
    echo "<td>{$fila["dtoVenta"]}</td>";
    echo "<td>{$fila["dtoCompra"]}</td>";
    echo "<td>{$fila["iva"]}</td>"; 
    echo "<td>{$fila["stock"]}</td>";
    echo "<td>{$fila["stockMinimo"]}</td>";
    echo "<td>{$fila["totalVentas"]}</td>";
    echo "<td>{$fila["esBaja"]}</td>";
    echo "</tr>";
    }
}

?>
</table>
