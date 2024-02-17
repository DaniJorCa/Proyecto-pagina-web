<?php

function mostrar_mensajes($array){
    if(isset($_GET['info'])){
        $mostrar = $array['info']; 
        
        switch ($mostrar){
            case 'update_passwd':
                echo "<h5 class='fs-4 text-danger text-center'>Contraseña actualizada con éxito </h5>";
                break;
            case 'del-art':
                echo "Articulo Borrado de la base de datos";
                break;
            case 'del_art_err':
                echo "Error al eliminar el articulo";
                break;
            case 'del_wltrue':
                echo "Eliminado articulo de la lista de deseos";
                break;
            case 'art-wl-exist':
                echo "Articulo ya existe en tu WishList";
                break;
            case 'not_same_passwd':
                echo "<p class='text-danger text-center'>Tarea Abortada, Password y Re-Password deben de ser iguales</p>";
                break;    
                    
            default:
                echo "";
                break;
        }

    }else{
        $mostrar = $array['info-mod'];

        if(is_array($mostrar)){
            $cadena = "<p class='parrafo-move text-center fs-5'>";
           foreach($mostrar as $mensaje){
                
                if($mensaje === 'name-art-edit'){
                    $cadena .= "Modificado el nombre de ". $_SESSION['nombre-before-edit'] . " a " .$_SESSION['nombre-after-edit'] . " || ";
                }
                if($mensaje === "img-art-edit"){
                    $cadena .= "Modificada la imagen";
                }
                if($mensaje === "desc-art-edit"){
                    $cadena .= "Modificada la descripcion";
                }
                if($mensaje === "precio-art-edit"){
                    $cadena .= "Modificado el precio de ". $_SESSION['precio-before-edit'] . " € a " .$_SESSION['precio-after-edit']. " € || ";
                }
                if($mensaje === "compra-art-edit"){
                    $cadena .= "Modificado el precio de ". $_SESSION['compra-before-edit'] . " € a " .$_SESSION['compra-after-edit']." € || ";
                }
                if($mensaje === "iva-art-edit"){
                    $cadena .= "Modificado el iva de ". $_SESSION['iva-before-edit'] . " a " .$_SESSION['iva-after-edit'] . " || ";
                }
                if($mensaje === "genero-art-edit"){
                    $cadena .= "Modificado el genero de ". $_SESSION['genero-before-edit'] . " a " .$_SESSION['genero-after-edit'] . " || ";
                }
                if($mensaje === "categoria-art-edit"){
                    $cadena .= "Modificada la categoria de ". $_SESSION['categoria-before-edit'] . " a " .$_SESSION['categoria-after-edit'] . " || ";
                }
                if($mensaje === "sub-art-edit"){
                    $cadena .= "Modificada la subcategoria de ". $_SESSION['sub-before-edit'] . " a " .$_SESSION['sub-after-edit'] . " || ";
                }
                if($mensaje === "stock-art-edit"){
                    $cadena .= "Modificado el genero de ". $_SESSION['stock-before-edit'] . " a " .$_SESSION['stock-after-edit'] . " || ";
                }
                if($mensaje === "min-art-edit"){
                    $cadena .= "Modificado el stock de ". $_SESSION['stock_minimo-before-edit'] . " a " .$_SESSION['stock_minimo-after-edit'] . " || ";
                }
                if($mensaje === "esBaja-art-edit"){
                    $cadena .= "Modificada Baja de ". $_SESSION['esBaja-before-edit'] . " a " .$_SESSION['esBaja-after-edit'] . " || ";
                }
            } 
            $cadena .= "</p>";
            echo $cadena;
        }else{
            switch ($mostrar){
                case 'name-art-edit':
                    echo "<p class='text-center fs-5'>Modificado el nombre de ". $_SESSION['nombre-before-edit'] . " a " .$_SESSION['nombre-after-edit']. "</p>";
                    break;
                case 'img-art-edit':
                    echo "<p class='text-center fs-5' >Modificada la imagen</p>";
                    break;    
                case 'desc-art-edit':
                    echo "<p class='text-center fs-5'>Modificada la descripcion</p>";
                    break;
                case 'precio-art-edit':
                    echo "<p class='text-center fs-5'>Modificado el precio de ". $_SESSION['precio-before-edit'] . " € a " .$_SESSION['precio-after-edit']. " €</p>";
                    break;
                case 'compra-art-edit':
                    echo "<p class='text-center fs-5'>Modificado el precio de ". $_SESSION['compra-before-edit'] . " € a " .$_SESSION['compra-after-edit']. " €</p>";
                    break;
                case 'iva-art-edit':
                    echo "<p class='text-center fs-5'>Modificado el iva de ". $_SESSION['iva-before-edit'] . " a " .$_SESSION['iva-after-edit']. "</p>";
                    break;
                case 'genero-art-edit':
                    echo "<p class='text-center fs-5'>Modificado el genero de ". $_SESSION['genero-before-edit'] . " a " .$_SESSION['genero-after-edit']. "</p>";
                    break;
                case 'categoria-art-edit':
                    echo "<p class='text-center'>Modificada la categoria de ". $_SESSION['categoria-before-edit'] . " a " .$_SESSION['categoria-after-edit']. "</p>";
                    break;
                case 'sub-art-edit':
                    echo "<p class='text-center fs-5'>Modificada la subcategoria de ". $_SESSION['sub-before-edit'] . " a " .$_SESSION['sub-after-edit']. "</p>";
                    break;
                case 'stock-art-edit':
                    echo "<p class='text-center fs-5'>Modificado el genero de ". $_SESSION['stock-before-edit'] . " a " .$_SESSION['stock-after-edit']. "</p>";
                    break;
                case 'min-art-edit':
                    echo "<p class='text-center fs-5'>Modificado el stock de ". $_SESSION['stock_minimo-before-edit'] . " a " .$_SESSION['stock_minimo-after-edit']. "</p>";
                    break;
                case 'esBaja-art-edit':
                    echo "<p class='text-center fs-5'>Modificada baja de ". $_SESSION['stock_minimo-before-edit'] . " a " .$_SESSION['stock_minimo-after-edit']. "</p>";
                    break; 
                case 'same-edit-fields':
                    echo "<p class='text-center fs-5'>No se ha realizado ningun cambio</p>";
                    break;                                       
            }
        }

        
    }
    
}    
    
    




?>