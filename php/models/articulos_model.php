<?php

function getArrayTopVentasDesc(){
    require '../php/conection/conectar_BD.php';
    $con = conexion_BD();
    $stmt = $con->prepare("SELECT * FROM articulos ORDER BY total_ventas DESC");
    $stmt->execute();
    $articulos = array();
    while($fila = $stmt->fetch()){
        $articulos[] = $fila;
    }
    if(empty($articulos)){
        return "No hay articulos que mostrar";
    }
    return $articulos;
}

function getArrayArtsPorCategoriaAsc(){
    require '../php/conection/conectar_BD.php';
    $con = conexion_BD();
    $stmt = $con->prepare("SELECT * FROM articulos ORDER BY categoria ASC");
    $stmt->execute();
    $articulos = array();
    while($fila = $stmt->fetch()){
        $articulos[] = $fila;
    }
    return $articulos;
}

function getArrayArtPorId($id){
    require '../php/conection/conectar_BD.php';
    $con = conexion_BD();
    $stmt = $con->prepare("SELECT * FROM articulos WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $articulos = array();
    while($fila = $stmt->fetch()){
        $articulos[] = $fila;
    }
    if (empty($articulos)) {
        return 'No hay artículos que mostrar';
    }
    return $articulos;
}

function insertarArticulo($id, $nombre, $descripcion, $precio, $preciosAnteriores, 
    $precioCompra, $categoria, $subcategoria, $dtoVenta, $dtoCompra, 
    $iva, $stock, $stockMinimo, $totalVentas, $esBaja){
    require '../models/articulos_model.php';
    require '../conection/conectar_BD';
    $con = conexion_BD();
    $stmt = $con->prepare("INSERT INTO articulos (id, nombre, img, descripcion, 
        precio, preciosAnteriores, precioCompra, genero, categoria, subcategoria, dtoVenta, dtoCompra,
        iva, stock, stockMinimo, totalVentas, esBaja) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute([$id, $nombre, $descripcion, $precio, $preciosAnteriores, 
    $precioCompra, $categoria, $subcategoria, $dtoVenta, $dtoCompra, 
    $iva, $stock, $stockMinimo, $totalVentas, $esBaja]);    
}

?>