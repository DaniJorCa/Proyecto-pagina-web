<?php

    $artXpag = 9; //modificar este dato para limite de articulos por pagina
    $pagina = 1;
    $inicio = 0;
    //examino la página a mostrar y la muestro si existe 
    if(isset($_GET["pagina"])){
    $pagina = $_GET["pagina"];
    $inicio = ($pagina - 1) * $artXpag;
    }

?>