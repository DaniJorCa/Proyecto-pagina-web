<?php

function consultar_art_mas_vendidos(){
    require '../php/models/articulos_model.php';
    $articulos = getArrayTopVentasDesc();
    include '../php/views/top_ventas_listar.php';
}

function consultar_mantenimiento_articulos(){
    require '../php/models/articulos_model.php';
    $articulos = getArrayArtsPorCategoriaAsc();
    include '../php/views/mantenimiento_articulos.php';
}

function edicion_informacion_articulo($id){
    require '../php/models/articulos_model.php';
    $articulo = getArrayArtPorId($id);
    include '../php/views/edicion_articulo.php';
}

function formulario_alta(){
    require '../php/models/articulos_model.php';
    if(isset($_FILES['imagen']) && ($_FILES['imagen']['size'])){
        $checkImg = formato($_FILES['imagen']['name']);
        if($checkImg){
            subirImg($_FILES["imagen"]);
            $_SESSION['imagen'] = "imgUploads/". $_FILES['imagen']['name'];  
        }else{
            echo "<p>Carga de imagen abortada. Compruebe formato PNG|GIF|JPG|JPEG.</p>";
        }   
    }

    if(isset($POST['registro_articulo'])){
       $cadena_errores_formulario = comprobar_datos_registro($POST['registro_articulo']); 
    }

    if(empty($cadena_errores_formulario)){

    }
    
    include '../php/views/form_registro_articulo.php';
}

?>