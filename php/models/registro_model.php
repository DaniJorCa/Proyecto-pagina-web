<?php
function comprobar_errores_formulario($array){
        $errores = '';

        if(!boolean_comprobar_email($array['email'])){
            if(empty($errores)){
                $errores .= 'email=incorrect';
            }else{
                $errores .= '&email=incorrect';
            }
        }
        

        if(!boolean_comprobar_dni($array['dni'])){
            if(empty($errores)){
                $errores .= 'dni=incorrect';
            }else{
                $errores .= '&dni=incorrect';
            }
        }

   
        foreach($array as $clave => $valor){
            if(empty($valor)){
                if(empty($errores)){
                    $errores .=  $clave . '=err';
                }else{
                    $errores .= '&' . $clave . '=err';
                }   
            }   
        }
        if(!empty($errores)){
            return $errores;
        }
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

function array_registros_faltantes_formulario(){
    $array = [];
    
    if(count($_POST) === 10){
     
        $array['dni'] =  $_POST['dni'];
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



function array_registros_min_formulario(){
    $array = [];
    
    if(count($_POST) === 4){
     
        $array['dni'] =  $_POST['dni'];
        $array['password'] = $_POST['password'];
        $array['nombre'] =  $_POST['nombre'];
        $array['email'] =  $_POST['email'];
    } 
    return $array;
}
?>  