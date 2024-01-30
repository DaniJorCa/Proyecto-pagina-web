<?php

function getArrayTopVentasDesc(){
    require_once '../php/conection/conectar_BD.php';
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
    require_once '../php/conection/conectar_BD.php';
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
    require_once '../php/conection/conectar_BD.php';
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


function get_array_categorias(){
    require_once '../php/conection/conectar_BD.php';
    $con = conexion_BD();
    $stmt = $con->prepare("SELECT * FROM categorias WHERE cod_cat_padre IS NULL");
    $stmt->execute();
    while($fila = $stmt->fetch()){
        $categorias[] = $fila;
    }
    if (empty($categorias)) {
        $categorias[] = 'Sin Categorias';
    }
    return $categorias;
}

function get_array_subcategorias(){
    require_once '../php/conection/conectar_BD.php';
    $con = conexion_BD();
    $stmt = $con->prepare("SELECT * FROM categorias WHERE cod_cat_padre IS NOT NULL");
    $stmt->execute();

    $subcategorias = [];

    while($subcategoria = $stmt->fetch()){
        $subcategorias[] = $subcategoria;
    }

    if (empty($subcategorias)) {
        $subcategorias[] = 'Sin Subcategorias';
    }

    return $subcategorias;
}

function generar_codigo_art(){

    $abecedario = range('A', 'Z');

    require_once '../php/conection/conectar_BD.php';
    $con = conexion_BD();
    $stmt = $con->prepare("SELECT id_articulo FROM articulos");
    $stmt->execute();
    $resultado_codigo_si_BD_esta_vacia = '';
    $parte_alfabetica_array_mayor = '';
    $parte_numerica_array_mayor = '';

    while($codigo = $stmt->fetch()){ 
        $parte_alfabetica_array = extraer_parte_alfabetica($codigo);
        $parte_numerica_array = extraer_parte_numerica($codigo);
        if(empty($parte_alfabetica_array_mayor)){
            $parte_alfabetica_array_mayor = $parte_alfabetica_array;
        }else{
            if($parte_alfabetica_array_mayor < $parte_alfabetica_array){
                $parte_alfabetica_array_mayor = $parte_alfabetica_array;
            }
        }

        if(empty($parte_numerica_array_mayor)){
            $parte_numerica_array_mayor = $parte_numerica_array;
        }else{
            if($parte_numerica_array_mayor < $parte_numerica_array){
                $parte_numerica_array_mayor = $parte_numerica_array;
            }
        }
    }


    if($parte_numerica_array_mayor === '999999'){
        $parte_alfabetica_array_mayor = '000000';
        $parte_numerica_array_mayor_incrementada = incrementar_cadena_letras($parte_numerica_array_mayor);
    }


    if(empty($resultado_codigo_si_BD_esta_vacia)){
        $resultado_codigo_si_BD_esta_vacia = 'AAA000000';
    }

    if(empty($resultado_codigo_si_BD_esta_vacia) && empty($parte_numerica_array_mayor_incrementada)){
        $resultado_codigo = $parte_alfabetica_array_mayor . $parte_numerica_array_mayor;

    }elseif($resultado_codigo_si_BD_esta_vacia){
        $resultado_codigo = $resultado_codigo_si_BD_esta_vacia;
    }else{
        $resultado_codigo = $parte_alfabetica_array_mayor . $parte_numerica_array_mayor_incrementada;
    }

    return $resultado_codigo;

}

function extraer_parte_alfabetica($cadena){
    $letras = substr($cadena, 0, 3);
    return $letras;
}

function extraer_parte_numerica($cadena){
    $letras = substr($cadena, 3, 6);
    return $letras;
}

function incrementar_cadena_letras($cadena) {
    $letras = str_split($cadena);
    $ultima_letra = end($letras);
    if ($ultima_letra === 'Z') {
        $letras[] = 'A';
    } else {
        $letras[count($letras) - 1] = chr(ord($ultima_letra) + 1);
    }
    
    $cadena_incrementada = implode('', $letras);
    
    return $cadena_incrementada;
}



function subirImg($array){
    $temporal = $array["tmp_name"];
    $destino = "../img/" . $array['name'];
    $checkImg = formato($array['name']);
    $_SESSION['img'] = "imgUploads/". $_FILES['imagen']['name'];
    if($checkImg){
       if (move_uploaded_file($temporal, $destino)){
        }else{
            echo "<p>Ocurrio un error, no se ha podido subir el archivo</p>";
        }  
    }else{
        echo "<p>El formato de imagen no es correcto</p>";
    }
    
}

function formato($cadena){
    $pos = strrpos($cadena, ".");
    if(!empty($pos)){
        $res = substr($cadena, $pos, strlen($cadena));
    }else{
        $res = false;
    }
    
    if($res == '.gif' || $res == '.png' ||$res == '.jpeg' ||$res == '.jpg'){
        $res = true;
    }else{
        $res = false;
    }
    return $res;
}

function comprobar_datos_registro($array){
    $cadena_errores = '';
    $contador_errores = 0;

    if(empty($array['nombre'])){
         $cadena_errores .= 'empty=nombre';
    }

    if(empty($array['descripcion'])){
        if($contador_errores != 0 ? $cadena_errores .= '&empty=descripcion' : $cadena_errores .= '?empty=descripcion');
    }

    if(empty($array['precio'])){
        if($contador_errores != 0 ? $cadena_errores .= '&empty=precio' : $cadena_errores .= '?empty=precio');
    }

    if(empty($array['precio_compra'])){
        if($contador_errores != 0 ? $cadena_errores .= '&empty=precio_compra' : $cadena_errores .= '?empty=precio_compra');
    }

    if(empty($array['iva'])){
        if($contador_errores != 0 ? $cadena_errores .= '&empty=iva' : $cadena_errores .= '?empty=iva');
    }

    if(empty($array['genero'])){
        if($contador_errores != 0 ? $cadena_errores .= '&empty=genero' : $cadena_errores .= '?empty=genero');
    }

    if(empty($array['categoria'])){
        if($contador_errores != 0 ? $cadena_errores .= '&empty=categoria' : $cadena_errores .= '?empty=categoria');
    }

    if(empty($array['subcategoria'])){
        if($contador_errores != 0 ? $cadena_errores .= '&empty=subcategoria' : $cadena_errores .= '?empty=subcategoria');
    }

    if(empty($array['stock'])){
        if($contador_errores != 0 ? $cadena_errores .= '&empty=stock' : $cadena_errores .= '?empty=stock');
    }

    if(empty($array['stock_minimo'])){
        if($contador_errores != 0 ? $cadena_errores .= '&empty=stock_minimo' : $cadena_errores .= '?empty=stock_minimo');
    }

    return $cadena_errores;
}


function insertar_articulo_en_BD($array){
    try {
        require_once '../php/conection/conectar_BD.php';
        $con = conexion_BD();
        $stmt = $con->prepare('INSERT INTO articulos (id_articulo, nombre, img, descripcion, precio, genero, categoria, subcategoria, neto_compra, iva, stock, stock_minimo) 
            VALUES (:id_articulo, :nombre, :img, :descripcion, :precio, :genero, :categoria, :subcategoria, :neto_compra, :iva, :stock, :stock_minimo)');
        $rows = $stmt->execute(array(
            ':id_articulo' => $array['id_articulo'],
            ':nombre' => $array['nombre'],
            ':img' => $_SESSION['img'],
            ':descripcion' => $array['descripcion'],
            ':precio' => $array['precio'],
            ':genero' => $array['genero'],
            ':categoria' => $array['categoria'],
            ':subcategoria' => $array['subcategoria'],
            ':neto_compra' => $array['precio_compra'],
            ':iva' => $array['iva'],
            ':stock' => $array['stock'],
            ':stock_minimo' => $array['stock_minimo']
        ));

        if ($rows == 1) {
            return 'Insercion correcta';
        }
    } catch (PDOException $e) {
        echo "Error:" . $e->getMessage();
    }
}

function boolean_img_is_too_size($array){
    return ($array['imagen']['size'] > 2000000) ? true : false; 
}

?>