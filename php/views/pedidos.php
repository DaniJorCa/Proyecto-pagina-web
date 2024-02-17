<?php
if(isset($array_pedidos_cliente) && is_array($array_pedidos_cliente)){
    
?>
<div class='title row'>
<h3 class="display-4 text-center col-12">Mis Pedidos</h3>
</div>
<div class='title row'>
<h4 class="display-6 text-center col-12">Aquí puedes consultar tus pedidos</h4>
</div>
<div class="table-responsive-sm col-6 tabla-pedidos">
<table class="table table-striped table-bordered table-hover">
    <caption>Mis pedidos</caption>
    <thead class="thead-dark">
        <tr>
            <th>Id Pedido</th>
            <th>Fecha Pedido</th>
            <th>Estado Pedido</th>
            <th>Valor Pedido</th>
            <th>Pago</th> 
        <tr>
    </thead>
    <tbody>
<?php
    foreach($array_pedidos_cliente as $pedido){
        echo "<tr>";
        echo "<td>";
        echo "<a href=mis_pedidos.php?view=_linped&ped=".$pedido['id_pedido'] .">" . $pedido['id_pedido'] . "</a>";
        echo "</td>";
        echo "<td>";
        echo $pedido['fecha_ped'];
        echo "</td>";
        echo "<td>";
        echo $pedido['estado_ped'];
        echo "</td>";
        echo "<td>";
        echo $pedido['valor_pedido'] - ($pedido['valor_pedido'] * 0.1) . "€";
        echo "</td>";
        echo "</td>";
        echo "<td>";
        if($pedido['estado_ped'] === 'Pendiente de pago'){
            echo "<a href=mis_pedidos.php?view=_linped&ped=".$pedido['id_pedido']."'>Pdte. Pago. Consultar Pedido " . $pedido['valor_pedido'] - ($pedido['valor_pedido'] * 0.1) . "€</a>";
            echo "</td>";
        }elseif($pedido['estado_ped'] === 'Pendiente de envío'){
            echo '<div class="bg-warning text-center">Pendiente de envio</div>';
            echo "</td>";
        }
        echo "</tr>";
        
    }
?>    
    </tbody>
</table>
</div>
<?php
}else{
    echo "<h4 class='fs-2 text-center'>Actualmente no hay pedidos</h4>";
    echo "<div class='d-flex justify-content-center'>";
    echo "<img style='height: 300px; width: 340px;'src='img/emptyorders.png'></img>";
    echo "</div>";
    echo "<h4 class='fs-4 text-center'>OOOOOpppss!!!</h4>";
    echo "<div class='d-flex justify-content-center'>";
    echo "<button class='btn btn-success col-2 btn-acceso-tienda'><a href='index.php'>Acceder a tienda</a></button>";
    echo "</div>";
}
?>


