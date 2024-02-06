<?php
include('php/models/usuario_model.php');

$logueado = checkLog($_POST['email'], $_POST['passwd']); 

if($logueado){
   session_start();
   $_SESSION['logueado'] = $logueado;
   header('Location: index.php'); 
}else{
    header('Location: main.php');
}
?>