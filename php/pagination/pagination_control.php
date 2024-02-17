<?php
if(isset($pagina) && $pagina > 1){
    $previousPage = $pagina -1;
}
echo "<div class='row my-4'>";
echo "<div class='paginacion row'>";
echo "<nav aria-label='Page navigation example'>";
echo '<ul class="pagination">';
echo '<li class="page-item">';
echo '<a class="page-link" href="'.$_SESSION['header'].'pagina='. (isset($previousPage) ? $previousPage : $pagina) . '" aria-label="Previous">';
echo '<span aria-hidden="true">&laquo;</span>';
echo  '</a>';
echo '</li>';

if ($_SESSION['total_paginas'] > 1){ 
    for ($i=1; $i<=$_SESSION['total_paginas']; $i++){ 
        if ($pagina == $i)
        //si muestro el índice de la página actual, no coloco enlace 
            echo '<li class="page-item"><a class="page-link">'.$pagina.'</a></li>'; 
        else {
            echo '<li class="page-item"><a class="page-link" href="'. $_SESSION['header'].'pagina='. $i .'">'.$i.'</a></li>'; 
        }
    //si el índice no corresponde con la página mostrada actualmente, coloco el enlace para ir a esa página 
        
        } 
    }
    if(isset($pagina) && $pagina < $_SESSION['total_paginas']){
        $nextPage = $pagina + 1;
    }

echo '<li class="page-item">';
echo '<a class="page-link" href="'. $_SESSION['header']. 'pagina='. (isset($nextPage) ? $nextPage : $pagina) .'"" aria-label="Next">';
echo '<span aria-hidden="true">&raquo;</span>';
echo '</a>';
echo '</li>';
echo "</nav>";
echo "</div>";




echo "<div class='row'>";  


   //número de registros total, el tamaño de página y la página que se muestra 
   if($_SESSION['total_paginas'] == 0){
    echo "<p>Mostrando la página " . $pagina;
   }else{
    echo "<p>Mostrando la página " . $pagina . " de " . $_SESSION['total_paginas'] . "</p>";
   }
echo "</div>";
echo "</div>";
?>