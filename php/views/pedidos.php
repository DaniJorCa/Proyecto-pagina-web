<?php
?>
<h3 class="display-4 text-center">Mis Pedidos</h3>
<h4 class="display-6 text-center">Aquí puedes consultar tus pedidos</h4>
<div class="table-responsive-sm">
<table class="table table-striped table-bordered table-hover ">
    <caption>Mis pedidos</caption>
    <thead class="thead-dark">
        <tr>
            <th>Id Pedido</th>
            <th>Fecha Pedido</th>
            <th>Estado Pedido</th>  
        <tr>
    </thead>
    <tbody>
<?php
    foreach($array_pedidos_cliente as $pedido){
        echo "<th>";
        echo "<a href=mis_pedidos.php?view=_linped&ped=".$pedido['id_pedido'] .">" . $pedido['id_pedido'] . "</a>";
        echo "</th>";
        echo "<th>";
        echo $pedido['fecha_ped'];
        echo "</th>";
        echo "<th>";
        echo $pedido['estado_ped'];
        echo "</th>";
    }
?>    
    </tbody>
</table>
</div>


