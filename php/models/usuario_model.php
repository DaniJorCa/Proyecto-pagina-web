<?php
include('persona_model.php');

class Empleado extends Usuario{
    public $perfil;


    public function __construct($dni_cliente, $password, $nombre, $primer_apellido, $segundo_apellido,
    $direccion, $provincia, $poblacion, $cod_postal, $telefono, $email, $perfil, $esBaja){

        parent::__construct($dni_cliente, $password, $nombre, $primer_apellido, $segundo_apellido,
        $direccion, $provincia, $poblacion, $cod_postal, $telefono, $email, $perfil, $esBaja);
        $this->perfil = $perfil;

    }
}

function boolean_comprobar_email($cadena) {
    $dominio = "";
    $correo = "";
    $afterDot = "";

    $posArroba = strpos($cadena, "@");

    if($posArroba !== false){
        $correo = substr($cadena, 0, $posArroba);
        $dominio = substr($cadena, $posArroba, strlen($cadena));
        $punto = strpos($dominio, ".");
        if($punto == strlen($dominio) - 1){
           $afterDot = "error";
        }
        
        $espacios = strpos($cadena, " ");

        if($dominio !== " " && $correo !== " " && $espacios === false && $punto != false && $afterDot != "error"){
            return true;
        }else{
            return false;
        }
    }
}

function boolean_comprobar_dni($dni){
    $letras = ["T" => 0,"R" => 1,"W" => 2,"A" => 3,"G" => 4,"M" => 5,"Y" => 6,"F" => 7,"P" => 8,"D" => 9,
                "X" => 10, "B" => 11,"N" => 12,"J" => 13,"Z" => 14,"S" => 15,"Q" => 16,"V" => 17,"H" => 18,
                "L" => 19,"C" => 20,"K" => 21,"E" => 22,];
    $cadenaResultado = "";
    $booleanDNIFalso = false;
    $dniComprobado = "";
    $numeracion = substr($dni, 0, 8);
    $letra = substr($dni, 8, 1);

    for ($i = 0; $i < strlen($numeracion); $i++){
        $num = substr($numeracion, $i, 1);
        if(ord($num) >= 48 && ord($num) <= 57 ){
            $dniComprobado .= $num;

        }else{
            $cadenaResultado = false;
            $i = strlen($dni);
            $booleanDNIFalso = true;
        }
    }
    
    $numDNI = (int)$dniComprobado;
    $resto = round($numDNI % 23);
    foreach($letras as $clave => $valor){
        if($valor == $resto)
            $letraCalculada = $clave;
    }

    if ($letraCalculada == $letra && strlen($dniComprobado) == 8){
        $cadenaResultado = true;
    }elseif(!$booleanDNIFalso){
        if(!$cadenaResultado){
            $cadenaResultado = false;
        };
    }
    return $cadenaResultado;
}


function array_registros_formulario(){
    $array = [];
    
    if(count($_POST) === 11){
     
        $array['dni'] =  $_POST['dni'];
        $array['password'] = $_POST['password'];
        $array['nombre'] =  $_POST['nombre'];
        $array['primer_apellido'] =  $_POST['primer_apellido'];
        $array['segundo_apellido'] =  $_POST['segundo_apellido'];
        $array['direccion'] =  $_POST['direccion'];
        $array['provincia'] =  $_POST['provincia'];
        $array['poblacion'] =  $_POST['poblacion'];
        $array['cod_postal'] =  $_POST['cod_postal'];
        $array['telefono'] =  $_POST['telefono'];
        $array['email'] =  $_POST['email'];
    
        
    } 
    return $array;
}

function comprobar_errores_formulario($array){
        $errores = '';

        if(!boolean_comprobar_email($array['email'])){
            if(empty($errores)){
                $errores .= '?email=incorrect';
            }else{
                $errores .= '&email=incorrect';
            }
        }
        

        if(!boolean_comprobar_dni($array['dni'])){
            if(empty($errores)){
                $errores .= '?dni=incorrect';
            }else{
                $errores .= '&dni=incorrect';
            }
        }

   
        foreach($array as $clave => $valor){
            if(empty($valor)){
                if(empty($errores)){
                    $errores .= '?' . $clave . '=err';
                }else{
                    $errores .= '&' . $clave . '=err';
                }   
            }   
        }
        if(!empty($errores)){
            return $errores;
        }
}   

