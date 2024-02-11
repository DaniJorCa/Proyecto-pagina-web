<?php

function add_goods_wishlist(){
    require_once ('php/models/lista_deseos_model.php');
    add_good_to_wishlist($_GET['id']);
    header("Location: index.php");
}

function mostrar_lista_deseos(){
    require_once ('php/models/lista_deseos_model.php');
    $deseos = get_wishlist_cliente();
    include ('php/views/mywishlist.php');
}

?>