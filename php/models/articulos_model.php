<?php

function getArrayTopVentas(){
    require '../php/conection/conectar_BD.php';
    $con = conexion_BD();
    $stmt = $con->prepare("SELECT * FROM articulos ORDER BY totalVentas DESC");
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
    $stmt = $con->prepare("INSERT INTO articulos (id, nombre, descripcion, 
        precio, preciosAnteriores, precioCompra, categoria, subcategoria, dtoVenta, dtoCompra,
        iva, stock, stockMinimo, totalVentas, esBaja) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute([$id, $nombre, $descripcion, $precio, $preciosAnteriores, 
    $precioCompra, $categoria, $subcategoria, $dtoVenta, $dtoCompra, 
    $iva, $stock, $stockMinimo, $totalVentas, $esBaja]);    
}

?>