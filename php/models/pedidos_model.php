<?php

function get_array_pedidos_por_id($dni){
    require_once 'php/conection/conectar_BD.php';
    $con = conexion_BD();
    $stmt = $con->prepare("SELECT * FROM pedidos WHERE dni_cliente = :dni_cliente");
    $stmt->bindParam(':dni_cliente', $dni, PDO::PARAM_STR);
    $stmt->execute();

    $articulos = array();
    while ($fila = $stmt->fetch()) {
        $articulos[]  = $fila;
    }

    if (empty($articulos)) {
        return "No hay Pedidos que mostrar";
    }

    return $articulos;
}





?>