function checkLog($email, $passwd){
    $check;
    try{
        if(!isset($con)){
            require_once 'php/conection/conectar_BD.php'; 
            $con = conexion_BD();
            $stmt = $con->prepare('SELECT * FROM usuarios WHERE  email = :email');
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->execute();
        } 
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($usuario && password_verify($passwd, $usuario['password'])) {
            session_start();
            $_SESSION['password_reg_log'] = $usuario['password'] ;
            $_SESSION['nombre_log'] = $usuario['nombre'];
            $_SESSION['dni_log'] = $usuario['dni'];
            $_SESSION['primer_apellido_log'] = $usuario['primer_apellido'];
            $_SESSION['segundo_apellido_log'] = $usuario['segundo_apellido'];
            $_SESSION['direccion_log'] = $usuario['direccion'];
            $_SESSION['provincia_log'] =$usuario['provincia'];
            $_SESSION['poblacion_log'] = $usuario['poblacion'];
            $_SESSION['cod_postal_log'] = $usuario['cod_postal'];
            $_SESSION['telefono_log'] = $usuario['telefono'];
            $_SESSION['email_log'] = $usuario['email'];
            $_SESSION['perfil_log'] = $usuario['perfil'];
            $_SESSION['email_log'] = $usuario['email'];

            $check = true;
        }else{
            $check = false;
        }
        
        return $check;
    }catch(PDOException $e){
        echo 'Error: ' . $e ->getMessage();
    }
}


//Borrar
/*function check_log($array){
        
    $_SESSION['password_reg_log'] = $array['password'] ;
    $_SESSION['nombre_log'] = $array['nombre'];
    $_SESSION['primer_apellido_log'] = $array['primer_apellido'];
    $_SESSION['segundo_apellido_log'] = $array['segundo_apellido'];
    $_SESSION['direccion_log'] = $array['direccion'];
    $_SESSION['provincia_log'] =$array['provincia'];
    $_SESSION['poblacion_log'] = $array['poblacion'];
    $_SESSION['cod_postal_log'] = $array['cod_postal'];
    $_SESSION['telefono_log'] = $array['telefono'];
    $_SESSION['email_log'] = $array['email'];
    $_SESSION['perfil_log'] = $array['perfil'];
    $_SESSION['email_log'] = $array['email'];
}*/

    

function insertar_usuario_completo_en_BD($array){

        try{
            require_once ('php/conection/conectar_BD.php');
            $con = conexion_BD();
            $stmt = $con->prepare('INSERT INTO usuarios (dni, password, nombre, primer_apellido, segundo_apellido,  
            direccion, provincia, poblacion, cod_postal, telefono, email) VALUES (:dni, :password, :nombre, :primer_apellido, :segundo_apellido, :direccion, :provincia, :poblacion, :cod_postal, :telefono, :email)');
            $rows = $stmt->execute(array(':dni' => $array['dni'], ':password' => password_hash($array['password'],PASSWORD_DEFAULT), ':nombre' => $array['nombre'], ':primer_apellido' => $array['primer_apellido'],
            ':segundo_apellido' => $array['segundo_apellido'], ':direccion' => $array['direccion'], ':provincia' => $array['provincia'], ':poblacion' => $array['poblacion'], 
            ':cod_postal' => $array['cod_postal'], ':telefono' => $array['telefono'], ':email' => $array['email']));

        if($rows == 1)
            return 'Insercion correcta';
        }catch(PDOException $e){
            echo "Error:" . $e->getMessage();
        } 
}


function existe_usuario_con_dni($dni){
    require_once 'php/conection/conectar_BD.php';
    $con = conexion_BD();
    $stmt = $con->prepare('SELECT * FROM usuarios WHERE dni = :dni');
    $stmt->bindParam(':dni', $dni);
    $stmt->execute();
    
    $rows = $stmt->fetch(PDO::FETCH_ASSOC);

    return ($rows !== false);
}


