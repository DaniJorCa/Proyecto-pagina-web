<?php

function nombre_categoria_is_exist($codigo){
    require_once 'php/conection/conectar_BD.php';
    $con = conexion_BD();
    $stmt = $con->prepare("SELECT * FROM categorias WHERE codigo = :codigo");
    $stmt->bindParam(':nombre', $codigo, PDO::PARAM_INT);
    $stmt->execute();

    if(!empty($stmt->fetch())){
        return true;
    }else{
        return false;
    }
}

function introducir_categorias_principal($array){
    if(!empty($array['nombre_categoria']) 
        && !empty($array['nombre_sub'])
        && !empty($array['categoria_padre'])){
            insertar_subcategoria_y_cat_padre($array);
            insertar_categoria_en_BD($array);
    }elseif(empty($array['nombre_categoria'])
        && !empty($array['nombre_sub'])
        && !empty($array['categoria_padre'])){
            insertar_subcategoria_y_cat_padre($array);
    }else{
        insertar_categoria_en_BD($array);
    }
}


function cadena_err_check_campos_formulario_categorias($array){
    $cadena_errores = '';

    if(empty($array['nombre_categoria']) 
    && empty($array['nombre_sub'])
    && empty($array['categoria_padre'])){
       
        $cadena_errores .= 'form=empty';
    }
    return $cadena_errores;
}


function array_datos_categorias_JSON($array) {
    // Obtener datos actuales del archivo JSON
    $fichero = 'api/categorias.json';
    $datosJSON = file_get_contents($fichero);
    $categorias = get_array_categorias();

    // Convertir el array actualizado a formato JSON
    $datosJSON = json_encode($categorias, JSON_PRETTY_PRINT);

    // Guardar el JSON actualizado en el archivo
    file_put_contents($fichero, $datosJSON);

    echo "Categoría añadida correctamente al archivo JSON: $fichero";
}

function get_last_cod_categorias_desc(){
    require_once 'php/conection/conectar_BD.php';
    $con = conexion_BD();
    $stmt = $con->prepare("SELECT codigo FROM categorias ORDER BY codigo DESC LIMIT 1");
    $stmt->execute();
    $codigo = $stmt->fetch();
            
    if(!empty($codigo[0])){
        return $codigo[0] + 1;
    }else{
        return 1;
    }
    
}

function get_array_categorias(){
    require_once 'php/conection/conectar_BD.php';
    $con = conexion_BD();
    $stmt = $con->prepare("SELECT * FROM categorias WHERE cod_cat_padre IS NULL");
    $stmt->execute();
    while($fila = $stmt->fetch()){
        $categorias[] = $fila;
    }
    if(empty($categorias)) {
        return false;
    }else{
       return $categorias; 
    }
    
}

function get_array_subcategorias(){
    require_once 'php/conection/conectar_BD.php';
    $con = conexion_BD();
    $stmt = $con->prepare("SELECT * FROM categorias WHERE cod_cat_padre IS NOT NULL");
    $stmt->execute();

    $subcategorias = [];

    while($subcategoria = $stmt->fetch()){
        array_push($subcategorias, $subcategoria);
    }

    if (empty($subcategorias)) {
        return false;
    }else{
        return $subcategorias;
    }
    
}


function insertar_categoria_en_BD($array){
    try {
        require_once 'php/conection/conectar_BD.php';
        $con = conexion_BD();
        $stmt = $con->prepare('INSERT INTO categorias (nombre) VALUES (:nombre)');
        $rows = $stmt->execute(array(
            ':nombre' => $array['nombre_categoria']
        ));

        if ($rows == 1) {
            return 'Insercion correcta';
        }
    } catch (PDOException $e) {
        echo "Error:" . $e->getMessage();
    }
}


function get_cod_categoria_padre($padre){
    require_once 'php/conection/conectar_BD.php';
    $con = conexion_BD();
    $stmt = $con->prepare("SELECT codigo FROM categorias WHERE nombre = :nombre_categoria");
    $stmt->bindParam(':nombre_categoria', $padre, PDO::PARAM_STR);
    $stmt->execute();
    $codigo = $stmt->fetch();
            
    if(!empty($codigo[0])){
        return $codigo[0];
    }else{
        echo "El codigo de la categoria padre no existe";
    }
}


function insertar_subcategoria_y_cat_padre($array){
    $codigo_padre = get_cod_categoria_padre($array['categoria_padre']);
    try {
        require_once 'php/conection/conectar_BD.php';
        $con = conexion_BD();
        $stmt = $con->prepare('INSERT INTO categorias (nombre, cod_cat_padre) VALUES (:nombre_categoria, :categoria_padre)');
        $stmt->bindValue(':nombre_categoria', $array['nombre_sub']);
        $stmt->bindValue(':categoria_padre', $codigo_padre);
        $rows = $stmt->execute();

        if ($rows == 1) {
            return 'Insercion correcta';
        }
    } catch (PDOException $e) {
        echo "Error:" . $e->getMessage();
    }
}

?>