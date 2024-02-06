<?php
if(isset($_GET['user'])){
    session_start();
    $_SESSION['user-edit-master'] = $_GET['user'];
    header('Location: index.php?view=_mod_datos_user_master');
}

?>