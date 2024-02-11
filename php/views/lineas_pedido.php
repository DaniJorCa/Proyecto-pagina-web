<?php
if(!empty($lineas_pedido)){
?>

<h3 class="display-4 text-center">Detalle pedido</h3>
<div class="table-responsive-sm">
<table class="table table-striped table-bordered table-hover ">
    <caption>Pedido <?php isset($lineas_pedido['num_pedido']) ? $lineas_pedido['num_pedido'] : ' ' ; ?></caption>
    <thead class="thead-dark">
        <tr>
            <th>Num</th>
            <th>ID_Pedido</th>
            <th>Codigo Articulo</th>
            <th>Imagen</th>
            <th>Cantidad</th> 
            <th>Precio</th> 
            <th>Dto</th>
            <th>Subtotal</th>
            <th>Eliminar</th>
        </tr>
    </thead>
    <tbody>
<?php
    $total_pedido = 0;
    foreach($lineas_pedido as $linea){
        $total_pedido += $linea['precio'] - ($linea['precio'] * ($linea['descuento'] / 100));
        $articulo = get_articulo_por_id($linea['cod_articulo']);
        echo "<tr>";
        echo "<td>";
        echo $linea['num_linea'];
        echo "</td>";
        echo "<td>";
        echo $linea['num_pedido'];
        echo "</td>";
        echo "<td>";
        echo $linea['cod_articulo'];
        echo "</td>";
        echo "<td>";
        echo '<img src="' . $articulo[0]['img'] . '" style="width: 100px; height: 100px;">';
        echo "</td>";
        echo "<td>";
        echo $linea['cantidad']. " Uds";
        echo "</td>";
        echo "<td>";
        echo $linea['precio']. " €";
        echo "</td>";
        echo "<td>";
        echo $linea['descuento']. " %";
        echo "</td>";
        echo "<td>";
        echo $subtotal = $linea['precio'] - ($linea['precio'] * ($linea['descuento']/100)). " €";
        echo "</td>";
        echo "<td>";
        echo "<button class='btn_del_linped btn btn-danger col-12 col-md-4 m-2' value='" . $articulo[0]['id_articulo'] . "'><i class='fa-solid fa-trash'></i>Eliminar</button>";
        echo "</td>";
        echo "</tr>";
    }

    echo "<tr>";
    echo "<td colspan='8'>Total Pedido  ".$total_pedido." €</td>";
    echo "<td colspan='1'><button class='btn btn-success' <a href='index.php?view=_procesar_pago?id_pedido='".$_GET['ped']."'>Finalizar Pedido " .$total_pedido. "€</a></button></td>";
    echo "</tr>";
?>    
    </tbody>
</table>
<?php
}else{
    echo "<h4 class='fs-2 text-center'>Tu cesta esta vacia</h4>";
    echo "<div class='d-flex justify-content-center'>";
    echo "<img style='height: 220px; width: 250px;'src='img/emptycart.png'></img>";
    echo "</div>";
    echo "<button class='btn btn-success btn-acceso-tienda'><a href='index.php'>Acceder a tienda</a></button>";
}
?>
</div>