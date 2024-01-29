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

function check_log($array){
        
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

}

    

function insertar_usuario_completo_en_BD($array){

        try{
            require '../php/conection/conectar_BD.php';
            $con = conexion_BD();
            $stmt = $con->prepare('INSERT INTO usuarios (dni, password, nombre, primer_apellido, segundo_apellido,  
            direccion, provincia, poblacion, cod_postal, telefono, email) VALUES (:dni, :password, :nombre, :primer_apellido, :segundo_apellido, :direccion, :provincia, :poblacion, :cod_postal, :telefono, :email)');
            $rows = $stmt->execute(array(':dni' => $array['dni'], ':password' => $array['password'], ':nombre' => $array['nombre'], ':primer_apellido' => $array['primer_apellido'],
            ':segundo_apellido' => $array['segundo_apellido'], ':direccion' => $array['direccion'], ':provincia' => $array['provincia'], ':poblacion' => $array['poblacion'], 
            ':cod_postal' => $array['cod_postal'], ':telefono' => $array['telefono'], ':email' => $array['email']));

        if($rows == 1)
            return 'Insercion correcta';
        }catch(PDOException $e){
            echo "Error:" . $e->getMessage();
        } 
}


function existe_usuario_con_dni($dni){
    require '../php/conection/conectar_BD.php';
    $con = conexion_BD();
    $stmt = $con->prepare('SELECT * FROM usuarios WHERE dni = :dni');
    $rows = $stmt->execute(array(':dni' => $dni));
    
    if($rows > 0){
        return true;
    }else{
        return false;
    }
}


function insertar_usuario_basico_en_BD($email, $password, $nombre, $direccion, $provincia, $poblacion, $telefono){

        try{
            require '../php/conection/conectar_BD.php';
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
?>