<?php

function conexion_BD(){
    if (!defined('USER_DB')) {
        define ("USER_DB","root");
    }
    
    if(!defined('PASSWORD')){
      define ("PASSWORD","");  
    }
    
try {
    $dsn = "mysql:host=localhost;dbname=empresa";
    $con = new PDO($dsn, USER_DB, PASSWORD);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e){
        echo 'Error: '.$e->getMessage();
    }
    return $con;
}

?>

