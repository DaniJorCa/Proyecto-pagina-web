<?php


function getArrayArticulosPorCategoria($array){
    require_once 'php/conection/conectar_BD.php';
    $con = conexion_BD();
    $stmt = $con->prepare("SELECT * FROM articulos WHERE LOWER(categoria) = :categoria");
    $stmt->bindParam(':categoria', $array['select_cat'], PDO::PARAM_STR);
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


function getArrayArticulosPorSubcategoria($array) {
    // Verifica si $array es un array y si contiene la clave 'select_subcat'
        require_once 'php/conection/conectar_BD.php';
        $con = conexion_BD();
        $stmt = $con->prepare("SELECT * FROM articulos WHERE subcategoria = :subcategoria");
        $stmt->bindParam(':subcategoria', $array['select_subcat'], PDO::PARAM_STR);
        $stmt->execute();

        $articulos = array();
        while ($fila = $stmt->fetch()) {
            $articulos[]  = $fila;
        }

        if (empty($articulos)) {
            return "No hay artículos que mostrar";
        }

        return $articulos;
    }


/*function getArrayArticulosPorSubcategoria($array){
    require_once 'php/conection/conectar_BD.php';
    $con = conexion_BD();
    $stmt = $con->prepare("SELECT * FROM articulos WHERE subcategoria = :subcategoria");
    $stmt->bindParam(':subcategoria', $array['select_subcat'], PDO::PARAM_INT);
    $stmt->execute();
    $articulos = array();
    while($fila = $stmt->fetch()){
        $articulos[] = $fila;
    }
    if(empty($articulos)){
        return "No hay articulos que mostrar";
    }
    return $articulos;
}*/





function getArrayTopVentasDesc(){
    require_once 'php/conection/conectar_BD.php';
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
    require_once 'php/conection/conectar_BD.php';
    $con = conexion_BD();
    $stmt = $con->prepare("SELECT * FROM articulos ORDER BY categoria ASC");
    $stmt->execute();
    $articulos = array();
    while($fila = $stmt->fetch()){
        $articulos[] = $fila;
    }
    return $articulos;
}

function array_datos_articulos_JSON() {
    $fichero = 'api/articulos.json';
    $datosJSON = file_get_contents($fichero);
    // Decodificar el JSON actual a un array PHP
    $categorias = json_decode($datosJSON, true);
    $nuevosDatos = getArrayArtsPorCategoriaAsc();
    $categorias = $nuevosDatos;
    $datosJSON = json_encode($categorias, JSON_PRETTY_PRINT);
    file_put_contents($fichero, $datosJSON);
}

function getArrayArtPorId($id){
    require_once 'php/conection/conectar_BD.php';
    $con = conexion_BD();
    $stmt = $con->prepare("SELECT * FROM articulos WHERE id_articulo = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_STR);
    $stmt->execute();
    $articulos_editar = array();
    while($fila = $stmt->fetch()){
        $articulos_editar = $fila;
    }
    if (empty($articulos_editar)) {
        return 'No hay artículos que mostrar';
    }
    return $articulos_editar;
}

function cotejar_campos_editados($array_antiguos_datos, $array_nuevos_datos){
    $string_datos_modificados = '';
    $contador_diferencias = 0;

    if($array_antiguos_datos['nombre'] !== $array_nuevos_datos['nombre']){
        $_SESSION['nombre-before-edit'] .= $array_antiguos_datos['nombre'];
        $_SESSION['nombre-after-edit'] .= $array_nuevos_datos['nombre'];
        $string_datos_modificados = '?name-art-edit';
    }
    if($array_antiguos_datos['img'] !== $_FILES['img'] || $_FILES['img']['error'] !== UPLOAD_ERR_NO_FILE){
        $_SESSION['img-before-edit'] = $array_antiguos_datos['img'];
        $_SESSION['img-after-edit'] = $_FILES['img'];
        if($contador_diferencias === 0){
            $string_datos_modificados .= '?img-art-edit'; 
        }else{
            $string_datos_modificados .= 'img-art-edit';
        }  
    }
    if($array_antiguos_datos['descripcion'] !== $array_nuevos_datos['descripcion']){
        $_SESSION['descripcion-before-edit'] = $array_antiguos_datos['descripcion'];
        $_SESSION['descripcion-after-edit'] = $array_nuevos_datos['descripcion'];
        if($contador_diferencias === 0){
           $string_datos_modificados .= '?desc-art-edit'; 
        }else{
            $string_datos_modificados .= 'desc-art-edit';
        }  
    }
    if($array_antiguos_datos['precio'] !== $array_nuevos_datos['precio']){
        $_SESSION['precio-before-edit'] = $array_antiguos_datos['precio'];
        $_SESSION['precio-after-edit'] = $array_nuevos_datos['precio'];
        if($contador_diferencias === 0){
           $string_datos_modificados .= '?precio-art-edit'; 
        }else{
            $string_datos_modificados .= 'precio-art-edit';
        }  
    }
    if($array_antiguos_datos['neto_compra'] !== $array_nuevos_datos['neto_compra']){
        $_SESSION['compra-before-edit'] = $array_antiguos_datos['neto_compra'];
        $_SESSION['compra-after-edit'] = $array_nuevos_datos['neto_compra'];
        if($contador_diferencias === 0){
           $string_datos_modificados .= '?compra-art-edit'; 
        }else{
            $string_datos_modificados .= 'compra-art-edit';
        }  
    }
    if($array_antiguos_datos['iva'] !== $array_nuevos_datos['iva']){
        $_SESSION['iva-before-edit'] = $array_antiguos_datos['iva'];
        $_SESSION['iva-after-edit'] = $array_nuevos_datos['iva'];
        if($contador_diferencias === 0){
           $string_datos_modificados .= '?iva-art-edit'; 
        }else{
            $string_datos_modificados .= 'iva-art-edit';
        }  
    }
    if($array_antiguos_datos['genero'] !== $array_nuevos_datos['genero']){
        $_SESSION['genero-before-edit'] = $array_antiguos_datos['genero'];
        $_SESSION['genero-after-edit'] = $array_nuevos_datos['genero'];
        if($contador_diferencias === 0){
           $string_datos_modificados .= '?genero-art-edit'; 
        }else{
            $string_datos_modificados .= 'genero-art-edit';
        }  
    }
    if($array_antiguos_datos['categoria'] !== $array_nuevos_datos['categoria']){
        $_SESSION['categoria-before-edit'] = $array_antiguos_datos['categoria'];
        $_SESSION['categoria-after-edit'] = $array_nuevos_datos['categoria'];
        if($contador_diferencias === 0){
           $string_datos_modificados .= '?categoria-art-edit'; 
        }else{
            $string_datos_modificados .= 'categoria-art-edit';
        }  
    }
    if($array_antiguos_datos['subcategoria'] !== $array_nuevos_datos['subcategoria']){
        $_SESSION['sub-before-edit'] = $array_antiguos_datos['subcategoria'];
        $_SESSION['sub-after-edit'] = $array_nuevos_datos['subcategoria'];
        if($contador_diferencias === 0){
           $string_datos_modificados .= '?sub-art-edit'; 
        }else{
            $string_datos_modificados .= 'sub-art-edit';
        }  
    }
    if($array_antiguos_datos['stock'] !== $array_nuevos_datos['stock']){
        $_SESSION['stock-before-edit'] = $array_antiguos_datos['stock'];
        $_SESSION['stock-after-edit'] = $array_nuevos_datos['stock'];
        if($contador_diferencias === 0){
           $string_datos_modificados .= '?stock-art-edit'; 
        }else{
            $string_datos_modificados .= 'stock-art-edit';
        }  
    }
    if($array_antiguos_datos['stock_minimo'] !== $array_nuevos_datos['stock_minimo']){
        $_SESSION['stock_minimo-before-edit'] = $array_antiguos_datos['stock_minimo'];
        $_SESSION['stock_minimo-after-edit'] = $array_nuevos_datos['stock_minimo'];
        if($contador_diferencias === 0){
           $string_datos_modificados .= '?min-art-edit'; 
        }else{
            $string_datos_modificados .= 'min-art-edit';
        }  
    }

    return $string_datos_modificados;

}




function generar_codigo_art(){

    $resultado_codigo_si_BD_esta_vacia = '';
    $boolean_BD_vacia = false;
    $parte_alfabetica_array_mayor = '';
    $parte_numerica_array_mayor = '';
    $parte_numerica_array_mayor_incrementada = '';

    $abecedario = range('A', 'Z');
    require_once 'php/conection/conectar_BD.php';
    $con = conexion_BD();
    $stmt = $con->prepare("SELECT id_articulo FROM articulos");
    $stmt->execute();
    $id_articulos = array();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $id_articulos[] = $row['id_articulo'];
    }

    

    if (count($id_articulos) == 0) {
        $boolean_BD_vacia = true;
    }


    
        foreach($id_articulos as $codigo){
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


    if($boolean_BD_vacia){
        $resultado_codigo_si_BD_esta_vacia = 'AAA000000';
    }
    
    //var_dump($boolean_BD_vacia);
    //var_dump($parte_numerica_array_mayor_incrementada);
    //var_dump($parte_alfabetica_array_mayor);
    //var_dump($parte_numerica_array_mayor);

    if(!$boolean_BD_vacia && empty($parte_numerica_array_mayor_incrementada)){
        $numero_sumando_uno = intval($parte_numerica_array_mayor) + 1;

        $resultado_codigo = $parte_alfabetica_array_mayor . sprintf('%06d', $numero_sumando_uno);

    }elseif($boolean_BD_vacia){
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
    if($_FILES['img']['error'] !== UPLOAD_ERR_NO_FILE){
        $temporal = $array["tmp_name"];
        $destino = "img/" . $array['name'];
        $checkImg = formato($array['name']);
        $_SESSION['img'] = "img/". $_FILES['img']['name'];
        if($checkImg){
        if (move_uploaded_file($temporal, $destino)){
            }else{
                echo "<p>Ocurrio un error, no se ha podido subir el archivo</p>";
            }  
        }else{
            echo "<p>El formato de imagen no es correcto</p>";
        }
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

    if(empty($array['neto_compra'])){
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
        require_once 'php/conection/conectar_BD.php';
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
            ':neto_compra' => $array['neto_compra'],
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
    return ($array['img']['size'] > 2000000) ? true : false; 
}


function delete_art($id){
    try {
        require_once 'php/conection/conectar_BD.php';
        $con = conexion_BD();
        $stmt = $con->prepare('DELETE FROM articulos WHERE id_articulo = :id_articulo');
        $stmt->bindParam(':id_articulo', $id, PDO::PARAM_STR);
        $stmt->execute();
    
        $rows = $stmt->rowCount();
        
        if ($rows > 0) {
            return true;
        } else {
            return false;
        }
    } catch (PDOException $e) {
        echo "Error:" . $e->getMessage();
        return false; 
    }
}

function modificar_articulo($array){
      
    try{
        require_once 'php/conection/conectar_BD.php';
        if($_FILES['img']['error'] == UPLOAD_ERR_NO_FILE){
            $con = conexion_BD();
            $stmt = $con->prepare('UPDATE articulos SET nombre = :nombre, descripcion = :descripcion, precio = :precio, neto_compra = :neto_compra, iva = :iva, genero = :genero, categoria = :categoria, subcategoria = :subcategoria, stock = :stock, stock_minimo = :stock_minimo WHERE id_articulo = :id' );
            $rows = $stmt->execute(array(
            ':id' => $array['id_articulo'],
            ':nombre' => $array['nombre'], 
            ':descripcion' => $array['descripcion'], 
            ':precio' => $array['precio'], 
            ':neto_compra' => trim($array['neto_compra']), 
            ':iva' => $array['iva'], 
            ':genero' => $array['genero'],
            ':categoria' => $array['categoria'],
            ':subcategoria' => $array['subcategoria'],
            ':stock' => $array['stock'],
            ':stock_minimo' => $array['stock_minimo']));

        if($rows > 0){
            echo "<p>Actualizacion realizada con exito! </p><br>";
        }
    
        }else{
            $con = conexion_BD();
            $stmt = $con->prepare('UPDATE articulos SET nombre = :nombre, img = :img, descripcion = :descripcion, precio = :precio, neto_compra = :neto_compra, iva = :iva, genero = :genero, categoria = :categoria, subcategoria = :subcategoria, stock = :stock, stock_minimo = :stock_minimo WHERE id_articulo = :id' );
            $rows = $stmt->execute(array(
            ':id' => $array['id_articulo'],
            ':nombre' => $array['nombre'], 
            ':img' => 'img/'.$_FILES['img']['name'], 
            ':descripcion' => $array['descripcion'], 
            ':precio' => $array['precio'], 
            ':neto_compra' => trim($array['neto_compra']), 
            ':iva' => $array['iva'], 
            ':genero' => $array['genero'],
            ':categoria' => $array['categoria'],
            ':subcategoria' => $array['subcategoria'],
            ':stock' => $array['stock'],
            ':stock_minimo' => $array['stock_minimo']));
        if($rows > 0){
            echo "<p>Actualizacion realizada con exito! </p><br>";
        }
    }
        
    }catch(PDOException $e){
        echo 'Error: ' . $e->getMessage();
    } 
}

        






?>