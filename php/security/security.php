<?php
if (!isset($_SESSION)) {
    session_start();
}

if(!$_SESSION['logueado']){
    header('Location: main.php');
    exit();
}
    
?>