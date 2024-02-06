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
<th>Eliminar Articulo</th>
</tr>
<?php

    foreach ($articulos as $fila) {
    echo "<tr>";
    echo "<td>{$fila["id_articulo"]}</td>"; 
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
    echo "<td><a class='row align-items-center'><button class='btn btn-warning btn-edit-datos-articulo btn-edit-articulo align-items-center m-2' value='{$fila["id_articulo"]}'><i class='fa-solid fa-trash-can align-items-center' style='color: #114b5f;'></i><p class='text-center'>Editar</p></button></a></td>";
    echo "<td><a class='row align-items-center btn-delete-articulo' href=?view=_delete-art&id={$fila["id_articulo"]}><button class='btn btn-danger btn-edit-datos-articulo align-items-center m-2'><i class='fa-solid fa-trash-can align-items-center' style='color: #114b5f;'><p class='text-center'>Eliminar</p></i></a></td>";
    echo "</tr>";
    }
}
?>

<div id="form-registro">
            <h2>Modificar Artículo</h2>
            <form class="row g-3 form-edit-article" id="formulario_edicion_articulo" action="index.php?view=_edicion-art" method="POST">
                <img id="img-edit-articulo" style="height: 100px; width: 100px;"></img>
                <input name="id" type="text" id="id-edit"></input>
            <div class='row'>   
            <button class='col-6' type='submit'>Editar Articulo</button>    
            <a class='col-6' href="index.php?view=_mant-arts">Cancelar Edición</a>
            <div>
            </form>
        </div>
</div>
</table>