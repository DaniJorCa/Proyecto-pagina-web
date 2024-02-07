<?php
include_once('php/models/pedidos_model.php');
$array_pedidos_cliente = get_array_pedidos_por_id($_SESSION['dni_log']);
if(is_array($array_pedidos_cliente)){
?>
<table class="stripped">
    <tr>
        <th>Id Pedido</th>
        <th>Fecha Pedido</th>
        <th>Estado Pedido</th>  
    <tr>
    
</table>
<?php 
}else{
    echo "No hay pedidos que mostrar";
}
?>