function get_array_datos_usuario_or_string_if_is_not($dni){
    require_once 'php/conection/conectar_BD.php';
    $con = conexion_BD();
    $stmt = $con->prepare('SELECT * FROM usuarios WHERE dni = :dni');
    $stmt->bindParam(':dni', $dni);
    $stmt->execute();
    
    $array_usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    return ($array_usuario !== false) ? $array_usuario : "Usuario no encontrado en la base de datos";
}

function extraer_apellidos($cadena){
    $arrayApellidos = [];
    $posicion_espacio = strpos($cadena, ' ');
    $primer_apellido = substr($cadena, 0, $posicion_espacio);
    $segundo_apellido = substr($cadena, $posicion_espacio + 1, strlen($cadena));

    array_push($arrayApellidos, $primer_apellido);
    array_push($arrayApellidos, $segundo_apellido);

    return $arrayApellidos;
}

function modificar_datos_usuario_en_BD($array){
    try {
        $array_explode_apellidos = extraer_apellidos($array['apellidos_edit']);

        require_once ('php/conection/conectar_BD.php');
        $con = conexion_BD();

        if($array['perfil_edit'] !== null){
            $stmt = $con->prepare('UPDATE usuarios SET nombre = :nombre, primer_apellido = :primer_apellido, segundo_apellido = :segundo_apellido,  
            direccion = :direccion, provincia = :provincia, poblacion = :poblacion, cod_postal = :cod_postal, telefono = :telefono, email = :email, perfil = :perfil WHERE dni = :dni');
            $rows = $stmt->execute(array(
            ':nombre' => $array['nombre_edit'],
            ':primer_apellido' => $array_explode_apellidos[0],
            ':segundo_apellido' => $array_explode_apellidos[1],
            ':direccion' => $array['direccion_edit'],
            ':provincia' => $array['provincia_edit'],
            ':poblacion' => $array['poblacion_edit'],
            ':cod_postal' => $array['cod_postal_edit'],
            ':telefono' => $array['telefono_edit'],
            ':email' => $array['email_edit'],
            ':dni' => $array['dni_edit'],
            ':perfil' => strtolower($array['perfil_edit'])
            ));
        }else{
           $stmt = $con->prepare('UPDATE usuarios SET nombre = :nombre, primer_apellido = :primer_apellido, segundo_apellido = :segundo_apellido,  
                                direccion = :direccion, provincia = :provincia, poblacion = :poblacion, cod_postal = :cod_postal, telefono = :telefono, email = :email WHERE dni = :dni');
            $rows = $stmt->execute(array(
            ':nombre' => $array['nombre_edit'],
            ':primer_apellido' => $array_explode_apellidos[0],
            ':segundo_apellido' => $array_explode_apellidos[1],
            ':direccion' => $array['direccion_edit'],
            ':provincia' => $array['provincia_edit'],
            ':poblacion' => $array['poblacion_edit'],
            ':cod_postal' => $array['cod_postal_edit'],
            ':telefono' => $array['telefono_edit'],
            ':email' => $array['email_edit'],
            ':dni' => $array['dni_edit']
        )); 
        }
        

        if ($rows == 1)
            return 'Actualización correcta';
    } catch (PDOException $e) {
        echo "Error:" . $e->getMessage();
    } 
}

function boolean_check_empty_fields($array){
    $campo_vacio = false;

    if (is_array($array) || is_object($array)) {
        foreach ($array as $clave => $valor) {
            if($valor === "" || empty(trim($valor))){
                $campo_vacio = true;
            }   
        }
    } else {
        echo "La variable \$_POST no es un array u objeto.";
    }
    
    return $campo_vacio;
}


function check_edit_usuario($usuarioActual, $usuarioEditado){

    $array_string_diferencias = [];

    if($usuarioActual['nombre'] !== $usuarioEditado['nombre_edit']){
        $_SESSION['nombre_log'] = $usuarioEditado['nombre_edit'];
        $_SESSION['nombre_anterior'] = $usuarioActual['nombre'];
        $_SESSION['nombre_nuevo'] = $usuarioEditado['nombre_edit'];
        array_push($array_string_diferencias, $usuarioActual['nombre']);
        array_push($array_string_diferencias, $usuarioEditado['nombre_edit']);
    }

    if(($usuarioActual['primer_apellido'] . " " . $usuarioActual['segundo_apellido']) !== $usuarioEditado['apellidos_edit'] && $usuarioEditado['apellidos_edit'] !== ''){
        $apellidos_explode = extraer_apellidos($usuarioEditado['apellidos_edit']);
        $_SESSION['primer_apellido_log'] = $apellidos_explode[0];
        $_SESSION['segundo_apellido_log'] = $apellidos_explode[1];
        $_SESSION['apellidos_anteriores'] = $usuarioActual['primer_apellido'] . " " . $usuarioActual['segundo_apellido'];
        $_SESSION['apellidos_nuevos'] = $usuarioEditado['apellidos_edit'];
        array_push($array_string_diferencias,$usuarioActual['primer_apellido'] . " " . $usuarioActual['segundo_apellido']);
        array_push($array_string_diferencias,$usuarioEditado['apellidos_edit']);
    }

    if($usuarioActual['dni'] !== $usuarioEditado['dni_edit']){
        $_SESSION['dni_log'] = $usuarioEditado['dni_edit'];
        $_SESSION['dni_anterior'] = $usuarioActual['dni'];
        $_SESSION['dni_nuevo'] = $usuarioEditado['dni_edit'];
        array_push($array_string_diferencias,$usuarioActual['dni']);
        array_push($array_string_diferencias, $usuarioEditado['dni_edit']);
    }

    if($usuarioActual['email'] !== $usuarioEditado['email_edit']){
        $_SESSION['email_log'] = $usuarioEditado['email_edit'];
        $_SESSION['email_anterior'] = $usuarioActual['email'];
        $_SESSION['email_nuevo'] = $usuarioEditado['email_edit'];
        array_push($array_string_diferencias,$usuarioActual['email']);
        array_push($array_string_diferencias,$usuarioEditado['email_edit']);
    }

    if($usuarioActual['direccion'] !== $usuarioEditado['direccion_edit']){
        $_SESSION['direccion_log'] = $usuarioEditado['direccion_edit'];
        $_SESSION['direccion_anterior'] = $usuarioActual['direccion'];
        $_SESSION['direccion_nuevo'] = $usuarioEditado['direccion_edit'];
        array_push($array_string_diferencias,$usuarioActual['direccion']);
        array_push($array_string_diferencias,$usuarioEditado['direccion_edit']);
    }

    if($usuarioActual['provincia'] !== $usuarioEditado['provincia_edit']){
        $_SESSION['provincia_log'] = $usuarioEditado['provincia_edit'];
        $_SESSION['provincia_anterior'] = $usuarioActual['provincia'];
        $_SESSION['provincia_nuevo'] = $usuarioEditado['provincia_edit'];
        array_push($array_string_diferencias,$usuarioActual['provincia']);
        array_push($array_string_diferencias,$usuarioEditado['provincia_edit']);
    }

    if($usuarioActual['poblacion'] !== $usuarioEditado['poblacion_edit']){
        $_SESSION['poblacion_log'] = $usuarioEditado['poblacion_edit'];
        $_SESSION['poblacion_anterior'] = $usuarioActual['poblacion'];
        $_SESSION['poblacion_nuevo'] = $usuarioEditado['poblacion_edit'];
        array_push($array_string_diferencias,$usuarioActual['poblacion']);
        array_push($array_string_diferencias,$usuarioEditado['poblacion_edit']);
    }

    if($usuarioActual['telefono'] !== $usuarioEditado['telefono_edit']){
        $_SESSION['telefono_log'] = $usuarioEditado['telefono_edit'];
        $_SESSION['telefono_anterior'] = $usuarioActual['telefono'];
        $_SESSION['telefono_nuevo'] = $usuarioEditado['telefono_edit'];
        array_push($array_string_diferencias,$usuarioActual['telefono']);
        array_push($array_string_diferencias,$usuarioEditado['telefono_edit']);
    }

    if($usuarioActual['cod_postal'] !== $usuarioEditado['cod_postal_edit']){
        $_SESSION['cod_postal_log'] = $usuarioEditado['cod_postal_edit'];
        $_SESSION['cod_postal_anterior'] = $usuarioActual['cod_postal'];
        $_SESSION['cod_postal_nuevo'] = $usuarioEditado['cod_postal_edit'];
        array_push($array_string_diferencias,$usuarioActual['cod_postal']);
        array_push($array_string_diferencias,$usuarioEditado['cod_postal_edit']);
    }

    if(isset($usuarioActual['perfil']) && $usuarioActual['perfil'] !== $usuarioEditado['perfil_edit']){
        $_SESSION['perfil_anterior'] = $usuarioActual['perfil'];
        $_SESSION['perfil_nuevo'] = $usuarioEditado['perfil_edit'];
        array_push($array_string_diferencias,$usuarioActual['perfil']);
        array_push($array_string_diferencias,$usuarioEditado['perfil_edit']);
    }

    return $array_string_diferencias;

}


function insertar_usuario_basico_en_BD($email, $password, $nombre, $direccion, $provincia, $poblacion, $telefono){

        try{
            require_once ('php/conection/conectar_BD.php');
            $con = conexion_BD();
            $stmt = $con->prepare('INSERT INTO usuarios (email, password, nombre, 
            direccion, provincia, poblacion, telefono) VALUES (:email, :password, :nombre, :direccion, :provincia, :poblacion, :telefono)');
            $rows = $stmt->execute(array(':dni' => 'XXXXXXXXX', ':email' => $email, ':password' => $password, ':nombre' => $nombre,
            ':direccion' => $direccion, ':provincia' => $provincia, ':poblacion' => $poblacion, ':telefono' => $telefono));

            if($rows == 1)
                return 'Insercion correcta';
        }catch(PDOException $e){
            echo "Error:" . $e->getMessage();
        }
}

function check_passwd_y_repasswd($array) {
    return $array['passwd_edit'] === $array['re-passwd_edit'];
}


function modificar_passwd($array){
    try {
        require_once ('php/conection/conectar_BD.php');
        $con = conexion_BD();
        $stmt = $con->prepare('UPDATE usuarios SET password = :password WHERE email = :email');
        $rows = $stmt->execute(array(
            ':email' => $array['email_edit'],
            ':password' => password_hash($array['passwd_edit'],PASSWORD_DEFAULT)
        ));

        if ($rows == 1)
            return 'Actualización correcta';
    } catch (PDOException $e) {
        echo "Error:" . $e->getMessage();
    } 
}

function get_array_todos_usuarios(){
    require_once 'php/conection/conectar_BD.php';
    $con = conexion_BD();
    $stmt = $con->prepare("SELECT * FROM usuarios");
    $stmt->execute();
    while($fila = $stmt->fetch()){
        $usuarios[] = $fila;
    }
    if(empty($usuarios)) {
        $usuarios[] = 'No hay usuarios';
    }
    return $usuarios;
}


function get_usuario($dni){
    require_once 'php/conection/conectar_BD.php';
    $con = conexion_BD();
    $stmt = $con->prepare('SELECT * FROM usuarios WHERE dni = :dni');
    $stmt->bindParam(':dni', $dni);
    $stmt->execute();
    
    $rows = $stmt->fetch(PDO::FETCH_ASSOC);

    return $rows;
}

function user_edit_SESSION($usuario){
    $_SESSION['user-edit-master-password'] = $usuario['password'] ;
    $_SESSION['user-edit-master-nombre'] = $usuario['nombre'];
    $_SESSION['user-edit-master-dni'] = $usuario['dni'];
    $_SESSION['user-edit-master-primer_apellido'] = $usuario['primer_apellido'];
    $_SESSION['user-edit-master-segundo_apellido'] = $usuario['segundo_apellido'];
    $_SESSION['user-edit-master-direccion'] = $usuario['direccion'];
    $_SESSION['user-edit-master-provincia'] =$usuario['provincia'];
    $_SESSION['user-edit-master-poblacion'] = $usuario['poblacion'];
    $_SESSION['user-edit-master-cod_postal'] = $usuario['cod_postal'];
    $_SESSION['user-edit-master-telefono'] = $usuario['telefono'];
    $_SESSION['user-edit-master-email'] = $usuario['email'];
    $_SESSION['user-edit-master-perfil'] = $usuario['perfil'];
    $_SESSION['user-edit-master-email'] = $usuario['email'];
}

?>