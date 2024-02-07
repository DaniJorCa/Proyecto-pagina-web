<?php

function insertar_articulos_carrito(){
    require_once 'php/models/articulos_model.php';
    require_once 'php/models/pedidos_model.php';
    creacion_de_pedido($_GET);
    $articulos = getArrayArticulosPorSubCategoria($_GET);
    include 'php/views/show_goods_cards.php';
}

function consultar_mis_pedidos(){
    require_once 'php/models/pedidos_model.php';
    $array_pedidos_cliente = get_array_pedidos_por_id($_SESSION['dni_log']);
    include 'php/views/pedidos.php';
}

function consultar_lineas_pedido(){
    require_once 'php/models/pedidos_model.php';
    require_once 'php/models/articulos_model.php';
    $lineas_pedido = get_array_todas_lineas_de_un_pedido_concreto($_GET['ped']);
    include 'php/views/lineas_pedido.php';
}

?>