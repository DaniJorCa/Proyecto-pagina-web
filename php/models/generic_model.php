<?php

function mostrar_mensajes($array){

    $mostrar = $array['info'];

    switch ($mostrar){

        case 'update_passwd':
            echo "<h5 class='display-6 text-danger text-center'>Contraseña actualizada con éxito </h5>";
            break;
        case 'del-art':
            echo "Articulo Borrado de la base de datos";
            break;
        case 'del_art_err':
            echo "Error al eliminar el articulo";
            break;
        default:
            echo "";
            break;

    }
}


?>