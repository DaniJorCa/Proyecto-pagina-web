<?php
echo "<div class='paginacion'>";
if ($_SESSION['total_paginas'] > 1){ 
    for ($i=1;$i<=$_SESSION['total_paginas'];$i++){ 
        if ($pagina == $i)
        //si muestro el índice de la página actual, no coloco enlace 
            echo "<p>". $pagina . " </p> "; 
        else {
            echo "<p><a href='index.php?pagina=". $i ."'>" . $i . "</a></p>";  
        }
    //si el índice no corresponde con la página mostrada actualmente, coloco el enlace para ir a esa página 
        
        } 
    } 
   //número de registros total, el tamaño de página y la página que se muestra 
   if($_SESSION['total_paginas'] == 0){
    echo "<p>Mostrando la página " . $pagina;
   }else{
    echo "<p>Mostrando la página " . $pagina . " de " . $_SESSION['total_paginas'] . "</p>";
   }
   
   echo "</div>";

   ?>