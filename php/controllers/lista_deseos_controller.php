<?php

function add_goods_wishlist(){
    $exist = false;
    require_once ('php/models/lista_deseos_model.php');
    $arts_lista_deseos = get_wishlist_cliente();
    foreach($arts_lista_deseos as $art_lista_deseos){
        if($art_lista_deseos['id_articulo'] === $_GET['id']){
            $exist = true;
        }
    }
    if(!$exist){
        add_good_to_wishlist($_GET['id']);
        header("Location: index.php");
    }else{
        header('Location: index.php?view=_show-wishlist&info=art-wl-exist');
    }  
}

function mostrar_lista_deseos(){
    require_once ('php/models/lista_deseos_model.php');
    require_once ('php/models/articulos_model.php');
    $deseos = get_wishlist_cliente();
    include ('php/views/mywishlist.php');
}

function delete_line_wishtlist(){
    require_once ('php/models/lista_deseos_model.php');
    if(borrar_linea_lista_deseos($_GET['id'])){
      header("Location: index.php?view=_show-wishlist&info=del_wltrue");  
    }
    
}

?>