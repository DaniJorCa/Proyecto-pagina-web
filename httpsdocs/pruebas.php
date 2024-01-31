<?php

include_once('../php/models/articulos_model.php');
include_once('../php/models/categorias_model.php');
include_once('../php/models/usuario_model.php');


if(existe_usuario_con_dni('74245349S')){
    echo "si existe";
}else{
    echo "no existe";
}
   

?>