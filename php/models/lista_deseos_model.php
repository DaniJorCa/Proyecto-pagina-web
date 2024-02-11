<?php

function get_wishlist_cliente(){
    require_once 'php/conection/conectar_BD.php';
    $con = conexion_BD();
    $stmt = $con->prepare("SELECT * FROM lista_deseos WHERE dni_cliente = :dni_cliente");
    $stmt->bindParam(':dni_cliente', $_SESSION['dni_log'], PDO::PARAM_STR);
    $stmt->execute();
    $deseos = array();
    while($fila = $stmt->fetch()){
        $deseos[] = $fila;
    }
    if(empty($deseos)){
        return "No hay articulos que mostrar";
    }
    return $deseos;
}


function add_good_to_wishlist($id_articulo){
    try {
        require_once 'php/conection/conectar_BD.php';
        $con = conexion_BD();
        $stmt = $con->prepare('INSERT INTO lista_deseos (dni_cliente, id_articulo) 
            VALUES (:dni_cliente, :id_articulo)');
        $rows = $stmt->execute(array(
            ':dni_cliente' => $_SESSION['dni_log'],
            ':id_articulo' => $id_articulo
        ));

        if ($rows == 1) {
            return 'Insercion correcta';
        }
    } catch (PDOException $e) {
        echo "Error:" . $e->getMessage();
    }
}




?>