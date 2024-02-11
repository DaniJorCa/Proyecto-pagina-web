<?php

require_once('php/models/generic_model.php');

function show_messages($array){
    echo "<div class='mensajes'>";
    mostrar_mensajes($array);
    echo "</div>";
}


?>