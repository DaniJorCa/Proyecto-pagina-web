<?php

function insertar_articulos_carrito(){
    require_once 'php/models/articulos_model.php';
    require_once 'php/models/pedidos_model.php';
    creacion_de_pedido($_GET);
    $articulo = get_articulo_por_id($_GET['id']);
    include 'php/views/showGoods.php';
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
    $_SESSION['ped_consultado'] = $_GET['ped'];
    include 'php/views/lineas_pedido.php';
}

function eliminar_lineas_pedido(){
    require_once 'php/models/pedidos_model.php';
    require_once 'php/models/articulos_model.php';
    delete_linped($_GET['delLinped']);
    $lineas_pedido = get_array_todas_lineas_de_un_pedido_concreto($_SESSION['ped_consultado']);
    include 'php/views/lineas_pedido.php';
}

?>