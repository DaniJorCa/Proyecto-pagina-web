<?php

function insertar_articulos_carrito(){
    require_once 'php/models/articulos_model.php';
    require_once 'php/models/pedidos_model.php';
    include 'php/pagination/artsXpag.php';
    creacion_de_pedido($_GET);
    $articulo = get_articulo_por_id($_GET['id']);
    $articulos = getArrayTopVentasDesc($inicio, $artXpag);
    include 'php/views/show_goods_cards.php';
    include 'php/pagination/pagination_control.php';
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
    $estado_pedido = get_estado_pedido($_GET['ped']);
    $_SESSION['ped_consultado'] = $_GET['ped'];
    include 'php/views/lineas_pedido.php';
}

function eliminar_lineas_pedido(){
    require_once 'php/models/pedidos_model.php';
    require_once 'php/models/articulos_model.php';
    delete_linped($_GET['delLinped']);
    $lineas_pedido = get_array_todas_lineas_de_un_pedido_concreto($_SESSION['ped_consultado']);
    $estado_pedido = get_estado_pedido($_SESSION['ped_consultado']);
    include 'php/views/lineas_pedido.php';
}


function finalizar_compra(){
    require_once 'php/models/pedidos_model.php';
    require_once 'php/models/usuario_model.php';
    $usuario = get_usuario($_SESSION['dni_log']);
    if($usuario['primer_apellido'] === "" || $usuario['direccion'] === "" ||
    $usuario['provincia'] === "" || $usuario['poblacion'] === "" ||
    $usuario['telefono'] === ""){
        header('Location: registro_usuario.php');
    }else{
        estado_pedido_pagado($_GET['id_pedido']);
        include 'php/views/finalizar_compra.php'; 
    }
        
    

}



?>