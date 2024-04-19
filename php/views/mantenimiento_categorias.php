<?php

foreach($categorias as $categoria){
    echo "<caption>Subcategorias de la categoria ".$categoria['nombre']."</caption>";
    echo "<table class='my-4 table'>";
    echo "<tr>";
    echo "<td>";
    echo "Subcategorias";
    echo "</td>";
    $contador_subcat = 0;
    foreach($subcategorias as $subcategoria){
       if($categoria['codigo'] === $subcategoria['cod_cat_padre']){
        $contador_subcat++;
        echo "<td>".$subcategoria['nombre']."</td>";
       }
    }
    if($contador_subcat === 0){
        echo "<a class='btn btn-danger mx-1 del-cat-btn' cod_cat=".$categoria['codigo']."><i class='fa-solid fa-trash mx-2'></i>Eliminar". $categoria ['nombre']."</a></td>";
    }
    echo "</tr>";
    echo "<tr>";
    echo "<td>";
    echo "Cantidad de Articulos";
    echo "</td>";
    foreach ($subcategorias as $subcategoria){
        $contador = 0;
        if($categoria['codigo'] === $subcategoria['cod_cat_padre']){
            if(is_array($articulos)){
                foreach($articulos as $articulo){
                if($subcategoria['codigo'] === $articulo['subcategoria']){
                    $contador++;
                    }
                } 
            }
            
            echo "<td>" . $contador . " Arts"; 

            if ($contador === 0) {
                echo "<a class='btn btn-danger mx-1 del-subcat-btn' cod_subcat=".$subcategoria['codigo']."><i class='fa-solid fa-trash mx-0'></i></a></td>";
            } else {
                echo "<a href='#' class='btn btn-primary mx-1'><i class='fa-solid fa-arrow-right-arrow-left'></i></a></td>";
            }
        }
    }
    echo "</tr>";
    echo "</table>";
}
?>

<div id='del-subcat' class='container'>
    <p class='fs-3'>Realmente desea eliminar la subcategoria</p>
    <div>
        <a id='confirm-del-subcat' class='btn btn-primary'>Eliminar</a>
    </div>
</div>
