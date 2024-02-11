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

function get_num_linea_pedido($num_pedido){
    require_once 'php/conection/conectar_BD.php';
    $con = conexion_BD();
    $stmt = $con->prepare("SELECT num_linea FROM lineapedido WHERE num_pedido = :num_pedido ORDER BY num_linea DESC LIMIT 1");
    $stmt->bindParam(':num_pedido', $num_pedido, PDO::PARAM_STR);
    $stmt->execute();

    while ($fila = $stmt->fetch()) {
        $num_linea = $fila['num_linea'];
        return $num_linea + 1;
    }
        return 1;
}

function creacion_de_pedido($array){
    $existeID = buscar_id_pedidos_pendientes_de_pago_para_usuario_log($_SESSION['dni_log']);
    if($existeID){
        $contador = $existeID;
        $valor_pedido = valor_pedido_actual($contador);
        $valor_articulo_introducido = get_precio_articulo($array['id']);
        $valor_final = $valor_pedido + $valor_articulo_introducido;
        $num_linea = get_num_linea_pedido($existeID);
        $cantidad_articulo = 1;
        $articulo = getArrayArtPorId($array['id']);
        $dto = 10.00;

        try {
            require_once 'php/conection/conectar_BD.php';
            $con = conexion_BD();
            $stmt = $con->prepare('UPDATE pedidos SET valor_pedido = :valor_pedido WHERE id_pedido = :id_pedido');
            $stmt->bindParam(':id_pedido', $existeID, PDO::PARAM_STR);
            $stmt->bindParam(':valor_pedido', $valor_final, PDO::PARAM_STR);
            $rows = $stmt->execute();
    
            if ($rows == 1) {

                if ($rows == 1) {
                    $stmt = $con->prepare('INSERT INTO lineapedido (num_pedido, num_linea, cod_articulo, cantidad, precio, descuento) 
                         VALUES (:num_pedido, :num_linea, :cod_articulo, :cantidad, :precio, :descuento)');
                     $rows = $stmt->execute(array(
                         ':num_pedido' => $existeID,
                         ':num_linea' => $num_linea,
                         ':cod_articulo' => $array['id'],
                         ':cantidad' => $cantidad_articulo,
                         ':precio' => $articulo[0]['precio'],
                         ':descuento' => $dto
                    ));
         
                    if ($rows == 1) {
                         return 'Insercion correcta';
                    }
                }
            } 
            
        }catch (PDOException $e) {
                echo "Error:" . $e->getMessage();
        }
    }else{
       $contador = get_last_contador_pedidos(); 
       $valor_articulo_introducido = get_precio_articulo($array['id']);
       $valor_final = $valor_articulo_introducido;
       $num_linea = 1;
       $estado_pedido = "Pendiente de pago";
       $articulo = getArrayArtPorId($array['id']);
       $cantidad_articulo = 1;
       $dto = 10.00;

       try {
        require_once 'php/conection/conectar_BD.php';
            $con = conexion_BD();
            $stmt = $con->prepare('INSERT INTO pedidos (id_pedido, dni_cliente, valor_pedido, fecha_ped, estado_ped) 
                VALUES (:id_pedido, :dni_cliente, :valor_pedido, :fecha_ped, :estado_ped)');
            $rows = $stmt->execute(array(
                ':id_pedido' => $contador,
                ':dni_cliente' => $_SESSION['dni_log'],
                ':valor_pedido' => $valor_final,
                ':fecha_ped' => date('Y-m-d'),
                ':estado_ped' => 'Pendiente de pago'
            ));

            if ($rows == 1) {
               $stmt = $con->prepare('INSERT INTO lineapedido (num_pedido, num_linea, cod_articulo, cantidad, precio, descuento) 
                    VALUES (:num_pedido, :num_linea, :cod_articulo, :cantidad, :precio, :descuento)');
                $rows = $stmt->execute(array(
                    ':num_pedido' => $contador,
                    ':num_linea' => $num_linea,
                    ':cod_articulo' => $array['id'],
                    ':cantidad' => $cantidad_articulo,
                    ':precio' => $articulo[0]['precio'],
                    ':descuento' => $dto
                ));
    
                if ($rows == 1) {
                    return 'Insercion correcta';
                } 
            }
        } catch (PDOException $e) {
            echo "Error:" . $e->getMessage();
        }

    }
}

function valor_pedido_actual($id){
    require_once 'php/conection/conectar_BD.php';
    $con = conexion_BD();
    $stmt = $con->prepare("SELECT valor_pedido FROM pedidos WHERE id_pedido = :id_pedido");
    $stmt->bindParam(':id_pedido', $id, PDO::PARAM_STR);
    $stmt->execute();

    while ($fila = $stmt->fetch()) {
        $valor_pedido = $fila['valor_pedido'];
        return $valor_pedido;
    }
        return 0;
}

function buscar_id_pedidos_pendientes_de_pago_para_usuario_log($dni){
    $estado_pedido = "Pendiente de pago";
    require_once 'php/conection/conectar_BD.php';
    $con = conexion_BD();
    $stmt = $con->prepare("SELECT id_pedido FROM pedidos WHERE estado_ped = :estado_ped AND dni_cliente = :dni_cliente");
    $stmt->bindParam(':estado_ped', $estado_pedido, PDO::PARAM_STR);
    $stmt->bindParam(':dni_cliente', $dni, PDO::PARAM_STR);
    $stmt->execute();

    while ($fila = $stmt->fetch()) {
        $id = $fila['id_pedido'];
        return $id;
    }
        return false;
}

function get_last_contador_pedidos() {
    require_once 'php/conection/conectar_BD.php';
    $con = conexion_BD();
    $stmt = $con->prepare("SELECT id_pedido FROM pedidos ORDER BY id_pedido DESC LIMIT 1");
    $stmt->execute();
    
    $contador = 1;

    while ($fila = $stmt->fetch()) {
        $contador = $fila['id_pedido'];
    }

    return $contador;
}

function delete_pedido($id){
    require_once 'php/conection/conectar_BD.php';
    $con = conexion_BD();
    $stmt = $con->prepare("DELETE FROM pedidos WHERE id_pedido = :id_pedido");
    $stmt->bindParam(':id_pedido', $id, PDO::PARAM_INT);
    $stmt->execute();
}


function get_array_todas_lineas_de_un_pedido_concreto($id_pedido){
    require_once 'php/conection/conectar_BD.php';
    $con = conexion_BD();
    $stmt = $con->prepare("SELECT * FROM lineapedido WHERE num_pedido = :num_pedido");
    $stmt->bindParam(':num_pedido', $id_pedido, PDO::PARAM_INT);
    $stmt->execute();
    $lineas_pedido = array();

    while ($fila = $stmt->fetch()) {
        $lineas_pedido[] = $fila;
    }

    return $lineas_pedido;
}


function get_count_lineas_pedido($dni){
    $id_pedido_pdte = buscar_id_pedidos_pendientes_de_pago_para_usuario_log($dni);

    if($id_pedido_pdte){
        require_once 'php/conection/conectar_BD.php';
        $con = conexion_BD();
        $stmt = $con->prepare("SELECT num_pedido, COUNT(*) as total_lineas FROM lineapedido WHERE num_pedido = :num_pedido GROUP BY num_pedido");
        $stmt->bindParam(':num_pedido', $id_pedido_pdte, PDO::PARAM_INT);
        $stmt->execute();

        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$resultado) {
            return false;
        }
        return $resultado['total_lineas'];
    }
}

function delete_linped($id_articulo){
    $id_pedido = buscar_id_pedidos_pendientes_de_pago_para_usuario_log($_SESSION['dni_log']);
    require_once 'php/conection/conectar_BD.php';
    $con = conexion_BD();

    $stmt = $con->prepare("SELECT COUNT(*) FROM lineapedido WHERE num_pedido = :num_pedido");
    $stmt->bindParam(':num_pedido', $id_pedido, PDO::PARAM_INT);
    $stmt->execute();

    $fila = $stmt->fetch(PDO::FETCH_ASSOC);

    $numero_de_filas = $fila['COUNT(*)'];

    
    $stmt = $con->prepare("DELETE FROM lineapedido WHERE cod_articulo = :cod_articulo LIMIT 1");
    $stmt->bindParam(':cod_articulo', $id_articulo, PDO::PARAM_STR);
    $stmt->execute();

    if($numero_de_filas === 1){
        delete_pedido($id_pedido);
    }else{
        if($stmt->rowCount()){
            echo "Borrado con exito";
            
            $valor_actual_pedido = valor_pedido_actual($id_pedido);
            $valor_articulo = getArrayArtPorId($id_articulo);
            $valor_actualizado_pedido = $valor_actual_pedido - $valor_articulo[0]['precio'];
            $stmt = $con->prepare("UPDATE pedidos SET valor_pedido = :valor_pedido WHERE id_pedido = :id_pedido");
            $stmt->bindParam(':id_pedido', $id_pedido, PDO::PARAM_INT);
            $stmt->bindValue(':valor_pedido', $valor_actualizado_pedido, PDO::PARAM_INT);
            $stmt->execute();
        }else{
            echo "Ninguna fila ha sido borrada";
        }
    }
}

?>