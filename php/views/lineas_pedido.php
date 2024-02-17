<?php
if(!empty($lineas_pedido) && !empty($estado_pedido)){
?>

<h3 class="display-4 text-center">Detalle pedido</h3>
<div id='table-aside_right' class='row container-fluid justify-content-center'>
<div class="table-responsive-sm col-8">
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
<?php
    if($estado_pedido === 'Pendiente de pago'){
        echo '<th>Eliminar</th>';
    }
?>
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
        if($estado_pedido === 'Pendiente de pago'){
            echo "<td>";
            echo "<button class='btn_del_linped btn btn-danger col-12 col-md-4 m-2' value='" . $articulo[0]['id_articulo'] . "'><i class='fa-solid fa-trash'></i>Eliminar</button>";
            echo "</td>"; 
        }
        
        echo "</tr>";
    }

    echo "<tr>";
    if($estado_pedido === 'Pendiente de pago'){
      echo "<td colspan='8'>Total Pedido  ".$total_pedido." €</td>";
      echo "<td colspan='1'>
        <button class='btn btn-success' id='end_order'>
            Finalizar Pedido " .$total_pedido. "€
        </button>
      </td>";  
    }elseif($estado_pedido === 'Pendiente de envío') {
        echo "<td colspan='7'>Total Pedido  ".$total_pedido." €</td>";
        echo "<td colspan='1'>";
        echo "<div class='bg-warning rounded text-center'>Pendiente de envío</div>";
        echo "</td>"; 
    }else{
        echo "<td colspan='7'>Total Pedido  ".$total_pedido." €</td>";
        echo "<td colspan='1'>";
        echo "<div class='bg-success rounded text-center'>Pedido recibido</div>";
        echo "</td>"; 
    }
    
    
    echo "</tr>";
?>    
    </tbody>
</table>
</div>
<?php
}else{
    echo "<h4 class='fs-2 text-center'>Tu cesta esta vacia</h4>";
    echo "<div class='d-flex justify-content-center'>";
    echo "<img style='height: 220px; width: 250px;'src='img/emptycart.png'></img>";
    echo "</div>";
    echo "<button class='btn btn-success btn-acceso-tienda'><a href='index.php'>Acceder a tienda</a></button>";
}

if(isset($_SESSION['direccion_log']) && isset($_SESSION['poblacion_log']) 
    && isset($_SESSION['provincia_log']) && isset($_SESSION['telefono_log']) 
    && isset($_SESSION['cod_postal_log'])){

    echo "<aside id='div-pay_order' class='aside_right col-3'>";
    echo "<h4 class='fs-5 text-center'>Datos de envío</h4>";
    echo "<ul class='my-2'>";
    echo "<li class='my-2'>";
    echo "Nombre y apellidos: " . $_SESSION['nombre_log'] . " " . $_SESSION['primer_apellido_log'] . " " . $_SESSION['segundo_apellido_log'];
    echo "</li>";
    echo "<li class='my-2'>";
    echo "Dirección de envío: " . $_SESSION['direccion_log'] ;
    echo "</li >";
    echo "<li class='my-2'>";
    echo "Localidad " . $_SESSION['poblacion_log'];
    echo "</li>";
    echo "<li class='my-2'>";
    echo "Provincia / Cod. Postal " . $_SESSION['provincia_log'] . " " . $_SESSION['cod_postal_log'];
    echo "</li>";
    echo "<li class='my-2'>";
    echo "Teléfono: " . $_SESSION['telefono_log'];
    echo "</li>";
    echo "<li class='my-2'>";
    echo "<a href='perfil_usuario.php'><button class='btn btn-warning'>Modificar mis datos de envío</button></a>";
    echo "</li>";
    echo "<li class='my-2'>";
    echo "<li class='my-2 text-center'>";
    echo "<p class='fs-5'>Elegir método de pago</p>";
    echo "</li>";
    echo "<div class='row justify-content-evenly'>";
    echo "<a href='mis_pedidos.php?view=_end_order&id_pedido=".$_SESSION['ped_consultado']."' class='btn btn-primary col-3 mx-1' id='end_order'><i class='fa-regular fa-credit-card'></i>" .$total_pedido. "€</a>";
    echo "<a href='mis_pedidos.php?view=_end_order&id_pedido=".$_SESSION['ped_consultado']."' class='btn btn-primary col-3 mx-1' id='end_order'><i class='fa-brands fa-paypal'></i>" .$total_pedido. "€</a>";
    echo "<a href='mis_pedidos.php?view=_end_order&id_pedido=".$_SESSION['ped_consultado']."' class='btn btn-primary col-3 mx-1' id='end_order'><i class='fa-solid fa-money-bill-1-wave'></i>" .$total_pedido. "€</a>";
    echo "</div>";
    echo "</li>";
    echo "</ul>";
    echo "<aside>";
    }
?>
</div>



